<html>
    <head>
        <title>Login Page</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width-device,initial-scale-1">
        <link rel="shortcut icon" href="aset/user.png">
    </head>
    <link rel="stylesheet" href="style.css">
    <body style="background-color :#ECECEC;  height:50%">

    <!-- Panel Login -->
        <div class="container" style="background-color:white; margin-top:7%; width:910px ; height:500px; border-radius:10px ;box-shadow: 2px 2px 7px black;">
            <div class="row">
              <!-- form login -->
              <div class="col-sm-5 col-md-6">
                 <div class="contaier" style=" width:310px ;margin-top:30px;margin-left:30px; height:440px ">
                    <h1 style="font-family: 'Julius Sans One', sans-serif;font-family: 'Julius Sans One', sans-serif; color:#262270">LOGIN</h1>
                    <h3 style="font-size:15px ;font-family: 'Montserrat', sans-serif;">Selamat datang kembali!</h3>
                  <form action="" method="POST">
                    <!-- form email -->
                    <div class="mb-3"><br>
                      <strong><label  for="exampleFormControlInput1" class="form-label" style="font-family: 'Julius Sans One', sans-serif;font-family: 'Julius Sans One', sans-serif;margin-top:40px; color:#262270 ;font-size:13px">Username</label></strong>
                      <input type="text" class="form-control" id="exampleFormControlInput1" name="user" style="border:none; color:black ;border-bottom: 2px solid #262270;width:300px ;font-family: 'Montserrat', sans-serif; margin-top:-12px" required>
                    </div>
                    <!-- form pass -->
                    <div class="mb-3"><br>
                      <strong><label  for="exampleFormControlInput1" class="form-label" style="font-family: 'Julius Sans One', sans-serif; color:#262270 ;font-size:13px">Password</label></strong>
                      <input type="password" class="form-control" id="exampleFormControlInput1" name="pass" style="border:none; color:black ;border-bottom: 2px solid #262270; width:300px ;font-family: 'Montserrat', sans-serif;; margin-top:-12px" required >
                    </div>
                    <!-- registrasi -->
                    <a href="user/registrasi.php"  style="font-family: 'Montserrat', sans-serif; font-size:13px ; text-decoration:none ; color:#262270; float:right">Create Account?</a>
                    <!-- terima kebijakan -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" style="height:13px; width:13px" required>
                        <label class="form-check-label" for="flexRadioDefault1" style="font-family: 'Montserrat', sans-serif; font-size:13px ; text-decoration:none ; color:black;" >
                          terima kebijakan kami
                        </label>
                    </div>
                    <a href=""><input type="submit" style="width:300px; color:white;
                     border-radius: 15px; background-color:#262270 ; margin-top:40px" name="submit" value="Login" class="btn"></a>
                    </form>
                 </div>
                 <!-- sistem login -->
                 <?php 
                    if(isset($_POST['submit'])){
                      session_start();
                      include 'db.php';

                      $user = $_POST['user'];
                      $pass = $_POST['pass'];

                      $cek = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username = '".$user."' AND password = '".$pass."'");
                      if(mysqli_num_rows($cek) > 0){
                      $role = mysqli_fetch_assoc($cek);
                      }if($role['level']=="user"){
                        $_SESSION['username'] = $user;
                        $_SESSION['level'] = "user";  
                        header("location:user/dashboarduser.php");
                      } else if($role['level']=="admin"){
                        $_SESSION['username'] = $user;
                        $_SESSION['level'] = "admin";  
                        header("location:admin/dashboardadmin.php");
                      
                      
                      } else {
                        header("location:login.php?pesan=error");
                      };
                    }
                  ?>
                  <!-- sistem login selesai -->
              </div>
              <!-- gambar icon -->
              <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0">
                 <img src="aset/login.svg" alt="" style="height:320px ;margin-top:120px;margin-left:-100px; border-radius:0 10px 10px 0 ">
              </div>
            </div>
    <!-- panel login akhir -->

  
      

        <link href="https://fonts.googleapis.com/css2?family=Economica&family=Julius+Sans+One&family=Montserrat:wght@500&family=Roboto:ital,wght@1,900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Economica&family=Julius+Sans+One&family=Roboto:ital,wght@1,900&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Julius+Sans+One&family=Roboto:ital,wght@1,900&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        </div>
    </body>
</html>
