<div id="postModel" class="modal fade">
       <div class="modal-dialog modal-lg">
           <div class="modal-content">
               <div class="modal-header bg-primary text-white">
                   <h5 class="modal-title">Add Residence</h5>
                   <button class="close" data-dismiss="modal">
                    <span>
                        &times;
                    </span>
                   </button>
               </div>
               <div class="modal-body">
                   <form method="post">
                       <div class="form-group">
                           <label for="titleInput">Residence Name</label>
                           <input type="text" name="resname" id="titleInput" class="form-control">
                       </div>
                       <div class="form-group">
                           <label for="titleInput">Residence Address</label>
                           <input type="text" name="ressadd" id="titleInput" class="form-control">
                       </div>
                       <div class="form-group">
                           <label for="titleInput">Residence Username</label>
                           <input type="text" name="username" id="titleInput" class="form-control">
                       </div>
                       <div class="form-group">
                           <label for="titleInput">Residence Password</label>
                           <input type="password" name="password" id="titleInput" class="form-control">
                       </div>
                       <div class="form-group">
                           <label for="titleInput">Residence Contact</label>
                           <input type="text" name="rescontact" id="titleInput" class="form-control">
                       </div>

                       <div class="form-group">
                           <label for="catInput">Room Number</label>
                           <select name="roomnumber" id="catInput" class="form-control">
                               <?php
                               include "config.php";
                               $sql1 = "SELECT * from available_rooms";
                               $result1 = mysqli_query($conn,$sql1);
                               if(mysqli_num_rows($result1)>0){
                                   while($row1 = mysqli_fetch_assoc($result1)){
                               ?>
                               <option value="<?php echo $row1['room_number']?>"><?php echo $row1['room_number']?></option>
                               <?php
                                   }
                                }
                                mysqli_close($conn);
                                ?>
                           </select>
                       </div>

                       <div class="form-group">
                           <label for="catInput">Mess Included</label>
                           <select name="mess" id="catInput" class="form-control">
                               <option value="yes">Yes</option>
                               <option value="no">No</option>
                           </select>
                       </div>

                       <div class="form-group">
                           <label for="catInput">Dues</label>
                           <select name="dues" id="catInput" class="form-control">
                               <option value="Paid">Paid</option>
                               <option value="Unpaid">Unpaid</option>
                           </select>
                       </div>
                       
                   
                   <div class="modal-footer">
                   <input type="submit" name="catsubmit" id="" class="btn btn-primary">
               </div>
               
                   </form>
                  
               </div>
               
           </div>
       </div>

   </div>
