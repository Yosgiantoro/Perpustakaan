	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Buku extends CI_Controller {
	public function __construct(){
			parent::__construct();
			if($this->session->userdata('role_user')==NULL || $this->session->userdata('role_user')== 'Peminjam' ){
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
				'buku' => $buku,
				'kategori' => $kategori,
				'judul_halaman' => 'Daftar Buku',
				'ulasan'  => $ulasan,
				'avg_ratings' => $avg_ratings,
			);
			$this->template->load('temp/template','admin/buku',$data);
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
				'judul_halaman' => 'Detail Buku',
				'avg_ratings' => $avg_ratings,
			);

			$this->template->load('temp/template','admin/detail_buku',$data);
		}
		public function tambah_buku(){
		
			$namafoto = date('YmdHis').'.jpg';
			$config['upload_path']      = 'assets/buku/';
			$config['max_size'] = 500 * 1024;
			$config['file_name'] = $namafoto;
			$config['allowed_types'] = '*';
			$this->load->library('upload',$config);
			if($_FILES['foto']['size'] >= 500 * 1024){
				$this->session->set_flashdata('alert','<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<i class="fa fa-exclamation-circle me-2"></i>Ukuran foto terlalu besar.
			</div>');
			redirect('Buku');
			}else if(! $this->upload->do_upload('foto')){
				$error = array('error' => $this->upload->display_errors());
			}else{
				$data = array('upload_data' => $this->upload->data());
			}
			$this->db->from('buku a')->join('kategori_buku b','a.id_kategori=b.id_kategori','left');
			$data = array(
				'judul' => $this->input->post('judul'),
				'penulis' => $this->input->post('penulis'),
				'penerbit' => $this->input->post('penerbit'),
				'id_kategori' => $this->input->post('id_kategori'),
				'tahun_terbit' => $this->input->post('tahun_terbit'),
				'status' => ('tersedia'),
				'foto'        => $namafoto,
				'stok'	=> $this->input->post('stok'),
			);
			$this->db->insert('buku',$data);
			$this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissible fade show" role="alert">
			<i class="fa fa-exclamation-circle me-2"></i>Buku Berhasil DiTambahkan
		</div>');
			redirect('Buku');
		}
		public function hapus_buku($id){
			$filename = FCPATH.'/assets/buku/'.$id;
			if(file_exists($filename)){
				unlink("./assets/buku/".$id);
			}
			$where = array(
				'foto' => $id
			);
			$this->db->delete('buku',$where);
			$this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissible fade show" role="alert">
			<i class="fa fa-exclamation-circle me-2"></i>Data Berhasil DiHapus
		</div>');
			redirect('Buku');
		}
		public function update_buku(){
		$namafoto = $this->input->post('foto');
		$config['upload_path']      = 'assets/buku/';
		$config['max_size'] = 500 * 1024;
		$config['file_name'] = $namafoto;
		$config['overwrite'] = true;
		$config['allowed_types'] = '*';
		$this->load->library('upload',$config);
		if($_FILES['foto']['size'] >= 500 * 1024){
			$this->session->set_flashdata('alert','<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<i class="fa fa-exclamation-circle me-2"></i>Ukuran foto terlalu besar.
		</div>');
		redirect('Buku');
		}else if(! $this->upload->do_upload('foto')){
			$error = array('error' => $this->upload->display_errors());
		}else{
			$data = array('upload_data' => $this->upload->data());
		}
		$data = array(
			'judul' => $this->input->post('judul'),
			'penulis' => $this->input->post('penulis'),
			'id_kategori' => $this->input->post('id_kategori'),
			'penerbit' => $this->input->post('penerbit'),
			'tahun_terbit' => $this->input->post('tahun_terbit'),
			'stok' => $this->input->post('stok'),
		);
		$where = array(
			'foto' => $this->input->post('foto')
		);
		$this->db->update('buku',$data,$where);
		$this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissible fade show" role="alert">
		<i class="fa fa-exclamation-circle me-2"></i>Data Berhasil DiUpdate
		</div>');
		redirect('Buku');
		}
		public function ulasan($id){
			$buku = $this->db->from('buku')->where('id_buku',$id)->get()->row();
			$this->db->from('ulasan_buku a')->join('users b','a.id_user=b.id_user')->where('id_buku',$id);
			$ulasan = $this->db->get()->result_array();
			$data = array(
				'buku' => $buku,
				'ulasan' => $ulasan,
			);
			$this->template->load('temp/template','admin/ulasan',$data);
		}
		public function kategori()
		{
			$this->db->from('kategori_buku')->order_by('id_kategori','ASC');
			$kategori = $this->db->get()->result_array();
			$data =  array(
				'judul_halaman' => 'Kategori Buku',
				'kategori'        => $kategori,
			);
			$this->template->load('temp/template','admin/kategori',$data);
		}
		public function tambah_kategori(){
			$data = array(
				'nama_kategori'   => $this->input->post('nama_kategori'),

			);
			$this->db->insert('kategori_buku',$data);
			$this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissible fade show" role="alert">
			<i class="fa fa-exclamation-circle me-2"></i>Kategori Berhasil DiTambahkan
		</div>');
			redirect('Buku/kategori');
		}
		public function hapus_kategori($id){
			$where = array(
				'id_kategori' => $id
			);
			$this->db->delete('kategori_buku',$where);
			$this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissible fade show" role="alert">
			<i class="fa fa-exclamation-circle me-2"></i>Data Berhasil DiHapus
		</div>');
			redirect('Buku/kategori');
		}
		public function update(){
		$data = array(
			'nama_kategori' => $this->input->post('nama_kategori'),
		);
		$where = array(
			'id_kategori' => $this->input->post('id_kategori')
		);
		$this->db->update('kategori_buku',$data,$where);
		$this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissible fade show" role="alert">
		<i class="fa fa-exclamation-circle me-2"></i>Data Berhasil DiUpdate
		</div>');
		redirect('Buku/kategori');
		}
	}
