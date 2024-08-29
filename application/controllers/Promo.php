<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Promo extends CI_Controller
{public $load;
    public $m_promo;
    public $input;
    public $upload;
    public $image_lib;
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_promo');
    }

    function index()
    {

        $data['_title'] = 'Promo';
        $data['_script'] = 'promo/promo_js';
        $data['_view_login'] = 'promo/promo';
        $data['data_perum'] = $this->m_promo->m_data_perum();
        $this->load->view('layout/index', $data);
    }
    function simpan_user_promo()
    {
        $config['upload_path'] = "./upload/data_ktp/";
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload("ktp")) {
            $data = array('upload_data' => $this->upload->data());
            $foto_tipe = $data['upload_data']['file_name'];
            $uploadedImage = $this->upload->data();
            $data = array(
                'nama' => $this->input->post('nama'),
                'nik' => $this->input->post('nik'),
                'tempat_lahir' => $this->input->post('tempat-lahir'),
                'tgl_lahir' => $this->input->post('tgl-lahir'),
                'alamat' => $this->input->post('alamat'),
                'foto_ktp' => $foto_tipe,
                'kontak' => $this->input->post('kontak'),
                'perumahan' => $this->input->post('perum'),
                'promo' => $this->input->post('promo'),
                'nm_marketing' => $this->input->post('nm-marketing'),
            );
            $this->resizeImage($uploadedImage['file_name']);
            $insert = $this->m_promo->m_simpan_user_promo($data);
            echo json_encode($insert);
        }
        exit;
    }
    function resizeImage($filename)
    {
        $source_path = 'upload/data_ktp/' . $filename;
        $target_path = 'upload/data_ktp/';
        $config = [
            'image_library' => 'gd2',
            'source_image' => $source_path,
            'new_image' => $target_path,
            'maintain_ratio' => TRUE,
            'quality' => '100%',
            'width' => '2560',
            'height' => 'auto',
        ];
        $this->load->library('image_lib', $config);
        if (!$this->image_lib->resize()) {
            return [
                'status' => 'error compress',
                'message' => $this->image_lib->display_errors()
            ];
        }
        $this->image_lib->clear();
        return 1;
    }
}
