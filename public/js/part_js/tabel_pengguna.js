$(function () {
    //setting untuk tabel penggunas
    $("#example1").DataTable({
        "responsive": true,
        "lengthMenu": [5, 10, 20, 50, 100], //jumlah data yang ditampilkan
        // "pageLength": 50 //set show record per page
        // "lengthChange": false, //apakah statik atau bisa berubah
        "autoWidth": false,
        // "ordering": false,

        // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        // "buttons": ["excel", "print"]
        columnDefs: [{
            orderable: false,
            targets: [3, 4, 5]
        }],
        order: [
            [0, 'asc']
        ]
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
