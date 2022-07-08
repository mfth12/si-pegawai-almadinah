// untuk fadeout alert
$(document).ready(function () {
    window.setTimeout(function () {
        $(".alert").fadeTo(600, 0).slideUp(600, function () {
            $(this).remove();
        });
    }, 9000);
});

// untuk panggilan tooltip
$(function () {
    $('[data-toggle="tooltip"]').tooltip({ delay: { "show": 300, "hide": 150 } });
})

// //gantistatus
// $(function () {
//     $('.aktif-gak').change(function () {
//         var status = $(this).prop('checked') == true ? 1 : 0;
//         var user_id = $(this).data('id');
//         console.log('bisa');

//         $.ajax({
//             type: "GET",
//             dataType: "json",
//             url: '/gantistatus',
//             data: { 'status': status, 'user_id': user_id },
//             success: function (data) {
//                 console.log(data.success)
//             }
//         });
//     })
// })

//input foto di form
function lihatGambar() {
    const gambar = document.querySelector('#foto');
    const gambarPreview = document.querySelector('.img-lihat')
    // const ganti = document.querySelector('#upload')

    gambarPreview.style.display = 'block';
    const oFReader = new FileReader();
    oFReader.readAsDataURL(gambar.files[0]);

    oFReader.onload = function (oFREvent) {
        gambarPreview.src = oFREvent.target.result;
    }
}

//delete modal
function deleteConfirm(url) {
    $('#btn-delete').attr('action', url);
    $('#deleteModal').modal('show');
    console.log('Menghapus data');
}

//keluar modal
function keluarConfirm(url) {
    $('#btn-keluar').attr('action', url);
    $('#konfirmasiKeluar').modal('show');
}

// $('[data-widget="sidebar-search"]').SidebarSearch('toggle') 


//manggil nprogress to showing progress bar
// Show the progress bar 
NProgress.start();
NProgress.set(0.1); // To set a progress percentage, call .set(n), where n is a number between 0..1
NProgress.configure({ parent: '#thisme' });
NProgress.done();

// // Increase randomly
// var interval = setInterval(function () {
//     NProgress.inc();
// }, 50);

// // Trigger bar when exiting the page
// jQuery(window).unload(function () {
//     NProgress.start();
//     NProgress.set(0.9); // To set a progress percentage, call .set(n), where n is a number between 0..1
//     NProgress.set(1.0); // To finish the progress bar, call .done()
// });

// // Trigger finish when page fully loaded
// jQuery(window).load(function () {
//     clearInterval(interval);
//     NProgress.done();
// });

// NProgress.start(); // start    
// NProgress.inc(); // To increment the progress bar, just use .inc(). This increments it with a random amount. This will never get to 100%: use it for every image load (or similar).If you want to increment by a specific value, you can pass that as a parameter
// NProgress.configure({ ease: 'ease', speed: 500 }); // Adjust animation settings using easing (a CSS easing string) and speed (in ms). (default: ease and 200)
// NProgress.configure({ trickleSpeed: 800 }); //Adjust how often to trickle/increment, in ms.
// NProgress.configure({ parent: '#thisme' });//specify this to change the parent container. (default: body)

// Javascript to enable link to tab
var url = document.location.toString();
if (url.match('#')) {
    $('.nav-item a[href="#' + url.split('#')[1] + '"]').tab('show');
}

