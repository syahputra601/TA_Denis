
<?php $this->load->view('atasbawah/header');?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Table sales</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <?php echo form_open("csales/add/")?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <button type="submit" id="addhop" class="btn btn-default">Add sales</button>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="tabledata">
                            <thead>
		<tr align="center">
			<td>No</td>
			<td>ID Sales</td>
			<td>Nama Sales</td>
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
			foreach ($sls as $sales) {
			
		?>

		<tr align="center">
			<td><?php echo $no; ?></td>
			
			<td><?php echo $sales["idsales"]; ?></td>
			<td><?php echo $sales["namasales"]; ?></td>
			<td><?php echo $sales["tgllahirsales"]; ?></td>
			<td><?php echo $sales["jeniskelsales"]; ?></td>
			<td><?php echo $sales["statussales"]; ?></td>
			<td><?php echo $sales["alamatsales"]; ?></td>
			<td><?php echo $sales["emailsales"]; ?></td>
			<td><?php echo $sales["telpsales"]; ?></td>
			<td> 
				<?php echo anchor ('csales/edit/'.$sales["idsales"],'Edit');?> || 
				<?php echo anchor ('csales/hapus/'.$sales["idsales"],'Hapus');?>
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