<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Transaksi</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <?php echo form_open("transaksi/saveEdit/".$detail[0]["transaksi_header_id"])?>
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    Interviewer Panel
                </div>
                <div class="panel-body">
                    <div class="form-group">

                        <label class="control-label" for="interviewer_code">Name</label>
                        <?php
                        echo form_dropdown('header[interviewer_id]', $interviewer, $detail[0]["interviewer_id"], "class='form-control' id='interviewer' readonly='readonly'");
                        ?>

                    </div>
                    <div class="form-group">
                        <label class="control-label" for="interviewer_code">No Telp</label>
                        <?php
                        $interviewername = array(
                            "name" => "interviewer_no_telp",
                            "id" => "no_telp",
                            "type" => "text",
                            "class" => "form-control",
                            "readonly" => "readonly"
                        );
                        echo form_input($interviewername);
                        ?>
                    </div>
                </div>
                <div class="panel-footer">
                    Panel Footer
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    Kota Panel
                </div>
                <div class="panel-body">
                    <form>
                        <div class="form-group">
                            <label class="control-label" for="kota_name">kota Name</label>
                            <?php
                            echo form_dropdown('header[kota_id]', $kota, $detail[0]["kota_id"], "class='form-control' id='kota' readonly='readonly'");
                            ?>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="kota_phone">kota Phone</label>
                            <?php
                            $kotaphone = array(
                                "name" => "kota_phone",
                                "id" => "kota_phone",
                                "type" => "text",
                                "class" => "form-control",
                                "readonly" => "readonly"
                            );
                            echo form_input($kotaphone);
                            ?>
                        </div>
                </div>
                <div class="panel-footer">
                    Panel Footer
                </div>
            </div>

        </div>
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <button type="submit" id="addrow" class="btn btn-default">Add Row</button>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="tabledata">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>transaksi Type</th>
                                <th>Quantity</th>
                                <th>Cost</th>
                                <th>Amount</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (!empty($detail)) {
                                $no = 1 ;
                                foreach ($detail as $transaksi) {
                                    ?>
                                    <tr>
                                        <td><?php echo $no?></td>
                                        <td><?php echo $transaksi["transaksi_type"]?></td>
                                        <td><?php echo $transaksi["qty"]?></td>
                                        <td><?php echo $transaksi["cost"]?></td>
                                        <td><?php echo $transaksi["amount"]?></td>
                                        <td><?php echo anchor("transaksi/deletedetail/".$transaksi["transaksi_header_id"]."/".$transaksi['id'],"Delete",array('onclick' => "return confirm('Do you want delete this record')"))?></td>
                                    </tr>
                                    <?php
                                    $no++ ;
                                }
                            }else {
                                ?>
                                <tr>
                                    <td colspan="6" style="text-align: center">no data found</td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th colspan="4" style="text-align: right"><label class="control-label" for="total">Total</label></th>
                                <th>
                                    <div class="form-group">
                                        <?php
                                        $kotaname = array(
                                            "name" => "header[total]",
                                            "id" => "total",
                                            "type" => "text",
                                            "class" => "form-control",
                                            "readonly" => true,
                                            "value" => $detail[0]["total"]
                                        );

                                        echo form_input($kotaname);
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
        var cusId = $("#interviewer").val() ;
        var capsId = $("#kota").val() ;
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('interviewer/getInterviewer') ?>/" + cusId,
            dataType: "json",
            success: function (value, status) {
                $("#no_telp").val(value[0].no_telp);

            }

        });

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('kota/getKota') ?>/" + capsId,
            dataType: "json",
            success: function (value, status) {
                $("#kota_phone").val(value[0].no_telp);

            }

        });

        $("#addrow").click(function () {
            var trCount = $("#tabledata tr").length;
            var no = trCount - 1;
            var row = trCount - 2;

            trO = "<tr>";
            col0 = "<td>" + no + "</td>";
            col1 = "<td><select id='type_id-" + row + "' name='detail["+row+"][transaksi_type]' class='combo form-control'></select></td>";
            col2 = "<td><input type='number' id='qty-" + row + "' name='detail["+row+"][qty]' class='form-control qty'/></td>";
            col3 = "<td><input type='text' id='cost-" + row + "' name='detail["+row+"][cost]' class='form-control' readonly='readonly'/></td>";
            col4 = "<td><input type='text' id='amount-" + row + "' name='detail["+row+"][amount]' class='form-control sum' readonly='readonly'/></td>";
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

    $(document).delegate("#interviewer", "change", function () {
        var value = $(this).val();

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('interviewer/getInterviewer') ?>/" + value,
            dataType: "json",
            success: function (value, status) {
                $("#no_telp").val(value[0].no_telp);

            }

        });
    });

    $(document).delegate("#kota", "change", function () {
        var value = $(this).val();

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('kota/getKota') ?>/" + value,
            dataType: "json",
            success: function (value, status) {
                $("#nama_k").val(value[0].nama_k);

            }

        });
    });

    $(document).delegate(".combo", "change", function () {
        var value = $(this).val();
        var id = $(this).attr("id");
        var rows = id.split("-");
        var row = rows[1];

        var urls = "<?php echo site_url('product/getDetail')?>/" + value;

        $.ajax({
            type: "GET",
            url: urls,
            dataType: "json",
            success: function (value, status) {
                if (value != null) {
                    $("#cost-" + row).val(value[0].price);
                } else {
                    $("#cost-" + row).val("");
                }

                $("#qty-" + row).focus();
            }
        });
    });

    $(document).delegate(".qty", "blur", function () {
        var value = $(this).val();
        var id = $(this).attr("id");
        var rows = id.split("-");
        var row = rows[1];

        var cost = $("#cost-" + row).val();
        var amount = cost * value;

        $("#amount-" + row).val(amount);
        calculate();

    });

    function fillCombo(row) {
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('product/getProducts') ?>",
            dataType: "json",
            success: function (data) {
                $('#type_id-' + row).empty();
                $('#type_id-' + row)
                    .append("<option value=''>-</option");
                $.each(data, function (key, value) {
                    $('#type_id-' + row)
                        .append("<option value='" + value.id + "'>"
                            + value.product_name + "</option>");
                });
            }

        });
    }

    function calculate() {
        var sum = "<?php echo $detail[0]['total']?>";
        $(".sum").each(function () {
            //add only if the value is number
            var value = $(this).val();
            if (!isNaN(value) && value.length != 0) {
                sum = parseFloat(sum) + parseFloat(value);
            }
            $("#total").val(sum);
        });
    }
</script>