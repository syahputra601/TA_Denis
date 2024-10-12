<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Detail Transaksi No. <?php echo $idtrans?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <?php
        foreach ($header as $h) {
            $idtransaksi = $h["idtransaksi"];
            $namapel = $h["namapel"];
            $alamatpel = $h["alamatpel"];
            $telppel = $h["telppel"];
            $namasales = $h["namasales"];
            $telppel = $h["telppel"];
            $tglpesan = $h["tglpesan"];
            $total = $h["total"];
        }
    ?>
    <!-- /.row -->
    <?php echo form_open("ctransaksi/index/")?>
    <div class="row">
        <!-- <div class="col-lg-12"> -->
                    <div class="form-group col-lg-12">
                        <label class="col-lg-2">No. Transaksi</label>
                        <input class="col-lg-4" type="text" value="<?php echo $idtransaksi ?>"  style="background-color:white;border:none" readonly="readonly"/>
                        <label class="col-lg-2">Tanggal Pesan</label>
                        <input class="col-lg-4" type="text" value="<?php echo $tglpesan ?>"  style="background-color:white;border:none" readonly="readonly"/>
                    </div>
                    <div class="form-group col-lg-12">
                        <label class="col-lg-2">Nama Pelanggan</label>
                        <input class="col-lg-4" type="text" value="<?php echo $namapel ?>"  style="background-color:white;border:none" readonly="readonly"/>
                        <label class="col-lg-2">Nama Sales</label>
                        <input class="col-lg-4" type="text" value="<?php echo $namasales ?>"  style="background-color:white;border:none" readonly="readonly"/>
                    </div>
                    <div class="form-group col-lg-12">
                        <label class="col-lg-2">Telp. Pelanggan</label>
                        <input class="col-lg-4" type="text" value="<?php echo $telppel ?>"  style="background-color:white;border:none" readonly="readonly"/>
                    </div>
                    <div class="form-group col-lg-12">
                        <label class="col-lg-2" for="idsales">Alamat Pelanggan</label>
                        <textarea class="col-lg-4" style="background-color:white;border:none"><?php echo $alamatpel ?></textarea>
                    </div>
                    
        <!-- </div> -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
        
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="tabledata">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Id Transaksi</th>
                                    <th>Nama Barang</th>
                                    <th>Harga Barang</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                                    <?php 
                                      $no=1;
                                      if (!empty($detail)) {
                                          foreach ($detail as $n) {
                                    ?>
                                    <tbody>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $n["idtransaksi"]; ?></td>
                                        <td><?php echo $n["namabarang"]; ?></td>
                                        <td><?php echo number_format($n["hargabarang"]); ?></td>
                                        <td><?php echo $n["jumlahbeli"]; ?></td>
                                        <td><?php echo number_format((int)$n["jumlahbeli"]*(int)$n["hargabarang"]); ?></td>
                                        
                                    </tbody>
                                    <?php 
                                        $no++;
                                        }}
                                     ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="5" style="text-align:right"><b>Grandtotal</b></th>
                                    <th><?php echo number_format($total)?></th>
                                </tr>
                            </tfoot>
                        </table>

                    </div>

                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>

                <button class="btn btn-default pull-right">Back</button>
            <!-- /.panel -->
        </div>

    </div>
    <?php echo form_close();?>
</div>
