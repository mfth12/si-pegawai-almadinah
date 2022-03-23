// untuk fadeout alert
$(document).ready(function () {

    window.setTimeout(function () {
        $(".alert").fadeTo(600, 0).slideUp(600, function () {
            $(this).remove();
        });
    }, 9000);

});

// untuk row hover
$(function () {
    // $(".trigger-icon").hover(function () {
    //     $(this).append("s12");
    // }, function () {
    //     $(this).find("span").last().remove();
    // });
    let saya = $("#id_saya").val();
    // $(".trigger-icon").hover(function () {
    //     $(this).append(`<i class="fa-solid fa-arrow-up-right-from-square ml-2 text-info" data-toggle="tooltip" data-placement="top" title="Lihat detail`+saya+`"></i>`);
    // }, function () {
    //     $(this).find("i").last().remove();
    // }
    // );
})

// untuk panggilan tooltip
$(function () {
    $('[data-toggle="tooltip"]').tooltip({ delay: { "show": 300, "hide": 150 } });
})
