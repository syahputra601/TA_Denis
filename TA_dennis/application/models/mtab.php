<?php 

	/**
	* 
	*/
	class mtab extends CI_model
	{
		
		function __construct()
		{
			parent::__construct();
			$this->table_name='tab';
		}

		function list_siswa()
		{
			$sql = $this->db->get($this->table_name);
			// if ($sql->num_rows() > 0) {
				return $sql->result_array();
			// }
			
		}

		public function getSiswa()
		{
			$this->db->select("nip","nip");
			$this->db->from($this->table_name);
			$sql = $this->db->get();

			$result[""] = "Please Select Data";
			if ($sql->num_rows() > 0) {
				foreach ($sql ->result_array() as $row) {
					$result[$row["nip"]] = $row["nip"];
					
				}
				return $result;
			}
			else {
				echo "no data";}
		}

		public function getNipSiswa(){
			$data = $this->db->get('tab');

			$count = $data->num_rows() + 1;
			if ($count < 10 ) {
				$code = "TAB-00".$count;
			}
			elseif ($count < 100) {
				$code = "TAB-000".$count;
			}
			else{
				$code = "TAB-0".$count;
			}
			return $code;
		}

		function ambil($nip=null){
			if ($nip != null){
            $this->db->select("*") ;
            $this->db->from($this->table_name);
            $this->db->where("nip",$nip) ;
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
	}
?>