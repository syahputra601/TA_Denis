<?php 

	/**
	* 
	*/
	class msales extends CI_model
	{
		
		function __construct()
		{
			parent::__construct();
			$this->table_name='tsales';
		}

		function list_sales()
		{
			$sql = $this->db->get($this->table_name);
			// if ($sql->num_rows() > 0) {
				return $sql->result_array();
			// }
			
		}

		public function listComboSales() {
        $this->db->select("idsales, namasales") ;
        $this->db->from($this->table_name);
        $sql = $this->db->get() ;
        
        $result[""] = "Please Select";
        if ($sql->num_rows() > 0) {
            
            foreach($sql->result_array() as $row) {
                $result[$row["idsales"]] = $row["namasales"] ;
            }
           
            return $result ;
        }else {
            echo "no data";
        }
    }

		public function getSales()
		{
			$this->db->select("idsales","idsales");
			$this->db->from($this->table_name);
			$sql = $this->db->get();

			$result[""] = "Please Select Data";
			if ($sql->num_rows() > 0) {
				foreach ($sql ->result_array() as $row) {
					$result[$row["idsales"]] = $row["idsales"];
					
				}
				return $result;
			}
			else {
				echo "no data";}
		}

		public function getIdSales(){
			$data = $this->db->get('tsales');

			$count = $data->num_rows() + 1;
			if ($count < 10 ) {
				$code = "SLS-00".$count;
			}
			elseif ($count < 100) {
				$code = "SLS-000".$count;
			}
			else{
				$code = "SLS-0".$count;
			}
			return $code;
		}

		function ambil($id=null){
			if ($id != null){
            $this->db->select("*") ;
            $this->db->from($this->table_name);
            $this->db->where("idsales",$id) ;
            $sql = $this->db->get() ;
            
            if ($sql->num_rows() > 0) {
                return $sql->result_array() ;
            }else {
                return null ;
            }
        	}
		}

		public function save($data = null)
		{
			if ($data != null) {
				$sql = $this->db->insert($this->table_name,$data);
				if ($this->db->affected_rows() > 0) {
					return true;
				}
			}
			else {
				echo "gagal";
				return false;
			}
		}

		// function edit_data($where,$table){
		// 	$this->db->where($where);
		// 	return $this->db->get_where('tsales',$where);
		// }

		public function edit_data($kode = null)
		{
			$this->db->where('idsales',$kode);
			$sql = $this->db->get($this->table_name);
			if ($sql->num_rows() > 0)
			{
				return $sql->row_array(); 
			}
		}

		function update_data($data=null,$where)
		{
			if ($data !=null)
			{
				$this->db->where('idsales',$where);
				$sql=$this->db->update($this->table_name,$data);
				if($this->db->affected_rows()>='1'){
					return true;
				}else{
					echo "coba lagi, masih ada yang salah";
					return false;
				}
			}
		}

		function hapus_data($table,$where){
		$this->db->where($where);
		$this->db->delete($table);
	}	
	}
?>