$(function () {
    //setting untuk tabel penggunas
    $("#example1").DataTable({
        "responsive": true,
        "lengthMenu": [15, 30, 50, 100], //jumlah data yang ditampilkan
        // "pageLength": 50 //set show record per page
        // "lengthChange": false, //apakah statik atau bisa berubah
        "autoWidth": false,
        // "ordering": false,

        // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        // "buttons": ["excel", "print"]
        // "dom": '<"wrapper"flipt>',
        "dom": 
        "<'row d-flex align-items-baseline'<'col-sm-12 col-md-6'<'d-flex align-items-baseline'<'mr-2'i><'mr-2'l>>><'col-sm-12 col-md-6'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-12 col-md-6'><'col-sm-12 col-md-6'p>>",
        columnDefs: [{
            orderable: false,
            targets: [3, 4, 5, 6]
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
