<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../img/apple-icon.png">
    <link rel="icon" type="image/png" href="../img/favicon.png">
    <title>
        Guru
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
                    <a class="nav-link" href="{{ route('admin.dashboard') }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-table-columns" style="color: #344767"></i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('admin.guru') }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-user-tie"></i>
                        </div>
                        <span class="nav-link-text ms-1">Guru</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  " href="{{ route('admin.siswa') }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-users" style="color: #344767"></i>
                        </div>
                        <span class="nav-link-text ms-1">Siswa</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('materi.admin') }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-book" style="color: #344767"></i>
                        </div>
                        <span class="nav-link-text ms-1">Materi</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  " href="{{ route('nilai.admin') }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-star" style="color: #344767"></i>
                        </div>
                        <span class="nav-link-text ms-1">Nilai</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  " href="{{ route('jadwal.admin') }}">
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
                    <a class="nav-link  " href="#">
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

                            <h6>Guru</h6>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Tambah Guru
                            </button>
                            <form action="materi.guru.create" method="post">
                                @csrf
                            </form>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Guru</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('admin.guru.store') }}"
                                                enctype="multipart/form-data" id="tambahform">
                                                @csrf
                                                <section class="base">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label"></label>
                                                        <input type="hidden" name="id" class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1"
                                                            class="form-label">Nama</label>
                                                        <input type="text" name="nama" class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1"
                                                            class="form-label">Email</label>
                                                        <input type="text" name="email" class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1"
                                                            class="form-label">Password</label>
                                                        <input type="Text" name="password" class="form-control">
                                                        <br>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1"
                                                            class="form-label">Alamat</label>
                                                        <input type="Text" name="alamat" class="form-control">
                                                        <br>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1"
                                                            class="form-label">No.Telp</label>
                                                        <input type="Text" name="no_hp" class="form-control">
                                                        <br>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="gender" class="form-label">Jenis
                                                            Kelamin</label>
                                                        <select name="gender" class="form-select">
                                                            <option value="pria">PRIA</option>
                                                            <option value="wanita">WANITA</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1"
                                                            class="form-label">Foto</label>
                                                        <input type="file" name="foto" class="form-control">
                                                        <br>
                                                    </div>
                                                    <div>
                                                        <input type="submit" name="simpan" value="Tambah Guru"
                                                            class="btn btn-outline-primary" id="tambah">
                                                    </div>
                                                </section>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr class="text-xs font-weight-bold opacity-6">
                                            <th class="align-middle text-left">No</th>
                                            <th class="align-middle text-left">Nama</th>
                                            <th class="align-middle text-left">Email</th>
                                            <th class="align-middle text-left">Password</th>
                                            <th class="align-middle text-left">Alamat</th>
                                            <th class="align-middle text-left">No. Telp</th>
                                            <th class="align-middle text-left">Jenis Kelamin</th>
                                            <th class="align-middle text-left">Foto</th>
                                            <th class="align-middle text-left">Aksi</th>
                                        </tr>
                                    </thead>
                                    @foreach ($dtguru as $key => $item)
                                    <tbody>
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->password }}</td>
                                            <td>{{ $item->alamat }}</td>
                                            <td>{{ $item->no_hp }}</td>
                                            <td>{{ $item->gender }}</td>
                                            <td>
                                                @if ($item->foto)
                                                <img src="{{ asset('storage/photos/' . $item->foto) }}"
                                                    alt="Foto Guru"
                                                    style="width: 50px; height: 50px; object-fit: cover;">
                                                @else
                                                <span>No Photo</span>
                                                @endif
                                            </td>
                                            <td class="text-xs font-weight-bold">
                                                <div class="d-flex gap-2">
                                                    <a class="btn btn-success" data-bs-toggle="modal"
                                                        data-bs-target="#EditGuru{{ $item->id }}">Ubah</a>
                                                    <form action="{{ route('admin.guru.destroy', $item->id) }}"
                                                        method="POST" id="deleteform{{$item->id}}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="submit" class="btn btn-danger"
                                                            value="Delete" id="delete">
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Edit Modal -->
            @foreach ($dtguru as $key => $guru)
            <div class="modal fade" id="EditGuru{{ $guru->id }}" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Guru</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('admin.guru.update', $guru->id) }}"
                                enctype="multipart/form-data" id="editform{{$guru->id}}">
                                @csrf
                                @method('PUT')
                                <section class="base">
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" name="nama" class="form-control"
                                            value="{{ $guru->nama }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" name="email" class="form-control"
                                            value="{{ $guru->email }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="Text" name="password" class="form-control"
                                            value="{{ $guru->password }}"> <br>
                                    </div>
                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <input type="Text" name="alamat" class="form-control"
                                            value="{{ $guru->alamat }}"> <br>
                                    </div>
                                    <div class="mb-3">
                                        <label for="no_hp" class="form-label">No.Telp</label>
                                        <input type="Text" name="no_hp" class="form-control"
                                            value="{{ $guru->no_hp }}"> <br>
                                    </div>
                                    <div class="mb-3">
                                        <label for="gender" class="form-label">Jenis
                                            Kelamin</label>
                                        <select name="gender" class="form-select" value="{{ $guru->gender }}">
                                            <option value="pria">PRIA</option>
                                            <option value="wanita">WANITA</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="foto" class="form-label">Foto</label>
                                        <input type="file" name="foto" class="form-control"
                                            value="{{ $guru->foto }}">
                                        <br>
                                        @if ($guru->foto)
                                        <img src="{{ asset('storage/' . $guru->foto) }}" alt="Guru Foto"
                                            width="100">
                                        @endif
                                    </div>
                                    <div>
                                        <input type="submit" name="simpan" value="Simpan"
                                            class="btn btn-outline-primary" id="edit">
                                    </div>
                                </section>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach





            <!--   Core JS Files   -->
            <script src="../js/core/popper.min.js"></script>
            <script src="../js/core/bootstrap.min.js"></script>
            <script src="../js/plugins/perfect-scrollbar.min.js"></script>
            <script src="../js/plugins/smooth-scrollbar.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            {{-- notif delete --}}
            <script type="text/javascript">
                $(function() {
                    $(document).on('click', '#delete', function(e) {
                        e.preventDefault();
                        var formId = $(this).closest('form').attr('id');

                        Swal.fire({
                            title: "Apakah Anda Yakin?",
                            text: "Anda tidak dapat mengembalikan data ini!",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Yes, delete it!"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $('#' + formId).submit();
                                Swal.fire({
                                    title: "Data Berhasil DiHapus!",
                                    icon: "success"
                                });
                            }
                        });
                    });
                });
            </script>
            </script>
            {{-- notif tambah --}}
            <script type="text/javascript">
                $(function() {
                    $(document).on('click', '#tambah', function(e) {
                        e.preventDefault(); // Mencegah pengiriman form langsung

                        Swal.fire({
                            title: "Apakah Anda Yakin?",
                            icon: "question",
                            showCancelButton: true,
                            confirmButtonText: "Submit!",
                            cancelButtonText: "Cancel"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Kirim form secara manual
                                $('#tambahform').submit();
                            }
                        });
                    });
                });
            </script>

            {{-- notif edit --}}
            <script type="text/javascript">
                $(function() {
                    $(document).on('click', '#edit', function(e) {
                        e.preventDefault(); // Mencegah pengiriman form langsung

                        var formId = $(this).closest('form').attr('id');

                        Swal.fire({
                            title: "Apakah Anda Yakin?",
                            icon: "question",
                            showCancelButton: true,
                            confirmButtonText: "Submit!",
                            cancelButtonText: "Cancel"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $('#' + formId).submit();
                            }
                        });
                    });
                });
            </script>

            <script>
                var win = navigator.platform.indexOf('Win') > -1;
                if (win && document.querySelector('#sidenav-scrollbar')) {
                    var options = {
                        damping: '0.5'
                    }
                    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
                }
            </script>
</body>

</html>