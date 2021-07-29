<?php
session_start();
include "../koneksi.php";
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>.:: Dashboard Produk ::.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="index.php"><img src="assets/images/icon/logo.png" alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li class="active">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                                <ul class="collapse">
                                    <li><a href="index.php"><i class="fa fa-user"></i><span>Dashboard Pegawai</span></a></li>
                                    <li class="active"><a href="index2.php"><i class="fa fa-shopping-cart"></i><span>Dashboard Produk</span></a></li>
                                    <li><a href="index3.php"><i class="fa fa-table"></i><span>Dashboard Laporan</span></a></li>
                                    <li><a href="export.php"><i class="fa fa-database"></i><span>Backup Database</span></a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="search-box pull-left">
                            <form action="#">
                                <input type="text" name="search" placeholder="Search..." required>
                                <i class="ti-search"></i>
                            </form>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.php">Home</a></li>
                                <li><span>Dashboard</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="assets/images/author/avatar.png" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown"> Admin <i class="fa fa-angle-down"></i></h4> 
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="logout.php">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="container shadow p-3 mb-5 bg-body">
                    <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead class="thead-dark text-center">
				<tr>
                    
                    <th>ID Produk</th>
					<th>Nama Produk</th>
					<th>Harga</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$sql = mysqli_query($koneksi, "SELECT * FROM barang ORDER BY id_produk");
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if(mysqli_num_rows($sql) > 0) {
					//membuat variabel untuk menyimpan nomor urut
					//melakukan perulangan while dengan dari dari query
                    $no=1;
					while($data = mysqli_fetch_assoc($sql)) {
						//menampilkan data perulangan
						echo '
						<tr>
                            
							<td>'.$data['id_produk'].'</td>
							<td>'.$data['nama_produk'].'</td>
                            <td> Rp. '.$data['harga_produk'].'</td>
                            <td>'.$data['id_kategori'].'</td>
                            <td>
                            <a href="produk-edit.php?id_produk='.$data['id_produk'].'" class="badge badge-warning">Edit</a>
                            <a href="produk-delete.php?id_produk='.$data['id_produk'].'" class="badge badge-danger" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
                            </td>
						</tr>
						';
						$no++;
					}
				//jika query menghasilkan nilai 0
				} else {
					echo '
					<tr>
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
				}
				?>
                                </table>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Tambah Data</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Modals -->
            <div class="modal fade" id="myModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data</h5>
                    
                </div>
                <div class="modal-body">
                    <p class="mb-3">Masukan Data Produk</p>
                    <form action="" method="post">
			        <div class="form-group row">
                        <label class="col-sm-2 col-form-label">ID</label>
                        <div class="col-sm-10 mb-3">
                            <input type="number" name="id_produk" class="form-control" size="4" required>
                        </div>
			        </div>
			        <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10 mb-3">
					    <input type="text" name="nama_produk" class="form-control" required>
				        </div>
			        </div>
			        <div class="form-group row">
				        <label class="col-sm-2 col-form-label">Harga</label>
				        <div class="col-sm-10 mb-3">
					    <input type="number" name="harga_produk" class="form-control" required>
				        </div>
			        </div>
			        <div class="form-group row">
				        <label class="col-sm-2 col-form-label">Kategori</label>
				        <div class="col-sm-10 mb-3">
					    <select name="id_kategori" size="1" class="form-control" required>
						<option disabled selected>Pilih Kategori</option>
                        <?php
                            $kategori = mysqli_query($koneksi, "SELECT * FROM ktg_barang ORDER BY id_kategori");
                            foreach ($kategori as $data) {
                                echo "<option value='".$data['id_kategori']."'>".$data['nama_kategori']."</option>";
                            }
                        ?>
                        </select>
				        </div>
			        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <input type="submit" class="btn btn-primary" name="submit" value="Simpan"></input>
                </div>
                </div>
            </div>
            </div>

            <?php
                if (isset($_POST["submit"])) {
                if ($koneksi->connect_errno == 0) {
                // Bersihkan data
                $id_produk = $koneksi->escape_string($_POST["id_produk"]);
                $nama_produk = $koneksi->escape_string($_POST["nama_produk"]);
                $harga = $koneksi->escape_string($_POST["harga_produk"]);
                $id_ktg = $koneksi->escape_string($_POST["id_kategori"]);
                // Menyusun SQL
                $sql = "INSERT INTO barang (id_produk, nama_produk, harga_produk, id_kategori) VALUES ('$id_produk','$nama_produk','$harga', '$id_ktg')";
                $res = $koneksi->query($sql);
                if ($res) {
                if ($koneksi->affected_rows > 0) { // jika ada penambahan data
                    echo "<script>alert('Data Berhasil disimpan!')</script>"; 
                    echo "<script>location='../admin/index2.php';</script>";      
                }
                } else {
                    echo "<script>alert('Data gagal tersimpan!')</script>";
                    echo "<script>location='../admin/index2.php';</script>"; 
                }
                } else
                    echo "<script>alert('Koneksi Database gagal!')</script>";
                    echo "<script>location='../admin/index2.php';</script>";
                }     
            ?>
            <!-- End Modals -->
    
    <!-- offset area end -->
    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <script>
        var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')

            myModal.addEventListener('shown.bs.modal', function () {
                myInput.focus()
            });
    </script>

    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="assets/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>
</html>