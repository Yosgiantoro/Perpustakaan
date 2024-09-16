<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Koleksi extends CI_Controller {
public function __construct(){
		parent::__construct();
		if($this->session->userdata('role_user')==NULL || $this->session->userdata('role_user')!== 'Peminjam' ){
			redirect('auth');
		}
	}
	public function index()
	{
        $this->db->from('buku a')->join('kategori_buku b','a.id_kategori=b.id_kategori','left');
		$buku = $this->db->get()->result_array();
		$this->db->from('kategori_buku');
		$kategori = $this->db->get()->result_array();
        $koleksi = $this->db->from('koleksi_pribadi a')
                        ->join('buku b', 'a.id_buku = b.id_buku')
                        ->join('users c', 'a.id_user = c.id_user')
                        ->join('kategori_buku d','a.id_kategori=d.id_kategori')
                        ->where('a.id_user', $this->session->userdata('id_user'))
                        ->get()
                        ->result_array();

        $this->db->select('id_buku, AVG(rating) as avg_rating');
    	$this->db->from('ulasan_buku');
    	$this->db->group_by('id_buku');
    	$ulasan = $this->db->get()->result_array();

    // Buat array asosiasi untuk rata-rata rating per id_buku
    	$avg_ratings = [];
    	foreach ($ulasan as $row) {
        $avg_ratings[$row['id_buku']] = $row['avg_rating'];
    	}   
        $data = array(
            'judul' => 'Halaman Koleksi',
            'kategori' => $kategori,
            'koleksi' => $koleksi,
            'buku'  => $buku,
            'avg_ratings' => $avg_ratings,
        );
		$this->template->load('template/template','koleksi',$data);
	}
    public function Add(){
        $data = array(
            'id_buku' => $this->input->post('id_buku'),
            'id_user' => $this->input->post('id_user'),
            'id_kategori' => $this->input->post('id_kategori'),
        );
        $this->db->insert('koleksi_pribadi',$data);
        redirect('PinjamBuku');
    }

}
