<nav class="navbar navbar-expand-md navbar-light bg-dark text-light py-4 navbar-fixed-top">
          <a href="#" class="navbar-brand text-white">BZU Hostel Managemnet System</a>
          <button class="navbar-toggler" data-toggle="collapse" data-target="#hostelnav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div id="hostelnav" class="collapse navbar-collapse">
               <ul class="navbar-nav ml-auto">
                  <li class="nav-item dropdown">
                      <?php
                      if(isset($_SESSION['myusername'])){
                      ?>
                      <a href="" class="nav-link disabled text-white" data-toggle="dropdown">
                          <i class="fas fa-user"></i> <?php echo $_SESSION['myusername']?>
                      </a>
                      <?php
                      }
                      ?>
                  </li> 
                  <!-- Logout Item -->
                  <div class="nav-item">
                      <a href="logout.php" target="_self" class="nav-link text-white">
                          <i class="fas fa-user-times"></i>Logout
                      </a>
                  </div>
               </ul>
           </div>
      </nav>