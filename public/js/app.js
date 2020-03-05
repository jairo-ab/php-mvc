(function() {

    let timestampToTime = (ts) => {
        let data = new Date(ts * 1000);
        let ano = data.getFullYear();
        let mes = ("0" + data.getMonth()+1).slice(-2);
        let dia = ("0" + data.getDate()).slice(-2);
        var hora = ("0" + data.getHours()).slice(-2);
        var minuto = ("0" + data.getMinutes()).slice(-2);
        var segundo = ("0" + data.getSeconds()).slice(-2);
        return dia + '/' + mes + '/' + ano + ' ' + hora + ':' + minuto + ':' + segundo;
    };

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

    $('.toast').toast("show");

    $('#sair').on('click', function(e){
        e.preventDefault();
        
        $.ajax(url + "usuarios/sair")
            .done(function(result) {
                $('.toast-body').html(result);
            })
            .fail(function() {
            })
            .always(function() {
            });
        $('.toast').toast('show');
    });

    let timestamps = document.querySelectorAll('.timestamp');
    return Array.prototype.map.call(timestamps, function(node) {
        let ts = node.textContent;
        node.textContent = timestampToTime(ts);
    });   

})();
