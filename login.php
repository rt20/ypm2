<?php
require "function.php";

// cek login
if(isset($_POST['login'])){
    $em = $_POST['email'];
    $pa = $_POST['password'];
// cek dengan database
    $cekdatabase = mysqli_query($conn, "SELECT * FROM login where email='$em' and password='$pa'");
// hitung jumlah data
    $hitung = mysqli_num_rows($cekdatabase);

    if($hitung>0){

        $ambildatarole = mysqli_fetch_array($cekdatabase);
        $role = $ambildatarole['roles'];
        $_SESSION['log'] = 'True';
        $_SESSION['email'] = $em ;

       if($role=='user'){
            $_SESSION['log'] = 'Logged';
            $_SESSION['roles'] = 'user';
            header('location:user');
            
        } else if ($role == "admin") {
            $_SESSION['log'] = 'Logged';
            $_SESSION['roles'] = 'admin';
            header('location:admin');
        } else {
            $_SESSION['log'] = 'Logged';
            $_SESSION['roles'] = 'owner';
            header('location:owner');
        }
    }
};

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form method="post">
                                            <div class="form-group">
                                                 <input class="form-control" name="email" id="inputEmail" type="email" placeholder="name@example.com" />
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" name="password" id="inputPassword" type="password" placeholder="Password" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                         <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                              <button class="btn btn-primary" name="login">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
