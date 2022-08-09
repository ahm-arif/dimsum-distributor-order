<?php  
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if ($_GET['form']=='add') { ?>
 	<!-- tampilkan form add data -->
	<div class="breadcrumbs breadcrumbs-fixed" id="breadcrumbs">
		<ul class="breadcrumb">
			<li>
				<i class="ace-icon fa fa-home home-icon"></i>
				<a href="?module=beranda">Beranda</a>
			</li>

			<li>
				<a href="?module=barang">Barang</a>
			</li>

			<li class="active">Tambah</li>
		</ul><!-- /.breadcrumb -->
	</div>

	<div class="page-content">
		<div class="page-header">
			<h1 style="color:#585858">
				<i class="ace-icon fa fa-edit"></i>
				Input Data Barang
			</h1>
		</div><!-- /.page-header -->

		<div class="row">
			<div class="col-xs-12">
				<!--PAGE CONTENT BEGINS-->
				<form class="form-horizontal" role="form" action="modules/barang/proses.php?act=insert" method="POST" />

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Nama</label>

						<div class="col-sm-9">
							<input type="text" class="col-xs-12 col-sm-5" name="nama" maxlength="16" autocomplete="off" required />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Harga</label>

						<div class="col-sm-9">
							<input type="text" class="col-xs-12 col-sm-5" name="harga" autocomplete="off" required />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Kategori</label>

						<div class="col-sm-9">
							<div class="radio">
								<label>
									<input type="radio" class="ace" name="kategori" value="Frozen" />
									<span class="lbl"> Frozen</span>
								</label>

								<label>
									<input type="radio" class="ace" name="kategori" value="Non Frozen" />
									<span class="lbl"> Non Frozen</span>
								</label>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Deskripsi</label>

						<div class="col-sm-9">
							<textarea class="col-xs-12 col-sm-5" name="deskripsi" rows="2" required></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Jumlah Stock</label>

						<div class="col-sm-9">
							<input type="text" class="col-xs-12 col-sm-5" name="jumlah_stock" maxlength="12" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" required />
						</div>
					</div>

					<div class="clearfix form-actions">
						<div class="col-md-offset-2 col-md-10">
							<input style="width:100px" type="submit" class="btn btn-primary" name="simpan" value="Simpan" />
							&nbsp; &nbsp; 
							<a style="width:100px" href="?module=barang" class="btn">Batal</a>
						</div>
					</div>
				</form>
				<!--PAGE CONTENT ENDS-->
			</div><!--/.span-->
		</div><!--/.row-fluid-->
	</div><!--/.page-content-->
<?php
}
// jika form edit data yang dipilih
elseif ($_GET['form']=='edit') { 
	if (isset($_GET['id'])) {
	    // fungsi query untuk menampilkan data dari tabel barang
	    $query = mysqli_query($mysqli, "SELECT * FROM barang WHERE id='$_GET[id]'") 
	    								or die('Ada kesalahan pada query tampil data ubah : '.mysqli_error($mysqli));
	    $data  = mysqli_fetch_assoc($query);
  	}
?>
	<div class="breadcrumbs breadcrumbs-fixed" id="breadcrumbs">
		<ul class="breadcrumb">
			<li>
				<i class="ace-icon fa fa-home home-icon"></i>
				<a href="?module=beranda">Beranda</a>
			</li>

			<li>
				<a href="?module=barang">Barang</a>
			</li>

			<li class="active">Ubah</li>
		</ul><!-- /.breadcrumb -->
	</div>

	<div class="page-content">
		<div class="page-header">
			<h1 style="color:#585858">
				<i class="ace-icon fa fa-edit"></i>
				Ubah Data Barang
			</h1>
		</div><!-- /.page-header -->

		<div class="row">
			<div class="col-xs-12">
				<!--PAGE CONTENT BEGINS-->
				<form class="form-horizontal" role="form" action="modules/barang/proses.php?act=update" method="POST" />

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Nama Barang</label>

						<div class="col-sm-9">
							<input type="hidden" class="col-xs-12 col-sm-5" name="id" value="<?php echo $data['id']; ?>" />
							<input type="text" class="col-xs-12 col-sm-5" name="nama" value="<?php echo $data['nama']; ?>" readonly required />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Harga</label>

						<div class="col-sm-9">
							<input type="text" class="col-xs-12 col-sm-5" name="harga" autocomplete="off" value="<?php echo $data['harga']; ?>" required />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Kategori</label>

						<div class="col-sm-9">
							<div class="radio">
							<?php  
          					if ($data['kategori']=="Frozen") { ?>
								<label>
									<input type="radio" class="ace" name="kategori" value="Frozen" checked="" />
									<span class="lbl"> Frozen</span>
								</label>

								<label>
									<input type="radio" class="ace" name="kategori" value="Non Frozen" />
									<span class="lbl"> Non Frozen</span>
								</label>
							<?php
	                  		}
	                  		else { ?>
								<label>
									<input type="radio" class="ace" name="kategori" value="Frozen" />
									<span class="lbl"> Frozen</span>
								</label>

								<label>
									<input type="radio" class="ace" name="kategori" value="Non Frozen" checked="" />
									<span class="lbl"> Non Frozen</span>
								</label>
	                  		<?php
	                  		}
	                  		?>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Deskripsi</label>

						<div class="col-sm-9">
							<textarea class="col-xs-12 col-sm-5" name="deskripsi" rows="2" required><?php echo $data['deskripsi']; ?></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Jumlah Stock</label>

						<div class="col-sm-9">
							<input type="text" class="col-xs-12 col-sm-5" name="jumlah_stock" maxlength="12" autocomplete="off" value="<?php echo $data['jumlah_stock']; ?>" required />
						</div>
					</div>
								
					<div class="clearfix form-actions">
						<div class="col-md-offset-2 col-md-10">
							<input style="width:100px" type="submit" class="btn btn-primary" name="simpan" value="Simpan" />
							&nbsp; &nbsp; 
							<a style="width:100px" href="?module=barang" class="btn">Batal</a>
						</div>
					</div>
				</form>
				<!--PAGE CONTENT ENDS-->
			</div><!--/.span-->
		</div><!--/.row-fluid-->
	</div><!--/.page-content-->
<?php
}
?>