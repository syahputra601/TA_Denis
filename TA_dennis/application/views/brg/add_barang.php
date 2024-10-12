<?php $this->load->view('atasbawah/header');?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tambah Barang</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <?php echo form_open("cbarang/saveadd/");?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-yellow">
                
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="tabledata"> 
                        <thead>
                            <tr>
		<td>Kode Barang</td>
		<td>:</td>
		<td>
			<input class="form-control" type="text" name="tbarang[idbarang]" id="idbarang" value="<?php echo $idbarang ?>" readonly="readonly"/>
		</td>
	</tr>
	<tr>
		<td>Nama barang</td>
		<td>:</td>
		<td>
			<input class="form-control" type="text" name="tbarang[namabarang]" id="namabarang" />
		</td>
	</tr>
	<tr>
		<td>Type</td>
		<td>:</td>
		<td>
			<select class="form-control" name="tbarang[typebarang]" id="typebarang">
                                    <option>Please Select Data</option>
                                    <option value="Lembar">Lembar</option>
                                    <option value="Batu Potong">Batu Potong</option>
                                    <option value="Lampu">Lampu</option>
                                    <option value="Aksesoris">Aksesoris</option>
                                    <option value="Tangan">Tangan</option>
                                    <option value="Roll">Roll</option>
                                </select>
		</td>
	</tr>
	<tr>
		<td>Kategori</td>
		<td>:</td>
		<td>
			<select class="form-control" name="tbarang[kategoribarang]" id="kategoribarang">
                                    <option>Please Select Data</option>
                                    <option value="Amplas">Amplas</option>
                                    <option value="Gurinda">Gurinda</option>
                                    <option value="Lampu Outdoor">Lampu Outdoor</option>
                                    <option value="Lampu Indoor">Lampu Indoor</option>
                                    <option value="Aksesoris Mobil">Aksesoris Mobil</option>
                                    <option value="Kuas">Kuas</option>
                                </select>
		</td>
	</tr>
	<tr>
		<td>Keterangan</td>
		<td>:</td>
		<td>
			<input class="form-control" type="text" name="tbarang[keteranganbarang]" id="keteranganbarang"/>
		</td>
	</tr>
	<tr>
		<td>Berat/gram</td>
		<td>:</td>
		<td>
			<input class="form-control" type="text" name="tbarang[beratbarang]" id="beratbarang" onkeypress="return hanyaAngka(event)"/>
		</td>
	</tr>
	<tr>
		<td>Stok</td>
		<td>:</td>
		<td>
			<input class="form-control" type="text" name="tbarang[stokbarang]" id="stokbarang" onkeypress="return hanyaAngka(event)"/>
		</td>
	</tr>
	<tr>
		<td>Harga</td>
		<td>:</td>
		<td>
			<input class="form-control hargabarang" name="tbarang[hargabarang]" id="telpsales" onkeypress="return hanyaAngka(event)"/>
		</td>
		</tr>
		</thead>
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