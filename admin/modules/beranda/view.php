<div class="breadcrumbs breadcrumbs-fixed" id="breadcrumbs">
	<ul class="breadcrumb">
		<li class="active">
			<i class="ace-icon fa fa-home home-icon"></i>
			<a href="?module=beranda">Beranda</a>
		</li>
	</ul><!-- /.breadcrumb -->
</div>

<div class="page-content">
	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
			<div style="margin-top:10px" class="alert alert-block alert-info">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>
				<i class="ace-icon fa fa-user blue"></i>
				Selamat datang
				<strong class="blue"><?php echo $_SESSION['nama_pengguna']; ?></strong>.
			</div>
			<!-- PAGE CONTENT ENDS -->
		</div><!-- /.col -->
	</div><!-- /.row -->

	<hr>

	<div class="row state-overview">
	<?php  
	if ($_SESSION['hak_akses']=='Finance') { ?>
		<div class="col-lg-3 col-sm-6">
            <section style="background:#f1f2f7" class="panel">
                <div class="symbol blue">
                    <a href="?module=laporan">
					    <i class="fa fa-file-text-o"></i>
					</a>
                </div>
                <div class="value">
                    <a href="?module=laporan">
	                    <h1 style="font-size:30px">+</h1>
	                    <p>Laporan</p>
                    </a>
                </div>
            </section>
       	</div>

       	<div class="col-lg-3 col-sm-6">
            <section style="background:#f1f2f7" class="panel">
                <div class="symbol blue">
                    <a href="?module=pengguna">
					    <i class="fa fa-user"></i>
					</a>
                </div>
                <div class="value">
                    <a href="?module=form_pengguna&form=add">
	                    <h1 style="font-size:30px">+</h1>
	                    <p>Pengguna</p>
                    </a>
                </div>
            </section>
       	</div>
	<?php
	} else { ?>

        <div class="col-lg-3 col-sm-6">
            <section style="background:#f1f2f7" class="panel">
                <div class="symbol blue">
                    <a href="?module=pengiriman">
					    <i class="fa fa-truck"></i>
					</a>
                </div>
                <div class="value">
                    <a href="?module=form_pengiriman&form=add">
	                    <h1 style="font-size:30px">+</h1>
	                    <p>Pengiriman</p>
                    </a>
                </div>
            </section>
        </div>

        <div class="col-lg-3 col-sm-6">
            <section style="background:#f1f2f7" class="panel">
                <div class="symbol blue">
                    <a href="?module=barang">
					    <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="white" class="bi bi-snow" viewBox="0 0 16 16">
                            <path d="M8 16a.5.5 0 0 1-.5-.5v-1.293l-.646.647a.5.5 0 0 1-.707-.708L7.5 12.793V8.866l-3.4 1.963-.496 1.85a.5.5 0 1 1-.966-.26l.237-.882-1.12.646a.5.5 0 0 1-.5-.866l1.12-.646-.884-.237a.5.5 0 1 1 .26-.966l1.848.495L7 8 3.6 6.037l-1.85.495a.5.5 0 0 1-.258-.966l.883-.237-1.12-.646a.5.5 0 1 1 .5-.866l1.12.646-.237-.883a.5.5 0 1 1 .966-.258l.495 1.849L7.5 7.134V3.207L6.147 1.854a.5.5 0 1 1 .707-.708l.646.647V.5a.5.5 0 1 1 1 0v1.293l.647-.647a.5.5 0 1 1 .707.708L8.5 3.207v3.927l3.4-1.963.496-1.85a.5.5 0 1 1 .966.26l-.236.882 1.12-.646a.5.5 0 0 1 .5.866l-1.12.646.883.237a.5.5 0 1 1-.26.966l-1.848-.495L9 8l3.4 1.963 1.849-.495a.5.5 0 0 1 .259.966l-.883.237 1.12.646a.5.5 0 0 1-.5.866l-1.12-.646.236.883a.5.5 0 1 1-.966.258l-.495-1.849-3.4-1.963v3.927l1.353 1.353a.5.5 0 0 1-.707.708l-.647-.647V15.5a.5.5 0 0 1-.5.5z"/>
                        </svg>
					</a>
                </div>
                <div class="value">
                    <a href="?module=form_barang&form=add">
	                    <h1 style="font-size:30px">+</h1>
	                    <p>Barang</p>
                    </a>
                </div>
            </section>
        </div>

		<!-- <div class="col-lg-3 col-sm-6">
            <section style="background:#f1f2f7" class="panel">
                <div class="symbol blue">
                    <a href="?module=supir">
					    <i class="fa fa-user"></i>
					</a>
                </div>
                <div class="value">
                    <a href="?module=form_supir&form=add">
	                    <h1 style="font-size:30px">+</h1>
	                    <p>Supir</p>
                    </a>
                </div>
            </section>
        </div> -->

        <!-- <div class="col-lg-3 col-sm-6">
            <section style="background:#f1f2f7" class="panel">
                <div class="symbol blue">
                    <a href="?module=kendaraan">
					    <i class="fa fa-truck"></i>
					</a>
                </div>
                <div class="value">
                    <a href="?module=form_kendaraan&form=add">
	                    <h1 style="font-size:30px">+</h1>
	                    <p>Kendaraan</p>
                    </a>
                </div>
            </section>
        </div> -->

		<div class="col-lg-3 col-sm-6">
            <section style="background:#f1f2f7" class="panel">
                <div class="symbol blue">
                    <a href="?module=pelanggan">
					    <i class="fa fa-user"></i>
					</a>
                </div>
                <div class="value">
                    <a href="?module=form_pelanggan&form=add">
	                    <h1 style="font-size:30px">+</h1>
	                    <p>Pelanggan</p>
                    </a>
                </div>
            </section>
        </div>



		<div class="col-lg-3 col-sm-6">
            <section style="background:#f1f2f7" class="panel">
                <div class="symbol blue">
                    <a href="?module=laporan">
					    <i class="fa fa-file-text-o"></i>
					</a>
                </div>
                <div class="value">
                    <a href="?module=laporan">
	                    <h1 style="font-size:30px">+</h1>
	                    <p>Laporan</p>
                    </a>
                </div>
            </section>
       	</div>
	<?php
	}
	?>
	</div>
</div><!-- /.page-content -->