<?php $this->load->view('atasbawah/header');?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tambah Pelanggan</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
	<!--  -->
	<?php 
		  echo form_open('cpelanggan/update/'.@$tpelanggan['idpel']);

        ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-yellow">
                
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="tabledata"> 
                            <thead>
                              <tr>
				<td>Id Pelanggan</td>
				<td><input class="form-control" type="text" name="tpelanggan[idpel]" id="idpel" value="<?php echo @$tpelanggan['idpel'] ?>" readonly="readonly"/></td>
			</tr>
			<tr>
				<td>Nama Pelanggan</td>
				<td><input class="form-control" type="text" name="tpelanggan[namapel]" id="namapel" value="<?php echo @$tpelanggan['namapel'] ?>"/></td>
			</tr>
			<tr>
				<td>Tanggal Lahir</td>
				<td><input class="form-control tgllahirpel" type="text" name="tpelanggan[tgllahirpel]" id="tgllahirpel" value="<?php echo @$tpelanggan['tgllahirpel'] ?>"/></td>
			</tr>
			<tr>
				<td>Status</td>
				<td>
				<input type="radio" name="tpelanggan[statuspel]" id="statuspel" value="Menikah" checked="" />Menikah &nbsp; &nbsp;
				<input type="radio" name="tpelanggan[statuspel]" id="statuspel" value="Belum Menikah" checked="" />Belum Menikah &nbsp; &nbsp;
				<input type="radio" name="tpelanggan[statuspel]" id="statuspel" value="Menjanda" checked="" />Menjanda &nbsp; &nbsp;
				<input type="radio" name="tpelanggan[statuspel]" id="statuspel" value="Menduda" checked="" />Menduda
				</td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td><input type="radio" name="tpelanggan[jeniskelpel]" id="jeniskelpel" value="Laki-Laki" checked="" />Laki-Laki &nbsp;
					<input type="radio" name="tpelanggan[jeniskelpel]" id="jeniskelpel" value="Perempuan" checked="" />Perempuan
            	</td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><input type="text" class="form-control" name="tpelanggan[alamatpel]" id="alamatpel" value="<?php echo @$tpelanggan['alamatpel'] ?>"/></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input class="form-control" type="text" name="tpelanggan[emailpel]" id="emailpel" value="<?php echo @$tpelanggan['emailpel'] ?>"/></td>
			</tr>
			<tr>
				<td>Telepon</td>
				
				<td><input class="form-control" type="text" name="tpelanggan[telppel]" id="telppel" value="<?php echo @$tpelanggan['telppel'] ?>" maxlength="15" onkeypress="return hanyaAngka(event)"/></td>
			</tr>
		<tr>
			<td><button type="submit" class="btn btn-info">Submit </button></td>
			<td><button type="reset" class="btn btn-info">Cancel </button></td>
		</tr>
			<?php  
		echo form_close();?>

                    </div>
                    <!-- /.table-responsive -->
                </div>

                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>

    </div>
    
</div>

<?php $this->load->view('atasbawah/footer');?>