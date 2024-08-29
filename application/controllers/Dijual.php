<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dijual extends CI_Controller
{
    public $load;
    public $input;
    public $uri;
    public $db;
    function __construct()
    {
        parent::__construct();
        $this->load->helper('API_helper');
    }
    function load_property_view($type)
    {
        $titles = [
            'properti' => 'Dijual Properti',
            'rumah' => 'Dijual Rumah',
            'perumahan' => 'Dijual Perumahan',
            'apartement' => 'Dijual Apartemen',
            'kavling' => 'Dijual Kavling'
        ];

        // Set dynamic title based on the property type
        $data['_title'] = isset($titles[$type]) ? $titles[$type] : 'Dijual Properti';
        $data['_url'] = base_url('Perumahan');
        $data['_view'] = 'properti/properti';
        $data['_script'] = 'properti/properti_js';

        // Load the view with the layout
        $this->load->view('layout/index', $data);
    }

    // Call the function for each property type
    function properti()
    {
        $this->load_property_view('properti');
    }

    function rumah()
    {
        $this->load_property_view('rumah');
    }
    function perumahan()
    {
        $this->load_property_view('perumahan');
    }

    function apartement()
    {
        $this->load_property_view('apartement');
    }
    function kavling()
    {
        $this->load_property_view('kavling');
    }


    function get_kota()
    {

        $post_city =  preg_replace("![^a-z0-9]+!i", " ", $this->input->post('filter-kota'));
        // Fetch popular properties using the helper function
        $properti_populer = get_properti_populer();

        $kota_html = '';

        // Check if decoding was successful and the result is an array
        if (is_array($properti_populer)) {
            // Initialize an empty array to hold grouped data
            $grouped_kota = [];

            // Loop through each property and filter by 'area_terdekat'
            foreach ($properti_populer as $populer) {
                $nama_kota = $populer['nama_kota'];
                $area_terdekat = preg_replace("![^a-z0-9]+!i", " ", $populer['area_terdekat']);
                if ($post_city == '') {
                    // Loop through each property and group by 'nama_kota'
                    foreach ($properti_populer as $populer) {
                        $nama_kota = $populer['nama_kota'];

                        // Group properties by 'nama_kota'
                        if (!isset($grouped_kota[$nama_kota])) {
                            $grouped_kota[$nama_kota] = [];
                        }

                        $grouped_kota[$nama_kota][] = $populer;
                    }
                } else {
                    // If the area_terdekat contains the post_city, proceed
                    if (strpos(strtolower($area_terdekat), strtolower($post_city)) !== false) {
                        // Group properties by 'nama_kota'
                        if (!isset($grouped_kota[$nama_kota])) {
                            $grouped_kota[$nama_kota] = [];
                        }

                        $grouped_kota[$nama_kota][] = $populer;
                    }
                }
            }

            // Build the HTML for each grouped city
            foreach ($grouped_kota as $kota => $properties) {
                // Retrieve the city icon from the first property in the group
                $gambar_city = $properties[0]['icon_filter'];

                $kota_html .= '<li class="img-item">' .
                    // '<a href="' . base_url('Dijual/properti/') . preg_replace("![^a-z0-9]+!i", "-", $kota) . '">' .
                    '<div class="card border li-city" data-city="' .preg_replace("![^a-z0-9]+!i", "-", $kota)  . '">' .
                    '<img class="radius-img-city" src="https://admin.kanpa.co.id/upload/icon/' . $gambar_city . '" alt="">' .
                    '<div class="p-3 text-center m-li-box-city">' .
                    ' <h6 class="text-black font-weight-bold d-table-caption f-s-li-city mb-0">' . $kota . '</h6>' .
                    ' </div>' .
                    '</div>' .
                    // '</a>' .
                    '</li>';
            }
            echo $kota_html;
        }

        // Return the generated HTML
        return $kota_html;
    }

    public function get_properti()
    {
        // Capture the city name either from the URI segment or use a default value.
        $post_city = strtolower(preg_replace("![^a-z0-9]+!i", " ", $this->uri->segment(3)));

        // Fetch popular properties using the helper function
        $other_properti = get_properti_populer();

        // Check if the response contains data
        if (is_array($other_properti)) {
            // Prepare categorized data
            $data_properti = [
                'rumah' => '',
                'perumahan' => '',
                'apartement' => '',
                'kavling' => ''
            ];

            // Indonesian month names for formatting
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
            if ($post_city == '') {
                $filtered_properties = $other_properti;
            } else {
                // Filter properties based on city name
                $filtered_properties = array_filter($other_properti, function ($property) use ($post_city) {
                    return strtolower(preg_replace("![^a-z0-9]+!i", " ", $property['nama_kota'])) == $post_city;
                });
            }

            foreach ($filtered_properties as $property) {
                // Extract the first image from the 'gambar' field
                $gambarArray = explode(',', $property['gambar']);
                $firstGambar = $gambarArray[0];

                // Format the date
                $dateString = $property['dibuat'];
                $date = DateTime::createFromFormat('d-m-Y', $dateString);
                $formattedDate = $date ? $date->format('d') . ' ' . $bulanIndonesia[(int)$date->format('m')] . ' ' . $date->format('Y') : '';

                // Prepare property data
                $property_data = [
                    'gambar_properti' => $firstGambar,
                    'tanggal' => $formattedDate,
                    'nama_type' => $property['nama_type'],
                    'harga' => $property['harga'],
                    'satuan' => $property['satuan'],
                    'alamat' => $property['alamat'],
                    'luas_bangunan' => $property['luas_bangunan'],
                    'luas_tanah' => $property['luas_tanah'],
                    'jml_kamar' => $property['jml_kamar'],
                    'jml_kamar_mandi' => $property['jml_kamar_mandi']
                ];

                // Append HTML based on property type
                $html = $this->html_properti($property_data);
                if ($property['nama_type'] == 'Rumah') {
                    $data_properti['rumah'] .= $html;
                } elseif ($property['nama_type'] == 'Perumahan') {
                    $data_properti['perumahan'] .= $html;
                } elseif ($property['nama_type'] == 'Apartement') {
                    $data_properti['apartement'] .= $html;
                } elseif ($property['nama_type'] == 'Kavling') {
                    $data_properti['kavling'] .= $html;
                }
            }

            // Check for empty categories and add "coming soon" message with category name
            foreach ($data_properti as $type => $html) {
                if (empty($html)) {
                    $data_properti[$type] = $this->html_comingsoon($type);
                }
            }

            // Return JSON response
            echo json_encode($data_properti);
            return;
        }

        // Return empty data if no properties are found
        echo json_encode([
            'rumah' => $this->html_comingsoon('rumah'),
            'perumahan' => $this->html_comingsoon('perumahan'),
            'apartement' => $this->html_comingsoon('apartement'),
            'kavling' => $this->html_comingsoon('kavling')
        ]);
    }

    private function html_comingsoon($category)
    {
        return '<li>' .
            '    <img src="' . base_url('assets/img/') . 'comingsoon-' . $category . '.jpg" class="img-comingsoon">' .
            '</li>';
    }

    private function html_properti($data_properti)
    {
        // Build and return the HTML string using the provided data
        return '<li class="img-item col-6 p-2 pb-3">' .
            '<div class="populer-container">' .
            '<div class="populer-content">' .
            '<img src="https://admin.kanpa.co.id/upload/gambar_properti/' . $data_properti['gambar_properti'] . '" class="img-produk-sw">' .
            '</div>' .
            '<div class="bg-light border p-2">' .
            '<span class="title-new-proyek">' . $data_properti['nama_type'] . '</span>' .
            '<span class="title-tayang">Tayang sejak ' . $data_properti['tanggal'] . '</span>' .
            '<h3 class="title-price">Rp ' . $data_properti['harga'] . ' ' . $data_properti['satuan'] . '</h3>' .
            '<h5 class=" title-properti font-weight-bold">' . $data_properti['nama_type'] . '</h5>' .
            '<h6 class="font-weight-bold title-address"><i class="bi bi-geo-alt"></i> Sisemut, Ungaran Barat</h6>' .
            '<ul class="d-flex ul-detail mt-3">' .
            '<li><span class="font-weight-bold">LB</span> : ' . $data_properti['luas_bangunan'] . ' m2</li>' .
            '<li><span class="font-weight-bold">LT</span> : ' . $data_properti['luas_tanah'] . ' m2</li>' .
            '<li><span class="font-weight-bold">KT</span> : ' . $data_properti['jml_kamar'] . '</li>' .
            '<li><span class="font-weight-bold">Km</span> : ' . $data_properti['jml_kamar_mandi'] . '</li>' .
            '</ul>' .
            '<hr>' .
            '<div class="d-flex kontakas">' .
            '<img src="https://kanpa.co.id/upload/0a7970f0cf26d2603a626d489036cc64.png" class="img-marketing">' .
            '<div class="d-block">' .
            '<h5 class="font-weight-bold title-name m-0">Ziha Zizi</h5>' .
            '<p class="small title-address m-0">Ungaran Barat</p>' .
            '</div>' .
            '<i class="bi bi-whatsapp i-wa-marketing"></i>' .
            '</div>' .
            '</div>' .
            '</div>' .
            '</li>';
    }



    function get_perumahan() {}
}
