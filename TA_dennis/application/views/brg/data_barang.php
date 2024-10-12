<?php $this->load->view('atasbawah/header');?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Table Barang</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <?php echo form_open("cbarang/add/")?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <button type="submit" id="addhop" class="btn btn-default">Add Barang</button>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="tabledata">
                            <thead>
                            <tr align="center">
								<td>No</td>
								<td>Kode Barang</td>
								<td>Nama Barang</td>
								<td>Type</td>
								<td>Kategori</td>
								<td>Keterangan</td>
								<td>Berat/gram</td>
								<td>Stok</td>
								<td>Harga</td>
								<td>Aksi</td>
							</tr>

                            </thead>
                            <tbody>

				            <?php 
								$no=1;
								foreach ($brg as $barang) {
								
							?>

							<tr align="center">
								<td><?php echo $no; ?></td>
								
								<td><?php echo $barang["idbarang"]; ?></td>
								<td><?php echo $barang["namabarang"]; ?></td>
								<td><?php echo $barang["typebarang"]; ?></td>
								<td><?php echo $barang["kategoribarang"]; ?></td>
								<td><?php echo $barang["keteranganbarang"]; ?></td>
								<td><?php echo $barang["beratbarang"]; ?></td>
								<td><?php echo $barang["stokbarang"]; ?></td>
								<td><?php echo $barang["hargabarang"]; ?></td>
								<td> 
									<?php echo anchor ('cbarang/edit/'.$barang["idbarang"],'Edit');?> || 
									<?php echo anchor ('cbarang/hapus/'.$barang["idbarang"],'Hapus');?>
								</td>   
								
							</tr>

							<?php 
								$no++;
							}
							?>
                            </tbody>
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