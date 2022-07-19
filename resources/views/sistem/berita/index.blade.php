@extends('theme.back')

@section('container')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-lg-6">
                        <h1>{{ $head_page }}</h1>
                    </div>

                    <div class="col-lg-6">
                        <ol class="breadcrumb float-sm-right">
                            {{ Breadcrumbs::render() }}
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        {{-- Main content --}}
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-lg-12">
                        {{-- flash hijau --}}
                        @if (session()->has('hijau'))
                            <div class="alert alert-success alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                <i class="fa-solid fa-check mr-2"></i>{{ session('hijau') }}
                            </div>
                        @endif

                        {{-- flash kuning --}}
                        @if (session()->has('kuning'))
                            <div class="alert alert-warning alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                <i class="fa-solid fa-info mr-2"></i>{{ session('kuning') }}
                            </div>
                        @endif

                        {{-- flash info --}}
                        @if (session()->has('info'))
                            <div class="alert alert-info alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                <i class="fa-solid fa-info mr-2"></i>{{ session('info') }}
                            </div>
                        @endif

                        {{-- flash merah --}}
                        @if (session()->has('merah'))
                            <div class="alert alert-danger alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                <i class="fa-solid fa-triangle-exclamation mr-2"></i>{{ session('merah') }}
                            </div>
                        @endif
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <a href="javascript:void(0)" class="btn btn-primary mb-3" id="tombol-tambah">Tambah Berita
                                    <i class="fa-solid fa-plus ml-2"></i></a>

                                <table id="table_berita" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Gambar</th>
                                            <th>Judul Berita</th>
                                            <th>Penulis</th>
                                            <th>Isi</th>
                                            <th>Tanggal</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection



@section('js_atas')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css"
        integrity="sha256-pODNVtK3uOhL8FUNWWvFQK0QoQoV3YA9wGGng6mbZ0E=" crossorigin="anonymous" />
@endsection

