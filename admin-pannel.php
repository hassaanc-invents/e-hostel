<?php
                   if(isset($_POST['catsubmit'])){
                       include "config.php";
                       $resname = $_POST['resname'];
                       $resaddress = $_POST['ressadd'];
                       $rescontact = $_POST['rescontact'];
                       $roomnum = $_POST['roomnumber'];
                       $mess = $_POST['mess'];
                       $dues = $_POST['dues'];
                       $username = $_POST['username'];
                       $password = $_POST['password'];
                       $mydate = date("d/m/Y");
                       $role = 1;

                       $sql2 = "INSERT INTO res_information(res_name, res_add, res_contact, res_room, mess, dues,date,username)
                       VALUES('{$resname}','{$resaddress}','{$rescontact}','{$roomnum}','{$mess}','{$dues }','{$mydate}','{$username}')";
                       $result2 = mysqli_query($conn,$sql2);
                       
                       $sql3 = "INSERT INTO hostel_admin(admin_username, admin_password,role,name)
                       VALUES('{$username}','{$password}','{$role}','{$resname}')";
                       $result3 = mysqli_query($conn,$sql3);
                       
                        header("Location: http://localhost/hostelsystem/admin-pannel.php");
                        mysqli_close($conn);      
                   }
                   if(isset($_POST['roomsubmit'])){
                    include "config.php";
                    $roomname = $_POST['roomname'];
                    $sql10 = "INSERT INTO available_rooms(room_number) VALUES('{$roomname}')";
                    mysqli_query($conn,$sql10);
                    header("Location: http://localhost/hostelsystem/admin-pannel.php");
                    mysqli_close($conn); 
                   }
                   if(isset($_POST['deleteusername'])){
                       include "config.php";
                       $delusername = $_POST['delusername'];
                       $sql10 = "DELETE FROM hostel_admin WHERE admin_username = '{$delusername}'";
                       $result10 = mysqli_query($conn,$sql10) or die("Deletion Faild");
                       
                       $sql20 = "DELETE FROM res_information WHERE username= '{$delusername}'";
                       $result20= mysqli_query($conn,$sql20);

                   }
?>

<?php
include "header.php";
?>

   <!-- Nav Section -->

   <?php
   include "nav.php"

?>

   <!-- Header Section -->

   <section id="header-section" class="text-white li-gradient py-2">
       <div class="container">
           <div class="row">
               <div class="col-md-6">
                   <h1>
                       <i class="fas fa-cog"></i>
                       Dashboard
                   </h1>
               </div>
           </div>
       </div>
   </section>

   <!-- Action Section -->

   <div id="action" class="bg-light py-3 mb-3">
       <div class="container">
           <div class="row">
               <div class="col-md-3 mb-2">
                   <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#postModel">
                    <i class="fas fa-plus"></i> Add Residence
                   </a>
               </div>
               <div class="col-md-3 mb-2">
                   <a href="#" class="btn btn-warning btn-block text-white" data-toggle="modal" data-target="#roomModel">
                    <i class="fas fa-plus"></i> Add Room
                   </a>
               </div>
               <div class="col-md-3 mb-2">
                   <a href="#" class="btn btn-danger btn-block text-white" data-toggle="modal" data-target="#deleteuser">
                   <i class="fa fa-trash"></i> Delete Residence
                   </a>
               </div>
           </div>
       </div>
   </div>

   <?php
   include "delete.php";
   ?>
 
   <?php
   include "roommodal.php";
   ?>

   <!-- Post Model -->

  <?php
  include "adduser.php";
  ?>


   <!-- Post Detail Section -->

   <div id="post-detail">
       <div class="container">
           <div class="row">
           <div class="col-md-3">
                   <div class="card bg-primary text-white text-center mb-2">
                       <div class="card-body">
                       <?php
                include "config.php";
                $sql7 = "SELECT * FROM res_information";
                $result7=mysqli_query($conn,$sql7) or die("Rows Cant Count");
                $rowsCount = mysqli_num_rows($result7);
                ?>
                           <h3>Residence</h3>
                           <h4 class="display-4">
                            <i class="fas fa-pencil-alt"></i> <?php echo $rowsCount?>
                           </h4>
                           <a href="#" class="btn btn-outline-light">View</a>
                       </div>
                   </div>  
               </div>
               <div class="col-md-9">
                   <div class="card">
                       <div class="card-header">
                           <h5 class="card-title">Latest Users</h5>
                       </div>
                       <table class="table table-striped">
                           <thead class="thead-dark">
                               <tr>
                                   <th>#</th>
                                   <th>Name</th>
                                   <th>Room</th>
                                   <th>Mess</th>
                                   <th>Dues</th>
                               </tr>
                           </thead>
                           <tbody>
                           <?php
                               include "config.php";
                               $sql1 = "SELECT * from res_information ORDER BY resd_id DESC Limit 5";
                               $result1 = mysqli_query($conn,$sql1);
                               if(mysqli_num_rows($result1)>0){
                                   while($row1 = mysqli_fetch_assoc($result1)){
                               ?>
                               <tr>
                                   <td><?php echo $row1['resd_id'] ?></td>
                                   <td><?php echo $row1['res_name'] ?></td>
                                   <td> <?php echo $row1['res_room'] ?></td>
                                   <td><?php echo $row1['mess'] ?></td>
                                   <td>
                                       <button class="btn btn-secondary">
                                        <span><?php echo $row1['dues'] ?></span>
                                       </button>
                                   </td>
                               </tr>
                               <?php
                                   }
                                }
                                mysqli_close($conn);
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
     <!--CDN CKEDITER  -->
     <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
     <script>
        CKEDITOR.replace( 'editor1' );
    </script>
</body>
</html> 