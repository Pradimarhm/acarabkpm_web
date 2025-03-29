@extends('backend/layouts.template')

<link rel="stylesheet" href="{{ asset('css/bootstrap-icons.css') }}">

@section('content')
    <section id="main-content" class="px-4">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="icon_document_alt"></i> Riwayat Hidup</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="{{ url('dashboard') }}">Home</a></li>
                        <li><i class="icon_document_alt"></i>Riwayat Hidup</li>
                        <li><i class="fa fa-files-o"></i>Pengalaman Kerja</li>
                    </ol>
                </div>
            </div>
            <!-- Form validations -->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading mb-4">
                            Pengalaman Kerja
                            <a href="{{ route('pengalaman_kerja.create') }}"><button class="ms-4 btn btn-primary"
                                    type="button"><i class="fa fa-plus"> Tambah</i></button></a>
                        </header>
                        <div class="panel-body">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success" id="success-alert">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif

                            <table class="table table-striped table-advance table-hover">
                                <tbody>
                                    <tr>
                                        <th><i class="bi bi-person-vcard"></i> Nama</th>
                                        <th><i class="bi bi-person-workspace"></i> Jabatan</th>
                                        <th><i class="bi bi-calendar-plus"></i> Tahun Masuk</th>
                                        <th><i class="bi bi-calendar-x"></i> Tahun Selesai</th>
                                        <th><i class="bi bi-dpad"></i> Action</th>
                                    </tr>
                                    @foreach ($pengalaman_kerja as $item)
                                        <tr>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->jabatan }}</td>
                                            <td>{{ $item->tahun_masuk }}</td>
                                            <td>{{ $item->tahun_keluar }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a class="btn btn-warning"
                                                        href="{{ route('pengalaman_kerja.edit', $item->id) }}">
                                                        <i class="bi bi-pencil-square text-white"></i>
                                                    </a>

                                                    <form action="{{ route('pengalaman_kerja.destroy', $item->id) }}" method="POST" class="m-0">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn bg-danger rounded-start-0"
                                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                            <i class="bi bi-x-square text-white"></i>
                                                        </button>
                                                    </form>
                                                </div>

                                                {{-- <div class="d-flex gap-2">
                                                    <!-- Tombol Edit -->
                                                    <a class="btn btn-warning d-flex align-items-center justify-content-center"
                                                        href="{{ route('pengalaman_kerja.edit', $item->id) }}" style="width: 45px; height: 45px;">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>

                                                    <!-- Form Delete -->
                                                    <form action="{{ route('pengalaman_kerja.destroy', $item->id) }}" method="POST" class="d-flex m-0">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger d-flex align-items-center justify-content-center"
                                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                                            style="width: 45px; height: 45px;">
                                                            <i class="bi bi-x-square"></i>
                                                        </button>
                                                    </form>
                                                </div> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </section>
    </section>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const alertBox = document.getElementById('success-alert');

        if (alertBox) {
            // Timer untuk menghilangkan notifikasi setelah 2 detik
            setTimeout(() => {
                alertBox.style.transition = "opacity 0.5s ease"; // Animasi fade out
                alertBox.style.opacity = "0";

                // Hapus dari DOM setelah animasi selesai (0.5s)
                setTimeout(() => {
                    alertBox.remove();
                }, 500);
            }, 5000); // 2 detik sebelum mulai fade out
        }
    });
</script>

<script src="{{ asset('backend/assets/js/main.js') }}"></script>
