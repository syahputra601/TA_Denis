
<?php $this->load->view('atasbawah/header');?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Table Pelanggan</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <?php echo form_open("cpelanggan/add/")?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <button type="submit" id="addhop" class="btn btn-default">Add Pelanggan</button>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="tabledata">
                            <thead>
		<tr align="center">
			<td>No</td>
			<td>ID pelanggan</td>
			<td>Nama pelanggan</td>
			<td>Tanggal Lahir</td>
			<td>Status</td>
			<td>Jenis Kelamin</td>
			<td>Alamat</td>
			<td>Email</td>
			<td>Telepon</td>
			<td>Aksi</td>
		</tr>

		<?php 
			$no=1;
			foreach ($plg as $pelanggan) {
			
		?>

		<tr align="center">
			<td><?php echo $no; ?></td>
			
			<td><?php echo $pelanggan["idpel"]; ?></td>
			<td><?php echo $pelanggan["namapel"]; ?></td>
			<td><?php echo $pelanggan["tgllahirpel"]; ?></td>
			<td><?php echo $pelanggan["statuspel"]; ?></td>
			<td><?php echo $pelanggan["jeniskelpel"]; ?></td>
			<td><?php echo $pelanggan["alamatpel"]; ?></td>
			<td><?php echo $pelanggan["emailpel"]; ?></td>
			<td><?php echo $pelanggan["telppel"]; ?></td>
			<td> 
				<?php echo anchor ('cpelanggan/edit/'.$pelanggan["idpel"],'Edit');?> || 
				<?php echo anchor ('cpelanggan/hapus/'.$pelanggan["idpel"],'Hapus');?>
			</td>   
			
		</tr>

		<?php 
			$no++;
		}
		?>
	</table>
                    </div>
                    <!-- /.table-responsive -->
                </div>

                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>

    </div>
    <?php echo form_close();?>
</div>


<?php $this->load->view('atasbawah/footer');?>
<!-- <!DOCTYPE html>
<html>
<head>
	<title>Pelanggan</title>
</head>
<body >
	<h2>Tampil Pelanggan</h2>
	<h3><?php echo anchor('cpelanggan/add','Add');?></h3>

	
	
	<table border="1" width="1000">
		<tr align="center">
			<td>No</td>
			<td>ID pelanggan</td>
			<td>Nama pelanggan</td>
			<td>Tanggal Lahir</td>
			<td>Jenis Kelamin</td>
			<td>Status</td>
			<td>Alamat</td>
			<td>Email</td>
			<td>Telepon</td>
			<td>Aksi</td>
		</tr>

		<?php 
			$no=1;
			foreach ($plg as $pelanggan) {
			
		?>

		<tr align="center">
			<td><?php echo $no; ?></td>
			
			<td><?php echo $pelanggan["idpel"]; ?></td>
			<td><?php echo $pelanggan["namapel"]; ?></td>
			<td><?php echo $pelanggan["tgllahirpel"]; ?></td>
			<td><?php echo $pelanggan["jeniskelpel"]; ?></td>
			<td><?php echo $pelanggan["statuspel"]; ?></td>
			<td><?php echo $pelanggan["alamatpel"]; ?></td>
			<td><?php echo $pelanggan["emailpel"]; ?></td>
			<td><?php echo $pelanggan["telppel"]; ?></td>
			<td> 
				<?php echo anchor ('cpelanggan/edit/'.$pelanggan["idpel"],'Edit');?> || 
				<?php echo anchor ('cpelanggan/hapus/'.$pelanggan["idpel"],'Hapus');?>
			</td>   
			
		</tr>

		<?php 
			$no++;
		}
		?>
	</table>
</body>
</html> -->