@section('js_bawah')
    {{-- MULAI MODAL FORM TAMBAH/EDIT --}}
    <div class="modal fade" id="tambah-edit-modal" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-judul"></h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="form-tambah-edit" name="form-tambah-edit" class="form-horizontal">
                        {{-- @csrf --}}
                        <div class="row">
                            <div class="col-sm-12">

                                <input type="hidden" name="id" id="id">

                                <div class="form-group">
                                    <label for="judul_berita" class="col-sm-12 control-label">Judul</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="judul_berita" name="judul_berita"
                                            value="" required>
                                    </div>
                                    @error('judul_berita')
                                        <div class="invalid-feedback">
                                            *{{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="penulis" class="col-sm-12 control-label">Penulis</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="penulis" name="penulis"
                                            value="" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="gambar" class="col-sm-12 control-label">Gambar</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="gambar" name="gambar"
                                            value="" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="isi_berita" class="col-sm-12 control-label">Isi Berita</label>
                                    <div class="col-sm-12">
                                        <textarea class="form-control" name="isi_berita" id="isi_berita" rows="9" required></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tanggal" class="col-sm-12 control-label">Tanggal</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="tanggal" name="tanggal"
                                            value="" required>
                                    </div>
                                </div>

                                <div class="col-sm-offset-2 col-sm-12 modal-footer mt-2">
                                    <button type="submit" class="btn btn-primary btn-block" id="tombol-simpan"
                                        value="create">Simpan
                                    </button>
                                </div>
                            </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- AKHIR MODAL --}}

    {{-- MULAI MODAL KONFIRMASI DELETE --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="hapus-modal" data-backdrop="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Perhatian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Data yang dihapus tidak akan bisa kembali lagi. Apakah Anda yakin ingin menghapus?</p>
                </div>
                <div class="modal-footer bg-whitesmoke">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger" name="tombol-hapus" id="tombol-hapus">Hapus</button>
                </div>
            </div>
        </div>
    </div>
    {{-- AKHIR MODAL --}}
    {{-- <script src="/js/part_js/tabel_pengguna.js"></script> --}}
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
        $('#tombol-tambah').click(function() {
            $('#button-simpan').val("create-post"); //valuenya menjadi create-post
            $('#id').val(''); //valuenya menjadi kosong
            $('#form-tambah-edit').trigger("reset"); //mereset semua input dll didalamnya
            $('#modal-judul').html("Tambah Berita Baru"); //valuenya tambah pegawai baru
            $('#tambah-edit-modal').modal('show'); //modal tampil
        });

        //MULAI DATATABLE
        //script untuk memanggil data json dari server dan menampilkannya berupa datatable
        $(document).ready(function() {
            $('#table_berita').DataTable({
                lengthChange: true, //apakah statik atau bisa berubah
                info: true,
                autoWidth: false, //mengatur lebar width pada table otomatis
                responsive: true,
                lengthMenu: [
                    [5, 10, 20, 50, 100, -1],
                    [5, 10, 20, 50, 100, "Semua"]
                ], //jumlah data yang ditampilkan

                processing: true,
                serverSide: true, //aktifkan server-side 
                ajax: {
                    url: "{{ route('berita.index') }}",
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
                        data: 'gambar',
                        name: 'gambar'
                    },
                    {
                        data: 'judul_berita',
                        name: 'judul_berita',
                        className: "text-left"
                    },
                    {
                        data: 'penulis',
                        name: 'penulis'
                    },
                    {
                        data: 'isi_berita',
                        name: 'isi_berita'
                    },
                    {
                        data: 'tanggal',
                        name: 'tanggal'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },
                ],

                columnDefs: [{
                    orderable: false,
                    targets: [1, 3, 4, 5, 6]
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
                    "lengthMenu": "Tampilkan _MENU_ baris data.",
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
        if ($("#form-tambah-edit").length > 0) {
            $("#form-tambah-edit").validate({
                submitHandler: function(form) {
                    var actionType = $('#tombol-simpan').val();
                    $('#tombol-simpan').html('Menyimpan data..');

                    $.ajax({
                        data: $('#form-tambah-edit')
                            .serialize(), //function yang dipakai agar value pada form-control seperti input, textarea, select dll dapat digunakan pada URL query string ketika melakukan ajax request
                        url: "{{ route('berita.store') }}", //url simpan data
                        type: "POST", //karena simpan kita pakai method POST
                        dataType: 'json', //data tipe kita kirim berupa JSON
                        success: function(data) { //jika berhasil 
                            $('#form-tambah-edit').trigger("reset"); //form reset
                            $('#tambah-edit-modal').modal('hide'); //modal hide
                            $('#tombol-simpan').html('Simpan'); //tombol simpan
                            var oTable = $('#table_berita').dataTable(); //inialisasi datatable
                            oTable.fnDraw(false); //reset datatable
                            iziToast.success({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                                title: 'Data berhasil disimpan',
                                message: '{{ Session('success') }}',
                                position: 'topCenter'
                            });
                        },
                        error: function(data) { //jika error tampilkan error pada console
                            console.log('Error:', data);
                            $('#tombol-simpan').html('Gagal menyimpan');
                        }
                    });
                }
            })
        }

        //TOMBOL EDIT DATA PER PEGAWAI DAN TAMPIKAN DATA BERDASARKAN ID PEGAWAI KE MODAL
        //ketika class edit-post yang ada pada tag body di klik maka
        $('body').on('click', '.edit-post', function() {
            var data_id = $(this).data('id');
            $.get('berita/' + data_id + '/edit', function(data) {
                $('#modal-judul').html("Edit Berita");
                $('#tombol-simpan').val("edit-post");
                $('#tambah-edit-modal').modal('show');

                //set value masing-masing id berdasarkan data yg diperoleh dari ajax get request diatas               
                $('#id').val(data.id);
                $('#judul_berita').val(data.judul_berita);
                $('#penulis').val(data.penulis);
                $('#isi_berita').val(data.isi_berita);
                $('#gambar').val(data.gambar);
                $('#tanggal').val(data.tanggal);
            })
        });

        //jika klik class delete (yang ada pada tombol delete) maka tampilkan modal konfirmasi hapus maka
        $(document).on('click', '.delete', function() {
            dataId = $(this).attr('id');
            $('#hapus-modal').modal('show');
        });

        //jika tombol hapus pada modal konfirmasi di klik maka
        $('#tombol-hapus').click(function() {
            $.ajax({
                // _token: token,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "berita/" + dataId, //eksekusi ajax ke url ini
                type: 'delete',
                beforeSend: function() {
                    $('#tombol-hapus').text('Hapus'); //set text untuk tombol hapus
                    $('#tombol-hapus').focus(); //set focus
                },
                success: function(data) { //jika sukses
                    setTimeout(function() {
                        $('#hapus-modal').modal('hide'); //sembunyikan konfirmasi modal
                        var oTable = $('#table_berita').dataTable();
                        oTable.fnDraw(false); //reset datatable
                    });
                    iziToast.warning({ //tampilkan izitoast warning
                        title: 'Data berhasil dihapus',
                        message: '{{ Session('delete') }}',
                        position: 'topCenter'
                    });
                }
            })
        });
    </script>

    {{-- JAVASCRIPT --}}
@endsection
