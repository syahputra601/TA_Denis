<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ctransaksi extends CI_Controller 
{
    public function __construct() {
        parent::__construct();
        $this->load->model("mtransaksi","",true) ;
        $this->load->model("mpelanggan","",true) ;
        $this->load->model("mbarang","",true) ;
        $this->load->model("msales","",true) ;
    }
    
    public function index () {
        $data["page"] = "trans/index" ;
        $data["trans"] = $this->mtransaksi->list_transaksi() ;
        $this->load->view("atasbawah/themes",$data);
    }

    public function detail($notrans='') {
        $data["page"] = "trans/view" ;
        $data["idtrans"]=$notrans;
        $data["header"] = $this->mtransaksi->list_header($notrans) ;
        $data["detail"] = $this->mtransaksi->list_detail($notrans) ;
        $this->load->view("atasbawah/themes",$data);
    }
    
    public function add() {
        $data["page"] = "trans/add_trans" ;
        $data["plg"] = $this->mpelanggan->listComboPelanggan() ;
        $data["brg"] = $this->mbarang->listComboBarang() ;
        $data["sls"] = $this->msales->listComboSales() ;
        $data['idtr'] = $this->mtransaksi->getIdTrans();
        $this->load->view("atasbawah/themes",$data);
    }

    public function getBarang()
    {
        $data = $this->mbarang->list_barang();

        echo json_encode($data);
    }

    public function saveAdd() {
        $details = $this->input->post("detail");
        $header = $this->input->post("header");
        // var_dump($header);exit();
        // print_r($header);die();

        if ($header != null){
            $saveHeader = $this->mtransaksi->saveHeader($header) ;
            if ($saveHeader){
                foreach ($details as $detail) {
                    $detail["idtransaksi"] = $header['idtransaksi'];
                    $databarang = $this->mbarang->getbykode($detail['idbarang']);
                    $stok = $databarang['stokbarang'];
                    $newstok = $stok-$detail['jumlahbeli'];
                    $where = array(
                        'idbarang' => $detail['idbarang'] );
                    $dataup=array('stokbarang'=>$newstok);
                    $updatestok = $this->mbarang->update_data($where,$dataup,'tbarang');
                    $saveDetail = $this->mtransaksi->saveDetail($detail);
                }
            }
            redirect("ctransaksi");
        }

    }
    public function edit($id = null) {
        if ($id != null) {
            $data["page"] = "trans/edit" ;
            $data["plg"] = $this->mpelanggan->listComboPelanggan() ;
            $data["brg"] = $this->mbarang->listComboBarang() ;
            $data["sls"] = $this->msales->listComboSales() ;
            $data["detail"] = $this->mtransaksi->detail($id) ;

            $this->load->view("atasbawah/themes",$data);
        }
    }

    public function saveEdit($id = null) {
        $details = $this->input->post("detail");
        $header = $this->input->post("header");

        if ($id != null && $details != null) {
            $editHeader = $this->mtransaksi->editHeader($id,$header) ;
            if ($editHeader){
                foreach ($details as $detail) {
                    $detail["idtrans"] = $id ;
                    $saveDetail = $this->mtransaksi->saveDetail($detail);
                }
            }
        }
        redirect("trans/edit_trans/".$id);
    }

    public function deleteDetail($idHeader = null, $idDetail = null) {
        if ($idDetail != null && $idHeader != null) {
            $deleteDetail = $this->mtransaksi->deleteDetail($idHeader,$idDetail);
            if ($deleteDetail){
                redirect("trans/edit_trans".$idHeader);
            }
        }

    }

    public function delete($id = null) {
        if ($id != null) {
            $delete = $this->mtransaksi->deleteAll($id) ;
            redirect("trans/index") ;
        }
    }
        
}
?>