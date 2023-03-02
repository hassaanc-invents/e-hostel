<?php
include "header.php";
?>
<?php
if(isset($_POST['editsubmit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    // session_start();
    $newpass = $_SESSION['password'];
    $newuse = $_SESSION['username'];
    include "config.php";
    $sql = "UPDATE hostel_admin SET admin_username = '{$username}', admin_password = '{$password}' WHERE admin_username='{$newuse}' AND admin_password = '{$newpass}' ";
    $result = mysqli_query($conn,$sql) or die("Update Faild");
    $sql1 = "UPDATE res_information SET username = '{$username}' WHERE username = '{$newuse}'";
    $result1 = mysqli_query($conn,$sql1) or die("Update Faild");
    header("Location: http://localhost/hostelsystem/index.php");
}
?>




      <!-- Navgation Section -->

      <?php
      include "nav.php"
      ?>

      <!-- Header Section -->

      <header id="header-section" class="li-gradient py-2 text-white">
          <div class="container">
              <div class="row">
                  <div class="col">
                      <h1>
                        <i class="fas fa-users"></i>
                          Residence Dashboard
                      </h1>
                  </div>
              </div>
          </div>
      </header>

      <!-- Search Section -->
    
      <div class="search bg-light py-3 mb-3">
          <div class="container">
              <div class="row">
              <div class="col-md-6">
              <div class="col m-auto ">
                   <a href="#" class="btn btn-primary btn-block" id="actionButton" data-toggle="modal" data-target="#addpassword">
                    <i class="fas fa-plus"></i> Change Username & Password
                   </a>
               </div>
                  </div>
                  
              </div>
          </div>
      </div>
      <?php
      include "addpassword.php";
      ?>

      <!-- Latest Catagories -->
      <div id="latest-categories">
          <div class="container">
              <div class="row">
                  <div class="col">
                      <div class="card">
                          <div class="card-header">
                              <h5 class="card-title">My details</h5>
                          </div>
                     
                            <table class="table table-striped">
                          
                                <thead class="thead-dark">
                                    
                                    

                                    <tr>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Contact</th>
                                        <th>Allocated Room</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    include "config.php";
                                    $sql = "SELECT * FROM res_information WHERE username = '{$_SESSION['username']}'";
                                    $result = mysqli_query($conn,$sql);
                                    if(mysqli_num_rows($result)>0){
                                        while($row1 = mysqli_fetch_assoc($result)){
                                    ?>
                                    <tr>
                                        <th><?php echo $row1['res_name'] ?></th>
                                        <th><?php echo $row1['res_add'] ?></th>
                                        <th><?php echo $row1['res_contact'] ?></th>
                                        <th><?php echo $row1['res_room'] ?></th> 
                                    </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <table class="table table-striped">
                          
                                <thead class="thead-dark">
                                
                                    <tr>
                                        
                                        <th>Mess</th>
                                        <th>Dues</th>
                                        <th>Enroll Date</th>
                                        
                                    </tr>
                                    
                                </thead>
                                <tbody>
                                <?php
                                    include "config.php";
                                    $sql = "SELECT * FROM res_information WHERE username = '{$_SESSION['username']}'";
                                    $result = mysqli_query($conn,$sql);
                                    if(mysqli_num_rows($result)>0){
                                        while($row1 = mysqli_fetch_assoc($result)){
                                    ?>
                                <tr>
                                        
                                        <th><?php echo $row1['mess'] ?></th>
                                        <th><?php echo $row1['dues'] ?></th>
                                        <th><?php echo $row1['date'] ?></th>
                                        
                                    </tr>
                                <?php
                                        }
                                    }
                                    ?>
                                
                                </tbody>
                            </table>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <!-- Footer Section -->
      <?php
      include "footer.php";
      ?>
      

      <script src="js/script.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>