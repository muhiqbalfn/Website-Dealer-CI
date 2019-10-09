<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class C_admin extends CI_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('Model');
		}
	
		public function index(){
			if (!$this->session->userdata('id_pelanggan')) 
			{
	    	  redirect('Controller');
	    	}
	    	else
	    	{
	    		//notif pesan
				$data['notif_pesan'] = $this->Model->notif_pesan();

				//dropdown notif pesan
				$data['query_pesan'] = $this->Model->admin_transaksi_notif();				    		

				$data['query'] = $this->Model->admin_transaksi();
				$data['data']=$this->Model->get_data('petugas');
				$this->load->view('admin/home',$data);
	    	}
		}

		public function logout(){
			$this->session->sess_destroy();
			redirect('Controller');
		}

		public function update_transaksi_kirim($id){
			$this->Model->update_transaksi_kirim($id);
			redirect('C_admin');
		}

		public function update_transaksi_batal($id){
			$this->Model->update_transaksi_batal($id);
			redirect('C_admin');
		}


		//LOAD AJAX-----------------------------------------------
		public function load_tbl_motor(){
			$data["query"]=$this->Model->get_motor_admin();
			$data["merk"]=$this->Model->get_data('detail_merk');
			$data["type"]=$this->Model->get_data('detail_type');
			$this->load->view('admin/tabel-motor',$data);
		}
		public function load_tabel_petugas(){
			$data["data"]=$this->Model->get_data('petugas');
			$this->load->view('admin/tabel-petugas',$data);
		}
		public function load_tbl_petugas(){
			$data["data"]=$this->Model->get_data('petugas');
			echo json_encode($data);
		}
		public function load_tbl_pelanggan(){
			$data["query"]=$this->Model->get_data('pelanggan');
			$this->load->view('admin/tabel-pelanggan',$data);
		}

		
		//MOTOR=====================================================================================================
		public function load_form_motor(){
			//id otomatis
			$data['id_motor'] = $this->Model->id_motor();
			//comboBox
			$data['merk'] = $this->Model->merk();
			$data['type'] = $this->Model->type();
			$this->load->view('admin/form-tambah-motor',$data);
		}

		public function create_motor(){
			$data = array();
			$this->load->library("form_validation");

			$this->form_validation->set_rules('id_motor','ID Motor','required');
			$this->form_validation->set_rules('id_merk','Merk','required');
			$this->form_validation->set_rules('id_type','Type','required');
			$this->form_validation->set_rules('tahun','Tahun','required|numeric');
			$this->form_validation->set_rules('warna','Warna','required');
			$this->form_validation->set_rules('harga','Harga','required|numeric');
			$this->form_validation->set_rules('stok','Stok','required|numeric');
			if ($this->form_validation->run()==false) 
			{
				//id otomatis
				$data['id_motor'] = $this->Model->id_motor();
				//comboBox
				$data['merk'] = $this->Model->merk();
				$data['type'] = $this->Model->type();
				$this->load->view('admin/form-tambah-motor',$data);
			} 
			else 
			{
				$upload = $this->Model->upload_motor();
				if ($upload['result'] == "success") 
				{
					$dataMotor = array(
						'id_motor'	=>	$this->input->post('id_motor'),
						'id_merk'	=>	$this->input->post('id_merk'),
						'id_type'	=>	$this->input->post('id_type'),
						'tahun'		=>	$this->input->post('tahun'),
						'warna'		=>	$this->input->post('warna'),
						'harga'		=>	$this->input->post('harga'),
						'stok'		=>	$this->input->post('stok'),
						'img_motor'	=>  $upload['file']['file_name']
					);

					$this->db->insert('motor',$dataMotor);
					redirect('C_admin/load_form_motor');
				} 
				else 
				{
					$data['message'] = $upload['error'];
				}
			}
		}

		public function get_update_motor($id){
			$where = array('id_motor' => $id);
			$data['query'] = $this->Model->get_update($where,'motor')->result();

			$data['merk'] = $this->Model->merk();
			$data['type'] = $this->Model->type();

			$this->load->view('admin/form-edit-motor',$data);
		}

		public function update_motor(){
			$data = array(
				'id_merk' 	=> $this->input->post('id_merk'),
				'id_type' 	=> $this->input->post('id_type'),
				'tahun' 	=> $this->input->post('tahun'),
				'warna' 	=> $this->input->post('warna'),
				'harga' 	=> $this->input->post('harga'),
				'stok' 		=> $this->input->post('stok'),
				'img_motor' => $this->input->post('gambar')
			);
			$where = array(
				'id_motor' => $this->input->post('id_motor')
			);
			$this->Model->update($where,$data,'motor');

			//alert
			$nama = $this->input->post('id_motor');
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-success">
					<h4>Berhasil update !
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					</h4>
					<p>Motor dengan ID <b>'.$nama.'</b>, Berhasil diubah.</p>
				</div>');

			redirect('C_admin');
		}

		public function delete_motor($id){
			$where = array('id_motor' => $id);
			$this->Model->delete($where,'motor');
			redirect('C_admin');
		}


		//PETUGAS=====================================================================================================
		public function add_petugas(){
			$dat = array(
				'nama_petugas'	=> $this->input->post('nama'),
				'jenis_kelamin' => $this->input->post('jekel'),
				'alamat'	    => $this->input->post('alamat'),
				'foto'			=> $this->input->post('foto')
			);
			$data = $this->Model->add_petugas($dat);
			echo json_encode($data);
		}

		public function get_update_petugas(){
	        $id   = $this->input->get('id');
	        $data = $this->Model->get_update_petugas($id);
	        echo json_encode($data);
	    }

	    public function update_petugas(){
			$dat = array(
				'nama_petugas'	=> $this->input->post('nama'),
				'jenis_kelamin' => $this->input->post('jekel'),
				'alamat'	    => $this->input->post('alamat'),
				'foto'	        => $this->input->post('foto')
			);
			$where = $this->input->post('id');
			$data  = $this->Model->update_petugas($dat, $where);
			echo json_encode($data);
		}

		public function del_petugas(){
			$where = $this->input->post('id');
			$data  = $this->Model->del_petugas($where);
			echo json_encode($data);
		}

		//PELANGGAN=====================================================================================================
		public function get_update_pelanggan($id){
			$where = array('id_pelanggan' => $id);
			$data['query'] = $this->Model->get_update($where,'pelanggan')->result();

			$this->load->view('admin/form-edit-pelanggan',$data);
		}

		public function update_pelanggan(){
			$data = array(
				'nama_pelanggan'=> $this->input->post('nama_pelanggan'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'alamat' 		=> $this->input->post('alamat'),
				'no_hp' 		=> $this->input->post('no_hp'),
				'username' 		=> $this->input->post('username'),
				'password' 		=> $this->input->post('password'),
				'foto' 			=> $this->input->post('foto')
			);
			$where = array(
				'id_pelanggan' => $this->input->post('id_pelanggan')
			);
			$this->Model->update($where,$data,'pelanggan');

			//alert
			$nama = $this->input->post('nama_pelanggan');
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-success">
					<h4>Berhasil update !
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					</h4>
					<p>Pelanggan <b>'.$nama.'</b>, Berhasil diubah.</p>
				</div>');

			redirect('C_admin');
		}

		public function delete_pelanggan($id){
			$where = array('id_pelanggan' => $id);
			$this->Model->delete($where,'pelanggan');
			redirect('C_admin');
		}


		//MERK========================================================================================================
		public function create_merk(){
			$data = array(
				'id_merk' => $this->input->post('id_merk'),
				'merk' 	  => $this->input->post('merk')
				);

			$this->Model->create($data,'detail_merk');

			//alert
			$nama = $this->input->post('merk');
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-success">
					<h4>Berhasil !
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					</h4>
					<p>Merk <b>'.$nama.'</b>, Berhasil ditambahkan.</p>
				</div>');

			redirect('C_admin');
		}

		public function get_update_merk($id){
			$where = array('id_merk' => $id);
			$data['query'] = $this->Model->get_update($where,'detail_merk')->result();

			$this->load->view('admin/form-edit-merk',$data);
		}

		public function update_merk(){
			$data = array(
				'merk' 		=> $this->input->post('merk')
			);
			$where = array(
				'id_merk' => $this->input->post('id_merk')
			);
			$this->Model->update($where,$data,'detail_merk');

			//alert
			$nama = $this->input->post('merk');
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-success">
					<h4>Berhasil update !
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					</h4>
					<p>Merk <b>'.$nama.'</b>, Berhasil diubah.</p>
				</div>');

			redirect('C_admin');
		}

		public function delete_merk($id){
			$where = array('id_merk' => $id);
			$this->Model->delete($where,'detail_merk');
			redirect('C_admin');
		}

		//TYPE========================================================================================================
		public function create_type(){
			$data = array(
				'id_type' => $this->input->post('id_type'),
				'type' 	  => $this->input->post('type')
				);

			$this->Model->create($data,'detail_type');

			//alert
			$nama = $this->input->post('type');
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-success">
					<h4>Berhasil !
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					</h4>
					<p>Type <b>'.$nama.'</b>, Berhasil ditambahkan.</p>
				</div>');

			redirect('C_admin');
		}

		public function get_update_type($id){
			$where = array('id_type' => $id);
			$data['query'] = $this->Model->get_update($where,'detail_type')->result();

			$this->load->view('admin/form-edit-type',$data);
		}

		public function update_type(){
			$data = array(
				'type' 		=> $this->input->post('type')
			);
			$where = array(
				'id_type' => $this->input->post('id_type')
			);
			$this->Model->update($where,$data,'detail_type');

			//alert
			$nama = $this->input->post('type');
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-success">
					<h4>Berhasil update !
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					</h4>
					<p>Type <b>'.$nama.'</b>, Berhasil diubah.</p>
				</div>');

			redirect('C_admin');
		}

		public function delete_type($id){
			$where = array('id_type' => $id);
			$this->Model->delete($where,'detail_type');
			redirect('C_admin');
		}

	
	}
	
	/* End of file C_admin.php */
	/* Location: ./application/controllers/C_admin.php */