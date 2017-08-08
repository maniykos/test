/**
 * Created by PhpStorm.
 * User: lezhnev oleg
 * Email: lezhnevoleg@gmail.ru
 * Date: 06.08.2017
 * Time: 11:45
 */
function call() {
    jpreloader('show');
    var msg = $('#formx').serialize();
    $.ajax({
        type: 'POST',
        url: '',
        data: msg,
        dataType: "json",
        success: function (data) {
            if(data.success){
                $('.result').html(data.item);
            }else{
                $('.result').html(data.error);
            }
            jpreloader();
        },
        error: function (xhr, str) {
            alert('Возникла ошибка: ' + xhr.responseCode);
            jpreloader();
        }
    });
}

function jpreloader(item) {
    if (item == 'show') {
        $(document.body).append('<div class="jpreloader" style="z-index: 90000;"></div>');
    } else {
        $('.jpreloader').remove();
    }
}