var allowSubmit = true;
document.querySelector('#tombolmasuk').addEventListener('click', function (event) {
    if (allowSubmit) {
        $(".alert").fadeTo(600, 0).slideUp(600, function () {
            $(this).delay(900).remove();
        });
        console.log("Diizinkan masuk.");
        return true;
    }

    console.log("Tidak diizinkan masuk.");
    event.preventDefault();
    return false;
});