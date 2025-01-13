<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../img/apple-icon.png">
    <link rel="icon" type="image/png" href="../img/favicon.png">
    <title>
        Materi
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
                    <a class="nav-link  " href="{{ route('admin.guru') }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-user-tie" style="color: #344767"></i>
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
                    <a class="nav-link  active" href="{{ route('materi.admin') }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-book"></i>
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
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Tambah Materi
                            </button>
                            <form action="" method="post">
                                @csrf
                            </form>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Materi</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('materi.admin.store') }}"
                                                enctype="multipart/form-data" id="tambahform">
                                                @csrf
                                                <section class="base">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label"></label>
                                                        <input type="hidden" name="id" class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1"
                                                            class="form-label">Kelas</label>
                                                        <input type="text" name="nama_kelas" class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="mapel_id" class="form-label">Mata Pelajaran</label>
                                                        <select class="form-select" id="mapel_id" name="mapel_id">
                                                            <option value="" selected>Tidak ada Mata Pelajaran</option>
                                                            @foreach ($mapeladmin as $mapel)
                                                                <option value="{{ $mapel->id }}"
                                                                    {{ $mapel->id == $mapel->mapel_id ? 'selected' : '' }}>
                                                                    {{ $mapel->nama_mapel }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="nama_materi" class="form-label">Nama
                                                            Materi</label>
                                                        <input type="text" name="nama_materi" class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="guru_id" class="form-label">Guru</label>
                                                        <select class="form-select" id="guru_id" name="guru_id">
                                                            <option value="" selected>Tidak ada guru</option>
                                                            @foreach ($guruadmin as $guru)
                                                                <option value="{{ $guru->id }}"
                                                                    {{ $guru->id == $guru->guru_id ? 'selected' : '' }}>
                                                                    {{ $guru->nama }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1"
                                                            class="form-label">Materi</label>
                                                        <input type="file" name="isi_materi" class="form-control">
                                                        <br>
                                                    </div>
                                                    <div>
                                                        <input type="submit" name="simpan" value="Tambah Materi"
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
                                            <th>No</th>
                                            <th class="align-middle text-center">Kelas</th>
                                            <th class="align-middle text-center">Nama Pelajaran</th>
                                            <th class="align-middle text-center">Nama Materi</th>
                                            <th class="align-middle text-center">Guru</th>
                                            <th class="align-middle text-center">Materi</th>
                                            <th class="align-middle text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    @foreach ($dtmateriadmin as $key => $item)
                                        <tbody>
                                            <tr>
                                                <td class="align-middle text-center">{{ $key + 1 }}</td>
                                                <td class="align-middle text-center">{{ $item->nama_kelas }}</td>
                                                <td class="align-middle text-center">{{ $item->mapel->nama_mapel }}</td>
                                                <td class="align-middle text-center">{{ $item->nama_materi }}</td>
                                                <td class="align-middle text-center">{{ $item->guru->nama ?? '-' }}</td>
                                                <!-- Pastikan relasi ke guru sudah benar -->
                                                <td class="align-middle text-center"> <a href="{{ route('materi.download.admin', $item->id) }}"
                                                        class="btn btn-primary" download>{{ $item->isi_materi }}</a>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <div class="d-flex gap-2">
                                                        <a class="btn btn-success" data-bs-toggle="modal"
                                                            data-bs-target="#EditMateri{{ $item->id }}">Ubah</a>
                                                        <form action="{{ route('materi.admin.destroy', $item->id) }}"
                                                            method="POST" id="deleteform{{ $item->id }}">
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
            @foreach ($dtmateriadmin as $key => $item)
                <div class="modal fade" id="EditMateri{{ $item->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Materi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('materi.admin.update', $item->id) }}" method="POST"
                                    enctype="multipart/form-data" id="editform{{ $item->id }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="nama_kelas" class="form-label">Nama Kelas</label>
                                            <input type="text" class="form-control" id="nama_kelas"
                                                name="nama_kelas" value="{{ $item->nama_kelas }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="mapel_id" class="form-label">Mata Pelajaran</label>
                                            <select class="form-select" id="mapel_id" name="mapel_id">
                                                <option value="" selected>Tidak ada Mata Pelajaran</option>
                                                @foreach ($mapeladmin as $mapel)
                                                    <option value="{{ $mapel->id }}"
                                                        {{ $mapel->id == $item->mapel_id ? 'selected' : '' }}>
                                                        {{ $mapel->nama_mapel }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nama_materi" class="form-label">Nama Materi</label>
                                            <input type="text" class="form-control" id="nama_materi"
                                                name="nama_materi" value="{{ $item->nama_materi }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="guru_id" class="form-label">Guru</label>
                                            <select class="form-select" id="guru_id" name="guru_id">
                                                <option value="" selected>Tidak ada guru</option>
                                                @foreach ($guruadmin as $guru)
                                                    <option value="{{ $guru->id }}"
                                                        {{ $guru->id == $item->guru_id ? 'selected' : '' }}>
                                                        {{ $guru->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="isi_materi" class="form-label">File Materi
                                                (PDF/Word/PowerPoint)</label>
                                            <input type="file" class="form-control" id="isi_materi"
                                                name="isi_materi">
                                            @if ($item->isi_materi)
                                                <small>File saat ini: <a
                                                        href="{{ asset('uploads/' . $item->isi_materi) }}"
                                                        target="_blank">{{ $item->isi_materi }}</a></small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary" id="edit">Simpan Perubahan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>




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
                        confirmButtonText: "Ya, Hapus!"
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
                        confirmButtonText: "Simpan!",
                        cancelButtonText: "Batalkan"
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
                        confirmButtonText: "Simpan!",
                        cancelButtonText: "Batalkan"
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
