<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Stylesheet Link -->
    <link rel="stylesheet" href="style/style.css">

    <!-- Font Awesome Link -->
    <script src="https://kit.fontawesome.com/ffea063f11.js" crossorigin="anonymous"></script>

    <title>Login</title>
    <style>
        .li-gradient, #actionButton{
background: linear-gradient(to right, #2d4eac, #23eaf8);
}
    </style>
  </head>
  <body>

      <!-- Navigation -->
      <nav class="navbar navbar-dark bg-dark">
          <div class="container">
              <a href="#" class="navbar-brand">BZU Hostel Managemnet System</a>
          </div>
      </nav>

      <!-- Header Section -->
      <header id="header-section" class="li-gradient text-white py-3">
          <div class="container">
              <div class="row">
                  <div class="col-md-6">
                      <h1>
                          <i class="fas fa-user"></i>
                          BZU Admin
                      </h1>
                  </div>
              </div>
          </div>
      </header>

      <!-- Action Section -->

      <section id="actionSection" class="py-4 bg-light mb-4">
          <div class="container">

          </div>
      </section>

      <!-- Login Section -->

      <section id="loginSection" class="mb-5">
          <div class="container">
              <div class="row">
                  <div class="col-md-6 offset-md-3">
                      <div class="card">
                          <div class="card-header">
                              <h5 class="card-title">Account Login</h5>
                          </div>
                          <div class="card-body">
                              <form action="" method="post">
                                  <div class="form-group">
                                      <label for="loginEmail">Email</label>
                                      <input type="text" name="emailLogin" id="loginEmail" class="form-control">
                                  </div>
                                  <div class="form-group">
                                      <label for="loginPassword">Password</label>
                                      <input type="password" name="password" id="loginPassword" class="form-control">
                                  </div>
                                 <!-- <a type="submit" name="loginsave" value="logged" class="btn btn-primary btn-block" id="actionButton">Login</a> -->
                                 <input type="submit" value="Login" name="loginsave" id="" class="btn btn-primary btn-block">
                              </form>
                              <?php
if(isset($_POST['loginsave'])){
    include "config.php";
    $username = $_POST['emailLogin'];
    $password = $_POST['password'];
    $sql = "SELECT * from hostel_admin WHERE admin_username='{$username}' AND admin_password = '{$password}'";
    $sqlresult = mysqli_query($conn,$sql) or die("Incorrect Password");
    if(mysqli_num_rows($sqlresult)>0){
        while($row = mysqli_fetch_assoc( $sqlresult)){
            session_start();
            $_SESSION['username'] = $row['admin_username'];
            $_SESSION['password'] = $row['admin_password'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['myusername'] = $row['name'];
            if($row['role']==0){
            header("Location: http://localhost/hostelsystem/admin-pannel.php");
            }
            if($row['role']==1){
                header("Location: http://localhost/hostelsystem/users.php");
            }
            mysqli_close($conn);
        }
    } else {
        echo '<div class="alert alert-danger">Credentials Not Match</div>';
        mysqli_close($conn);
    }
}
?>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>

      <!-- Footer Section -->

      <footer id="footerSection" class="bg-dark text-white py-3 pt-5 text-center">
          <div class="container">
              <div class="row">
                  <div class="col">
                      <p>
                          Copyright &copy; BZU Hostel, 2022
                      </p>
                  </div>
              </div>
          </div>
      </footer>





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>