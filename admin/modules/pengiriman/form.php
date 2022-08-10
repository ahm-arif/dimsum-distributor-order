<?php
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if (isset($_GET['form']) && $_GET['form'] =='add') { ?>
	<script type="text/javascript">
		function hitung_berat() {
	        bil1 = document.frmpengiriman.berat_barang.value;
	        if (bil1=='') {
	            var hasil = 0;
	        } 
	        else {
	            var hasil = eval(bil1) * 10000;
	        };
	        document.frmpengiriman.biaya_kirim.value=(hasil);
	    }
	</script>
 	<!-- tampilkan form add data -->
	<div class="breadcrumbs breadcrumbs-fixed" id="breadcrumbs">
		<ul class="breadcrumb">
			<li>
				<i class="ace-icon fa fa-home home-icon"></i>
				<a href="?module=beranda">Beranda</a>
			</li>

			<li>
				<a href="?module=pengiriman">Pengiriman</a>
			</li>

			<li class="active">Tambah</li>
		</ul><!-- /.breadcrumb -->
	</div>

	<div class="page-content">
		<div class="page-header">
			<h1 style="color:#585858">
				<i class="ace-icon fa fa-edit"></i>
				Input Pengiriman
			</h1>
		</div><!-- /.page-header -->

		<div class="row">
			<div class="col-xs-12">
				<!--PAGE CONTENT BEGINS-->
				<form class="form-horizontal" role="form" action="modules/pengiriman/proses.php?act=insert" method="POST" name="frmpengiriman" />

					<div class="form-group">
						<?php  
						// fungsi untuk membuat no pengiriman
			            $query_id = mysqli_query($mysqli, "SELECT RIGHT(no_pengiriman,3) as kode FROM pengiriman
			                                            ORDER BY no_pengiriman DESC LIMIT 1")
			                                            or die('Ada kesalahan pada query tampil no penerimaan : '.mysqli_error($mysqli));

			            $count = mysqli_num_rows($query_id);

			            if ($count <> 0) {
			                // mengambil data no_pengiriman
			                $data_id = mysqli_fetch_assoc($query_id);

			                $kode = $data_id['kode']+1;
			            } else {
			                $kode = 1;
			            }

			            // buat no_pengiriman
			            $huruf         = "OR-";
			            $idDistributor    = 001;
						$year          = gmdate("y");
						$buat_id       = str_pad($kode, 12, "0", STR_PAD_LEFT);
						$no_pengiriman = "$huruf$year$idDistributor$buat_id";
						?>
						<label class="col-sm-2 control-label no-padding-right">No. Pengiriman</label>

						<div class="col-sm-4">
							<input type="text" class="form-control" name="no_pengiriman" value="<?php echo $no_pengiriman; ?>" readonly required />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Tanggal</label>

						<div class="col-sm-4">
							<div class="input-group">
								<input class="form-control date-picker" type="text" data-date-format="dd-mm-yyyy" name="tgl_pengiriman" value="<?php echo date("d-m-Y"); ?>" required />
								<span class="input-group-addon">
									<i class="fa fa-calendar bigger-110"></i>
								</span>
							</div>
						</div>
					</div>

					<div class="hr hr-16 dotted"></div>
					
					<?php
					// fungsi query untuk menampilkan data distributor dari tabel pelanggan 
								$query_distributor = mysqli_query($mysqli, "SELECT nama_pelanggan,alamat FROM pelanggan
																WHERE is_distributor = 'Y'
																ORDER BY nama_pelanggan ASC")
																or die('Ada kesalahan pada query tampil data pelanggan: '.mysqli_error($mysqli));

	                            $data = mysqli_fetch_assoc($query_distributor); 
									$nama_distributor 	= $data['nama_pelanggan'];
									$alamat_distributor = $data['alamat'];
									?>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Nama Pengirim</label>

						<div class="col-sm-4">
								<input type="text" class="form-control" id="pengirim" name="pengirim" value="<?php echo $nama_distributor;?>" readonly required />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Alamat</label>

						<div class="col-sm-4">
							<textarea class="form-control" id="alamat_pengirim" name="alamat_pengirim" rows="2" readonly required><?php echo $alamat_distributor;?></textarea>
						</div>
					</div>

					<div class="hr hr-16 dotted"></div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Nama Penerima</label>

						<div class="col-sm-4">
							<div class="input-group">
								<input type="hidden" id="id_penerima" name="id_penerima" />
								<input type="text" class="form-control" id="penerima" name="penerima" readonly required />
								<a class="input-group-addon" data-toggle="modal" href="#modal-form">
									<i class="ace-icon fa fa-search"></i>
								</a>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Alamat</label>

						<div class="col-sm-4">
							<textarea class="form-control" id="alamat_penerima" name="alamat_penerima" rows="2" readonly required></textarea>
						</div>
					</div>

					<div class="hr hr-16 dotted"></div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Nama Barang</label>

						<div class="col-sm-4">
							<div class="input-group">
								<input type="text" class="form-control" id="nama_barang" name="nama_barang" readonly required />
								<a class="input-group-addon" data-toggle="modal" href="#modal-form1">
									<i class="ace-icon fa fa-search"></i>
								</a>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Jumlah</label>

						<div class="col-sm-4">
							<input type="text" class="form-control" name="jumlah_barang"  autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" required />
						</div>
					</div>

					<div class="clearfix form-actions">
						<div class="col-md-offset-2 col-md-10">
							<input style="width:100px" type="submit" class="btn btn-primary" name="simpan" value="Simpan" />
							&nbsp; &nbsp;
							<a style="width:100px" href="?module=pengiriman" class="btn">Batal</a>
						</div>
					</div>
				</form>
				<!--PAGE CONTENT ENDS-->
			</div><!--/.span-->
		</div><!--/.row-fluid-->
	</div><!--/.page-content-->
	
	<div id="modal-form" class="modal" tabindex="-1">
		<div style="width:800px" class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="blue bigger">Data Pelanggan</h4>
				</div>

				<div class="modal-body">
					<div class="row">
						<div class="col-xs-12">
							<table id="dynamic-table" class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th>No.</th>
										<th>No. KTP</th>
										<th>Nama</th>
										<th>Alamat</th>
										<th></th>
									</tr>
								</thead>

								<tbody>
								<?php
								$no = 1;
								// fungsi query untuk menampilkan data dari tabel ikan masuk, ikan dan nelayan
								$query = mysqli_query($mysqli, "SELECT no_ktp,nama_pelanggan,alamat FROM pelanggan
																WHERE is_distributor = 'N'
																ORDER BY nama_pelanggan ASC")
																or die('Ada kesalahan pada query tampil data pelanggan: '.mysqli_error($mysqli));

	                            while ($data = mysqli_fetch_assoc($query)) { 
									$no_ktp         = $data['no_ktp'];
									$nama_pelanggan = $data['nama_pelanggan'];
									$alamat         = $data['alamat'];
	                            ?>
	                            	<tr>
										<td width="30" class="center"><?php echo $no; ?></td>
										<td width="100" class="center"><?php echo $no_ktp; ?></td>
										<td width="150"><?php echo $nama_pelanggan; ?></td>
										<td width="200"><?php echo $alamat; ?></td>

										<td width="50" class="center">
											<div class="action-buttons">
												<button data-rel="tooltip" data-placement="top" title="Pilih" class="pilih_pelanggan tooltip-info btn btn-primary btn-xs" data-id-p="<?php echo $no_ktp; ?>" data-nama-p="<?php echo $nama_pelanggan; ?>" data-alamat-p="<?php echo $alamat; ?>">
													<i class="ace-icon fa fa-check bigger-130 icon-only"></i>
												</button>
											</div>
										</td>
									</tr>
								<?php
	                            	$no++;
	                            } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="modal-form1" class="modal" tabindex="-1">
		<div style="width:800px" class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="blue bigger">Data Barang</h4>
				</div>

				<div class="modal-body">
					<div class="row">
						<div class="col-xs-12">
							<table id="dynamic-table" class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th>No.</th>
										<th>Nama Barang</th>
										<th>Kategori</th>
										<th>Deskripsi</th>
										<th></th>
									</tr>
								</thead>

								<tbody>
								<?php
								$no = 1;
								// fungsi query untuk menampilkan data dari tabel ikan masuk, ikan dan nelayan
								$query = mysqli_query($mysqli, "SELECT * FROM barang
																ORDER BY nama ASC")
																or die('Ada kesalahan pada query tampil data pelanggan: '.mysqli_error($mysqli));

	                            while ($data = mysqli_fetch_assoc($query)) { 
									$nama_barang  = $data['nama'];
									$kategori       = $data['kategori'];
									$deskripsi = $data['deskripsi'];
	                            ?>
	                            	<tr>
										<td width="30" class="center"><?php echo $no; ?></td>
										<td width="150"><?php echo $nama_barang; ?></td>
										<td width="50"><?php echo $kategori; ?></td>
										<td width="250"><?php echo $deskripsi; ?></td>

										<td width="50" class="center">
											<div class="action-buttons">
												<button data-rel="tooltip" data-placement="top" title="Pilih" class="pilih_barang tooltip-info btn btn-primary btn-xs" data-id-k="<?php echo $nama_barang; ?>">
													<i class="ace-icon fa fa-check bigger-130 icon-only"></i>
												</button>
											</div>
										</td>
									</tr>
								<?php
	                            	$no++;
	                            } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="assets/js/jquery.min.js"></script>

	<!-- Javascript untuk popup modal Edit--> 
	<script type="text/javascript">
	   	$(document).on('click','.pilih_pelanggan',function(){
			var id_penerima     = $(this).attr('data-id-p');
			var nama_penerima   = $(this).attr('data-nama-p');
			var alamat_penerima = $(this).attr('data-alamat-p');

			$('#id_penerima').val(id_penerima);
			$('#penerima').val(nama_penerima);
			$('#alamat_penerima').val(alamat_penerima);

  		   	$("#modal-form").modal('hide');
	    });
	</script>

	<!-- Javascript untuk popup modal Edit--> 
	<script type="text/javascript">
	   	$(document).on('click','.pilih_barang',function(){
			var nama_barang  = $(this).attr('data-id-k');

			$('#nama_barang').val(nama_barang);

  		   	$("#modal-form1").modal('hide');
	    });
	</script>
<?php
}
// jika form edit data yang dipilih
elseif (isset($_GET['form']) && $_GET['form'] =='edit') {
	if (isset($_GET['id'])) {
	    // fungsi query untuk menampilkan data dari tabel pengiriman
	    $query = mysqli_query($mysqli, "SELECT a.no_pengiriman,a.tgl_pengiriman,a.pengirim,a.penerima,a.alamat_penerima,a.nama_barang,a.jumlah_barang,a.status,
										b.no_ktp as id_pelanggan,b.nama_pelanggan
										FROM pengiriman as a INNER JOIN pelanggan as b
										ON a.penerima=b.no_ktp
										WHERE a.no_pengiriman='$_GET[id]'")
	    								or die('Ada kesalahan pada query tampil data ubah : '.mysqli_error($mysqli));
	    $data  = mysqli_fetch_assoc($query);

		$no_pengiriman   = $data['no_pengiriman'];
		
		$tanggal         = $data['tgl_pengiriman'];
		$tgl             = explode('-',$tanggal);
		$tgl_pengiriman  = $tgl[2]."-".$tgl[1]."-".$tgl[0];
		
		$id_penerima     = $data['penerima'];
		$nama_penerima   = $data['nama_pelanggan'];
		$alamat_penerima = $data['alamat_penerima'];
		$nama_barang     = $data['nama_barang'];
		$jumlah_barang   = $data['jumlah_barang'];
		$status          = $data['status'];
	}
?>
	<!-- <script type="text/javascript">
		function hitung_berat() {
	        bil1 = document.frmpengiriman.berat_barang.value;
	        if (bil1=='') {
	            var hasil = 0;
	        } 
	        else {
	            var hasil = eval(bil1) * 10000;
	        };
	        document.frmpengiriman.biaya_kirim.value=(hasil);
	    }
	</script> -->

	<div class="breadcrumbs breadcrumbs-fixed" id="breadcrumbs">
		<ul class="breadcrumb">
			<li>
				<i class="ace-icon fa fa-home home-icon"></i>
				<a href="?module=beranda">Beranda</a>
			</li>

			<li>
				<a href="?module=pengiriman">Pengiriman</a>
			</li>

			<li class="active">Ubah</li>
		</ul><!-- /.breadcrumb -->
	</div>

	<div class="page-content">
		<div class="page-header">
			<h1 style="color:#585858">
				<i class="ace-icon fa fa-edit"></i>
				Ubah Pengiriman
			</h1>
		</div><!-- /.page-header -->

		<div class="row">
			<div class="col-xs-12">
				<!--PAGE CONTENT BEGINS-->
				<form class="form-horizontal" role="form" action="modules/pengiriman/proses.php?act=update" method="POST" name="frmpengiriman" />
					
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">No. Pengiriman</label>

						<div class="col-sm-4">
							<input type="text" class="form-control" name="no_pengiriman" value="<?php echo $no_pengiriman; ?>" readonly required />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Tanggal</label>

						<div class="col-sm-4">
							<div class="input-group">
								<input class="form-control date-picker" type="text" data-date-format="dd-mm-yyyy" name="tgl_pengiriman" value="<?php echo $tgl_pengiriman; ?>" required />
								<span class="input-group-addon">
									<i class="fa fa-calendar bigger-110"></i>
								</span>
							</div>
						</div>
					</div>

					<div class="hr hr-16 dotted"></div>

					<?php
					// fungsi query untuk menampilkan data distributor dari tabel pelanggan 
					$query_distributor = mysqli_query($mysqli, "SELECT nama_pelanggan,alamat FROM pelanggan
													WHERE is_distributor = 'Y'
													ORDER BY nama_pelanggan ASC")
													or die('Ada kesalahan pada query tampil data pelanggan: '.mysqli_error($mysqli));

					$data = mysqli_fetch_assoc($query_distributor); 
						$nama_distributor 	= $data['nama_pelanggan'];
						$alamat_distributor = $data['alamat'];
						?>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Nama Pengirim</label>

						<div class="col-sm-4">
							<div class="input-group">
								<input type="text" class="form-control" id="pengirim" name="pengirim" value="<?php echo $nama_distributor; ?>" readonly required />
								<a class="input-group-addon" data-toggle="modal" href="#modal-form">
									<i class="ace-icon fa fa-search"></i>
								</a>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Alamat</label>

						<div class="col-sm-4">
							<textarea class="form-control" id="alamat_pengirim" name="alamat_pengirim" rows="2" readonly required><?php echo $alamat_distributor; ?></textarea>
						</div>
					</div>

					<div class="hr hr-16 dotted"></div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Nama Penerima</label>

						<div class="col-sm-4">
							<div class="input-group">
								<input type="hidden" id="id_penerima" name="id_penerima" value="<?php echo $id_penerima; ?>"/>
								<input type="text" class="form-control" id="penerima" name="penerima" value="<?php echo $nama_penerima; ?>" readonly required />
								<a class="input-group-addon" data-toggle="modal" href="#modal-form">
									<i class="ace-icon fa fa-search"></i>
								</a>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Alamat</label>

						<div class="col-sm-4">
							<textarea class="form-control" name="alamat_penerima" rows="2" required><?php echo $alamat_penerima; ?></textarea>
						</div>
					</div>

					<div class="hr hr-16 dotted"></div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Nama Barang</label>

						<div class="col-sm-4">
							<input type="text" class="form-control" value="<?php echo $nama_barang; ?>" name="nama_barang" autocomplete="off" required />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Jumlah</label>

						<div class="col-sm-4">
							<input type="text" class="form-control" name="jumlah_barang"  autocomplete="off" value="<?php echo $jumlah_barang; ?>" required />
						</div>
					</div>

					<div class="hr hr-16 dotted"></div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Status</label>

						<div class="col-sm-9">
							<div class="radio">
							<?php  
							if ($status=='Proses Pengiriman') { ?>
								<label>
									<input type="radio" class="ace" name="status" value="Proses Pengiriman" checked="" />
									<span class="lbl"> Proses Pengiriman</span>
								</label>

								<label>
									<input type="radio" class="ace" name="status" value="Barang Terkirim" />
									<span class="lbl"> Barang Terkirim</span>
								</label>
							<?php
							} else { ?>
								<label>
									<input type="radio" class="ace" name="status" value="Proses Pengiriman" />
									<span class="lbl"> Proses Pengiriman</span>
								</label>

								<label>
									<input type="radio" class="ace" name="status" value="Barang Terkirim" checked="" />
									<span class="lbl"> Barang Terkirim</span>
								</label>
							<?php
							}
							?>
							</div>
						</div>
					</div>

					<div class="clearfix form-actions">
						<div class="col-md-offset-2 col-md-10">
							<input style="width:100px" type="submit" class="btn btn-primary" name="simpan" value="Simpan" />
							&nbsp; &nbsp;
							<a style="width:100px" href="?module=pengiriman" class="btn">Batal</a>
						</div>
					</div>
				</form>
				<!--PAGE CONTENT ENDS-->
			</div><!--/.span-->
		</div><!--/.row-fluid-->
	</div><!--/.page-content-->
	
	<div id="modal-form" class="modal" tabindex="-1">
		<div style="width:800px" class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="blue bigger">Data Pelanggan</h4>
				</div>

				<div class="modal-body">
					<div class="row">
						<div class="col-xs-12">
							<table id="dynamic-table" class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th>No.</th>
										<th>No. KTP</th>
										<th>Nama</th>
										<th>Alamat</th>
										<th></th>
									</tr>
								</thead>

								<tbody>
								<?php
								$no = 1;
								// fungsi query untuk menampilkan data dari tabel pelanggan
								$query = mysqli_query($mysqli, "SELECT no_ktp,nama_pelanggan,alamat FROM pelanggan
																WHERE is_distributor = 'N'
																ORDER BY nama_pelanggan ASC")
																or die('Ada kesalahan pada query tampil data pelanggan: '.mysqli_error($mysqli));

	                            while ($data = mysqli_fetch_assoc($query)) { 
									$no_ktp         = $data['no_ktp'];
									$nama_pelanggan = $data['nama_pelanggan'];
									$alamat         = $data['alamat'];
	                            ?>
	                            	<tr>
										<td width="30" class="center"><?php echo $no; ?></td>
										<td width="100" class="center"><?php echo $no_ktp; ?></td>
										<td width="150"><?php echo $nama_pelanggan; ?></td>
										<td width="200"><?php echo $alamat; ?></td>

										<td width="50" class="center">
											<div class="action-buttons">
												<button data-rel="tooltip" data-placement="top" title="Pilih" class="pilih_pelanggan tooltip-info btn btn-primary btn-xs" data-id-p="<?php echo $no_ktp; ?>" data-nama-p="<?php echo $nama_pelanggan; ?>" data-alamat-p="<?php echo $alamat; ?>">
													<i class="ace-icon fa fa-check bigger-130 icon-only"></i>
												</button>
											</div>
										</td>
									</tr>
								<?php
	                            	$no++;
	                            } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="modal-form1" class="modal" tabindex="-1">
		<div style="width:800px" class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="blue bigger">Data Kendaraan</h4>
				</div>

				<div class="modal-body">
					<div class="row">
						<div class="col-xs-12">
							<table id="dynamic-table" class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th>No.</th>
										<th>No. Kendaraan</th>
										<th>Merk</th>
										<th>Supir</th>
										<th></th>
									</tr>
								</thead>

								<tbody>
								<?php
								$no = 1;
								// fungsi query untuk menampilkan data dari tabel ikan masuk, ikan dan nelayan
								$query = mysqli_query($mysqli, "SELECT * FROM barang
																ORDER BY nama_barang ASC")
																or die('Ada kesalahan pada query tampil data pelanggan: '.mysqli_error($mysqli));

	                            while ($data = mysqli_fetch_assoc($query)) { 
									$nama_barang  = $data['nama_barang'];
	                            ?>
	                            	<tr>
										<td width="30" class="center"><?php echo $no; ?></td>
										<td width="100" class="center"><?php echo $nama_barang; ?></td>
										<td width="150"><?php echo $kategori; ?></td>
										<td width="150"><?php echo $deskripsi; ?></td>

										<td width="50" class="center">
											<div class="action-buttons">
												<button data-rel="tooltip" data-placement="top" title="Pilih" class="pilih_barang tooltip-info btn btn-primary btn-xs" data-id-k="<?php echo $id; ?>" data-nama-s="<?php echo $id; ?>">
													<i class="ace-icon fa fa-check bigger-130 icon-only"></i>
												</button>
											</div>
										</td>
									</tr>
								<?php
	                            	$no++;
	                            } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="assets/js/jquery.min.js"></script>

	<!-- Javascript untuk popup modal Edit--> 
	<script type="text/javascript">
	   	$(document).on('click','.pilih_pelanggan',function(){
			var id_penerima     = $(this).attr('data-id-p');
			var penerima   = $(this).attr('data-nama-p');
			var alamat_penerima = $(this).attr('data-alamat-p');

			$('#id_penerima').val(id_penerima);
			$('#penerima').val(penerima);
			$('#alamat_penerima').val(alamat_penerima);

  		   	$("#modal-form").modal('hide');
	    });
	</script>

	<!-- Javascript untuk popup modal Edit--> 
	<script type="text/javascript">
	   	$(document).on('click','.pilih_barang',function(){
			var nama_barang  = $(this).attr('data-id-k');

			$('#nama_barang').val(nama_barang);

  		   	$("#modal-form1").modal('hide');
	    });
	</script>
<?php
}
// jika form edit data yang dipilih
elseif (isset($_GET['form']) && $_GET['form'] == 'detail') {
	if (isset($_GET['id'])) {
	    // fungsi query untuk menampilkan data dari tabel pengiriman
	    $query = mysqli_query($mysqli, "SELECT a.no_pengiriman,a.tgl_pengiriman,a.pengirim,a.penerima,a.alamat_penerima,a.nama_barang,a.jumlah_barang,a.status,
										b.no_ktp as id_pelanggan,b.nama_pelanggan,b.alamat
										FROM pengiriman as a INNER JOIN pelanggan as b
										ON a.penerima=b.no_ktp
										WHERE a.no_pengiriman='$_GET[id]'")
	    								or die('Ada kesalahan pada query tampil data ubah : '.mysqli_error($mysqli));
	    $data  = mysqli_fetch_assoc($query);

		$no_pengiriman   = $data['no_pengiriman'];
		
		$tanggal         = $data['tgl_pengiriman'];
		$tgl             = explode('-',$tanggal);
		$tgl_pengiriman  = $tgl[2]."-".$tgl[1]."-".$tgl[0];
		
		$no_ktp          = $data['id_pelanggan'];
		$pengirim        = $data['nama_pelanggan'];
		$alamat_pengirim = $data['alamat'];
		$penerima        = $data['penerima'];
		$alamat_penerima = $data['alamat_penerima'];
		$nama_barang     = $data['nama_barang'];
		$jumlah_barang   = $data['jumlah_barang'];
		$status          = $data['status'];
	}
?>

	<div class="breadcrumbs breadcrumbs-fixed" id="breadcrumbs">
		<ul class="breadcrumb">
			<li>
				<i class="ace-icon fa fa-home home-icon"></i>
				<a href="?module=beranda">Beranda</a>
			</li>

			<li>
				<a href="?module=pengiriman">Pengiriman</a>
			</li>

			<li class="active">Detail</li>
		</ul><!-- /.breadcrumb -->
	</div>

	<div class="page-content">
		<div class="page-header">
			<h1 style="color:#585858">
				<i class="ace-icon fa fa-edit"></i>
				Detail Pengiriman
			</h1>
		</div><!-- /.page-header -->

		<div class="row">
			<div class="col-xs-12">
				<!--PAGE CONTENT BEGINS-->
				<form class="form-horizontal" role="form" action="modules/pengiriman/proses.php?act=update" method="POST" name="frmpengiriman" />
					
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">No. Pengiriman</label>

						<div class="col-sm-4">
							<input type="text" class="form-control" name="no_pengiriman" value="<?php echo $no_pengiriman; ?>" readonly required />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Tanggal</label>

						<div class="col-sm-4">
							<input class="form-control date-picker" type="text" data-date-format="dd-mm-yyyy" name="tgl_pengiriman" value="<?php echo $tgl_pengiriman; ?>" readonly required />
						</div>
					</div>

					<div class="hr hr-16 dotted"></div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Nama Pengirim</label>

						<div class="col-sm-4">
							<input type="hidden" id="id_pengirim" name="id_pengirim" value="<?php echo $no_ktp; ?>" />
							<input type="text" class="form-control" id="pengirim" name="pengirim" value="<?php echo $pengirim; ?>" readonly required />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Alamat</label>

						<div class="col-sm-4">
							<textarea class="form-control" id="alamat_pengirim" name="alamat_pengirim" rows="2" readonly required><?php echo $alamat_pengirim; ?></textarea>
						</div>
					</div>

					<div class="hr hr-16 dotted"></div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Penerima</label>

						<div class="col-sm-4">
							<input type="text" class="form-control" name="penerima" autocomplete="off" value="<?php echo $penerima; ?>" readonly required />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Alamat</label>

						<div class="col-sm-4">
							<textarea class="form-control" name="alamat_penerima" rows="2" readonly required><?php echo $alamat_penerima; ?></textarea>
						</div>
					</div>

					<div class="hr hr-16 dotted"></div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Nama Barang</label>

						<div class="col-sm-4">
							<input type="text" class="form-control" value="<?php echo $nama_barang; ?>" name="nama_barang" autocomplete="off" readonly required />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Jumlah</label>

						<div class="col-sm-4">
							<input type="text" class="form-control" name="jumlah_barang"  autocomplete="off" value="<?php echo $jumlah_barang; ?>" readonly required />
						</div>
					</div>

					<!-- <div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Berat</label>

						<div class="col-sm-4">
							<div class="input-group">
								<input type="text" class="form-control" name="berat_barang" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $berat_barang; ?>" readonly required />
								<span class="input-group-addon">Kg</span>
							</div>
						</div>
					</div> -->

					<!-- <div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Biaya Kirim</label>

						<div class="col-sm-4">
							<div class="input-group">
								<span class="input-group-addon">Rp</span>
								<input type="text" class="form-control" id="biaya_kirim" name="biaya_kirim" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo format_rupiah_nol($biaya_kirim); ?>" readonly required />
							</div>
						</div>
					</div>

					<div class="hr hr-16 dotted"></div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Kendaraan</label>

						<div class="col-sm-4">
							<input type="text" class="form-control" id="no_polisi" name="no_polisi" value="" readonly required />
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Supir</label>

						<div class="col-sm-4">
							<input type="text" class="form-control" id="nama_supir" name="nama_supir" autocomplete="off" value="" readonly required />
						</div>
					</div>

					<div class="hr hr-16 dotted"></div> -->

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right">Status</label>

						<div class="col-sm-9">
							<div class="radio">
							<?php  
							if ($status=='Proses Pengiriman') { ?>
								<label>
									<input type="radio" class="ace" name="status" value="Proses Pengiriman" checked="" />
									<span class="lbl"> Proses Pengiriman</span>
								</label>

								<label>
									<input type="radio" class="ace" name="status" value="Barang Terkirim" />
									<span class="lbl"> Barang Terkirim</span>
								</label>
							<?php
							} else { ?>
								<label>
									<input type="radio" class="ace" name="status" value="Proses Pengiriman" />
									<span class="lbl"> Proses Pengiriman</span>
								</label>

								<label>
									<input type="radio" class="ace" name="status" value="Barang Terkirim" checked="" />
									<span class="lbl"> Barang Terkirim</span>
								</label>
							<?php
							}
							?>
							</div>
						</div>
					</div>

					<div class="clearfix form-actions">
						<div class="col-md-offset-2 col-md-10">
							<a style="width:100px" href="?module=pengiriman" class="btn">Kembali</a>
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