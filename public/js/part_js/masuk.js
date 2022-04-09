var allowSubmit = true;
document.querySelector('#tombolmasuk').addEventListener('click', function (event) {
    if (allowSubmit) {
        $(".alert").fadeTo(600, 0).slideUp(600, function () {
            $(this).delay(1200).remove();
        });
        console.log("Dapat akses masuk ke sistem.");
        return true;
    }

    console.log("Izin masuk ditolak.");
    event.preventDefault();
    return false;
});