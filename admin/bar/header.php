
<!--  Header Start -->
   <header class="topbar">
        <div class="with-vertical">
          <nav class="navbar navbar-expand-lg p-0">
            <ul class="navbar-nav">
              <li class="nav-item nav-icon-hover-bg rounded-circle ms-n2">
                <a class="nav-link sidebartoggler" id="headerCollapse" href="javascript:void(0)">
                  <i class="ti ti-menu-2"></i>
                </a>
              </li>
            
            </ul>

            <div class="d-block d-lg-none py-4">
              <a href="" class="text-nowrap logo-img">
                <img src="../img/neko.png" class="dark-logo" alt="Logo-Dark" width="50px"/>
                <img src="../img/neko.png" class="light-logo" alt="Logo-light" width="50px"/>
              </a>
            </div>
            <a class="navbar-toggler nav-icon-hover-bg rounded-circle p-0 mx-0 border-0" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <i class="ti ti-dots fs-7"></i>
            </a>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
              <div class="d-flex align-items-center justify-content-between">
                <!-- <a href="javascript:void(0)" class="nav-link nav-icon-hover-bg rounded-circle mx-0 ms-n1 d-flex d-lg-none align-items-center justify-content-center" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar" aria-controls="offcanvasWithBothOptions">
                  <i class="ti ti-align-justified fs-7"></i>
                </a> -->
                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                  <!-- ------------------------------- -->
                  <!-- start language Dropdown -->
                  <!-- ------------------------------- -->

<button id="toggle-theme"><i></i></button>
                 <!--  <li class="nav-item nav-icon-hover-bg rounded-circle">
                    <a class="nav-link moon dark-layout toggle-theme" >
                      <i class="ti ti-moon moon"></i>
                    </a>
                    <a class="nav-link sun light-layout toggle-theme"  >
                      <i class="ti ti-sun sun"></i>
                    </a>
                  </li> -->
                  

                  <!-- ------------------------------- -->
                  <!-- start profile Dropdown -->
                  <!-- ------------------------------- -->
                  <li class="nav-item dropdown">
                    <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" aria-expanded="false">
                      <div class="d-flex align-items-center">
                        <div class="user-profile-img">
                          <img src="<?= $userInfo['picture'] ?>" class="rounded-circle" width="35" height="35" alt="modernize-img" />
                        </div>
                      </div>
                    </a>
                    <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop1">
                      <div class="profile-dropdown position-relative" data-simplebar>
                        <div class="py-3 px-7 pb-0">
                          <h5 class="mb-0 fs-5 fw-semibold"><?= $userInfo['urole'] ?> Profile</h5>
                        </div>
                        <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                          <img src="<?= $userInfo['picture'] ?>" class="rounded-circle" width="80" height="80" alt="modernize-img" />
                          <div class="ms-3">
                            <h5 class="mb-1 fs-3"><?= $userInfo['full_name'] ?></h5>
                            <span class="mb-1 d-block"><?= $userInfo['position'] ?>, <?= $userInfo['organize'] ?></span>
                            <p class="mb-0 d-flex align-items-center gap-2">
                              <i class="ti ti-mail fs-4"></i> <?= $userInfo['email'] ?>
                            </p>
                          </div>
                        </div>
                        
                        <div class="d-grid py-4 px-7 pt-8">
                          
                          <a href="./controller/logout.php" class="btn btn-outline-primary">Log Out</a>
                        </div>
                      </div>
                    </div>
                  </li>
                  <!-- ------------------------------- -->
                  <!-- end profile Dropdown -->
                  <!-- ------------------------------- -->
                </ul>
              </div>
            </div>
          </nav>
          <!-- ---------------------------------- -->
          <!-- End Vertical Layout Header -->
          <!-- ---------------------------------- -->

     
        </div> 
      </header>
      <!--  Header End -->

    