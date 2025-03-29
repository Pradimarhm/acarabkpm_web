@extends('backend/layouts.template')

@section('content')
    <section id="main-content" class="mx-4">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="icon_document_alt"></i> Riwayat Hidup</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="{{ url('dashboard') }}">Home</a></li>
                        <li><i class="icon_document_alt"></i>Riwayat Hidup</li>
                        <li><i class="fa fa-files-o"></i>Pendidikan</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Pendidikan
                        </header>
                        <div class="panel-body">
                            @if (session()->get('success'))
                                <div class="alert alert-success" id="success-alert">
                                    <p>{{ session()->get('success') }}</p>
                                </div>
                            @endif

                            <a href="{{ route('pendidikan.create') }}">
                                <button class="btn btn-primary" type="button">
                                    <i class="fa fa-plus"></i> Tambah
                                </button>
                            </a>
                            <br><br>

                            <table class="table table-striped table-advance table-hover">
                                <tbody>
                                    <tr>
                                        <th><i class="icon_bag"></i> Nama</th>
                                        <th><i class="icon_document"></i> Tingkatan</th>
                                        <th><i class="icon_calendar"></i> Tahun Masuk</th>
                                        <th><i class="icon_calendar"></i> Tahun Selesai</th>
                                        <th><i class="icon_cogs"></i> Action</th>
                                    </tr>

                                    @foreach ($pendidikan as $item)
                                        <tr>
                                            <td>{{ $item->nama }}</td>
                                            <td>
                                                @if ($item->tingkatan == 1)
                                                    TK
                                                @elseif ($item->tingkatan == 2)
                                                    SD
                                                @elseif ($item->tingkatan == 3)
                                                    SMP
                                                @elseif ($item->tingkatan == 4)
                                                    SMA/SMK
                                                @elseif ($item->tingkatan == 5)
                                                    D3
                                                @elseif ($item->tingkatan == 6)
                                                    D4/S1
                                                @elseif ($item->tingkatan == 7)
                                                    S2
                                                @elseif ($item->tingkatan == 8)
                                                    S3
                                                @endif
                                            </td>
                                            <td>{{ $item->tahun_masuk }}</td>
                                            <td>{{ $item->tahun_keluar }}</td>
                                            <td>
                                                <!-- Tombol Aksi (Edit/Delete) -->
                                                <a href="{{ route('pendidikan.edit', $item->id) }}"
                                                    class="btn btn-warning btn-sm">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <form action="{{ route('pendidikan.destroy', $item->id) }}" method="POST"
                                                    style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                        <i class="fa fa-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </section>
                </div>
            </div>
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
