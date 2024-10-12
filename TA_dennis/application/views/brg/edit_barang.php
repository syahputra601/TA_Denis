<?php $this->load->view('atasbawah/header');?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Barang</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
	<?php foreach($tbarang as $c){ ?>

	<?php  
		echo form_open('cbarang/update');
	?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-yellow">
                
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="tabledata"> 
                            <thead>
                              <tr>
				<td>Kode Barang</td>
				
				<td><input class="form-control" type="text" name="idbarang" readonly="readonly" value="<?php echo $c->idbarang ?>"></td>
	</tr>
	<tr>
				<td>Nama Barang</td>
				<td><input class="form-control" type="text" name="namabarang" id="namabarang" value="<?php echo $c->namabarang ?>"/></td>
			</tr>
	</tr>
	<tr>
				<td>Type</td>
				<td><select class="form-control" name="typebarang" id="typebarang">
                                    <option >Please Select Data</option>
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
				<td>
					<select class="form-control" name="kategoribarang" id="kategoribarang">
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
				<td><input class="form-control" type="text" name="keteranganbarang" id="keteranganbarang" value="<?php echo $c->keteranganbarang ?>"></td>
			</tr>
			<tr>
				<td>Berat/gram</td>
				<td><input class="form-control" type="text" name="beratbarang" id="beratbarang" value="<?php echo $c->beratbarang ?>"></td>
			</tr>
			<tr>
				<td>Stok</td>
				<td><input class="form-control" type="text" name="stokbarang" id="stokbarang" value="<?php echo $c->stokbarang ?>"></td>
			</tr>
			<tr>
				<td>Harga</td>
				<td><input class="form-control" type="text" name="hargabarang" id="hargabarang" value="<?php echo $c->hargabarang ?>"></td>
			</tr>
			
	<tr>
			<td><?php echo form_submit('mysubmit','Simpan'); ?></td>
			<td><?php echo form_reset('myreset','Batal'); ?></td>
			<?php  
		echo form_close();?>
	<?php } ?>
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