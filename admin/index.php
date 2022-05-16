<?php
require "../function.php";
require "../cek.php";

$email = $_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Stok Barang</title>
        <link href="../css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>

        <!-- ini icon -->
        

        <style>
            .zoomable {
                width: 100px;
            }
            .zoomable:hover {
                transform: scale(2.5);
                transition: 0.3s ease;
                
            }
        </style>

    </head>
    <body class="sb-nav-fixed" >
        <nav class="sb-topnav navbar navbar-expand navbar-dark" style="background-color:#003940;" >
            <!-- Navbar Brand -->
            <a class="navbar-brand" href="index.php"><?=$email;?></a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <marquee style='color: white;'>Selamat Datang Di Website Saya Yuki Prasetya Mukmin</marquee>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav" >
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu" style="background-color:#003940;">
                        <div class="nav">
                            <img src="aura.jpg" alt="yuki" style=" border-radius: 90%; height: 100px; width: 100px; margin-left: 50px; margin-top: 10px;">
                            <h6 style="margin-left: 30px; margin-top:10px; color: white;">Cv Alfian Multijaya</h6>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class='fas fa-boxes' style='font-size:20px;color:#ffae00'></i></div>
                                Stock Barang
                            </a>
                            <a class="nav-link" href="masuk.php">
                                <div class="sb-nav-link-icon"><i class='fas fa-cart-plus' style='font-size:20px;color:lightgreen;'></i></div>
                                Barang Masuk
                            </a>
                            <a class="nav-link" href="keluar.php">
                                <div class="sb-nav-link-icon"><i class='fas fa-cart-plus' style='font-size:20px;color:lightblue;'></i></div>
                                Barang Keluar
                            </a>
                            <a class="nav-link" href="permintaanbarangkeluar.php">
                                <div class="sb-nav-link-icon"><i class='fas fa-cart-plus' style='font-size:20px;color:lightblue;'></i></div>
                                PP
                            </a>
                           <!--   <a class="nav-link" href="admin.php">
                                <div class="sb-nav-link-icon"><i class='fas fa-user-plus' style='font-size:20px;color:#e2dddd'></i></div>
                                Kelola Admin
                            </a> -->
                                <a class="nav-link" href="../logout.php">
                                <div class="sb-nav-link-icon"><i class='fas fa-power-off' style='font-size:20px;color:red'></i></div>
                                Logout
                            </a>
                        </div>  
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid" >
                        <h1 class="mt-4">Stock Barang</h1>
                        <div class="card mb-4">
                            <div class="card-header">
                                <!-- Button to Open the Modal -->
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                Tambah Barang
                              </button>
                              <a href="export.php" class="btn btn-info">Export Data</a>
                            </div>
                            <div class="card-body">


                            <?php
                            $ambildatastock = mysqli_query($conn, "select * from stock where stock < 1");

                            while($fetch=mysqli_fetch_array($ambildatastock)){
                                $barang = $fetch['namabarang'];
                            

                            ?>

                            <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Perhatian!</strong> Stock <?=$barang;?> Telah Habis
                            </div>

                            <?php
                            }
                            ?>


                                    <table class="table table-bordered" id="mau" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Gambar</th>
                                            <th>Nama Barang</th>
                                            <th>Deskripsi</th>
                                            <th>Stock/Lusin</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                          <?php
                                        $ambilsemuadatastock = mysqli_query($conn, "select * from stock");
                                         $i = 1;
                                        while($data=mysqli_fetch_array($ambilsemuadatastock)){
                                        $namabarang = $data['namabarang'];
                                        $deskripsi = $data['deskripsi'];
                                        $stock = $data['stock'];
                                        $idb = $data['idbarang'];

                                        // cek ada gambar atau tidak
                                        $gambar = $data['image']; //ambil gambar
                                        if($gambar==null){
                                            //jika tidak ada gambar
                                            $img = 'No Photo';
                                        } else {
                                            //jika ada gambar
                                            $img = '<img src="../images/'.$gambar.'" class="zoomable">';
                                        }

                                        ?>

                                        <tr>
                                            <td><?=$i++;?></td>
                                            <td><?=$img;?></td>
                                            <td><?=$namabarang;?></td>
                                            <td><?=$deskripsi;?></td>
                                            <td><?=$stock;?></td>
                                            <td>
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$idb;?>">
                                                    Edit
                                            </button>
                                                 <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$idb;?>">
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>
                                        
                                         <!-- Edit Modal -->
                                  <div class="modal fade" id="edit<?=$idb;?>">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                      
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                          <h4 class="modal-title">Edit Barang</h4>
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        
                                        <!-- Modal body -->
                                        <form method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                          <input type="text" name="namabarang" value="<?=$namabarang;?>" class="form-control" required>
                                          <br>
                                          <input type="text" name="deskripsi" value="<?=$deskripsi;?>" class="form-control" required>
                                          <br>
                                          <input type="file" name="file" class="form-control">
                                          <br>
                                          <input type="hidden" name="idb" value="<?=$idb;?>">
                                          <button type="submit" class="btn btn-primary" name="updatebarang">Submit</button>
                                        </div>
                                        </form>  
                                      </div>
                                    </div>
                                  </div>


                                    <!-- Delete Modal -->
                                  <div class="modal fade" id="delete<?=$idb;?>">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                      
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                          <h4 class="modal-title">Hapus Barang?</h4>
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        
                                        <!-- Modal body -->
                                        <form method="post">
                                        <div class="modal-body">
                                         Apakah anda yakin ingin menghapus <?=$namabarang;?>?
                                          <input type="hidden" name="idb" value="<?=$idb;?>">
                                          <br>
                                          <br>
                                          <button type="submit" class="btn btn-danger" name="hapusbarang">Hapus</button>
                                        </div>
                                        </form>  
                                      </div>
                                    </div>
                                  </div>
                                        <?php
                                        };
                                        ?>
                                    </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="../assets/demo/chart-area-demo.js"></script>
        <script src="../assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="../assets/demo/datatables-demo.js"></script>
            <script>
            $(document).ready(function() {
            $('#mau').dataTable({
                "bPaginate": false,
                "bLengthChange": false,
                "bFilter": false,
                "bInfo": false,
                "bAutoWidth": false });
            });
        </script>
    </body>
    <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Tambah Barang</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <form method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <input type="text" name="namabarang" placeholder="Nama Barang" class="form-control" required>
          <br>
          <input type="text" name="deskripsi" placeholder="Deskripsi barang" class="form-control" required>
          <br>
          <input type="number" name="stock" class="form-control" placeholder="Stock" required>
          <br>
          <input type="file" name="file" class="form-control">
          <br>
          <button type="submit" class="btn btn-primary" name="addnewbarang">Submit</button>
        </div>
    </form>  
      </div>
    </div>
  </div>
</html>
