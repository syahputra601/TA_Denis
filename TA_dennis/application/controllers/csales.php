<?php 
	
	/**
	* 
	*/
	class csales extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('msales',"",true);
		}

		public function index()
		{
			$data['sls']= $this->msales->list_sales();
			$this->load->view('sls/data_sales',$data);
		}

		public function add()
		{
			$data['idsales'] = $this->msales->getIdSales();
			$this->load->view("sls/add_sales",$data);
		}

		function getSales($id)
		{
			if ($id != null){
            $sls = $this->msales->ambil($id) ;
            echo json_encode($sls);
            exit ;
        	}
		}

		public function saveadd($data = null)
		{
			$data["tsales"] = $this->input->post("tsales");
			//print_r($data["capster"]);
			$save = $this->msales->save($data["tsales"]);

			if ($save) {
				
			}
			redirect('csales');
		}

		public function edit($ok=null)
		{
			// $where = array('idsales' => $idsales );
			// $data['tsales'] = $this->msales->edit_data($where,'tsales')->result();
			// $this->load->view('sls/edit_sales',$data);

				$kode=$ok;
				$data['tsales'] = $this->msales->edit_data($kode);
				$data['aksi'] = "update";
				$data['judul'] = "Edit Sales";
				$this->load->view("sls/edit_sales",$data);
		}

		function update($ok=null)
		{
			
			$where=$ok;
			$data['tsales'] = $this->input->post("tsales");
			//print_r($data['psb']);
			//exit;
			$update = $this->msales->update_data($data['tsales'],$where);
			if ($update)
			{
				redirect('csales');
			}
		}

		function hapus($ok=null)
		{
			$where['idsales']=$ok;
			$this->msales->hapus_data('tsales',$where);
			redirect('csales');
		}
	}
?>