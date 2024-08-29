<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel extends CI_Controller
{
	public $load;
	public $m_artikel;
	public $input;
	public $uri;
	public $db;
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_artikel');
	}

	function index()
	{

		$data['_title'] = 'ARTIKEL PT KANPA';
		$data['_description'] = "Kumpulan Artikel Menarik di PT. KANPA";
		$data['_keyword'] = "Kumpulan Artikel Menarik di PT. KANPA";
		$data['_metafoto'] = 'logo-pt-kanpa-2.png';
		$data['_url'] = base_url('Artikel');
		$data['_script'] = 'artikel/artikel_js';
		$data['_view'] = 'artikel/artikel';
		$data['data_tag'] = $this->m_artikel->m_data_tag();
		$data['data_berita_left'] = $this->m_artikel->m_data_berita_left();
		$data['data_berita_center'] = $this->m_artikel->m_data_berita_center();
		$data['data_perum'] = $this->m_artikel->m_data_perum();
		$data['data_tipe'] = $this->m_artikel->m_data_tipe();
		$this->load->view('layout/index', $data);
	}

	public function get_berita()
	{
		$output = '';
		$this->load->model('m_artikel');
		$data = $this->m_artikel->m_data_berita_infinity($this->input->post('limit'), $this->input->post('start'));
		if ($data->num_rows() > 0) {
			foreach ($data->result() as $row) {
				$judul_berita = $row->judul_berita;
				$tittle_news = preg_replace("![^a-z0-9]+!i", "-", $judul_berita);

				$output .= '
				<div class="col-lg-6 col-12 ">
					<div id="list" class="border-radius">
    					<div class="row">
        					<div class="col-lg-4 col-md-4 col-4">
            					<div class="form-group">
                					<a class="text-dark add-view-news" href="' . base_url('Artikel/page/') . $tittle_news . '" data-id-berita="' . $row->id_berita . '">
                    					<img src="' . base_url('upload') . '/' . $row->foto_berita . '"
                        				class="img-fluid p-1 border-radius img-berita" data-id-berita="' . $row->id_berita . '"
                        				alt="red sample">
                					</a>
            					</div>
        					</div>
        					<div class="col-lg-8 col-md-8 col-8">
            					<a class="text-dark add-view-news" href="' . base_url('Artikel/page/') . $tittle_news . '" data-id-berita="' . $row->id_berita . '">
                					<h6 class="text-publishing">' . $row->tgl_berita . '</h6>
                					<h6 class="tittle-news">' . $row->judul_berita . '</h6>
                					<h6 class="font-text-port">' . $row->view_berita . ' Views</h6>
           						 </a>
        					</div>
    					</div>
					</div>
				</div>
				';
			}
		}
		echo $output;
	}

	function page()
	{
		$tittle = $this->uri->segment(3);
		$judul_berita = preg_replace("![^a-z0-9]+!i", " ", $tittle);

		$sql = "SELECT * FROM berita WHERE judul_berita='$judul_berita'";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $meta) {
				$id_berita = $meta->id_berita;
				$meta_desk = $meta->meta_desk;
				$meta_foto = $meta->meta_foto;
				$tag_berita = $meta->tag_berita;
			}
		} else {
		}

		$data['_title'] = $judul_berita;
		$data['_metafoto'] = $meta_foto;
		$data['_url'] = base_url('Artikel/page/') . $tittle;
		$data['_description'] = 'PT Kanpa ' . $judul_berita . ' - ' . $meta_desk;
		$data['_keyword'] = 'artikel ' . $tag_berita . ', ' . $judul_berita;
		$data['_script'] = 'artikel/artikel_js';
		$data['_view'] = 'artikel/page_artikel';
		$data['data_tag'] = $this->m_artikel->m_data_tag();
		$data['data_berita_left'] = $this->m_artikel->m_data_berita_left();
		$data['data_berita_detail'] = $this->m_artikel->m_data_berita_detail($judul_berita);
		$data['data_perum'] = $this->m_artikel->m_data_perum();
		$data['data_tipe'] = $this->m_artikel->m_data_tipe();
		$data['data_artikel_berita'] = $this->m_artikel->m_data_artikel_berita();
		$data['data_foto_berita'] = $this->m_artikel->m_data_foto_berita();
		$this->load->view('layout/index', $data);
		$add_view = $meta->view_berita + 1;
		$update_view = $this->db->set('view_berita', $add_view)
			->where('id_berita', $id_berita)
			->update('berita');
		return $update_view;
	}
	function tag()
	{
		$tag = $this->uri->segment(3);
		$tag_berita = preg_replace("![^a-z0-9]+!i", " ", $tag);

		$data['_title'] = 'kumpulan artikel menarik tentang ' . $tag . ' | PT. Kanpa';
		$data['_description'] = 'kumpulan artikel menarik tentang ' . $tag . ' | PT. Kanpa';
		$data['_metafoto'] = 'logo-pt-kanpa-2.png';
		$data['_keyword'] = 'kumpulan menarik artikel ' . $tag;
		$data['_url'] = base_url('Artikel/tag/') . $tag;
		$data['_script'] = 'artikel/artikel_js';
		$data['_view'] = 'artikel/tag_artikel';
		$data['data_tag'] = $this->m_artikel->m_data_tag();
		$data['data_perum'] = $this->m_artikel->m_data_perum();
		$data['data_tipe'] = $this->m_artikel->m_data_tipe();
		$this->load->view('layout/index', $data);
	}

	public function get_berita_tag()
	{
		$output = '';
		$this->load->model('m_artikel');
		$tag_berita = $this->input->post('tag_berita');
		$start = $this->input->post('start');
		$limit = $this->input->post('limit');
		$data = $this->m_artikel->m_data_berita_tag($start, $limit, $tag_berita);
		if ($data->num_rows() > 0) {
			foreach ($data->result() as $row) {
				$judul_berita = $row->judul_berita;
				$tittle_news = preg_replace("![^a-z0-9]+!i", "-", $judul_berita);

				$output .= '
				<div class="col-lg-6 col-12 ">
					<div id="list" class="border-radius">
    					<div class="row">
        					<div class="col-lg-4 col-md-4 col-4">
            					<div class="form-group">
                					<a class="text-dark add-view-news" href="' . base_url('Artikel/page/') . $tittle_news . '" data-id-berita="' . $row->id_berita . '">
                    					<img src="' . base_url('upload') . '/' . $row->foto_berita . '"
                        				class="img-fluid p-1 border-radius img-berita" data-id-berita="' . $row->id_berita . '"
                        				alt="red sample">
                					</a>
            					</div>
        					</div>
        					<div class="col-lg-8 col-md-8 col-8">
            					<a class="text-dark add-view-news" href="' . base_url('Artikel/page/') . $tittle_news . '" data-id-berita="' . $row->id_berita . '">
                					<h6 class="text-publishing">' . $row->tgl_berita . '</h6>
                					<h6 class="tittle-news">' . $row->judul_berita . '</h6>
                					<h6 class="font-text-port">' . $row->view_berita . ' Views</h6>
           						 </a>
        					</div>
    					</div>
					</div>
				</div>
				';
			}
		}
		echo $output;
	}
}
