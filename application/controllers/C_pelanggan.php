<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class C_pelanggan extends CI_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('Model');
			$this->load->library('pdf');
		}
	
		public function index(){
			if (!$this->session->userdata('id_pelanggan')) 
			{
	    	  redirect('Controller');
	    	}
	    	else
	    	{
	    		$data["query"]=$this->Model->get_motor();
				$this->load->view('pelanggan/home',$data);
	    	}
		}

		public function logout(){
			$this->session->sess_destroy();
			redirect('Controller');
		}

		function print_to_pdf($id){
			$data['query'] = $this->Model->transaksiku($id);
			$data['total'] = $this->Model->total($id);

			$this->pdf->load_view('pelanggan/transaksiku',$data);
			$this->pdf->render();
			$this->pdf->stream("name-file.pdf");
		}

		//filtering dropdown merk motor
		public function motor_filter($id_merk){
			$data['query'] = $this->Model->get_motor_filter($id_merk);
			$this->load->view('pelanggan/home-filter',$data);
		}

		public function search(){
			$k = $this->input->post('k');
			$data['query']=$this->Model->get_motor_k($k);
			$this->load->view('pelanggan/home-search',$data);
		}


	//Pemesanan=============================================================================================================

		public function pesan_preview($id){
			//id otomatis
			$data['id_transaksi'] = $this->Model->id_transaksi();
			$data['id_det_transaksi'] = $this->Model->id_det_transaksi();

			$data['query'] = $this->Model->pesan_preview($id);
			$this->load->view('pelanggan/pesan-preview',$data);
		}

		public function pesan_transaksi(){
			//save transaksi
			$data_transaksi= array(
				'id_transaksi' => $this->input->post('id_transaksi'),
				'id_pelanggan' => $this->input->post('id_pelanggan'),
				'id_petugas'   => $this->input->post('id_petugas'),
				'tgl_pesan'    => $this->input->post('tgl_pesan'),
				'tgl_kirim'    => $this->input->post('tgl_kirim')
				);
			$this->Model->create($data_transaksi,'transaksi');

			$harga = $this->input->post('harga');
			$jml   = $this->input->post('jumlah');
			$total = ($harga*$jml);

			//save detail_transaksi
			$data_detail= array(
				'id_detail_transaksi' => $this->input->post('id_detail_transaksi'),
				'id_transaksi' 		  => $this->input->post('id_transaksi'),
				'id_motor' 			  => $this->input->post('id_motor'),
				'jumlah'   			  => $this->input->post('jumlah'),
				'total_harga'   	  => $total,
				'status'    		  => 'pesan'
				);
			$this->Model->create($data_detail,'detail_transaksi');

			$id = $this->input->post('id_pelanggan');
			$data['query'] = $this->Model->transaksiku($id);
			$data['total'] = $this->Model->total($id);
			$this->load->view('pelanggan/transaksiku',$data);
		}

		public function transaksiku($id){
			$data['query'] = $this->Model->transaksiku($id);
			$data['total'] = $this->Model->total($id);
			$this->load->view('pelanggan/transaksiku',$data);
		}

	//Transaksiku==============================================================================================================
		public function edit_transaksiku($id){
			//id otomatis
			$data['id_transaksi'] = $this->Model->id_transaksi();
			$data['id_det_transaksi'] = $this->Model->id_det_transaksi();

			//view pesan_preview motor
			$data['query'] = $this->Model->pesan_preview_edit($id);
			
			//hapus transaksiku
			$where = array('id_transaksi' => $id);
			$this->Model->delete($where,'detail_transaksi');

			$this->load->view('pelanggan/pesan-preview',$data);
		}

		public function hapus_transaksiku($id){
			$where = array('id_transaksi' => $id);
			$this->Model->delete($where,'detail_transaksi');
			redirect('C_pelanggan');
		}


	}
	
	/* End of file C_pelanggan.php */
	/* Location: ./application/controllers/C_pelanggan.php */