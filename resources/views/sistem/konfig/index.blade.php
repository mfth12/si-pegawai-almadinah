@extends('theme.back')

@section('container')
    {{-- Content Wrapper. Contains page content --}}
    <div class="content-wrapper">
        {{-- Content Header (Page header) --}}
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <h1>{{ $head_page }}</h1>
                    </div>
                    <div class="col-md-6">
                        <ol class="breadcrumb float-sm-right">
                            {{ Breadcrumbs::render() }}
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        @php $kosong = "<i>(Tidak ada data)</i>"; @endphp

        {{-- Main content --}}
        <section class="content">
            <div class="container-fluid">
                <div class="row align-content-center">
                    {{-- col --}}
                    <div class="col-lg-12">
                        {{-- flash hijau --}}
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#umum"
                                            data-toggle="tab">Umum</a></li>
                                    <li class="nav-item"><a class="nav-link" id="set" href="#pengguna"
                                            data-toggle="tab">Pengguna</a></li>
                                    {{-- <li class="nav-item"><a class="nav-link" id="set" href="#monitoring"
                                            data-toggle="tab">Monitoring</a></li> --}}
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="umum">
                                        <form enctype="multipart/form-data"
                                            action="/konfig/store_umum/{{ $konfig->konfig_id }}" method="POST"
                                            name="konfig_umum">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h3 class="card-title">Lembaga</h3>
                                                        </div>
                                                        <div class="card-body">

                                                            {{-- @method('post') --}}
                                                            <input type="hidden" name="konfig_id"
                                                                value="{{ $konfig->konfig_id }}">
                                                            <div class="form-group row">
                                                                <label for="nama_sistem"
                                                                    class="col-sm-4 col-form-label">Nama Sistem</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text"
                                                                        class="form-control @error('nama_sistem') is-invalid @enderror"
                                                                        id="nama_sistem" name="nama_sistem"
                                                                        value="{{ old('nama_sistem', $konfig->nama_sistem) }}"
                                                                        placeholder="{{ $konfig->nama_sistem }}">
                                                                    @error('nama_sistem')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="unik" class="col-sm-4 col-form-label">Nama
                                                                    Unik</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text"
                                                                        class="form-control @error('unik') is-invalid @enderror"
                                                                        id="unik" name="unik"
                                                                        value="{{ old('unik', $konfig->unik) }}"
                                                                        placeholder="{{ $konfig->unik }}">
                                                                    @error('unik')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="nama_lembaga"
                                                                    class="col-sm-4 col-form-label">Nama Lembaga</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text"
                                                                        class="form-control @error('nama_lembaga') is-invalid @enderror"
                                                                        id="nama_lembaga" name="nama_lembaga"
                                                                        value="{{ old('nama_lembaga', $konfig->nama_lembaga) }}"
                                                                        placeholder="{{ $konfig->nama_lembaga }}">
                                                                    @error('nama_lembaga')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="alamat_lembaga"
                                                                    class="col-sm-4 col-form-label">Alamat</label>
                                                                <div class="col-sm-8">
                                                                    <textarea class="form-control @error('alamat_lembaga') is-invalid @enderror" id="alamat_lembaga" name="alamat_lembaga"
                                                                        rows="4" placeholder="{{ $konfig->alamat_lembaga }}">{{ old('alamat_lembaga', $konfig->alamat_lembaga) }}</textarea>
                                                                    @error('alamat_lembaga')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="email_resmi"
                                                                    class="col-sm-4 col-form-label">Email Resmi</label>
                                                                <div class="col-sm-8">
                                                                    <input type="email"
                                                                        class="form-control @error('email_resmi') is-invalid @enderror"
                                                                        value="{{ old('email_resmi', $konfig->email_resmi) }}"
                                                                        id="email_resmi" name="email_resmi"
                                                                        placeholder="{{ $konfig->email_resmi }}">
                                                                    @error('email_resmi')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="no_telp" class="col-sm-4 col-form-label">No
                                                                    Telp / Whatsapp</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control @error('no_telp') is-invalid @enderror"
                                                                        value="{{ old('no_telp', $konfig->no_telp) }}"
                                                                        id="no_telp" name="no_telp"
                                                                        placeholder="{{ $konfig->no_telp }}">
                                                                    @error('no_telp')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="offset-sm-4 col-sm-8">
                                                                    <button type="submit" class="btn btn-primary"
                                                                        id="simpan_umum">Simpan <i
                                                                            class="fa-solid fa-floppy-disk ml-1"></i></button>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h3 class="card-title">Logo dan ikon</h3>
                                                            <div class="card-tools">
                                                                <button type="button" class="btn btn-tool"
                                                                    data-card-widget="collapse">
                                                                    <i class="fas fa-minus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row d-flex">
                                                                <div class="col-md-6 mr-auto p-1">
                                                                    <label for="logo_lembaga" class="form-label">Logo
                                                                        Lembaga:</label>
                                                                    @if ($konfig->logo_lembaga != null)
                                                                        <input type="hidden" name="logoOld"
                                                                            value="{{ old('logo_lembaga', $konfig->logo_lembaga) }}">
                                                                        <img src="{{ old('logo_lembaga', (asset('img/' . $konfig->logo_lembaga))) }}"
                                                                            class="logo-lihat frame-gambar img-fluid mb-3">
                                                                        <a class="btn btn-md btn-outline-secondary mb-2"
                                                                            style="display:block"
                                                                            onclick="document.getElementById('logo_lembaga').click()">Ubah
                                                                            <i class="fa-solid fa-image ml-1"></i></a>
                                                                    @else
                                                                        <img
                                                                            class="logo-lihat frame-gambar img-fluid mb-3 ">
                                                                        <a class="btn btn-md btn-outline-secondary mb-2"
                                                                            style="display:block"
                                                                            onclick="document.getElementById('logo_lembaga').click()">Upload
                                                                            <i
                                                                                class="fa-solid fa-circle-arrow-up ml-1"></i></a>
                                                                    @endif

                                                                    <input
                                                                        class="form-control @error('logo_lembaga') is-invalid @enderror"
                                                                        type="file" id="logo_lembaga"
                                                                        name="logo_lembaga" style="display:none"
                                                                        onchange="lihatLogo()">
                                                                    @error('logo_lembaga')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>

                                                                <div class="col-md-6 p-1">
                                                                    <label for="ikon" class="form-label">Ikon
                                                                        Sistem:</label>
                                                                    @if ($konfig->ikon != null)
                                                                        <input type="hidden" name="ikonOld"
                                                                            value="{{ old('ikon', $konfig->ikon) }}">
                                                                        <img src="{{ old('ikon', (asset('img/' . $konfig->ikon))) }}"
                                                                            class="ikon-lihat frame-gambar img-fluid mb-3">
                                                                        <a class="btn btn-md btn-outline-secondary mb-2"
                                                                            style="display:block"
                                                                            onclick="document.getElementById('ikon').click()">Ubah
                                                                            <i class="fa-solid fa-image ml-1"></i></a>
                                                                    @else
                                                                        <img
                                                                            class="ikon-lihat frame-gambar img-fluid mb-3 ">
                                                                        <a class="btn btn-md btn-outline-secondary mb-2"
                                                                            style="display:block"
                                                                            onclick="document.getElementById('ikon').click()">Upload
                                                                            <i
                                                                                class="fa-solid fa-circle-arrow-up ml-1"></i></a>
                                                                    @endif

                                                                    <input
                                                                        class="form-control @error('ikon') is-invalid @enderror"
                                                                        type="file" id="ikon" name="ikon"
                                                                        style="display:none" onchange="lihatIkon()">
                                                                    @error('ikon')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h3 class="card-title">Riwayat Pendidikan</h3>
                                                            <div class="card-tools">
                                                                <button type="button" class="btn btn-tool"
                                                                    data-card-widget="collapse">
                                                                    <i class="fas fa-minus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <table id="example1"
                                                                class="table table-bordered table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th>No.</th>
                                                                        <th>Nama Sekolah</th>
                                                                        <th>Tahun</th>
                                                                        <th>Ket.</th>
                                                                    </tr>
                                                                </thead>

                                                                <tbody>
                                                                    <tr>
                                                                        <td>1</td>
                                                                        <td>SDIT As-Sakinah</td>
                                                                        <td>2015-2021</td>
                                                                        <td>Cumlaude</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>2</td>
                                                                        <td>MTs Idris Bintan</td>
                                                                        <td>2022-2023</td>
                                                                        <td></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>

                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h3 class="card-title">Riwayat Penyakit Dalam</h3>
                                                            <div class="card-tools">
                                                                <button type="button" class="btn btn-tool"
                                                                    data-card-widget="collapse">
                                                                    <i class="fas fa-minus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <table id="example1"
                                                                class="table table-bordered table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th>No.</th>
                                                                        <th>Nama Penyakit</th>
                                                                        <th>Tahun</th>
                                                                        <th>Ket.</th>
                                                                    </tr>
                                                                </thead>

                                                                <tbody>
                                                                    <tr>
                                                                        <td>1</td>
                                                                        <td>Asma</td>
                                                                        <td>2019-2020</td>
                                                                        <td>Sering kambuh</td>
                                                                    </tr>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="pengguna">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Level Pengguna</h3>
                                                    </div>
                                                    <div class="card-body">
                                                        <table id="table_level" class="table table-bordered table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width: 1%">No.</th>
                                                                    <th>Level</th>
                                                                    <th>Aksesibilitas</th>
                                                                    <th class="text-nowrap text-center" style="width: 1%">
                                                                        Aksi</th>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                        <div class="d-flex flex-row-reverse mt-4">
                                                            <a href="javascript:void(0)" onclick="dev()"
                                                                class="btn btn-primary mb-3">Tambah
                                                                <i class="fa-solid fa-plus ml-1"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('js_atas')
    {{-- kosong --}}
