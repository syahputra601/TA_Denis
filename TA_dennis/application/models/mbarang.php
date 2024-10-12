<?php 

	/**
	* 
	*/
	class mbarang extends CI_model
	{
		
		function __construct()
		{
			parent::__construct();
			$this->table_name='tbarang';
		}

		function list_barang()
		{
			$sql = $this->db->get($this->table_name);
			// if ($sql->num_rows() > 0) {
				return $sql->result_array();
			// }
			
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

		public function getIdBarang(){
			$data = $this->db->get('tbarang');

			$count = $data->num_rows() + 1;
			if ($count < 10 ) {
				$code = "BRG-00".$count;
			}
			elseif ($count < 100) {
				$code = "BRG-000".$count;
			}
			else{
				$code = "BRG-0".$count;
			}
			return $code;
		}

		function ambil($idbarang=null)
		{
			if ($idbarang != null){
            $this->db->select("*") ;
            $this->db->from($this->table_name);
            $this->db->where("idbarang",$idbarang) ;
            $sql = $this->db->get() ;
            
            if ($sql->num_rows() > 0) {
                return $sql->result_array() ;
            }else {
                return null ;
            }
        	}
		}

		public function listComboBarang() {
        $this->db->select("namabarang, typebarang, kategoribarang") ;
        $this->db->from($this->table_name);
        $sql = $this->db->get() ;
        
        $result[""] = "Please Select";
        if ($sql->num_rows() > 0) {
            
            foreach($sql->result_array() as $row) {
                $result[$row["namabarang"]] = $row["typebarang"]  ;
            }
           
            return $result ;
        }else {
            echo "no data";
        }
    }

    public function getbykode($kode = null)
		{
			$this->db->where('idbarang',$kode);
			$sql = $this->db->get($this->table_name);
			if ($sql->num_rows() > 0)
			{
				return $sql->row_array(); 
			}
		}

		function edit_data($where,$table){
			$this->db->where($where);
			return $this->db->get_where('tbarang',$where);
		}

		function update_data($where,$data,$table){
			$this->db->where($where);
			$this->db->update('tbarang',$data);
		}

		function hapus_data($table,$where){
			$this->db->where($where);
			$this->db->delete($table);
		}

		

		// function ambill($namabarang=null)
		// {
		// 	if ($namabarang != null){
  //           $this->db->select("*") ;
  //           $this->db->from($this->table_name);
  //           $this->db->where("namabarang",$namabarang) ;
  //           $sql = $this->db->get() ;
            
  //           if ($sql->num_rows() > 0) {
  //               return $sql->result_array() ;
  //           }else {
  //               return null ;
  //           }
  //       	}
		// }
	}
?>