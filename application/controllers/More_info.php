<?php
defined('BASEPATH') or exit('No direct script access allowed');

class More_info extends CI_Controller
{
    public $load;
    public $m_more_info;
    public $input;
    public $db;
    public $uri;
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_more_info');
        $this->load->helper('domain_helper'); // Load the helper

    }

    function index()
    {
        $company_info = get_company_info($this->db); // Call the helper function

        if ($company_info !== null) {
            $id_company = $company_info['id_company'];
            $data['_description'] = $company_info['description'];
        } else {
            $id_company = null;
            $data['_description'] = 'Invalid domain or no description available.';
        }
        $data['_title'] = 'Kanzu Group Indonesia';
        $data['_script'] = 'more_info/more_info_js';
        $data['_view'] = 'more_info/more_info';
        $data['data_marketing'] = $this->m_more_info->m_data_more_info($id_company);
        $data['data_cs'] = $this->m_more_info->m_cs();

        $this->load->view('layout/index', $data);
    }
    function marketing()
    {
        $tittle_perum = $this->uri->segment(3);
        $tittle_cs = $this->uri->segment(4);
        $nm_perum = preg_replace("![^a-z0-9]+!i", " ", $tittle_perum);
        $nm_marketing = preg_replace("![^a-z0-9]+!i", " ", $tittle_cs);
        $sql = "SELECT * FROM perum WHERE nm_perum = '$nm_perum' ";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $perum) {
                $id_perum = $perum->id_perum;
            }
        }
        $sql = "SELECT * FROM marketing WHERE nm_marketing = '$nm_marketing' ";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $marketing) {
                $foto_marketing = $marketing->foto_marketing;
            }
        }
        $data['_title'] = 'Marketing || ' . $nm_perum . ' || ' . $nm_marketing;
        $data['_metafoto'] = $foto_marketing;
        $data['_description'] = 'PT Kanpa Saya sebagai Sales Marketing yang siap membantu untuk memberikan informasi perumahan yang sedang anda butuhkan.';
        $data['_script'] = 'more_info/more_info_js';
        $data['_view'] = 'more_info/page_marketing';
        $data['data_foto_st'] = $this->m_more_info->m_data_foto_st();
        $data['data_detail_cs'] = $this->m_more_info->m_data_detail_cs($nm_marketing, $id_perum);
        $this->load->view('layout/index', $data);
    }
    function klik_wa_marketing()
    {
        // $id_market = $this->input->post('id-market');

        // $sql = "SELECT * FROM marketperum WHERE id_market = $id_market ";
        // $query = $this->db->query($sql);
        // if ($query->num_rows() > 0) {
        //     foreach ($query->result() as $project) {
        //         $add_klik = $project->klik_marketperum + 1;
        //     }
        // }
        // $update_view = $this->db->set('klik_marketperum', $add_klik)
        //     ->where('id_market', $id_market)
        //     ->update('marketperum');
        // return $update_view;

    }
}
