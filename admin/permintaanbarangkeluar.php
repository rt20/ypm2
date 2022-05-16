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
        <title>Permintaan Barang Keluar</title>
        <link href="../css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
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
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark" style="background-color:#003940;">
            <!-- Navbar Brand -->
            <a class="navbar-brand" href="index.php"><?=$email;?></a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu" style="background-color:#003940;">
                        <div class="nav">
                            <img src="../admin/aura.jpg" alt="yuki" style=" border-radius: 90%; height: 100px; width: 100px; margin-left: 50px; margin-top: 10px;">
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
                   <!--           <a class="nav-link" href="admin.php">
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
                    <div class="container-fluid">
                        <h1 class="mt-4">Permintaan Barang Keluar</h1>
                        <div class="card mb-4">
                            <div class="card-header">
                                <!-- Button to Open the Modal -->
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                Request Barang
                              </button>
                            </div>
                            <div class="card-body">
                             <table class="table table-bordered" id="mau" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>No PP</th>
                                            <th>Nama Barang</th>
                                            <th>Penerima</th>
                                            <th>Jumlah</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                           <?php
                                        $ambilsemuadatastock = mysqli_query($conn, "select * from pp k, stock s where s.idbarang = k.idbarang");
                                        while($data=mysqli_fetch_array($ambilsemuadatastock)){
                                        $idpp = $data['idpp']; 
                                        $idb = $data['idbarang']; 
                                        $tanggal = $data['tanggal'];
                                        $namabarang = $data['namabarang'];
                                        $qty = $data['qty'];
                                        $penerima = $data['penerima'];
                                        $nopp = $data['nopp'];
                                        $status = $data['status'];

                                        ?>

                                        <tr>
                                            <td><?=$tanggal;?></td>
                                            <td><?=$nopp;?></td>
                                            <td><?=$namabarang;?></td>
                                           
                                            <td><?=$penerima;?></td>
                                            <td><?=$qty;?></td>
                                           
                                            <td> <?php if($status == "PENDING" ) { 
                                                echo "<p>PENDING</p>";
                                              } elseif ($status == "DITERIMA" ) {  
                                                echo "<p>DITERIMA</p>";
                                           } ?>
                                            </td>
                                            <td> <?php if($status == "PENDING" ) { ?>
                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit<?=$idpp;?>">
                                                    Terima
                                            </button>
                                          <?php } elseif ($status == "DITERIMA" ) {  ?>
                                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#<?=$idk;?>">
                                                    Sukses
                                            </button>
                                          <?php } ?>
                                            </td>
                                        </tr>

                                          <!-- Edit Modal -->
                                  <div class="modal fade" id="edit<?=$idpp;?>">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                      
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                          <h4 class="modal-title">Permintaan Keluar Barang</h4>
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        
                                        <!-- Modal body -->
                                        <form method="post">
                                        <div class="modal-body">
                                          <input type="text" name="penerima" value="<?=$penerima;?>" class="form-control" required>
                                          <br>
                                          <input type="number" name="qty" value="<?=$qty;?>" class="form-control" required>
                                          <br>
                                          <input type="hidden" name="idb" value="<?=$idb;?>">
                                          <input type="hidden" name="idpp" value="<?=$idpp;?>">
                                          <button type="submit" class="btn btn-primary" name="terimabarangkeluar">Submit</button>
                                        </div>
                                        </form>  
                                      </div>
                                    </div>
                                  </div>


                                    <!-- Delete Modal -->
                                  <div class="modal fade" id="delete<?=$idk;?>">
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
                                          <input type="hidden" name="kty" value="<?=$qty;?>">
                                          <input type="hidden" name="idk" value="<?=$idk;?>">
                                          <br>
                                          <br>
                                          <button type="submit" class="btn btn-danger" name="hapusbarangkeluar">Hapus</button>
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
                "bLengthChange": true,
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
          <h4 class="modal-title">Tambah Barang Keluar</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <form method="post">
        <div class="modal-body">
         <select name="barangnya" class="form-control">
            <?php
            $ambilsemuadatanya = mysqli_query($conn,"select * from stock");
            while($fetcharray = mysqli_fetch_array($ambilsemuadatanya)){
                $namabarangnya = $fetcharray['namabarang'];
                $idbarangnya = $fetcharray['idbarang'];
                ?>
            
            <option value="<?=$idbarangnya;?>"><?=$namabarangnya;?></option>

            <?php 
                }
            ?>
          </select>
          <br>
          <input type="text" name="nopp" class="form-control" placeholder="No PP" required>
          <br>
          <input type="text" name="keterangan" class="form-control" placeholder="Keterangan" required>
          <br>
          <input type="number" name="qty" class="form-control" placeholder="Quantity" required>
          <br>
          <input type="text" name="penerima" placeholder="Penerima" class="form-control" required>
          <br>
          <button type="submit" class="btn btn-primary" name="addppbarangkeluar">Submit</button>
        </div>
    </form>  
      </div>
    </div>
  </div>
</html>
