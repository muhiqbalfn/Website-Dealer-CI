<?php defined('BASEPATH') OR exit('No direct script access allowed');

	include('C_admin.php');
	include('C_pelanggan.php');

	class Controller extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('Model');
			$this->load->helper('url');
	        $this->load->library('pagination');
	        $this->load->database();
		}

		public function index()
		{
			$data["query"]=$this->Model->get_motor();
			$this->load->view('home',$data);
		}

		public function search(){
			$k = $this->input->post('k');
			$data['query']=$this->Model->get_motor_k($k);
			$this->load->view('home-search',$data);
		}

		public function nilail(){
			$nilai = array(
				"Dina" => array(
								"Pemrograman Web" => 78,
								"Matematika Informatika" => 60,
								"Multimedia" => 81
				),
				"Qadir" => array(
								"Pemrograman Web" => 82,
								"Matematika Informatika" => 76,
								"Multimedia" => 78
				),
				"Zara" => array(
								"Pemrograman Web" => 84,
								"Matematika Informatika" => 88,
								"Multimedia" => 74
				),
				"Bahdim" => array(
								"Pemrograman Web" => 66,
								"Matematika Informatika" => 70,
								"Multimedia" => 72
				)
			);
			$data['dat'] = $nilai;
			$this->load->view('nilai',$data);
		}

		public function nilai()
		{
			$nilai = array
			(
				"TI2A" => array(
								1 => "LPR",
								2 => "LDI",
								3 => "LBD"),

				"TI2B" => array(
								1 => "LKJ",
								2 => "TKJ",
								3 => "ABC"),

				"TI2C" => array(
								1 => "LID3",
								2 => "LBD2",
								3 => "AUG"),

				"TI2D" => array(
								1 => "LMM",
								2 => "LMM2",
								3 => "KLI")
			);
			
			$data['dat'] = $nilai;
			$this->load->view('nilai', $data);
		}

		
		//LOAD=====================================================================

		//filtering dropdown merk motor
		public function motor_filter($id_merk){
			$data['query'] = $this->Model->get_motor_filter($id_merk);
			$this->load->view('home-filter',$data);
		}

		public function profil(){
			$this->load->view('profil');	
		}
		public function pendaftaran(){
			//id otomatis
			$data['id_pelanggan'] = $this->Model->id_pelanggan();
			$this->load->view('pendaftaran',$data);	
		}
		


		//PENDAFTARAN==============================================================
		public function daftar(){
			$data = array();
			$this->load->library("form_validation");

			$this->form_validation->set_rules('id_pelanggan','ID Pelanggan','required');
			$this->form_validation->set_rules('nama_pelanggan','Nama pelanggan','required');
			$this->form_validation->set_rules('jenis_kelamin','Jenis kelamin','required');
			$this->form_validation->set_rules('alamat','Alamat pelanggan','required');
			$this->form_validation->set_rules('no_hp','Nomor handphone','required|numeric|max_length[12]');
			$this->form_validation->set_rules('username','Username','required|min_length[3]|max_length[10]');
			$this->form_validation->set_rules('password','Password','required|min_length[3]|max_length[10]');
			if ($this->form_validation->run()==false) 
			{
				//id otomatis
				$data['id_pelanggan'] = $this->Model->id_pelanggan();
				$this->load->view('pendaftaran',$data);	
			} 
			else 
			{
				$upload = $this->Model->upload_pelanggan();
				if ($upload['result'] == "success") 
				{
					$dataPelanggan = array(
						'id_pelanggan'	=>  $this->input->post('id_pelanggan'),
						'nama_pelanggan'=>	$this->input->post('nama_pelanggan'),
						'jenis_kelamin'	=>	$this->input->post('jenis_kelamin'),
						'alamat'		=>	$this->input->post('alamat'),
						'no_hp'			=>	$this->input->post('no_hp'),
						'username'		=>	$this->input->post('username'),
						'password'		=>	$this->input->post('password'),
						'foto'			=>  $upload['file']['file_name']);

					$this->db->insert('pelanggan',$dataPelanggan);
					//alert
					$nama = $this->input->post('nama_pelanggan');
					$this->session->set_flashdata('msg', 
						'<div class="alert alert-success">
							<h4>Berhasil !</h4>
							<p>Selamat <b>'.$nama.'</b>, Anda berhasil melakukan pendaftaran.</p>
						</div>');
					redirect('Controller/pendaftaran');
				} 
				else 
				{
					$data['message'] = $upload['error'];
				}
			}
		}


		//LOGIN====================================================================
		public function login(){
			if(isset($_POST['login'])){
				$user  = $this->input->post('user',true);
				$pass  = $this->input->post('pass',true);
				$cek   = $this->Model->login($user, $pass);
				$hasil = count($cek);
				if($hasil > 0)
				{
					$in   = $this->db->get_where('pelanggan', array('username'=>$user, 'password' => $pass))->row();
					$data = array('udhmasuk'       => true, 
								  'id_pelanggan'   => $in->id_pelanggan,
								  'nama_pelanggan' => $in->nama_pelanggan,
								  'foto'           => $in->foto);
					
					$this->session->set_userdata($data);
					if($in->id_pelanggan == 'plg000')
					{
						redirect('C_admin');
					}
					else if($in->id_pelanggan == 'plg002')
					{
						redirect('C_admin');
					}else{
						redirect('C_pelanggan');
					}
				}
				else
				{
					//echo "<script>alert('Gagal login : Cek username dan password!');history.go(-1);</script>";
					redirect('Controller');
				}
			}
		}

		//Pagination
		public function pagination(){
		$config['base_url']   = base_url().'Controller/pagination';
		$jumlah_data 		  = $this->Model->jumlah_data();
		$config['total_rows'] = $jumlah_data;
		$config['per_page']   = 8;
		
		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);
		$data['query'] =$this->Model->data($config['per_page'],$from);

		$this->load->view('home-pagination',$data);
	}


	}

/* End of file Controller.php */
/* Location: ./application/controllers/Controller.php */