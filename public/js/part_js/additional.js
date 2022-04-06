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

//gantistatus
$(function () {
    $('.aktif-gak').change(function () {
        var status = $(this).prop('checked') == true ? 1 : 0;
        var user_id = $(this).data('id');

        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/gantistatus',
            data: { 'status': status, 'user_id': user_id },
            success: function (data) {
                console.log(data.success)
            }
        });
    })
})

//input gambar di form
function lihatGambar() {
    const gambar = document.querySelector('#foto');
    const gambarPreview = document.querySelector('.img-lihat')
    const ganti = document.querySelector('#upload')

    gambarPreview.style.display = 'block';
    const oFReader = new FileReader();
    oFReader.readAsDataURL(gambar.files[0]);

    oFReader.onload = function(oFREvent) {
        gambarPreview.src = oFREvent.target.result;
    }
}