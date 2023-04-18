let x = getCookie('alert');

function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}

console.log(x);
if (x == 1) {
    eraseCookie('alert');
    Swal.fire({
        confirmButtonColor: '#1d8a3b',
        title: 'Thank you for your request!',
        text: 'We will get back to you shortly.',
        imageUrl: 'https://bestgv.com/images/logo-black.png',
        imageWidth: 150,
        imageHeight: 69,
        imageAlt: 'Custom image',
    }).then(function() {
        window.location = "/";
    });
}

if (x == 10) {
    toastr.success("Your product has been added on Cart", "Product Add", {
        timeOut: 3000,
        closeButton: !0,
        debug: !1,
        newestOnTop: !0,
        progressBar: !0,
        positionClass: "toast-bottom-right",
        preventDuplicates: !0,
        onclick: null,
        showDuration: "300",
        hideDuration: "1000",
        extendedTimeOut: "1000",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut",
        iconClass: "toast-custom",
        tapToDismiss: !1
    })

    eraseCookie('alert');
}

if (x == 2) {
    toastr.success("Login Successful", "Login", {
        timeOut: 3000,
        closeButton: !0,
        debug: !1,
        newestOnTop: !0,
        progressBar: !0,
        positionClass: "toast-bottom-right",
        preventDuplicates: !0,
        onclick: null,
        showDuration: "300",
        hideDuration: "1000",
        extendedTimeOut: "1000",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut",
        iconClass: "toast-success",
        tapToDismiss: !1
    })

    eraseCookie('alert');
}

if (x == 4) {
    toastr.success("Already Login", "Login", {
        timeOut: 3000,
        closeButton: !0,
        debug: !1,
        newestOnTop: !0,
        progressBar: !0,
        positionClass: "toast-bottom-right",
        preventDuplicates: !0,
        onclick: null,
        showDuration: "300",
        hideDuration: "1000",
        extendedTimeOut: "1000",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut",
        iconClass: "toast-success",
        tapToDismiss: !1
    })

    eraseCookie('alert');
}

if (x == 3) {
    toastr.success("Email and password not match", "Login", {
        timeOut: 3000,
        closeButton: !0,
        debug: !1,
        newestOnTop: !0,
        progressBar: !0,
        positionClass: "toast-bottom-right",
        preventDuplicates: !0,
        onclick: null,
        showDuration: "300",
        hideDuration: "1000",
        extendedTimeOut: "1000",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut",
        iconClass: "toast-error",
        tapToDismiss: !1
    })

    eraseCookie('alert');
}

function eraseCookie(name) {
    document.cookie = name + '=;';
}
