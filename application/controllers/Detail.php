<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail extends CI_Controller
{
    public $load;
    public $m_detail;
    public $input;
    public $uri;
    public $db;
    function __construct()
    {
        parent::__construct();
        $this->load->helper('API_helper');
    }

    // function perum()
    // {


    //     $tittle = $this->uri->segment(3);
    //     $luas_bangunan = $this->uri->segment(5);
    //     $luas_tanah = $this->uri->segment(6);
    //     $key_lokasi = "";
    //     $key_tipe_lokasi = "";
    //     $key_tipe = "";
    //     $nm_perum = preg_replace("![^a-z0-9]+!i", " ", $tittle);
    //     $sql = "SELECT perum.*, tipe.kategori_tipe, tipe.id_tipe_perum FROM perum, tipe WHERE perum.id_perum = tipe.id_tipe_perum AND perum.nm_perum = '$nm_perum' ";
    //     $query = $this->db->query($sql);
    //     if ($query->num_rows() > 0) {
    //         foreach ($query->result() as $perum) {
    //             $logo = $perum->logo;
    //             $meta_deskripsi = $perum->meta_deskripsi;
    //             $lokasi = $perum->lokasi;
    //             // $kategori_tipe .= $perum->kategori_tipe;
    //             $key_tipe .= $perum->kategori_tipe . ',';
    //         }
    //     }
    //     $arr_lokasi = explode(',', $lokasi);
    //     $arr_tipe = explode(',', $key_tipe);
    //     foreach ($arr_lokasi as $lokasi) {
    //         foreach ($arr_tipe as $tipe) {
    //             $key_lokasi .= ", perumahan di " . $lokasi . ", perumahan murah di " . $lokasi . ", rumah murah di " . $lokasi . ", jual rumah murah di " . $lokasi . ", di jual rumah murah di " . $lokasi;
    //             $key_tipe_lokasi .= ", perumahan " . $tipe . " di " . $lokasi . ", rumah " . $tipe . " di " . $lokasi . ", jual rumah " . $tipe . " di " . $lokasi . ", di jual rumah " . $tipe . " di " . $lokasi;
    //         }
    //     }

    //     $key_lokasi = rtrim($key_lokasi, '');
    //     // $key_tipe = rtrim($key_tipe, '');
    //     $key_perum = $nm_perum . ', perum ' . $nm_perum . ', perumahan ' . $nm_perum;

    //     $data['_keyword'] = 'di jual rumah, rumah murah, perumahan murah, di jual rumah murah' . $key_lokasi . $key_tipe_lokasi . ', ' . $key_perum;
    //     $data['_title'] = 'Di Jual Perumah Murah Di ' . $lokasi . ' | ' . $nm_perum . ' || Type ' . $luas_bangunan . '/' . $luas_tanah;
    //     $data['_metafoto'] = $logo;
    //     $data['_description'] = 'Di Jual Perumah Murah Di ' . $lokasi . ', ' . $meta_deskripsi . ' | PT Kanpa';
    //     $data['_url'] = base_url('Detail/perum/') . $tittle . '/tipe/' . $luas_bangunan . '/' . $luas_tanah;

    //     $data['_script'] = 'detail/detail_js';
    //     $data['_view'] = 'detail/detail';
    //     $data['detail_perum'] = $this->m_detail->m_detail_perum($nm_perum);
    //     $data['detail_fasilitas'] = $this->m_detail->m_detail_fasilitas($nm_perum);
    //     $data['detail_lokasi_terdekat'] = $this->m_detail->m_detail_lokasi_terdekat($nm_perum);
    //     $data['detail_tipe'] = $this->m_detail->m_detail_tipe($nm_perum);
    //     $data['detail_marketing'] = $this->m_detail->m_detail_marketing($nm_perum);
    //     $data['detail_cs'] = $this->m_detail->m_detail_cs();
    //     // $data['data_view'] = $this->m_detail->m_view_tipe($nm_perum, $luas_bangunan, $luas_tanah);
    //     $this->load->view('layout/index', $data);
    // }
    public function perum()
    {
        $perum = preg_replace("![^a-z0-9]+!i", " ", $this->uri->segment(3));
        $lt = $this->uri->segment(5);
        $lb = $this->uri->segment(6);
        // $perum = 'Alton Green House';
        // $lt = '120';
        // $lb = '140';

        // Fetch the properties based on the parameters
        // Extract a city name from the properties if available
        $data['properti'] = $this->get_properti($perum, $lt, $lb);
        $nama_kota = '';
        if (!empty($data['properti'])) {
            // Assuming you want to use the city from the first property
            $first_property = reset($data['properti']);
            $nama_kota = $first_property['nama_kota'] ?? '';
            $id_properti = $first_property['id_properti'] ?? '';
        }
        // echo $nama_kota;

        // Fetch related properties based on the city name
        $data['properti_lainnya'] = $this->properti_lainnya($nama_kota, $id_properti);

        $data['_title'] = 'Di Jual Rumah Murah';
        $data['_url'] = base_url('Perumahan');
        $data['_script'] = 'viewdetail/viewdetail_js';
        $data['_view'] = 'viewdetail/viewdetail';

        // Load the layout with the provided data
        $this->load->view('layout/index', $data);
    }

    // public function get_properti($perum, $lt = null, $lb = null)
    // {
    //     // Fetch popular properties using the helper function
    //     $detail_properti = get_properti_populer();

    //     if (is_array($detail_properti)) {
    //         // Filter properties based on $perum first
    //         $filtered_properties = array_filter($detail_properti, function ($property) use ($perum) {
    //             return strtolower($property['judul_properti']) == strtolower($perum);
    //         });

    //         // If $lt and $lb are provided, apply further filtering
    //         if (!empty($lt) && !empty($lb)) {
    //             $filtered_properties = array_filter($filtered_properties, function ($property) use ($lt, $lb) {
    //                 return $property['luas_tanah'] == $lt && $property['luas_bangunan'] == $lb;
    //             });

    //             // If no properties match the $lt and $lb filters, redirect to the $perum-only URL
    //             if (empty($filtered_properties)) {
    //                 // Build the new URL without $lt and $lb segments
    //                 $nm_perum = preg_replace("![^a-z0-9]+!i", "-", $perum);
    //                 $new_url = base_url("Detail/perum/{$nm_perum}");

    //                 // Redirect to the new URL
    //                 redirect($new_url);
    //                 return;  // Ensure no further code is executed after redirect
    //             }
    //         }

    //         // Group by id_properti
    //         $grouped_properties = [];
    //         foreach ($filtered_properties as $property) {
    //             $grouped_properties[$property['id_properti']] = $property;
    //             $nama_kota = $property['nama_kota'];
    //             $id_properti = $property['id_properti'];
    //             // Fetch other properties based on the city name
    //             $this->properti_lainnya($nama_kota, $id_properti);
    //         }

    //         // Return the grouped properties
    //         return $grouped_properties;
    //     }

    //     // Return empty array if no properties were found
    //     return [];
    // }
    public function get_properti($perum, $lt = null, $lb = null)
    {
        // Fetch popular properties using the helper function
        $detail_properti = get_properti_populer();

        if (is_array($detail_properti)) {
            // Filter properties based on $perum first
            $filtered_properties = array_filter($detail_properti, function ($property) use ($perum) {
                return strtolower($property['judul_properti']) == strtolower($perum);
            });

            // If $lt and $lb are provided, apply further filtering
            if (!empty($lt) && !empty($lb)) {
                $filtered_properties = array_filter($filtered_properties, function ($property) use ($lt, $lb) {
                    return $property['luas_tanah'] == $lt && $property['luas_bangunan'] == $lb;
                });
            }

            // If $lt and $lb are null or no properties match, filter based on $perum and get the smallest building area
            if (empty($lt) && empty($lb) || empty($filtered_properties)) {
                // Filter properties by $perum and find the smallest building area
                $matching_properties = array_filter($detail_properti, function ($property) use ($perum) {
                    return strtolower($property['judul_properti']) == strtolower($perum);
                });

                // Find the property with the smallest building area
                $smallest_building_property = null;
                foreach ($matching_properties as $property) {
                    if ($smallest_building_property === null || $property['luas_bangunan'] < $smallest_building_property['luas_bangunan']) {
                        $smallest_building_property = $property;
                    }
                }

                // If a property with the smallest building area is found, build the new URL
                if ($smallest_building_property) {
                    $nm_perum = preg_replace("![^a-z0-9]+!i", "-", $perum);
                    $land_area = $smallest_building_property['luas_tanah'];
                    $building_area = $smallest_building_property['luas_bangunan'];
                    $new_url = base_url("Detail/perum/{$nm_perum}/tipe/{$land_area}/{$building_area}");

                    // Redirect to the new URL
                    redirect($new_url);
                    return;  // Ensure no further code is executed after redirect
                }
            }

            // Group by id_properti
            $grouped_properties = [];
            foreach ($filtered_properties as $property) {
                $grouped_properties[$property['id_properti']] = $property;
                $nama_kota = $property['nama_kota'];
                $id_properti = $property['id_properti'];
                // Fetch other properties based on the city name
                $this->properti_lainnya($nama_kota, $id_properti);
            }

            // Return the grouped properties
            return $grouped_properties;
        }

        // Return empty array if no properties were found
        return [];
    }

    public function properti_lainnya($nama_kota, $id_properti)
    {
        // Fetch popular properties using the helper function
        $other_properti = get_properti_populer();

        // Check if the response contains data
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
        if (is_array($other_properti)) {
            // Filter properties based on the city name and exclude the one with the given id_properti
            $filtered_properties = array_filter($other_properti, function ($property) use ($nama_kota, $id_properti) {
                return strtolower($property['nama_kota']) == strtolower($nama_kota) && $property['id_properti'] != $id_properti;
            });

            // $properti_lainnya_html = $id_properti. $nama_kota;
            // Group by id_properti
            $grouped_properties = [];
            $properti_lainnya_html = '';
            foreach ($filtered_properties as $property) {
                // Group properties by id_properti
                $grouped_properties[$property['id_properti']] = $property;

                // Assuming $populer['gambar'] contains something like "ATH.jpg,ATH.jpg"
                $gambar = $property['gambar'];

                // Split the string into an array using the comma as a delimiter
                $gambarArray = explode(',', $gambar);

                // Get the first image filename from the array
                $firstGambar = $gambarArray[0];
                $dateString = $property['dibuat'];
                $date = DateTime::createFromFormat('d-m-Y', $dateString);
                if ($date) {
                    $day = $date->format('d');
                    $month = $bulanIndonesia[(int)$date->format('m')];
                    $year = $date->format('Y');
                    $formattedDate = "$day $month $year";
                } else {
                    $formattedDate = "Unknown Date";
                }

                // Generate HTML for each property
                $properti_lainnya_html .= '<div class=" col-6 p-2 pb-3">' .
                    '<div class="box-shadow border">' .
                    '<a href="' . base_url('Detail/perum/') . $property['judul_properti'] . '/tipe/' . $property['luas_tanah'] . '/' . $property['luas_bangunan'] . '" class="text-black">' .
                    '<div class="perum-po-content">' .
                    '<img src="https://admin.kanpa.co.id/upload/gambar_properti/' . $firstGambar . '" class="img-produk">' .
                    '</div>' .
                    '<div class=" border p-2">' .
                    '<div class="d-flex justify-content-between text-align-center mb-2">' .
                    '<span class="title-new-proyek-sm">' . $property['nama_type'] . '</span>' .
                    '<span class="title-tayang-sm">Tayang sejak ' . $formattedDate . '</span>' .
                    '</div>' .
                    '<span class="title-price mt-2">Rp ' . $property['harga'] . ' ' . $property['satuan'] . '</span>' .
                    '<h6 class=" title-properti font-weight-bold mb-0">' . $property['judul_properti'] . '</h6>' .
                    '<span class="font-weight-bold title-address-sm"><i class="bi bi-geo-alt"></i> ' . $property['alamat'] . '</span>' .
                    '<ul class="d-flex ul-detail-sm mt-2 mb-0">' .
                    '<li><span class="font-weight-bold">LB</span> : ' . $property['luas_bangunan'] . ' m2</li>' .
                    '<li><span class="font-weight-bold">LT</span> : ' . $property['luas_tanah'] . ' m2</li>' .
                    '<li><span class="font-weight-bold">KT</span> : ' . $property['jml_kamar'] . '</li>' .
                    '<li><span class="font-weight-bold">Km</span> : ' . $property['jml_kamar_mandi'] . '</li>' .
                    '</ul>' .
                    '</a>' .
                    '</div>' .
                    '</div>' .
                    '</div>';
            }

            // Return the generated HTML
            return $properti_lainnya_html;
        }
        // return $properti_lainnya_html;

        // Return an empty string if no properties were found
        return '';
    }






    function detail_tipe()
    {
        $luas_bangunan =  $this->input->post('luas-bangunan');
        $luas_tanah =  $this->input->post('luas-tanah');
        $nm_perum =  $this->input->post('nm-perum');
        $data['_view'] = 'detail/detail_tipe';
        $data['data_detail_tipe'] = $this->m_detail->m_data_detail_tipe($nm_perum, $luas_bangunan, $luas_tanah);
        $data['data_view'] = $this->m_detail->m_view_tipe($nm_perum, $luas_bangunan, $luas_tanah);
        $this->load->view('detail/detail_tipe', $data);
    }
}
