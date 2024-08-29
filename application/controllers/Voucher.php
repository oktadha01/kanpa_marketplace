<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Voucher extends CI_Controller
{
    public $load;
    public $m_voucher;
    public $input;
    public $uri;
    public $db;
    public $upload;
    public $image_lib;

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_voucher');
    }

    function index()
    {
        $data['_title'] = 'Voucher';
        $data['_script'] = 'data_voucher/voucher_js';
        $data['_view'] = 'data_voucher/voucher';
        $data['select_data_perum'] = $this->m_voucher->m_select_data_perum();
        $this->load->view('layout/index', $data);
    }
    function select_data_tipe()
    {
        $id_perum =  $this->input->post('id-perum');
        echo '<option value=""></option>';
        $sql = "SELECT * FROM tipe WHERE id_tipe_perum = '$id_perum' ORDER BY luas_bangunan ASC";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                echo '<option value="' . $data->id_tipe . '">Tipe ' . $data->luas_bangunan . '/' . $data->luas_tanah . '</option>';
            }
        }
    }

    function data_voucher()
    {
        $data['_view'] = 'data_voucher/data_voucher';
        $data['data_voucher'] = $this->m_voucher->m_data_voucher();
        $data['data_perum'] = $this->m_voucher->m_select_data_perum();
        $data['data_tipe'] = $this->m_voucher->m_data_tipe();
        $this->load->view('data_voucher/data_voucher', $data);
    }

    function add_voucher()
    {
        $config['upload_path'] = "./upload/voucher/";
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload("foto-voucher")) {
            $data = array('upload_data' => $this->upload->data());
            $id_perum_voucher = $this->input->post('id-perum-voucher');
            $id_tipe_voucher = $this->input->post('id-tipe-voucher');
            $nm_voucher = $this->input->post('nm-voucher');
            $wa_voucher = $this->input->post('wa-voucher');
            $foto_voucher = $data['upload_data']['file_name'];
            $uploadedImage = $this->upload->data();
            $data = array(
                'id_perum_voucher' => $id_perum_voucher,
                'id_tipe_voucher' => $id_tipe_voucher,
                'nm_voucher' => $nm_voucher,
                'wa_voucher' => $wa_voucher,
                'foto_voucher' => $foto_voucher,
            );
            $this->resizeImage($uploadedImage['file_name']);
            $insert = $this->m_voucher->m_add_voucher($data);
            echo json_encode($insert);
        }
        exit;
    }

    function edit_voucher()
    {
        $action = $this->input->post('action');
        if ($action == 'edit-voucher') {
            $foto_voucher_lama = $this->input->post('foto-voucher-lama');
            unlink('./upload/voucher/' . $foto_voucher_lama);

            $config['upload_path'] = "./upload/voucher/";
            $config['allowed_types'] = 'gif|jpg|png';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload("foto-voucher")) {
                $data = array('upload_data' => $this->upload->data());
                $id_voucher = $this->input->post('id-voucher');
                $id_perum_voucher = $this->input->post('id-perum-voucher');
                $id_tipe_voucher = $this->input->post('id-tipe-voucher');
                $nm_voucher = $this->input->post('nm-voucher');
                $wa_voucher = $this->input->post('wa-voucher');
                $foto_voucher = $data['upload_data']['file_name'];
                $uploadedImage = $this->upload->data();

                $this->resizeImage($uploadedImage['file_name']);
                $update = $this->m_voucher->m_edit_voucher($id_voucher, $id_perum_voucher, $id_tipe_voucher, $nm_voucher, $wa_voucher, $foto_voucher);
            }
        } else {
            $id_voucher = $this->input->post('id-voucher');
            $id_perum_voucher = $this->input->post('id-perum-voucher');
            $id_tipe_voucher = $this->input->post('id-tipe-voucher');
            $nm_voucher = $this->input->post('nm-voucher');
            $wa_voucher = $this->input->post('wa-voucher');
            $update = $this->m_voucher->m_edit_text_voucher($id_voucher, $id_perum_voucher, $id_tipe_voucher, $nm_voucher, $wa_voucher);
            echo json_encode($update);
        }
        exit;
    }

    function resizeImage($filename)
    {
        $source_path = 'upload/voucher/' . $filename;
        $target_path = 'upload/voucher/';
        $config = [
            'image_library' => 'gd2',
            'source_image' => $source_path,
            'new_image' => $target_path,
            'maintain_ratio' => TRUE,
            'quality' => '50%',
            'width' => '1440',
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

    function delete_voucher()
    {
        $foto_voucher = $this->input->post('foto-voucher');
        unlink('./upload/voucher/' . $foto_voucher);

        $id_voucher = $this->input->post('id-voucher');
        $delete = $this->m_voucher->m_delete_voucher($id_voucher);
        echo json_encode($delete);
    }

    function perum()
    {
        $tittle = $this->uri->segment(3);
        $luas_bangunan = $this->uri->segment(5);
        $luas_tanah = $this->uri->segment(6);
        $nm_perum = preg_replace("![^a-z0-9]+!i", " ", $tittle);
        $sql = "SELECT * FROM perum, tipe WHERE tipe.id_tipe_perum = perum.id_perum AND perum.nm_perum = '$nm_perum' AND tipe.luas_bangunan = '$luas_bangunan' AND tipe.luas_tanah = '$luas_tanah'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $perum) {
                $id_perum = $perum->id_perum;
                $id_tipe = $perum->id_tipe;
            }
        }
        $sql = "SELECT * FROM voucher WHERE id_perum_voucher = '$id_perum' AND id_tipe_voucher = '$id_tipe'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $perum) {
            }
            $test = $nm_perum;
            $data['_title'] = $test;
            $data['_script'] = 'voucher/detail_js';
            $data['_view'] = 'voucher/detail';
            $data['detail_perum'] = $this->m_voucher->m_detail_perum($nm_perum);
            $data['detail_fasilitas'] = $this->m_voucher->m_detail_fasilitas($nm_perum);
            $data['detail_lokasi_terdekat'] = $this->m_voucher->m_detail_lokasi_terdekat($nm_perum);
            $data['detail_tipe'] = $this->m_voucher->m_detail_tipe($nm_perum, $id_tipe);
            $data['data_detail_tipe'] = $this->m_voucher->m_data_detail_tipe($nm_perum, $luas_bangunan, $luas_tanah);
            $data['data_detail_voucher'] = $this->m_voucher->m_data_detail_voucher($id_perum, $id_tipe);
            $this->load->view('layout/index', $data);
        }else{
            redirect(base_url('Dashboard'));
        }
    }
    function detail_tipe()
    {
        $luas_bangunan =  $this->input->post('luas-bangunan');
        $luas_tanah =  $this->input->post('luas-tanah');
        $nm_perum =  $this->input->post('nm-perum');
        $data['_view'] = 'voucher/detail_tipe';
        $data['data_detail_tipe'] = $this->m_voucher->m_data_detail_tipe($nm_perum, $luas_bangunan, $luas_tanah);
        $data['data_view'] = $this->m_voucher->m_view_tipe($nm_perum, $luas_bangunan, $luas_tanah);
        $this->load->view('voucher/detail_tipe', $data);
    }
}
