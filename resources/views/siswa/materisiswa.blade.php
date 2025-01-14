<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../img/apple-icon.png">
    <link rel="icon" type="image/png" href="../img/favicon.png">
    <title>
        Produk
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
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 "
        id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="https://demos.creative-tim.com/soft-ui-dashboard/pages/dashboard.html"
                target="_blank">
                <i class="fa-solid fa-graduation-cap"></i>
                <span class="ms-1 font-weight-bold">Elearning</span>
            </a>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse  w-auto  max-height-vh-100 h-100" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link  " href="{{ route('siswa.dashboard') }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-table-columns" style="color: #344767"></i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  active" href="{{ route('materi.siswa') }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-book"></i>
                        </div>
                        <span class="nav-link-text ms-1">Materi</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  " href="{{ route('nilai.siswa') }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-star" style="color: #344767"></i>
                        </div>
                        <span class="nav-link-text ms-1">Nilai</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  " href="{{ route('jadwal.siswa') }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-regular fa-calendar-days" style="color: #344767"></i>
                        </div>
                        <span class="nav-link-text ms-1">Jadwal</span>
                    </a>
                </li>
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link  " href="{{ route('profile.siswa') }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-address-card" style="color: #344767"></i>
                        </div>
                        <span class="nav-link-text ms-1">Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  " href="../pages/logout.php">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-right-from-bracket" style="color: #344767"></i>
                        </div>
                        <span class="nav-link-text ms-1">Logout</span>
                    </a>
                </li>

            </ul>
        </div>

    </aside>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">


        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Materi</li>
        </ol>

        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">

                            <h6>Materi</h6>
                            </form>

                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr class="text-xs font-weight-bold opacity-6">
                                            <th>No</th>
                                            <th class="align-middle text-center">Kelas</th>
                                            <th class="align-middle text-center">Nama Pelajaran</th>
                                            <th class="align-middle text-center">Guru</th>
                                            <th class="align-middle text-center">Materi</th>
                                        </tr>
                                    </thead>
                                    @foreach ($dtmateriadmin as $key => $item)
                                    <tbody>
                                        <tr>
                                            <td class="align-middle text-center">{{ $key + 1 }}</td>
                                            <td class="align-middle text-center">{{ $item->nama_kelas }}</td>
                                            <td class="align-middle text-center">{{ $item->mapel->nama_mapel }}</td>
                                            <td class="align-middle text-center">{{ $item->guru->nama ?? '-' }}</td>
                                            <td class="align-middle text-center"><button type="button"
                                                    class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal">
                                                    Lihat Materi
                                        </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Materi Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Materi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title text-center">{{ $item->mapel->nama_mapel }}</h5>
                                    <p class="card-text text-justify">{{ $item->nama_materi }}</p>
                                    <td class="align-middle text-center"> <a href="{{ route('materi.download.admin', $item->id) }}"
                                            class="btn btn-primary" download>{{ $item->isi_materi }}</a>
                                    </td>
                                </div>
                            </div>
                        </div>
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