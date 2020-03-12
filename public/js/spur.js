const mobileBreakpoint = window.matchMedia("(max-width: 991px )");

$(document).ready(function() {
    $("#endsite").keyup(function(e) {
        let dominio = $("#endsite").val().replace(/(^\w+:|^)\/\//, '');
        let usuario = $("#usuario").val();
        $("#emailhost").val('mail.' + dominio);
        $("#email").val(usuario + '@' + dominio);
    });

    $("#usuario").keyup(function(e) {
        let dominio = $("#endsite").val().replace(/(^\w+:|^)\/\//, '');
        let usuario = $("#usuario").val().split(' ')[0];
        $("#email").val(usuario + '@' + dominio);
    });

    $("#nome").keyup(function(e) {
        let usuario = $("#nome").val().normalize("NFD").replace(/[\u0300-\u036f]/g, "").split(' ')[0];
        let dominio = $("#endsite").val().replace(/(^\w+:|^)\/\//, '');
        //let usuario = $("#usuario").val();
        $("#usuario").val(usuario.toLowerCase());
        $("#email").val(usuario.toLowerCase() + '@' + dominio.toLowerCase());
    });

    $(".dash-nav-dropdown-toggle").click(function(){
        $(this).closest(".dash-nav-dropdown")
            .toggleClass("show")
            .find(".dash-nav-dropdown")
            .removeClass("show");

        $(this).parent()
            .siblings()
            .removeClass("show");
    });

    $(".menu-toggle").click(function(){
        if (mobileBreakpoint.matches) {
            $(".dash-nav").toggleClass("mobile-show");
        } else {
            $(".dash").toggleClass("dash-compact");
        }
    });

    $(".searchbox-toggle").click(function(){
        $(".searchbox").toggleClass("show");
    });

    //(function() {
       //'use strict';
        window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
            }, false);
        });
        }, false);
    //})();


});
