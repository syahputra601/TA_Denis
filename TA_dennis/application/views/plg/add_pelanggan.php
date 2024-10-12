<?php $this->load->view('atasbawah/header');?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tambah Pelanggan</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <?php echo form_open("cpelanggan/saveadd/");?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-yellow">
                
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="tabledata"> 
                            <thead>
                              <tr>
		<td>Id Pelanggan</td>
		<td>:</td>
		<td>
			<input class="form-control" type="text" name="tpelanggan[idpel]" id="idpel" value="<?php echo $idpel ?>" readonly="readonly"/>
		</td>
	</tr>
	<tr>
		<td>Nama Pelanggan</td>
		<td>:</td>
		<td>
			<input class="form-control" type="text" name="tpelanggan[namapel]" id="namapel" />
		</td>
	</tr>
	<tr>
		<td>Tanggal Lahir</td>
		<td>:</td>
		<td>
			<input class="form-control tgllahirpel" name="tpelanggan[tgllahirpel]" id="tgllahirpel"/>
		</td>
	</tr>
	<tr>
		<td>Status</td>
		<td>:</td>
		<td>
			<input type="radio" name="tpelanggan[statuspel]" id="statuspel" value="Menikah" checked="" />Menikah
			<input type="radio" name="tpelanggan[statuspel]" id="statuspel" value="Belum Menikah" checked="" />Belum Menikah
			<input type="radio" name="tpelanggan[statuspel]" id="statuspel" value="Menjanda" checked="" />Menjanda
			<input type="radio" name="tpelanggan[statuspel]" id="statuspel" value="Menduda" checked="" />Menduda
		</td>
	</tr>
	<tr>
		<td>Jenis Kelamin</td>
		<td>:</td>
		<td>
			<input type="radio" name="tpelanggan[jeniskelpel]" id="jeniskelpel" value="Laki-Laki" checked="" />Laki-Laki
			<input type="radio" name="tpelanggan[jeniskelpel]" id="jeniskelpel" value="Perempuan" checked="" />Perempuan
		</td>
	</tr>
		<tr>
		<td>Alamat</td>
		<td>:</td>
		<td>
			<textarea class="form-control" rows="3" name="tpelanggan[alamatpel]" id="alamatpel"></textarea>
		</td>
	</tr>
	<tr>
		<td>Email</td>
		<td>:</td>
		<td>
			<input class="form-control" type="text" name="tpelanggan[emailpel]" id="emailpel"/>
		</td>
	</tr>
	<tr>
		<td>Telepon</td>
		<td>:</td>
		<td>
			<input class="form-control telppel" name="tpelanggan[telppel]" id="telppel" maxlength="12" onkeypress="return hanyaAngka(event)"/>
		</td>
	</tr>
	<tr>
			<td><?php echo form_submit('mysubmit','Simpan'); ?></td>
			<td><?php echo form_reset('myreset','Batal'); ?></td>
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