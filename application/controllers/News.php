<?php
defined('BASEPATH') or exit('No direct script access allowed');

class News extends CI_Controller
{
	public $load;
	public $m_news;
	public $input;
	public $uri;
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_news');
	}

	function index()
	{

		redirect(base_url('Artikel'));
		// $data['_title'] = 'News';
		// $data['_script'] = 'news/news_js';
		// $data['_view'] = 'news/news';
		// $data['data_berita_left'] = $this->m_news->m_data_berita_left();
		// $data['data_berita_right'] = $this->m_news->m_data_berita_right();
		// $data['data_berita_center'] = $this->m_news->m_data_berita_center();
		// $data['data_perum'] = $this->m_news->m_data_perum();
		// $data['data_tipe'] = $this->m_news->m_data_tipe();
		// $this->load->view('layout/index', $data);
	}
	function page()
	{
		redirect(base_url('Artikel/page/') . $this->uri->segment(3));
		// $tittle = $this->uri->segment(3);
		// $judul_berita = preg_replace("![^a-z0-9]+!i", " ", $tittle);

		// $data['_title'] =  $judul_berita;
		// $data['_script'] = 'news/news_js';
		// $data['_view'] = 'news/page_news';
		// $data['data_berita_left'] = $this->m_news->m_data_berita_left();
		// $data['data_berita_right'] = $this->m_news->m_data_berita_right();
		// $data['data_berita_detail'] = $this->m_news->m_data_berita_detail($judul_berita);
		// $data['data_perum'] = $this->m_news->m_data_perum();
		// $data['data_tipe'] = $this->m_news->m_data_tipe();
		// $this->load->view('layout/index', $data);
	}
}
