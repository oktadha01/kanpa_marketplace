<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tipe extends CI_Controller
{
    public $load;
    public $m_tipe;
    public $input;
    public $upload;
    public $image_lib;
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_tipe');
    }

    function index()
    {
        $data['_title'] = 'Data Tipe Perumahan';
        $data['_script'] = 'tipe/tipe_js';
        $data['_view'] = 'tipe/tipe';
        $data['data_perum'] = $this->m_tipe->m_data_perum();
        $this->load->view('layout/index', $data);
    }

    function data_tipe_perum()
    {
        $id_tipe_perum = $this->input->post('id-tipe-perum');
        $data['data_tipe'] = $this->m_tipe->m_data_tipe_perum($id_tipe_perum);
        $data['_view_setting'] = 'tipe/data_tipe';
        $this->load->view('tipe/data_tipe', $data);
    }
    function add_data_tipe()
    {
        $data = array(
            'id_tipe_perum' => $this->input->post('id-tipe-perum'),
            'kategori_tipe' => $this->input->post('kategori-tipe'),
            'lantai' => $this->input->post('lantai'),
            'luas_tanah' => $this->input->post('luas-tanah'),
            'luas_bangunan' => $this->input->post('luas-bangunan'),
            'hrg' => $this->input->post('hrg'),
            'satuan_hrg' => $this->input->post('satuan-hrg'),
            'promo' => $this->input->post('promo'),
            'balkon' => $this->input->post('balkon'),
            'taman' => $this->input->post('taman'),
            'carport' => $this->input->post('carport'),
            'r_tamu' => $this->input->post('r-tamu'),
            'r_keluarga' => $this->input->post('r-keluarga'),
            'k_tidur' => $this->input->post('k-tidur'),
            'k_mandi' => $this->input->post('k-mandi'),
            'r_makan' => $this->input->post('r-makan'),
            'dapur' => $this->input->post('dapur'),
            'vr' => $this->input->post('vr'),
        );

        $insert = $this->m_tipe->m_add_data_tipe($data);
        echo json_encode($insert);
    }
    function edit_data_tipe()
    {

        $id_tipe = $this->input->post('id-tipe');
        $kategori_tipe = $this->input->post('kategori-tipe');
        $lantai = $this->input->post('lantai');
        $luas_tanah = $this->input->post('luas-tanah');
        $luas_bangunan = $this->input->post('luas-bangunan');
        $hrg = $this->input->post('hrg');
        $satuan_hrg = $this->input->post('satuan-hrg');
        $promo = $this->input->post('promo');
        $balkon = $this->input->post('balkon');
        $taman = $this->input->post('taman');
        $carport = $this->input->post('carport');
        $r_tamu = $this->input->post('r-tamu');
        $r_keluarga = $this->input->post('r-keluarga');
        $k_tidur = $this->input->post('k-tidur');
        $k_mandi = $this->input->post('k-mandi');
        $r_makan = $this->input->post('r-makan');
        $dapur = $this->input->post('dapur');
        $vr = $this->input->post('vr');


        $update = $this->m_tipe->m_edit_data_tipe($kategori_tipe, $lantai, $luas_tanah, $luas_bangunan, $hrg, $satuan_hrg, $promo, $balkon, $taman, $carport, $r_tamu, $r_keluarga, $k_tidur, $k_mandi, $r_makan, $dapur, $vr, $id_tipe);
        echo json_encode($update);
    }
    function delete_data_tipe()
    {
        $denah_lt1 = $this->input->post('denah-lt1');
        unlink('./upload/' . $denah_lt1);
        $denah_lt2 = $this->input->post('denah-lt2');
        unlink('./upload/' . $denah_lt2);

        $id_tipe = $this->input->post('id-tipe');
        $delete = $this->m_tipe->m_delete_data_tipe($id_tipe);
        echo json_encode($delete);
    }
    function add_denah_tipe()
    {
        $action = $this->input->post('action');
        if ($action == 'lt1') {

            $config['upload_path'] = "./upload/";
            $config['allowed_types'] = 'gif|jpg|png';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload("denah-lt1")) {
                $data = array('upload_data' => $this->upload->data());
                $id_tipe = $this->input->post('id-tipe');
                $action = $this->input->post('action');
                $denah = $data['upload_data']['file_name'];
                $uploadedImage = $this->upload->data();

                $this->resizeImage($uploadedImage['file_name']);
                $insert = $this->m_tipe->m_add_denah_tipe($id_tipe, $denah, $action);
                echo json_encode($insert);
            }
        } else {

            $config['upload_path'] = "./upload/";
            $config['allowed_types'] = 'gif|jpg|png';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload("denah-lt2")) {
                $data = array('upload_data' => $this->upload->data());
                $id_tipe = $this->input->post('id-tipe');
                $action = $this->input->post('action');
                $denah = $data['upload_data']['file_name'];
                $uploadedImage = $this->upload->data();

                $this->resizeImage($uploadedImage['file_name']);
                $insert = $this->m_tipe->m_add_denah_tipe($id_tipe, $denah, $action);
                echo json_encode($insert);
            }
        }
        exit;
    }

    function delete_denah()
    {
        $denah_lama = $this->input->post('denah-lama');
        unlink('./upload/' . $denah_lama);

        $action = $this->input->post('action');
        $id_tipe = $this->input->post('id-tipe');
        $denah = $this->input->post('nm-denah');
        $delete = $this->m_tipe->m_add_denah_tipe($id_tipe,  $denah, $action);
        echo json_encode($delete);
    }
    function resizeImage($filename)
    {
        $source_path = 'upload/' . $filename;
        $target_path = 'upload/';
        $config = [
            'image_library' => 'gd2',
            'source_image' => $source_path,
            'new_image' => $target_path,
            'maintain_ratio' => TRUE,
            'quality' => '50%',
            'width' => 'auto',
            'height' => '2560',
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
