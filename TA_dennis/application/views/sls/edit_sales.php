<?php $this->load->view('atasbawah/header');?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Sales</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->


	<?php 
		  echo form_open('csales/update/'.@$tsales['idsales']);
          
          
        ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-yellow">
                
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="tabledata"> 
                            <thead>
                              <tr>
				<td>Id Sales</td>
				<td><input type="text" name="tsales[idsales]" value="<?php echo @$tsales['idsales'] ?>" readonly="readonly"/></td>
			</tr>
			<tr>
				<td>Nama Sales</td>
				<td><input class="form-control" type="text" name="tsales[namasales]" id="namasales" value="<?php echo @$tsales['namasales'] ?>"/></td>
			</tr>
			<tr>
				<td>Tanggal Lahir</td>
				<td><input class="form-control tgllahirsales" type="text" name="tsales[tgllahirsales]" id="tgllahirsales" value="<?php echo @$tsales['tgllahirsales'] ?>"/></td>
			</tr>
			<tr>
				<td>Status Sales</td>
				<td>
				<input type="radio" name="tsales[statussales]" id="statussales" value="Menikah" checked="" />Menikah &nbsp; &nbsp;
				<input type="radio" name="tsales[statussales]" id="statussales" value="Belum Menikah" checked="" />Belum Menikah &nbsp; &nbsp;
				<input type="radio" name="tsales[statussales]" id="statussales" value="Menjanda" checked="" />Menjanda &nbsp; &nbsp;
				<input type="radio" name="tsales[statussales]" id="statussales" value="Menduda" checked="" />Menduda
				</td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td><input type="radio" name="tsales[jeniskelsales]" id="jeniskelsales" value="Laki-Laki" checked="" />Laki-Laki &nbsp; &nbsp;
					<input type="radio" name="tsales[jeniskelsales]" id="jeniskelsales" value="Perempuan" checked="" />Perempuan
				</td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><input type="text" class="form-control" name="tsales[alamatsales]" id="alamatsales" value="<?php echo @$tsales['alamatsales'] ?>"/></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input class="form-control" type="text" name="tsales[emailsales]" id="emailsales" value="<?php echo @$tsales['emailsales'] ?>"/></td>
			</tr>
			<tr>
				<td>Telepon</td>
				<td><input class="form-control" type="text" name="tsales[telpsales]" id="telpsales" value="<?php echo @$tsales['telpsales'] ?>" maxlength="15" onkeypress="return hanyaAngka(event)"/></td>
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

