<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Transaksi</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <?php echo form_open("ctransaksi/add/")?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <button type="submit" id="addhop" class="btn btn-default">Add Transaksi</button>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="tabledata">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Id Transaksi</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Nama Sales</th>
                                    <th>Tgl Pesan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                                    <?php 
                                      $no=1;
                                      if (!empty($trans)) {
                                          foreach ($trans as $n) {
                                    ?>
                                    <tbody>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $n["idtransaksi"]; ?></td>
                                        <td><?php echo $n["namapel"]; ?></td>
                                        <td><?php echo $n["namasales"]; ?></td>
                                        <td><?php echo $n["tglpesan"]; ?></td>
                                        <td> 
                                        <?php echo anchor ('ctransaksi/detail/'.$n["idtransaksi"],'Detail');?>
                                        </td>
                                    </tbody>
                                    <?php 
                                        $no++;
                                        }}
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
