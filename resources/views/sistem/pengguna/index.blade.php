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
                        {{-- sebuah flash --}}
                        {{-- @if (session()->has('hijau'))
                            <div class="alert alert-success alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                <i class="fa-solid fa-check mr-2"></i>{{ session('hijau') }}
                            </div>
                        @endif --}}
                    </div>
                    <div class="col-lg-12">
                        <div class="card card-white card-outline">
                            <div class="card-body">
                                <p class="card-text">
                                    Data ini merupakan data pengguna yang memiliki hak akses ke sistem.
                                </p>
                            </div>
                        </div><!-- /.card -->
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <a href="/pengguna/create" class="btn btn-primary mb-3">Tambah Pengguna <i
                                        class="fa-solid fa-user-plus ml-2"></i></a>

                                <table id="table_pengguna" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th style="width: 1%">No</th>
                                            <th style="width: 10%" class="text-center text-nowrap">No induk</th>
                                            <th class="text-nowrap">Nama Lengkap</th>
                                            <th>Asal</th>
                                            <th class="text-center text-nowrap">Kelas</th>
                                            <th class="text-center text-nowrap">Asrama</th>
                                            <th style="width: 1%" class="text-center text-nowrap">Status</th>
                                            <th style="width: 1%" class="text-center">Aksi</th>
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
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css"
        integrity="sha256-pODNVtK3uOhL8FUNWWvFQK0QoQoV3YA9wGGng6mbZ0E=" crossorigin="anonymous" /> --}}
@endsection

@section('js_bawah')
    {{-- <script src="/js/part_js/tabel_pengguna.js"></script> --}}

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

        //gantistatus
        $(function() {
            $('.aktif-gak').change(function() {
                // console.log('bisa');
                var status = $(this).prop('checked') == true ? 1 : 0;
                var user_id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/gantistatus',
                    data: {
                        'status': status,
                        'user_id': user_id
                    },
                    success: function(data) {
                        console.log(data.success)
                    }
                });
            })
        })

        //MULAI DATATABLE
        //script untuk memanggil data json dari server dan menampilkannya berupa datatable
        $(document).ready(function() {
            $('#table_pengguna').DataTable({
                lengthChange: true, //apakah statik atau bisa berubah
                info: true,
                autoWidth: false, //mengatur lebar width pada table otomatis
                responsive: true,
                lengthMenu: [
                    [10, 20, 50, 100, -1],
                    [10, 20, 50, 100, "Semua"]
                ], //jumlah data yang ditampilkan

                processing: true,
                serverSide: true, //aktifkan server-side
                ajax: {
                    url: "{{ route('pengguna.index') }}",
                    type: 'GET'
                },
                search: {
                    "regex": true
                },
                columns: [{
                        data: null,
                        sortable: true,
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        data: 'nomer_induk',
                        name: 'nomer_induk',
                        className: "text-center"

                    },
                    {
                        data: 'nama',
                        name: 'nama',
                        className: "trigger-icon"

                    },
                    {
                        data: 'asal',
                        name: 'asal',
                    },
                    {
                        data: 'kelas',
                        name: 'kelas',
                        className: "text-center text-nowrap"
                    },
                    {
                        data: 'asrama',
                        name: 'asrama',
                        className: "text-center text-nowrap"
                    },
                    {
                        data: 'switch',
                        name: 'switch',
                        className: "text-center text-nowrap"

                    },
                    {
                        data: 'aksi',
                        name: 'aksi',
                        className: "text-center text-nowrap"
                    },
                ],

                columnDefs: [{
                    orderable: false,
                    targets: [1, 3, 4, 5, 6, 7]
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
                            var oTable = $('#table_pengguna').dataTable(); //inialisasi datatable
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
        // $('body').on('click', '.edit-post', function() {
        //     var data_id = $(this).data('id');
        //     $.get('pengguna/' + data_id + '/edit', function(data) {
        //         $('#modal-judul').html("Edit Post");
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
        $(document).on('click', '.delete', function() {
            dataId = $(this).attr('id');
            // dataId = $(this).data('id');
            $('#hapus-modal').modal('show');
        });

        //jika tombol hapus pada modal konfirmasi di klik maka
        $('#tombol-hapus').click(function() {
            $.ajax({
                // _token: token,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "pengguna/hapus/" + dataId, //eksekusi ajax ke url ini
                type: 'delete',
                beforeSend: function() {
                    $('#tombol-hapus').text('Hapus'); //set text untuk tombol hapus
                    $('#tombol-hapus').focus(); //set focus
                },
                success: function(data) { //jika sukses
                    setTimeout(function() {
                        $('#hapus-modal').modal('hide'); //sembunyikan konfirmasi modal
                        var oTable = $('#table_pengguna').dataTable();
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
@endsection
