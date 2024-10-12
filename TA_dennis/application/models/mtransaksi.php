<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class mtransaksi extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table_header = "transaksi";
        $this->table_detail = "transaksi_detail";
    }

    public function list_transaksi()
    {
        $this->db->join('tpelanggan', 'tpelanggan.idpel = transaksi.idpel');
        $this->db->join('tsales', 'tsales.idsales = transaksi.idsales');
        $this->db->from($this->table_header);
        $sql = $this->db->get();
        return $sql->result_array();   
    }
    public function list_header($idtrans='')
    {
       
        $sql = $this->db->query("select a.idtransaksi, b.namapel, b.alamatpel, b.telppel, c.namasales, c.telpsales, a.tglpesan, a.total from transaksi a, tpelanggan b, tsales c where  a.idsales = c.idsales and a.idpel = b.idpel and a.idtransaksi='".$idtrans."'");
        return $sql->result_array();   
    }
    public function list_detail($idtrans='')
    {
       
        $sql = $this->db->query("select a.idtransaksi, a.idbarang, b.namabarang, b.hargabarang,a.jumlahbeli from transaksi_detail a, tbarang b where a.idbarang = b.idbarang and a.idtransaksi='".$idtrans."'");
        return $sql->result_array();   
    }
    public function getIdTrans(){
            $data = $this->db->get('transaksi');

            $count = $data->num_rows() + 1;
            if ($count < 10 ) {
                $code = "TRS-00000".$count;
            }
            elseif ($count < 100) {
                $code = "TRS-000000".$count;
            }
            else{
                $code = "TRS-0000".$count;
            }
            return $code;
        }

    public function saveHeader($data)
    {
        if ($data != null) {
            $sql = $this->db->insert($this->table_header, $data);
            
            return $sql;
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
            $this->db->select("*, (SELECT nama_s FROM tsales WHERE id = idtrans) as idtrans");
            $this->db->from($this->table_header);
            $this->db->join($this->table_detail, "transaksi.id = transaksi_detail.transaksi_id");
            $this->db->where("transaksi.id", $id);
            $sql = $this->db->get();

            if ($sql->num_rows() > 0) {
                return $sql->result_array();
            }
        }
    }

    public function editHeader($id = null, $data = null)
    {
        if ($id != null && $data != null) {
            $this->db->where("idtrans", $id);
            $sql = $this->db->update($this->table_header, array("totalharga" => $data["total"]));
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
                        SET totaltrans = (SELECT SUM(jumlahbeli) FROM transaksi_detail WHERE transaksi_id = '" . $idHeader . "') 
                        WHERE idtrans = $idHeader";
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

