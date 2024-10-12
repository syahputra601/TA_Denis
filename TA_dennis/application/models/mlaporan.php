

<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class mlaporan extends CI_model
    {
        
        function __construct()
        {
            parent::__construct();
            $this->table_header = "transaksi";
            $this->table_detail = "transaksi_detail";
        }

        function laporan($years){
            $this->db->select("*") ;
            $this->db->from($this->table_header);
            $this->db->where("LEFT(tglpesan, 4) = ",$years) ;
            $sql = $this->db->get();

            return $sql->result_array();
        }

        public function deleteAll($id = null)
        {
        if ($id != null) {
            $deletedetail = $this->db->delete($this->table_detail, array("transaksi_id" => $id));
            if ($deletedetail) {
                $deleteHeader = $this->db->delete($this->table_header, array("id" => $id));
                if ($deleteHeader) {
                    return true;
                } else {
                    return false;
                }
            }
        }
        }
    } 
?>