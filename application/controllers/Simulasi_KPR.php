<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Simulasi_KPR extends CI_Controller
{
    public $load;
    public $m_detail;
    public $input;
    public $uri;
    public $db;
    function __construct()
    {
        parent::__construct();
        $this->load->helper('banner_helper');
    }

    function index()
    {
        // Call the get_banner_properti function to get the banners
        $banner_properti = get_banner_properti();

        // Check if data was fetched successfully
        if ($banner_properti) {
            // Filter banners with type_banner = 'kpr'
            $filtered_banners = array_filter($banner_properti, function ($banner) {
                return isset($banner['type_banner']) && $banner['type_banner'] === 'KPR';
            });

            // Pass the filtered banners to the view or further processing
            $data['filtered_banners'] = $filtered_banners;
            $data['_title'] = 'Di Jual Rumah Murah';
            $data['_script'] = 'kpr/kpr_js';
            $data['_view'] = 'kpr/kpr';
            $this->load->view('layout/index', $data);
        } else {
            // Handle the case where no banners are fetched
            echo "Error fetching banners.";
        }

    }
}
