<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Model extends CI_Model {

		//CRUD AJAX PETUGAS ==============================================================================
		public function add_petugas($data)
		{
			$this->db->insert('petugas', $data);
		}

		public function get_update_petugas($id)
		{
			$query=$this->db->query("SELECT * FROM petugas WHERE id_petugas='$id'");
			if($query->num_rows()>0){
				foreach ($query->result() as $value) {
					$data=array(
						'id'     => $value->id_petugas,
						'nama'   => $value->nama_petugas,
						'jekel'  => $value->jenis_kelamin,
						'alamat' => $value->alamat,
						'foto'   => $value->foto
					);
				}
			}
			return $data;
		}

		public function update_petugas($data, $where){
			$this->db->set($data);
			$this->db->where("id_petugas", $where);
			$this->db->update('petugas', $data);
		}

		public function del_petugas($where){
			$this->db->query("DELETE FROM petugas where id_petugas='$where'");
		}
		//================================================================================================

		//LOGIN===================================================================================================================
		public function login($user, $pass){
			$this->db->where('username',$user);
			$this->db->where('password',$pass);
			return $this->db->get('pelanggan')->row();
		}


		//NOTIF PESAN===================================================================================================================
		public function notif_pesan(){
			$notif_pesan = $this->db->query("SELECT COUNT(*) AS qty FROM detail_transaksi WHERE status='pesan'");
			return $notif_pesan->result();
		}


		//Pagination ============================================================================================================
		public function jumlah_data(){
			return $this->db->get('motor')->num_rows();
 		}
		public function data($number,$offset){
			$this->db->select('motor.*, detail_merk.*, detail_type.*');
			$this->db->join('detail_merk', 'motor.id_merk=detail_merk.id_merk', 'inner');
	    	$this->db->join('detail_type', 'motor.id_type=detail_type.id_type', 'inner');
			$this->db->order_by("motor.id_motor", "asc");
			return $query = $this->db->get('motor',$number,$offset)->result();
		}


		//SELECT ================================================================================================================
		public function get_data($table){
			$query = $this->db->get($table);
			return $query->result();
		}

		//SELECT JOIN ============================================================================================================
		public function get_motor()
		{
			$query = $this->db->query("SELECT*FROM motor 
									   INNER JOIN detail_merk ON motor.id_merk=detail_merk.id_merk
									   INNER JOIN detail_type ON motor.id_type=detail_type.id_type
									   LIMIT 8 ");
			return $query->result();
		}

		public function get_motor_admin()
		{
			$query = $this->db->query("SELECT*FROM motor 
									   INNER JOIN detail_merk ON motor.id_merk=detail_merk.id_merk
									   INNER JOIN detail_type ON motor.id_type=detail_type.id_type");
			return $query->result();
		}

		public function get_motor_k($k){
			$this->db->select('*');
			$this->db->from('motor');
			$this->db->join('detail_merk', 'motor.id_merk=detail_merk.id_merk', 'inner');
	    	$this->db->join('detail_type', 'motor.id_type=detail_type.id_type', 'inner');
			$this->db->like('merk',$k);
			$this->db->or_like('type',$k);
			return $this->db->get()->result();
		}

		/*//search
		public function get_motor_key($key){
			$query = $this->db->query("SELECT*FROM motor 
									   INNER JOIN detail_merk ON motor.id_merk=detail_merk.id_merk
									   INNER JOIN detail_type ON motor.id_type=detail_type.id_type
									   WHERE detail_type.type LIKE '%$key%' ");
			return $query->result();
		}*/

		//dropdown
		public function get_motor_filter($id_merk)
		{
			$query = $this->db->query("SELECT*FROM motor 
									   INNER JOIN detail_merk ON motor.id_merk=detail_merk.id_merk
									   INNER JOIN detail_type ON motor.id_type=detail_type.id_type
									   WHERE motor.id_merk='$id_merk'");
			return $query->result();
		}

		public function join_transaksi($kd)
		{
			$query = $this->db->query("SELECT*FROM transaksi 
									   INNER JOIN detail_transaksi ON transaksi.id_transaksi=detail_transaksi.id_transaksi
									   INNER JOIN motor ON detail_transaksi.id_motor=motor.id_motor
									   INNER JOIN pelanggan ON transaksi.id_pelanggan=pelanggan.id_pelanggan
									   INNER JOIN detail_merk ON motor.id_merk=detail_merk.id_merk
									   INNER JOIN detail_type ON motor.id_type=detail_type.id_type
									   WHERE transaksi.id_transaksi='$kd'");
			return $query->result();
		}

		public function admin_transaksi()
		{
			$query = $this->db->query("SELECT*FROM transaksi
									   INNER JOIN detail_transaksi ON transaksi.id_transaksi=detail_transaksi.id_transaksi
									   INNER JOIN motor ON detail_transaksi.id_motor=motor.id_motor
									   INNER JOIN pelanggan ON transaksi.id_pelanggan=pelanggan.id_pelanggan
									   INNER JOIN petugas ON transaksi.id_petugas=petugas.id_petugas
									   INNER JOIN detail_merk ON motor.id_merk=detail_merk.id_merk
									   INNER JOIN detail_type ON motor.id_type=detail_type.id_type");
			return $query->result();
		}

		public function admin_transaksi_notif()
		{
			$query = $this->db->query("SELECT*FROM transaksi
									   INNER JOIN detail_transaksi ON transaksi.id_transaksi=detail_transaksi.id_transaksi
									   INNER JOIN motor ON detail_transaksi.id_motor=motor.id_motor
									   INNER JOIN pelanggan ON transaksi.id_pelanggan=pelanggan.id_pelanggan
									   INNER JOIN petugas ON transaksi.id_petugas=petugas.id_petugas
									   INNER JOIN detail_merk ON motor.id_merk=detail_merk.id_merk
									   INNER JOIN detail_type ON motor.id_type=detail_type.id_type
									   WHERE detail_transaksi.status='pesan'");
			return $query->result();
		}

		public function update_transaksi_kirim($id)
		{
			$this->db->query("UPDATE detail_transaksi SET status='terkirim' WHERE id_detail_transaksi='$id'");
		}

		public function update_transaksi_batal($id)
		{
			$this->db->query("UPDATE detail_transaksi SET status='pesan' WHERE id_detail_transaksi='$id'");
		}

		public function pesan_preview($id)
		{
			$query = $this->db->query("SELECT*FROM motor
									   INNER JOIN detail_merk ON motor.id_merk=detail_merk.id_merk
									   INNER JOIN detail_type ON motor.id_type=detail_type.id_type
									   WHERE motor.id_motor='$id'");
			return $query->result();
		}

		public function transaksiku($id)
		{
			$query = $this->db->query("SELECT*FROM transaksi 
									   INNER JOIN detail_transaksi ON transaksi.id_transaksi=detail_transaksi.id_transaksi
									   INNER JOIN motor ON detail_transaksi.id_motor=motor.id_motor
									   INNER JOIN pelanggan ON transaksi.id_pelanggan=pelanggan.id_pelanggan
									   INNER JOIN detail_merk ON motor.id_merk=detail_merk.id_merk
									   INNER JOIN detail_type ON motor.id_type=detail_type.id_type
									   WHERE pelanggan.id_pelanggan='$id'");
			return $query->result();
		}


		public function pesan_preview_edit($id)
		{
			$query = $this->db->query("SELECT*FROM transaksi 
									   INNER JOIN detail_transaksi ON transaksi.id_transaksi=detail_transaksi.id_transaksi
									   INNER JOIN motor ON detail_transaksi.id_motor=motor.id_motor
									   INNER JOIN pelanggan ON transaksi.id_pelanggan=pelanggan.id_pelanggan
									   INNER JOIN detail_merk ON motor.id_merk=detail_merk.id_merk
									   INNER JOIN detail_type ON motor.id_type=detail_type.id_type
									   WHERE transaksi.id_transaksi='$id'");
			return $query->result();
		}



		//CREATE==================================================================================================================
		public function create($data,$table){
			$this->db->insert($table,$data);
		}
		//GET UPDATE==============================================================================================================
		public function get_update($where,$table){		
			return $this->db->get_where($table,$where);
		}
		//UPDATE==================================================================================================================
		public function update($where,$data,$table){
			$this->db->where($where);
			$this->db->update($table,$data);
		}
		//DELETE==================================================================================================================
		public function delete($where,$table){
			$this->db->where($where);
			$this->db->delete($table);
		}

		//COMBO BOX===============================================================================================================
		public function merk(){
			return $this->db->get('detail_merk')->result();
		}
		public function type(){
			return $this->db->get('detail_type')->result();
		}



		//UPLOAD==================================================================================================================
		public function upload_motor() {
			$config['upload_path'] = './assets/motor/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = '2048';
			$config['remove_space'] = true;

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('gambar')) {
				$return = array('result' => 'success','file' => $this->upload->data(), 'error' => '');
				return $return;
			} else {
				$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
				return $return;
			}
		}

		public function upload_pelanggan() {
			$config['upload_path'] = './assets/foto/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = '2048';
			$config['remove_space'] = true;

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('foto')) {
				$return = array('result' => 'success','file' => $this->upload->data(), 'error' => '');
				return $return;
			} else {
				$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
				return $return;
			}
		}

		public function upload_petugas() {
			$config['upload_path'] = './assets/foto/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = '2048';
			$config['remove_space'] = true;

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('foto')) {
				$return = array('result' => 'success','file' => $this->upload->data(), 'error' => '');
				return $return;
			} else {
				$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
				return $return;
			}
		}


		//ID Otomatis==================================================================================================================
		public function id_transaksi(){
            $this->db->select('Right(id_transaksi,3) as kode ',false);
            $this->db->order_by('id_transaksi', 'desc');
            $this->db->limit(1);
            $query = $this->db->get('transaksi');

            if($query->num_rows()<>0)
            {
                $data = $query->row();
                $kode = intval($data->kode)+1;
            }
            else
            {
                $kode = 1;
            }
            $kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
            $kodejadi  = "trs".$kodemax;
            return $kodejadi;
        }

        public function id_det_transaksi(){
            $this->db->select('Right(id_detail_transaksi,3) as kode ',false);
            $this->db->order_by('id_detail_transaksi', 'desc');
            $this->db->limit(1);
            $query = $this->db->get('detail_transaksi');

            if($query->num_rows()<>0)
            {
                $data = $query->row();
                $kode = intval($data->kode)+1;
            }
            else
            {
                $kode = 1;
            }
            $kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
            $kodejadi  = "det".$kodemax;
            return $kodejadi;
        }

        public function id_motor(){
            $this->db->select('Right(id_motor,3) as kode ',false);
            $this->db->order_by('id_motor', 'desc');
            $this->db->limit(1);
            $query = $this->db->get('motor');

            if($query->num_rows()<>0)
            {
                $data = $query->row();
                $kode = intval($data->kode)+1;
            }
            else
            {
                $kode = 1;
            }
            $kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
            $kodejadi  = "mtr".$kodemax;
            return $kodejadi;
        }

        public function id_pelanggan(){
            $this->db->select('Right(id_pelanggan,3) as kode ',false);
            $this->db->order_by('id_pelanggan', 'desc');
            $this->db->limit(1);
            $query = $this->db->get('pelanggan');

            if($query->num_rows()<>0)
            {
                $data = $query->row();
                $kode = intval($data->kode)+1;
            }
            else
            {
                $kode = 1;
            }
            $kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
            $kodejadi  = "plg".$kodemax;
            return $kodejadi;
        }

        public function id_petugas(){
            $this->db->select('Right(id_petugas,3) as kode ',false);
            $this->db->order_by('id_petugas', 'desc');
            $this->db->limit(1);
            $query = $this->db->get('petugas');

            if($query->num_rows()<>0)
            {
                $data = $query->row();
                $kode = intval($data->kode)+1;
            }
            else
            {
                $kode = 1;
            }
            $kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
            $kodejadi  = "ptg".$kodemax;
            return $kodejadi;
        }

        public function id_merk(){
            $this->db->select('Right(id_merk,3) as kode ',false);
            $this->db->order_by('id_merk', 'desc');
            $this->db->limit(1);
            $query = $this->db->get('detail_merk');

            if($query->num_rows()<>0)
            {
                $data = $query->row();
                $kode = intval($data->kode)+1;
            }
            else
            {
                $kode = 1;
            }
            $kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
            $kodejadi  = "mrk".$kodemax;
            return $kodejadi;
        }

        public function id_type(){
            $this->db->select('Right(id_type,3) as kode ',false);
            $this->db->order_by('id_type', 'desc');
            $this->db->limit(1);
            $query = $this->db->get('detail_type');

            if($query->num_rows()<>0)
            {
                $data = $query->row();
                $kode = intval($data->kode)+1;
            }
            else
            {
                $kode = 1;
            }
            $kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
            $kodejadi  = "typ".$kodemax;
            return $kodejadi;
        }

        public function total($id)
		{
			$query = $this->db->query("SELECT transaksi.id_pelanggan, detail_transaksi.total_harga, SUM(total_harga) AS totalku 
									   FROM transaksi INNER JOIN detail_transaksi ON transaksi.id_transaksi=detail_transaksi.id_transaksi 
									   WHERE transaksi.id_pelanggan='$id'");
			return $query->result();
		}


	}

/* End of file Model.php */
/* Location: ./application/models/Model.php */