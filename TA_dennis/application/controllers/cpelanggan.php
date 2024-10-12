<?php 
	
	/**
	* 
	*/
	class cpelanggan extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('mpelanggan',"",true);
		}

		public function index()
		{
			$data['plg']= $this->mpelanggan->list_pelanggan();
			$this->load->view('plg/data_pelanggan',$data);
		}

		public function add()
		{
			$data['idpel'] = $this->mpelanggan->getIdPelanggan();
			$this->load->view("plg/add_pelanggan",$data);
		}

		function getPelanggan($id)
		{
			if ($id != null){
            $plg = $this->mpelanggan->ambil($id) ;
            echo json_encode($plg);
            exit ;
        	}
		}

		public function saveadd($data = null)
		{
			$data["tpelanggan"] = $this->input->post("tpelanggan");
			//print_r($data["capster"]);
			$save = $this->mpelanggan->save($data["tpelanggan"]);

			if ($save) {
				
			}
			redirect('cpelanggan');
		}

		public function edit($ok=null)
		{
			// $where = array('idpel' => $idpel );
			// $data['tpelanggan'] = $this->mpelanggan->edit_data($where,'tpelanggan')->result();
			// $this->load->view('plg/edit_pelanggan',$data);

			$kode=$ok;
				$data['tpelanggan'] = $this->mpelanggan->edit_data($kode);
				$data['aksi'] = "update";
				$data['judul'] = "Edit Sales";
				$this->load->view("plg/edit_pelanggan",$data);
		}

		function update($ok=null)
		{
			

			$where=$ok;
			$data['tpelanggan'] = $this->input->post("tpelanggan");
			
			$update = $this->mpelanggan->update_data($data['tpelanggan'],$where);
			if ($update)
			{
				redirect('cpelanggan');
			}
		}

		function hapus($ok=null)
		{
			$where['idpel']=$ok;
			$this->mpelanggan->hapus_data('tpelanggan',$where);
			redirect('cpelanggan');
		}
	}
?>