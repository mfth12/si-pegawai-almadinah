var allowSubmit = true;
document.querySelector('#tombolmasuk').addEventListener('click', function (event) {
    if (allowSubmit) {
        $(".alert").fadeTo(600, 0).slideUp(600, function () {
            $(this).delay(1200).remove();
        });
        console.log("Mencoba akses masuk sistem.");
        return true;
    }

    console.log("Izin masuk ditolak.");
    event.preventDefault();
    return false;
});

// untuk panggilan tooltip
$(function () {
    $('.close').on("click", function (event) {
        window.setTimeout(function () {
            $(".alert").fadeTo(700, 0).slideUp(700, function () {
                $(this).remove();
            });
        }, 1200);
        console.log("close triggered");
        event.preventDefault();
    });
});

// $("#foo").on("click", function () {
//     alert($(this).text());
// });
