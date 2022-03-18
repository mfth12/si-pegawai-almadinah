@if ($tabel == 'pengguna')
    <script>
        $(function() {
            //setting untuk tabel penggunas
            $("#example1").DataTable({
                "responsive": true,
                "lengthMenu": [10, 20, 50], //jumlah data yang ditampilkan
                // "pageLength": 50 //set show record per page
                // "lengthChange": false, //apakah statik atau bisa berubah
                "autoWidth": false,
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                // "buttons": ["excel", "print"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

            //example2
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@else
    {{-- tabel default --}}
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthMenu": [10, 20, 50],
                "autoWidth": false,
                "searching": true,
                "ordering": false, //untuk sorting data
                "info": true,
            });
        });
    </script>
@endif
