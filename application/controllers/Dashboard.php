<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public $load;
	public $m_dashboard;
	public $input;
	// public $domain;
	public $db;
	function __construct()
	{
		parent::__construct();
		$this->load->helper('API_helper');
		$this->load->helper('videos_helper');
		$this->load->helper('banner_helper');
		$this->load->helper('map_helper');
	}

	function index()
	{
		$map_data = map_data();

		if (isset($map_data['error_message'])) {
			$data['error_message'] = $map_data['error_message'];
			$data['map_prov'] = [];
		} else {
			$data['map_prov'] = $map_data;
		}
		// Call the properti_populer() function to get the popular properties' HTML
		// $data['properti_populer'] = $this->properti_populer();
		$data['get_kota'] = $this->get_kota();

		// Other data to be passed to the view
		$data['_script'] = 'dashboard/index_js';
		$data['_view'] = 'dashboard/index';

		// Load the view
		$this->load->view('layout/index', $data);
	}

	function get_banner()
	{
		$device = $this->input->post('device');
		$banner_properti = get_banner_properti();

		// Step 1: Filter 'Full' banners
		$full_banners = array_filter($banner_properti, function ($banner) {
			return $banner['type_banner'] === 'Full';
		});

		// Step 2: Randomly select one 'Full' banner
		$random_full_banner = null;
		if (!empty($full_banners)) {
			$random_full_banner = $full_banners[array_rand($full_banners)];
		}

		// Step 3: Initialize arrays for other banner types
		$filter_full = [];
		$filter_singel = [];
		$filter_split = [];
		if ($device == 'dekstop') {

			if ($random_full_banner) {
				// Add the selected full banner to the filter_full array
				$filter_singel[] = '<div class="col-12 p-2 col-header-12">' .
					'<img src="https://admin.kanpa.co.id/upload/banner/' . $random_full_banner['foto_banner'] . '" class=" border img-fluid" alt="">' .
					'<div class="box3"></div>' .
					'</div>';
				$selected_full_id = $random_full_banner['id_banner'];
			}
		}
		// Step 4: Filter and exclude the selected full banner from the other selections
		foreach ($banner_properti as $banner) {
			// Skip the randomly selected full banner
			if (isset($selected_full_id) && $banner['id_banner'] === $selected_full_id) {
				continue;
			}

			switch ($banner['type_banner']) {
				case 'Full':
					$filter_full[] = '<div class="swiper-slide">' .
						'<img src="https://admin.kanpa.co.id/upload/banner/' . $banner['foto_banner'] . '" alt="' . $banner['judul_properti'] . '" class="img-fluid">' .
						'</div>';
					break;

				case 'Split':
					$filter_split[] = '<div class="col-6 p-2">' .
						'<div class="">' .
						'<img src="https://admin.kanpa.co.id/upload/banner/' . $banner['foto_banner'] . '" class="border img-fluid" alt="">' .
						'</div>' .
						'</div>';
					break;
			}

		}

		// Prepare the data array
		$data = [
			'banner_full' => implode('', $filter_full),
			'banner_singel' => implode('', $filter_singel),
			'banner_split' => implode('', $filter_split),
		];

		// Return the data as JSON
		echo json_encode($data);
	}



	public function properti_populer()
	{
		// Fetch the start and limit from the POST request
		$start = (int) ($this->input->post('start') ?? 0);
		$limit = (int) ($this->input->post('limit') ?? 1);

		// Fetch popular properties using the helper function
		$properti_populer = get_properti_populer();

		// Initialize the HTML string
		$populer_html = '';

		// Month names in Indonesian
		$bulanIndonesia = [
			1 => 'Januari',
			2 => 'Februari',
			3 => 'Maret',
			4 => 'April',
			5 => 'Mei',
			6 => 'Juni',
			7 => 'Juli',
			8 => 'Agustus',
			9 => 'September',
			10 => 'Oktober',
			11 => 'November',
			12 => 'Desember'
		];

		// Ensure properties are fetched and start is within valid range
		if (is_array($properti_populer)) {
			// Slice the array based on start and limit
			$populer_subset = array_slice($properti_populer, $start, $limit);

			if (empty($populer_subset)) {
				// No more data available
				echo "No more data available";
			} else {
				foreach ($populer_subset as $populer) {
					// Format the date
					$dateString = $populer['dibuat'];
					$date = DateTime::createFromFormat('d-m-Y', $dateString);

					if ($date) {
						$day = $date->format('d');
						$month = $bulanIndonesia[(int)$date->format('m')];
						$year = $date->format('Y');
						$formattedDate = "$day $month $year";
					} else {
						$formattedDate = $dateString; // Fallback if date is invalid
					}

					// Handle the image string (assumes multiple images are separated by commas)
					$gambar = $populer['gambar'];
					$gambarArray = explode(',', $gambar);
					$firstGambar = $gambarArray[0];

					// Generate HTML for the property
					$populer_html .= '<li class="img-item col-6 p-2 pb-3">' .
						'<div class="populer-container">' .
						'<a href="' . base_url('Detail/perum/') . preg_replace("![^a-z0-9]+!i", "-", $populer['judul_properti']) . '/tipe/' . $populer['luas_tanah'] . '/' . $populer['luas_bangunan'] . '">' .
						'<div class="populer-content">' .
						'<img src="https://admin.kanpa.co.id/upload/gambar_properti/' . htmlspecialchars($firstGambar, ENT_QUOTES, 'UTF-8') . '" class="img-produk-sw">' .
						'</div>' .
						'<div class="bg-light border p-2">' .
						'<span class="title-new-proyek">' . htmlspecialchars($populer['nama_type'], ENT_QUOTES, 'UTF-8') . '</span>' .
						'<span class="title-tayang">Tayang sejak ' . htmlspecialchars($formattedDate, ENT_QUOTES, 'UTF-8') . '</span>' .
						'<h3 class="title-price">Rp ' . number_format($populer['harga'], 0, ',', '.') . ' ' . htmlspecialchars($populer['satuan'], ENT_QUOTES, 'UTF-8') . '</h3>' .
						'<h5 class="title-properti text-black font-weight-bold">' . htmlspecialchars($populer['judul_properti'], ENT_QUOTES, 'UTF-8') . '</h5>' .
						'<h6 class="font-weight-bold title-address"><i class="bi bi-geo-alt"></i> ' . htmlspecialchars($populer['alamat'], ENT_QUOTES, 'UTF-8') . '</h6>' .
						'<ul class="d-flex ul-detail mt-3">' .
						'<li class="text-black"><span class="font-weight-bold">LB</span>: ' . htmlspecialchars($populer['luas_bangunan'], ENT_QUOTES, 'UTF-8') . ' m2</li>' .
						'<li class="text-black"><span class="font-weight-bold">LT</span>: ' . htmlspecialchars($populer['luas_tanah'], ENT_QUOTES, 'UTF-8') . ' m2</li>' .
						'<li class="text-black"><span class="font-weight-bold">KT</span>: ' . htmlspecialchars($populer['jml_kamar'], ENT_QUOTES, 'UTF-8') . '</li>' .
						'<li class="text-black"><span class="font-weight-bold">Km</span>: ' . htmlspecialchars($populer['jml_kamar_mandi'], ENT_QUOTES, 'UTF-8') . '</li>' .
						'</ul>' .
						'</a>' .
						'<hr>' .
						'<div class="d-flex kontakas">' .
						'<img src="https://admin.kanpa.co.id/upload/agent/' . htmlspecialchars($populer['foto_profil'], ENT_QUOTES, 'UTF-8') . '" class="img-marketing">' .
						'<div class="d-block">' .
						'<h5 class="font-weight-bold title-name m-0">' . htmlspecialchars($populer['nama_agent'], ENT_QUOTES, 'UTF-8') . '</h5>' .
						'<p class="small title-address m-0">' . htmlspecialchars($populer['position'], ENT_QUOTES, 'UTF-8') . '</p>' .
						'</div>' .
						'<i class="bi bi-whatsapp i-wa-marketing"></i>' .
						'</div>' .
						'</div>' .
						'</div>' .
						'</li>';
				}

				echo $populer_html;
			}
		} else {
			echo "Failed to fetch property data.";
		}
	}


	function get_kota()
	{
		// Fetch popular properties using the helper function
		$properti_populer = get_properti_populer();

		$kota_html = '';
		// Check if decoding was successful and the result is an array
		if (is_array($properti_populer)) {
			// Initialize an empty array to hold grouped data
			$grouped_kota = [];

			// Loop through each property and group by 'nama_kota'
			foreach ($properti_populer as $populer) {
				$nama_kota = $populer['nama_kota'];

				// Group properties by 'nama_kota'
				if (!isset($grouped_kota[$nama_kota])) {
					$grouped_kota[$nama_kota] = [];
				}

				$grouped_kota[$nama_kota][] = $populer;
			}

			// Build the HTML for each grouped city
			foreach ($grouped_kota as $kota => $properties) {
				foreach ($properties as $property) {
					$gambar_city = $property['icon_filter'];
				}
				$kota_html .= '<li class="img-item">' .
					'<a href="' . base_url('Properti/jualsewa/di/') . preg_replace("![^a-z0-9]+!i", "-", $kota) . '">' .
					'<div class="card border li-city">' .
					'<img class="radius-img-city" src="https://admin.kanpa.co.id/upload/icon/' . $gambar_city . '" alt="">' .
					'<div class="p-3 text-center m-li-box-city">' .
					' <h6 class="text-black font-weight-bold d-table-caption f-s-li-city mb-0">' . $kota . '</h6>' .
					' </div>' .
					'</div>' .
					'</a>' .
					'</li>';
				// $kota_html .= '<h2>' . $kota . $gambar_city . '</h2>';
			}
		}

		// Return the generated HTML
		return $kota_html;
	}

	function get_videos()
	{
		// Fetch the start and limit from the POST request
		$start = (int) ($this->input->post('start') ?? 0);
		$limit = (int) ($this->input->post('limit') ?? 1);

		// Fetch popular properties using the helper function
		$video_properti = get_video_properti();

		// Initialize the HTML string
		$videos_html = '';

		// Ensure properties are fetched and start is within valid range
		if (is_array($video_properti)) {
			// Slice the array based on start and limit
			$video_subset = array_slice($video_properti, $start, $limit);

			foreach ($video_subset as $video) {
				// Generate HTML for the property
				$deskripsi = substr($video['deskripsi'], 0, 50) . '...';
				$videos_html .= '<li class="img-item">' .
					'<div class="reel__container">' .
					'<div class="reel__content">' .
					'<button class="btn-play" id="play-button">' .
					'<i class="fa-solid fa-play"></i>' .
					'</button>' .
					'<a class="fullscreen" href="' . base_url('Video/review/') . preg_replace("![^a-z0-9]+!i", "-", $video['judul_properti']) . '">' .
					'<video class="video" width="315" height="560">' .
					'<source src="https://admin.kanpa.co.id/upload/videos/' . $video['video'] . '" type="video/mp4">' .
					'</video>' .
					'</a>' .
					'<span class="text-desk">' . substr($video['deskripsi'], 0, 40) . '...' . '</span>' .
					'</div>' .
					'</div>' .
					'</li>';
			}
		} else {
			$videos_html = "Failed to fetch property data.";
		}
		$videos_html .= '<li class="img-item">' .
			'    <div class="reel__container" style="min-width: 11rem;">' .
			'        <div class="reel__content">' .
			'        </div>' .
			'    </div>' .
			'</li>';
		echo $videos_html;
	}
}
// $data['_title'] = 'Cari Rumah Murah, Bagus, Terpercaya, Terbukti ? Klik, Disini. | Kanpa.co.id';
// $data['_metafoto'] = 'logo-pt-kanpa-2.png';
// $data['_url'] = base_url();
// $data['_description'] = 'PT Kanpa bergerak di bidang properti sejak tahun 2002. saat ini tersedia di ungaran, semarang, sukoharjo, klaten, kabupaten madiun. Hub 0823-3350-7931';