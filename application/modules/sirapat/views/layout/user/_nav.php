

<nav class="navbar navbar-top navbar-expand navbar-light fixed-top border-bottom " style="background-color:#3C8DBC;">
          <a href="<?= base_url('sirapat/user/dashboard'); ?>">
          <img src="<?= base_url('assets/dashboard/'); ?>img/logonav.png"  class="navbar-brand-img" alt="..." style="margin-left:20px" width="21%">
          </a>

      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        
        

        <!-- Navbar links -->
        <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              
            </li>
          </ul>
            
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="<?= base_url('assets/dashboard/img/profile/user/') . $user['foto']; ?>" >
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  text-white font-weight-bold"><?= $user['nama_karyawan'] ?></span>
                  </div>
                </div>
              </a>
                
              <div class="dropdown-menu  dropdown-menu-right ">
              <a href="<?= base_url('sirapat/user/dashboard/editprofil') ?>" class="dropdown-item">
                  <i class="ni ni-single-02 text-primary"></i>
                  <span>Edit profil</span>
                </a>
                <a href="<?= base_url('sirapat/user/dashboard/gantipassword') ?>" class="dropdown-item">
                  <i class="fas fa-key text-primary"></i>
                  <span>Ganti Password</span>
                </a>
                  
                <div class="dropdown-divider"></div>
                <a href="<?= base_url('auth/user/logout'); ?>" class="dropdown-item">
                <i class="fas fa-sign-out-alt text-primary"></i>
                  <span>Logout</span>
                </a>
              </div>
                
            </li>
          </ul>
        </div>
      </div>
      </nav>
     