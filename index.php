<?php
if (! session_id()) {
    session_start();
}
 $koneksi= mysqli_connect('localhost','root','','sppsekolah');
 
 if ( isset($_POST['login']) ){
     $user= $_POST['username'];
     $pass= $_POST['password'];
     
     $query= mysqli_query($koneksi, "SELECT * FROM pengguna WHERE username='$user' AND password='$pass'");
     $data= mysqli_fetch_array($query);
     $cekdata= mysqli_num_rows($query);
     
     
     if ($cekdata < 1) {
         echo 'login gagal';
         die;
        }
    
        
     if ($data['level'] == 'Siswa') {
         $siswa_query = mysqli_query($koneksi, "SELECT * FROM siswa WHERE pengguna_id = '{$data['id']}'");
         $siswa = mysqli_fetch_array($siswa_query, MYSQLI_ASSOC);
         $pengguna = array_merge($siswa, $data);
         $_SESSION['user'] = $pengguna;
         header('location: home.php');
         die;
     } else {
         $petugas_query = mysqli_query($koneksi, "SELECT * FROM petugas WHERE pengguna_id = '{$data['id']}'");
         $petugas = mysqli_fetch_array($petugas_query, MYSQLI_ASSOC);
         $pengguna = array_merge($data, $petugas);
         $_SESSION['user'] = $pengguna;
        
         if ($pengguna['level'] == 'Admin') {
             header('location: admin.php');
             die;
         }

         header('location: petugas.php');
         die;
     }
    // if ($cekdata > 0){


    //     if ($data['level']=="Admin"){
    //         $_SESSION['level']=$data['level'];
    //         $_SESSION['username']=$data['username'];
    //         header('location: admin.php');

    //     } elseif ($data['level']=="Petugas"){
    //         $_SESSION['level']=$data['level'];
    //         $_SESSION['username']=$data['username'];
    //         header('location: petugas.php');

    //     } elseif ($data['level']=="Siswa"){
    //         $_SESSION['level']=$data['level'];
    //         $_SESSION['username']=$data['username'];
    //         header('location: home.php');
            
    //     }
      
    // } else{
    //     echo "Login Gagal";
    // }
 }
 
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> LOGIN - Spp </title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block"><img src="img/loginss.jpg" width="500" height="540" alt="login.img"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4"> Login tiketiket </h1>
                                        <hr> <br>
                                    </div>
                                    <form class="user" method="post" action="">
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control form-control-user"
                                                id="username" aria-describedby="emailHelp"
                                                placeholder="Masukan Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="password" placeholder="Masukan Password">
                                        </div>
                                        <button type="sumbit" class="btn btn-success btn-user btn-block" name="login">
                                            <a href="index.php"></a> Login 
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="register.php"> Tidak punya akun? buat akun</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>      

            </div>

        </div>


    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>