@endsection

@section('style')
    <style>
        /*Code to change color of active link*/
        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            color: #fff;
            background-color: slategrey;
        }

        .table-borderless td,
        .table-borderless th {
            padding: 0.75rem 0.75rem 0.75rem 0rem;
        }

        .badge-outline-secondary {
            text-align: center;
            color: #6c757d;
            background-color: transparent;
            border-color: #6c757d;
            border: 1px solid;
            border-radius: 1rem;
        }

        .no-select::selection,
        .no-select *::selection {
            background-color: Transparent;
        }

        .no-select {
            /* Sometimes I add this too. */
            cursor: default;
        }

        .frame-gambar {
            color: #6c757d;
            border-color: #6c757d;
            padding: 0.3rem 0.3rem;
            border-radius: 0.25rem;
            border: 1px solid transparent;
        }

        .bundaran_id {
            font-size: 100%;
            padding: 0.1em 0.75em;
            line-height: unset;
            font-weight: 400;
            color: #6c757d;
            background-color: transparent;
            border-color: #6c757d;
            border: 1px solid;
            border-radius: 1rem;
        }
    </style>
@endsection

@section('js_atas')
    {{-- kosong --}}
@endsection

@section('js_bawah')
    {{-- kosong --}}
    @if (session()->has('hijau'))
        <script>
            iziToast.success({ //tampilkan izitoast warning
                title: 'Berhasil.',
                message: '{{ Session('hijau') }}',
                position: 'topCenter'
            });
        </script>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>

    {{-- JAVASCRIPT --}}
    <script>
        //CSRF TOKEN PADA HEADER
        //Script ini wajib krn kita butuh csrf token setiap kali mengirim request post, patch, put dan delete ke server
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        //TOMBOL TAMBAH DATA
        //jika tombol-tambah diklik maka
        // $('#tombol-tambah').click(function() {
        //     $('#button-simpan').val("create-post"); //valuenya menjadi create-post
        //     $('#id').val(''); //valuenya menjadi kosong
        //     $('#form-tambah-edit').trigger("reset"); //mereset semua input dll didalamnya
        //     $('#modal-judul').html("Tambah Berita Baru"); //valuenya tambah pegawai baru
        //     $('#tambah-edit-modal').modal('show'); //modal tampil
        // });

        //MULAI DATATABLE
        //script untuk memanggil data json dari server dan menampilkannya berupa datatable
        $(document).ready(function() {
            $('#table_level').DataTable({
                lengthChange: true, //apakah statik atau bisa berubah
                info: true,
                autoWidth: false, //mengatur lebar width pada table otomatis
                responsive: true,
                lengthMenu: [
                    [5, 10, 20, -1],
                    [5, 10, 20, "Semua"]
                ], //jumlah data yang ditampilkan

                processing: true,
                serverSide: true, //aktifkan server-side 
                ajax: {
                    url: "{{ route('konfig.ambil_level') }}",
                    type: 'GET'
                },
                columns: [{
                        data: null,
                        sortable: true, //harusnya false
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        data: 'level',
                        name: 'level'
                    },
                    {
                        data: 'akses',
                        name: 'akses',
                        className: "text-left"
                    },
                    {
                        data: 'aksi',
                        name: 'aksi'
                    },
                ],

                columnDefs: [{
                    orderable: false,
                    targets: [0, 2, 3]
                }],
                // order: [
                //     [2, 'asc']
                // ],
                dom: "<'row d-flex align-items-baseline'<'col-sm-12 col-md-6'<'d-flex align-items-baseline'<'mr-2'i><'mr-2'l>>><'col-sm-12 col-md-6'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-12 col-md-6'><'col-sm-12 col-md-6'p>>",
                // "initComplete": function() {
                //     addColNumbers();
                // },
                language: {
                    "processing": "Memproses data..",
                    "loadingRecords": "Memuat data..",
                    "lengthMenu": "Tampilkan _MENU_ baris.",
                    "zeroRecords": "Data tidak ditemukan.",
                    "info": "Halaman _PAGE_ dari _PAGES_,",
                    "infoEmpty": "Kosong",
                    "infoFiltered": "(terfilter dari total _MAX_ rekam data)",
                    "search": "Cari:",
                    "emptyTable": "Tidak ada data yang tabel.",
                    "thousands": ".",
                    "paginate": {
                        "first": "Pertama",
                        "last": "Terakhir",
                        "next": "Selanjutnya",
                        "previous": "Sebelumnya"
                    },
                },
            }).buttons().container();
        });

        //SIMPAN & UPDATE DATA DAN VALIDASI (SISI CLIENT)
        //jika id = form-tambah-edit panjangnya lebih dari 0 atau bisa dibilang terdapat data dalam form tersebut maka
        //jalankan jquery validator terhadap setiap inputan dll dan eksekusi script ajax untuk simpan data
        // if ($("#form-tambah-edit").length > 0) {
        //     $("#form-tambah-edit").validate({
        //         submitHandler: function(form) {
        //             var actionType = $('#tombol-simpan').val();
        //             $('#tombol-simpan').html('Menyimpan data..');

        //             $.ajax({
        //                 data: $('#form-tambah-edit')
        //                     .serialize(), //function yang dipakai agar value pada form-control seperti input, textarea, select dll dapat digunakan pada URL query string ketika melakukan ajax request
        //                 url: "{{ route('berita.store') }}", //url simpan data
        //                 type: "POST", //karena simpan kita pakai method POST
        //                 dataType: 'json', //data tipe kita kirim berupa JSON
        //                 success: function(data) { //jika berhasil 
        //                     $('#form-tambah-edit').trigger("reset"); //form reset
        //                     $('#tambah-edit-modal').modal('hide'); //modal hide
        //                     $('#tombol-simpan').html('Simpan'); //tombol simpan
        //                     var oTable = $('#table_level').dataTable(); //inialisasi datatable
        //                     oTable.fnDraw(false); //reset datatable
        //                     iziToast.success({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
        //                         title: 'Data berhasil disimpan',
        //                         message: '{{ Session('success') }}',
        //                         position: 'topCenter'
        //                     });
        //                 },
        //                 error: function(data) { //jika error tampilkan error pada console
        //                     console.log('Error:', data);
        //                     $('#tombol-simpan').html('Gagal menyimpan');
        //                 }
        //             });
        //         }
        //     })
        // }

        //TOMBOL EDIT DATA PER PEGAWAI DAN TAMPIKAN DATA BERDASARKAN ID PEGAWAI KE MODAL
        //ketika class edit-post yang ada pada tag body di klik maka
        // $('body').on('click', '.edit-post', function() {
        //     var data_id = $(this).data('id');
        //     $.get('berita/' + data_id + '/edit', function(data) {
        //         $('#modal-judul').html("Edit Berita");
        //         $('#tombol-simpan').val("edit-post");
        //         $('#tambah-edit-modal').modal('show');

        //         //set value masing-masing id berdasarkan data yg diperoleh dari ajax get request diatas               
        //         $('#id').val(data.id);
        //         $('#judul_berita').val(data.judul_berita);
        //         $('#penulis').val(data.penulis);
        //         $('#isi_berita').val(data.isi_berita);
        //         $('#gambar').val(data.gambar);
        //         $('#tanggal').val(data.tanggal);
        //     })
        // });

        //jika klik class delete (yang ada pada tombol delete) maka tampilkan modal konfirmasi hapus maka
        // $(document).on('click', '.delete', function() {
        //     dataId = $(this).attr('id');
        //     $('#hapus-modal').modal('show');
        // });

        //jika tombol hapus pada modal konfirmasi di klik maka
        // $('#tombol-hapus').click(function() {
        //     $.ajax({
        //         // _token: token,
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         },
        //         url: "berita/" + dataId, //eksekusi ajax ke url ini
        //         type: 'delete',
        //         beforeSend: function() {
        //             $('#tombol-hapus').text('Hapus'); //set text untuk tombol hapus
        //             $('#tombol-hapus').focus(); //set focus
        //         },
        //         success: function(data) { //jika sukses
        //             setTimeout(function() {
        //                 $('#hapus-modal').modal('hide'); //sembunyikan konfirmasi modal
        //                 var oTable = $('#table_level').dataTable();
        //                 oTable.fnDraw(false); //reset datatable
        //             });
        //             iziToast.warning({ //tampilkan izitoast warning
        //                 title: 'Data berhasil dihapus',
        //                 message: '{{ Session('delete') }}',
        //                 position: 'topCenter'
        //             });
        //         }
        //     })
        // });
    </script>
@endsection
