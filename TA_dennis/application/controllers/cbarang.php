<?php 
	
	/**
	* 
	*/
	class cbarang extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('mbarang',"",true);
		}

		public function index()
		{
			$data['brg']= $this->mbarang->list_barang();
			$this->load->view('brg/data_barang',$data);
		}

		public function add()
		{
			$data['idbarang'] = $this->mbarang->getIdBarang();
			$this->load->view("brg/add_barang",$data);
		}

		function getBarang($idbarang)
		{
			if ($idbarang != null){
            $brg = $this->mbarang->ambil($idbarang) ;
            echo json_encode($brg);
            exit ;
        	}
		}

		public function saveadd($data = null)
		{
			$data["tbarang"] = $this->input->post("tbarang");
			//print_r($data["capster"]);
			$save = $this->mbarang->save($data["tbarang"]);

			if ($save) {
				
			}
			redirect('cbarang');
		}

		public function edit($idbarang)
		{
			$where = array('idbarang' => $idbarang );
			$data['tbarang'] = $this->mbarang->edit_data($where,'tbarang')->result();
			$this->load->view('brg/edit_barang',$data);
		}
		
		function update()
		{
			$proid = $this->input->post('idbarang');
			$pronama = $this->input->post('namabarang');
			$protype = $this->input->post('typebarang');
			$prokategori = $this->input->post('kategoribarang');
			$proketerangan = $this->input->post('keteranganbarang');
			$proberat = $this->input->post('beratbarang');
			$prostok = $this->input->post('stokbarang');
			$proharga = $this->input->post('hargabarang');

			$data = array(
				'idbarang' => $proid,
				'namabarang' => $pronama,
				'typebarang' => $protype,
				'kategoribarang' => $prokategori,
				'keteranganbarang' => $proketerangan,
				'beratbarang' => $proberat,
				'stokbarang' => $prostok,
				'hargabarang' => $proharga,
				);

			$where = array(
				'idbarang' => $proid );

			$this->mbarang->update_data($where,$data,'tbarang');
			redirect('cbarang');
		}

		function hapus($ok=null)
		{
			$where['idbarang']=$ok;
			$this->mbarang->hapus_data('tbarang',$where);
			redirect('cbarang');
		}

		

		// function getNamaBarang($namabarang)
		// {
		// 	if ($namabarang != null){
  //           $barang = $this->mbarang->ambill($namabarang) ;
  //           echo json_encode($barang);
  //           exit ;
  //       	}
		// }
	}
?>

