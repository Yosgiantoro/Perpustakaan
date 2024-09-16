<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PinjamBuku extends CI_Controller {
public function __construct(){
		parent::__construct();
		if($this->session->userdata('role_user')==NULL ||$this->session->userdata('role_user')!=='Peminjam' ){
			redirect('auth');
		}
	}
	public function index()
	{

        $this->db->from('buku a')->join('kategori_buku b','a.id_kategori=b.id_kategori','left');
		$buku = $this->db->get()->result_array();
        $this->db->from('kategori_buku');
		$kategori = $this->db->get()->result_array();
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
            'kategori' => $kategori,
            'judul' => 'Halaman Depan',
            'buku'  => $buku,
            'avg_ratings' => $avg_ratings,
        );
		$this->template->load('template/template','pinjam',$data);
	}
    public function detail($id){
		$this->db->from('buku a')->join('kategori_buku b','a.id_kategori=b.id_kategori','left')->where('id_buku',$id);
		$buku = $this->db->get()->result_array();
		$this->db->from('kategori_buku');
		$kategori = $this->db->get()->result_array();

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
            'buku' => $buku,
			'kategori' => $kategori,
            'avg_ratings' => $avg_ratings,
        );

		$this->template->load('template/template','buku_detail',$data);
	}

    public function AddUlasan(){
        $data = array(
            'ulasan' => $this->input->post('ulasan'),
            'id_buku' => $this->input->post('id_buku'),
            'id_user' => $this->input->post('id_user'),
            'rating' => $this->input->post('rating'),
        );
        $this->db->insert('ulasan_buku',$data);
         $this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissible fade show" role="alert">
		<i class="fa fa-exclamation-circle me-2"></i>Berhasil Tambah Ulasan Buku
	</div>');
    redirect('PinjamBuku');
    }
    public function tambah_pinjam(){
    date_default_timezone_set('Asia/Jakarta');
    $tanggal = date('Y-m');
    $this->db->where("DATE_FORMAT(tanggal_awal,'%Y-%m')", $tanggal)->from('peminjaman');
    $jumlah = $this->db->count_all_results();
    $kode_peminjaman = date('ymd') . $jumlah + 1;

        $temp = $this->db->join('buku', 'temp.id_buku = buku.id_buku')->where('id_user', $this->session->userdata('id_user'))->get('temp')->result_array();
        foreach ($temp as $value) {
        // input Table peminjaman
        $data = [
            'kode' => $kode_peminjaman,
            'id_buku'         => $value['id_buku'],
            'id_user'         => $value['id_user'],
            'status_peminjaman'         => 'dipinjam',
            'tanggal_peminjaman' => $this->input->post('tanggal_peminjaman'),
            // 'tanggal_pengembalian' =>  date('Y-m-d', strtotime('+14 days')),
        ];
        $this->db->insert('detail_peminjaman', $data);

        // Update Stok Buku
        $data2  = ['stok' => $value['stok'] - 1];
        $where1 = ['id_buku' => $value['id_buku']];
        $this->db->update('buku', $data2, $where1);
        // hapus table temp
        $where2 = ['id_user' => $this->session->userdata('id_user')];
        $this->db->delete('temp', $where2);
    }
        $data3 = [
            'kode' => $kode_peminjaman,
            'tanggal_awal' => $this->input->post('tanggal_peminjaman'),
            'tanggal_akhir' => date('Y-m-d', strtotime('+14 days')),
            'id_user' => $this->session->userdata('id_user'),
        ];
        $this->db->insert('peminjaman', $data3);

        $this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissible fade show" role="alert">
		<i class="fa fa-exclamation-circle me-2"></i>Berhasil Pinjam Buku
	</div>');
    redirect('PinjamBuku');
    }
    public function keranjang(){
        $cart = $this->db->from('temp a')->join('buku b','a.id_buku=b.id_buku')->join('users c','a.id_user=c.id_user')->join('kategori_buku d','b.id_kategori=d.id_kategori')->get()->result_array();
        $data = array(
            'cart'  => $cart,
        );
        $this->load->view('cart',$data);
    }
    public function add_cart(){
        date_default_timezone_set('Asia/Jakarta');

        $buku = $this->input->post('id_buku');
        $user = $this->session->userdata('id_user');

        $data = array(
            'id_user' => $user,
            'id_buku' => $buku,
        );
        $this->db->insert('temp',$data);
        $this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissible fade show" role="alert">
	 	<i class="fa fa-exclamation-circle me-2"></i>Berhasil Add Peminjaman
    	</div>');
        // redirect('PinjamBuku');
        redirect($_SERVER['HTTP_REFERER']);

    }
    public function add_cartt(){
        date_default_timezone_set('Asia/Jakarta');

        $buku = $this->input->post('id_buku');
        $user = $this->session->userdata('id_user');

        $data = array(
            'id_user' => $user,
            'id_buku' => $buku,
        );
        $this->db->insert('temp',$data);
        $this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissible fade show" role="alert">
	 	<i class="fa fa-exclamation-circle me-2"></i>Berhasil Add Peminjaman
    	</div>');
        redirect($_SERVER['HTTP_REFERER']);

    }
    public function hapus_pinjam($id){
			$where = array(
				'id_temp' => $id
			);
			$this->db->delete('temp',$where);
			$this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissible fade show" role="alert">
			<i class="fa fa-exclamation-circle me-2"></i>Data Berhasil DiHapus
		</div>');
			redirect('PinjamBuku/keranjang');
		}
}
