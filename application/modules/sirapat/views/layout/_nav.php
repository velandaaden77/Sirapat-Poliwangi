

<nav class="navbar navbar-top navbar-expand navbar-light border-bottom " style="background-color:#3C8DBC;">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

        
        
        <h3 class="text-white"><?= $title ?> </h3>
        
                <!-- <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item active" aria-current="page">Data</li> -->
                

             
        

        <!-- Navbar links -->
        <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
          </ul>

          
            
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="<?= base_url('assets/admin/img/profile/') . $user['foto']; ?>" >
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  text-white font-weight-bold"><?= $user['nama'] ?></span>
                  </div>
                </div>
              </a>
                
              <div class="dropdown-menu  dropdown-menu-right ">
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-single-02 text-primary"></i>
                  <span>My profile</span>
                </a>
                  
                <div class="dropdown-divider"></div>
                <a href="<?= base_url('auth/logout'); ?>" class="dropdown-item">
                <i class="fas fa-sign-out-alt text-primary"></i>
                  <span>Logout</span>
                </a>
              </div>
                
            </li>
          </ul>
        </div>
      </div>
      </nav>
     