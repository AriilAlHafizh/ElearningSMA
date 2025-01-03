<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../img/apple-icon.png">
  <link rel="icon" type="image/png" href="../img/favicon.png">
  <title>
    Elearning
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

  <!-- Nucleo Icons -->
  <link href="../css/nucleo-icons.css" rel="stylesheet" />
  <link href="../css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-100">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="../pages/dashboard.php">
        <i class="fa-solid fa-graduation-cap"></i> 
        <span class="ms-1 font-weight-bold">Elearning</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100 h-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link  active" href="">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-table-columns"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link  " href="{{ route('admin.guru') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-user-tie" style="color: #344767"></i>
            </div>
            <span class="nav-link-text ms-1">Guru</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link  " href="{{ route('admin.siswa') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-users" style="color: #344767"></i>
            </div>
            <span class="nav-link-text ms-1">Siswa</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link  " href="{{ route('materi.admin') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-book" style="color: #344767"></i>
            </div>
            <span class="nav-link-text ms-1">Materi</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link  "href="{{ route('nilai.admin') }}" >
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-star" style="color: #344767"></i>
            </div>
            <span class="nav-link-text ms-1">Nilai</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link  " href="{{ route('jadwal.admin') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-regular fa-calendar-days" style="color: #344767"></i>
            </div>
            <span class="nav-link-text ms-1">Jadwal</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link  " href="{{ route('profile.admin') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-address-card" style="color: #344767"></i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link  " href="../pages/logout.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-right-from-bracket" style="color: #344767"></i>
            </div>
            <span class="nav-link-text ms-1">Logout</span>
          </a>
        </li>
      </ul>
    </div>
    
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">

        <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg bg-transparent shadow-none position-absolute px-4 w-100 z-index-2">
      <div class="container-fluid py-1">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-4 ps-2 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="text-white opacity-5" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Dashboard</li>
          </ol>
          <h6 class="text-white font-weight-bolder ms-2">Dashboard</h6>
        </nav>
        <div class="collapse navbar-collapse me-md-0 me-sm-4 mt-sm-0 mt-2" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid">
      <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('../img/SMAN8_1.jpg'); background-position-y: 25%;">
        <span class="mask bg-gradient-primary opacity-6"></span>
      </div>
      <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
        <div class="row gx-4">
          <div class="col-auto">
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">Selamat datang Admin di Elearning .</h5>
              <p class="mb-0 font-weight-bold text-sm">Admin</p>
            </div>
          </div>
       
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- biar displaynya flex -->
    <div class="col-12 mt-4">
          <div class="card mb-4">
            <div class="card-header pb-0 p-3">
              <h6 class="mb-1">Elearning</h6> 
            </div>
              <div class="row">
                <div class="col-xl-0 col-md-0 mb-xl-0 mb-0">
                  <div class="card card-blog card-plain">
                    <div class="position-relative">
                    </div>
                    <div class="card-body px-1 pb-0">
                      <div class="d-flex align-items-center justify-content-between">
                        <div class="avatar-group mt-2"> 
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

        <div class="col-md-3">
        <div class="card" >
        <img src="resources/foto_produk/" class="card-img-top">
        <div class="card-body">
        <h5 class="card-title"></h5>
        <p class="card-text"></p>
        <a href="beli_produk.php?id_produk=" class="btn btn-primary">well</a> 
        </div>
        </div>
        </div>
        </div>


      



        
  <!--   Core JS Files   -->
  <script src="../js/core/popper.min.js"></script>
  <script src="../js/core/bootstrap.min.js"></script>
  <script src="../js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../js/soft-ui-dashboard.min.js?v=1.0.3"></script>
</body>

</html>