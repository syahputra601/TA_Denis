<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class mtranspesan_header extends CI_Model
{

    public function __construct()
        {
            parent::__construct();
            $this->table_detail = "transaksi_detail";
            $this->table_header = "transaksi";
            $this->load->model('mtranspesan_header',"",true);
        }

    public function list_transaksi()
        {
            $sql = $this->db->get($this->table_header);
            if ($sql->num_rows() > 0) {
                return $sql->result_array();
            }
            
        }
   public function saveDataHeader($data)
        {
            if ($data != null) {
                $sql = $this->db->insert($this->table_header, $data);
                if ($this->db->affected_rows() > 0) {
                    return $this->db->insert_id();
                } else {
                    return 0;
                }
            }
        }

    public function saveDetail($data)
    {
        if ($data != null) {
            $sql = $this->db->insert($this->table_detail, $data);
            if ($this->db->affected_rows() > 0) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function detail($id = null)
    {
        if ($id != null) {
            $this->db->select("*, (SELECT nama_p FROM t_projek WHERE id = transaksi_type) as transaksi_type");
            $this->db->from($this->table_header);
            $this->db->join($this->table_detail, "transaksi_header.id = transaksi_detail.transaksi_header_id");
            $this->db->where("transaksi_header.id", $id);
            $sql = $this->db->get();

            if ($sql->num_rows() > 0) {
                return $sql->result_array();
            }
        }
    }

    public function editHeader($id = null, $data = null)
    {
        if ($id != null && $data != null) {
            $this->db->where("id", $id);
            $sql = $this->db->update($this->table_header, array("total" => $data["total"]));
            if ($this->db->affected_rows() > 0) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function deleteDetail($idHeader = null, $idDetail = null)
    {
        if ($idDetail != null) {

            $this->db->delete($this->table_detail, array('id' => $idDetail));
            if ($this->db->affected_rows() > 0) {
                $sql = "UPDATE transaksi_header 
                        SET total = (SELECT SUM(amount) FROM transaksi_detail WHERE transaksi_header_id = '" . $idHeader . "') 
                        WHERE id = $idHeader";
                $exe = $this->db->query($sql);
                if ($exe) {
                    return true;
                }
            } else {
                return false;
            }
        }
    }

    public function deleteAll($id = null)
    {
        if ($id != null) {
            $deletedetail = $this->db->delete($this->table_detail, array("transaksi_header_id" => $id));
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

