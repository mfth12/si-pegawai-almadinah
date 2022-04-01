// Wait for the DOM to be ready
$(function () {
    // Initialize form validation on the pendaftaran form.
    // It has the name attribute ID "daftar"
    $("form[name='daftar']").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            nama: "required",
            nomer_induk: "required",
            email: {
                required: false,
                email: true // Specify that email should be validated by the built-in "email" rule
            },
            password: {
                required: true,
                minlength: 6
            },
            password_ulang: {
                required: true,
                minlength: 6,
                equalTo: "#password"
            }
        },
        // Specify validation error messages
        messages: {
            nama: "*Nama lengkap harus diisi.",
            nomer_induk: "*Nomor induk harus diisi.",
            email: "*Email harus berupa alamat yang valid.",
            password: {
                required: "*Password harus diisi.",
                // minlength: jQuery.validator.format("Password minimal {0} karakter.")
                minlength: "*Password minimal {0} karakter."
            },
            password_ulang: {
                required: "*Konfirmasi password harus diisi.",
                equalTo: "*Password konfirmasi tidak cocok.",
                // minlength: jQuery.validator.format("Password minimal {0} karakter."),
                minlength: "*Password minimal {0} karakter."
            }

        },
        highlight: function (element) {

            $(element).closest('.input-group > input').addClass('is-invalid');
            $(element).closest('.form-group > input').addClass('is-invalid');

        },
        unhighlight: function (element) {

            $(element).closest('.form-group > input').removeClass('is-invalid');

        },
        errorElement: 'div',
        errorClass: 'invalid-feedback',
        errorPlacement: function (error, element) {
            if (element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function (form) {
            console.log("valid >> " + form.isValid());
            form.submit();
        }
    });
});