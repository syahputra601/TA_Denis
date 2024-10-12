<?php $this->load->view('atasbawah/header');?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tambah Sales</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <?php echo form_open("csales/saveadd/");?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-yellow">
                
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="tabledata"> 
                            <thead>
                              <tr>
		<td>Id Sales</td>
		<td>:</td>
		<td>
			<input class="form-control" type="text" name="tsales[idsales]" id="idsales" value="<?php echo $idsales ?>" readonly="readonly"/>
		</td>
	</tr>
	<tr>
		<td>Nama Sales</td>
		<td>:</td>
		<td>
			<input class="form-control" type="text" name="tsales[namasales]" id="namasales" />
		</td>
	</tr>
	<tr>
		<td>Tanggal Lahir</td>
		<td>:</td>
		<td>
			<input class="form-control tgllahirsales" name="tsales[tgllahirsales]" id="tgllahirsales"/>
		</td>
	</tr>
	<tr>
		<td>Status Sales</td>
		<td>:</td>
		<td>
			<input type="radio" name="tsales[statussales]" id="statussales" value="Menikah" checked="" />Menikah
			<input type="radio" name="tsales[statussales]" id="statussales" value="Belum Menikah" checked="" />Belum Menikah
			<input type="radio" name="tsales[statussales]" id="statussales" value="Menjanda" checked="" />Menjanda
			<input type="radio" name="tsales[statussales]" id="statussales" value="Menduda" checked="" />Menduda
		</td>
	</tr>
	<tr>
		<td>Jenis Kelamin</td>
		<td>:</td>
		<td>
			<input type="radio" name="tsales[jeniskelsales]" id="jeniskelsales" value="Laki-Laki" checked="" />Laki-Laki
			<input type="radio" name="tsales[jeniskelsales]" id="jeniskelsales" value="Perempuan" checked="" />Perempuan
		</td>
	</tr>
		<tr>
		<td>Alamat</td>
		<td>:</td>
		<td>
			<textarea class="form-control" rows="3" name="tsales[alamatsales]" id="alamatsales"></textarea>
		</td>
	</tr>
	<tr>
		<td>Email</td>
		<td>:</td>
		<td>
			<input class="form-control" type="text" name="tsales[emailsales]" id="emailsales"/>
		</td>
	</tr>
	<tr>
		<td>Telepon</td>
		<td>:</td>
		<td>
			<input class="form-control telpsales" name="tsales[telpsales]" id="telpsales" maxlength="15" onkeypress="return hanyaAngka(event)"/>
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