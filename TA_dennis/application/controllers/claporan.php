<?php 
	
	/**
	* 
	*/
	class claporan extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('mlaporan',"",true);
		}

		public function index()
		{
			$data["page"] = "lap/laporan" ;
			$this->load->view("atasbawah/themes",$data);
		}

    	public function reportPdf()
        {
            $years = $this->input->post('years', TRUE);
            $data= $this->mlaporan->laporan($years);
            $this->load->library('fpdf_master');
                $column_idtransaksi = "";
                $column_idpel = "";
                $column_tglpesan = "";
                $column_idsales = "";
                $column_total = "";
            foreach ($data as $row) {
                $idtransaksi = $row["idtransaksi"];
                $idpel = $row["idpel"];
                $tglpesan = $row["tglpesan"];
                $idsales = $row["idsales"];
                $total = $row["total"];
                

                $column_idtransaksi = $column_idtransaksi.$idtransaksi."\n";
                $column_idpel = $column_idpel.$idpel."\n";
                $column_tglpesan = $column_tglpesan.$tglpesan."\n";
                $column_idsales = $column_idsales.$idsales."\n";
                $column_total = $column_total.$total."\n";
                

                //Create a new PDF file
                $this->fpdf = new FPDF('P','mm',array(210,297)); //L For Landscape / P For Portrait
                $this->fpdf->AddPage();

                //Menambahkan Gambar
                //$pdf->Image('../foto/logo.png',10,10,-175);

                $this->fpdf->SetFont('Arial','B',13);
                $this->fpdf->Cell(80);
                $this->fpdf->Cell(30,10,'Laporan Data Transaksi',0,0,'C');

            }

            $this->fpdf->SetFont('Arial','B',10);
            $this->fpdf->SetFillColor(255, 255, 255);
            $this->fpdf->SetY(30);
            $this->fpdf->SetX(5);
            $this->fpdf->Cell(25,8,'Id Transaksi',1,0,'C',1);
            $this->fpdf->SetX(30);
            $this->fpdf->Cell(40,8,'Id Pelanggan',1,0,'C',1);
            $this->fpdf->SetX(70);
            $this->fpdf->Cell(25,8,'Tanggal Pesan',1,0,'C',1);
            $this->fpdf->SetX(95);
            $this->fpdf->Cell(25,8,'Id Sales',1,0,'C',1);
            $this->fpdf->SetX(120);
            $this->fpdf->Cell(50,8,'Total',1,0,'C',1);
            $this->fpdf->Ln();

            //Now show the columns
            $this->fpdf->SetFont('Arial','',10);

            $this->fpdf->SetY(38);
            $this->fpdf->SetX(5);
            $this->fpdf->MultiCell(25,6,$column_idtransaksi,1,'C');

            $this->fpdf->SetY(38);
            $this->fpdf->SetX(30);
            $this->fpdf->MultiCell(40,6,$column_idpel,1,'C');

            $this->fpdf->SetY(38);
            $this->fpdf->SetX(70);
            $this->fpdf->MultiCell(25,6,$column_tglpesan,1,'C');

            $this->fpdf->SetY(38);
            $this->fpdf->SetX(95);
            $this->fpdf->MultiCell(25,6,$column_idsales,1,'C');

            $this->fpdf->SetY(38);
            $this->fpdf->SetX(120);
            $this->fpdf->MultiCell(50,6,$column_total,1,'C');

            echo $this->fpdf->Output();
            
        }

        
}
?>