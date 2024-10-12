<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Transaksi</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <?php echo form_open("ctransaksi/saveAdd/")?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-red">
                <div class="panel-heading">
                    Interviewer Panel
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label>Id Transaksi</label>
                        <input class="form-control" type="text" name="header[idtransaksi]" id="idtransaksi" value="<?php echo $idtr ?>" readonly="readonly"/>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for=" ">Nama Pelanggan</label>
                        <?php echo form_dropdown('header[idpel]', $plg, '', "class='form-control' id='idpel'");?>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="idsales">Nama Sales</label>
                        <?php echo form_dropdown('header[idsales]', $sls, '', "class='form-control' id='idsales'");?>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Pesan</label>
                        <input class="form-control tglpesan" type="text" readonly value="<?php echo date('Y-m-d') ?>" name="header[tglpesan]" id="tglpesan"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <button type="button" id="addrow" class="btn btn-default">Add Row</button>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="tabledata">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Total Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <!-- add row using javascript -->
                            </tbody>
                            <tfoot>
                            <tr>
                                <th colspan="4" style="text-align: right"><label class="control-label" for="total">Total</label></th>
                                <th>
                                    <div class="form-group">
                                        <?php
                                        $total = array(
                                            "name" => "header[total]",
                                            "id" => "total",
                                            "type" => "text",
                                            "class" => "form-control",
                                            "readonly" => "true",
                                        );

                                        echo form_input($total);
                                        ?>
                                    </div>
                                </th>
                                <th></th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                   <?php
                   echo form_submit("save","Save","class='btn btn-success'") ;

                   ?>
                </div>

                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>

    </div>
    <?php echo form_close();?>
</div>

<script>

    $(document).ready(function () {
        $("#addrow").click(function () {
            var trCount = $("#tabledata tr").length;
            var no = trCount - 1;
            var row = trCount - 2;

            trO = "<tr>";
            col0 = "<td>" + no + "</td>";
            col1 = "<td><select id='idbarang-" + row + "' name='detail["+row+"][idbarang]' class='combo form-control'></select></td>";
            col2 = "<td><input type='text' id='jumlahbeli-" + row + "' name='detail["+row+"][jumlahbeli]' class='form-control sum'/></td>";
            col3 = "<td><input type='text' id='harga-" + row + "' name='harga"+row+"' class='form-control' disabled/></td>";
            col4 = "<td><input type='text' id='total-" + row + "' name='total"+row+"' class='form-control sumtotal' disabled/></td>";
            col5 = "<td><button type='submit' id='delete-" + row + "' class='btn btn-default rowdel'>delete</button></td>";
            trC = "</tr>";

            th = trO + col0 + col1 + col2 + col3 + col4 + col5 + trC;
            $("#tabledata tbody").append(th);

            $(".rowdel").click(function () {
                var tr = $(this).parent().parent();//tr
                tr.remove();
                calculate();
            });

            fillCombo(row);
            return false;
        });
    });



    $(document).delegate(".combo", "change", function () {
        var value = $(this).val();
        var id = $(this).attr('id');
        id = id.split("-")[1];

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('cbarang/getBarang') ?>/" + value,
            dataType: "json",
            success: function (value) {
                $("#harga-"+id).val(value[0].hargabarang);
            }

        });
    });

    $(document).delegate("#idpel", "change", function () {
        var value = $(this).val();

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('cpelanggan/getPelanggan') ?>/" + value,
            dataType: "json",
            success: function (value, status) {
                $("#namapel").val(value[0].namapel), $("#alamatpel").val(value[0].alamatpel);

            }

        });
    });

    

    // $(document).delegate(".combo", "change", function () {
    //     var value = $(this).val();
    //     var idbarang = $(this).attr("idbarang");
    //     var rows = idbarang.split("-");
    //     var row = rows[1];

    //     var urls = "<?php echo site_url('cbarang/getDetail')?>/" + value;

    //     $.ajax({
    //         type: "GET",
    //         url: urls,
    //         dataType: "json",
    //         success: function (value, status) {
    //             if (value != null) {
    //                 $("#cost-" + row).val(value[0].price);
    //             } else {
    //                 $("#cost-" + row).val("");
    //             }

    //             $("#jumlahbeli-" + row).focus();
    //         }
    //     });
    // });

    $(document).delegate(".sum", "blur", function () {
        var value = $(this).val();
        var id = $(this).attr("id");
        var rows = id.split("-");
        var row = rows[1];

        var cost = $("#harga-" + row).val();
        var amount = cost * value;

        $("#total-" + row).val(amount);
        calculate();
    });

    function fillCombo(row) {
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('ctransaksi/getBarang') ?>",
            dataType: "json",
            success: function (data) {
                $('#idbarang-' + row).empty();
                $('#idbarang-' + row)
                    .append("<option value=''>-</option");
                $.each(data, function (key, value) {
                    $('#idbarang-' + row)
                        .append("<option value='" + value.idbarang + "'>"
                            + value.namabarang + "</option>");
                });
            }

        });
    }

    // $('.sum').blur(function(){
    //     var id = $(this).attr('id');
    //     id = id.split('-')[1];
    //     var qty = $(this).val();
    //     var price = $('#harga-'+id).val();
    //     var total = (qty * price);
    //     $('#total-'+id).val();
    // })

    function calculate() {
        var sum = 0;
        $(".sumtotal").each(function () {
            //add only if the value is number
            var value = $(this).val();
            if (!isNaN(value) && value.length != 0) {
                sum += parseFloat(value);
            }
            $("#total").val(sum);
        });
    }
</script>