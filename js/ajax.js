$(document).ready(function () {
//    $('#area_territory_hulk').keyup(function(){
//       // $(this).val(parseFloat($(this).val()));
//    });


    var area_territory_hulk=parseFloat($('#area_territory_hulk').val());


    $('body').on('keyup','input[name="city_area_2"],input[name="city_area"], input[name="general_plan_administrative_center_area"]',function(){

            var sum=0;
            if(parseFloat($('input[name="general_plan_administrative_center_area"]' ).val())){
              sum=sum+parseFloat($('input[name="general_plan_administrative_center_area"]' ).val());
            }
            $('body').find('input[name="city_area"]').each(function(){
                console.log(parseFloat($(this).val()));
                console.log(sum);
                if(parseFloat($(this).val())){
                  sum=sum+parseFloat($(this).val());
                }
            });
           $('body').find('input[name="city_area_2"]').each(function(){
                if(parseFloat($(this).val())<0.01){
                    $(this).val(0.00);
                }
                if(parseFloat($(this).val())){
                  sum=sum+parseFloat($(this).val());
                }
            });
          if(area_territory_hulk<sum){
            var nuw=sum-parseFloat($(this).val());
            $(this).val((area_territory_hulk-nuw).toFixed(2));
            
            document.querySelector('.error-dop-mess').classList.add('vis');
            setTimeout(() => {
                document.querySelector('.error-dop-mess').classList.remove('vis');
                }, 10000
            )

          }
    });





    $('.format-type__single-radio input').change(function(){
        $(this).closest('.tabs-body').find('.tabs-body__btn-save').removeClass('disabled');
    })

    $('.profile__exit-btn').click(function(e){
        e.preventDefault();
        removeItem("msg");
        window.location.href=$(this).find('a').attr('href');
    });
    function removeItem(sKey, sPath, sDomain) {
        document.cookie = encodeURIComponent(sKey) +
                      "=; expires=Thu, 01 Jan 1970 00:00:00 GMT" +
                      (sDomain ? "; domain=" + sDomain : "") +
                      (sPath ? "; path=" + sPath : "");
    }

    $('.tabs-body__btn-save').click(function (e) {
        e.preventDefault();
        var form = $("#form_question").serializeArray();
        console.log(form);
        let progrress = $('.questionnaire__progress-bar').attr('value');

        $.ajax({
            url: custom_ajax.ajaxurl,
            type: "POST",
            data: {
                'action': 'form_question',
                'nonce': custom_ajax.nonce,
                'data': form,
                'progrress': progrress
            },
            success: function (data) {
                console.log(data);
            },
            error: function(error){
                console.log(error);
            },
            complete: function () {
                console.log('complete');
            }
        });
    });

    $('#document,#document2,#document1,#document3').on('change', function() {
        $this = $(this);
        file_data = $(this).prop('files');
        form_data = new FormData();
        //form_data.append('file', file_data);
        jQuery.each(file_data, function(i, file) {
            form_data.append('file-'+i, file);
        });
        form_data.append('action', 'upload_file');
        form_data.append('nonce', custom_ajax.nonce);
        form_data.append('id', $this.attr('id'));
        form_data.append('user_id', $("#user_id").val());
        $.ajax({
            url: custom_ajax.ajaxurl,
            type: "POST",
            contentType: false,
            processData: false,
            data: form_data,
            success: function (data) {
                console.log('success');
            },
            error: function(error){
                console.log(error);
            },
            complete: function () {
                console.log('complete');
                location.reload();
            }
        });
    });

    $('.documents_download button').click(function(e) {
        e.preventDefault();
        window.open(window.location.href+'?download=1');
//        $('.questionnaire__document-block a').map( function() {
//            console.log(this);
//            window.open($(this).attr('href'));
//        }).get();
    });



    $('.contact-us').click(function () {
        var form = $(".contact-us__form").serializeArray();

        $.ajax({
            url: custom_ajax.ajaxurl,
            type: "POST",
            data: {
                'action': 'send_form',
                'nonce': custom_ajax.nonce,
                'data': form,
            },
            success: function (response) {
                if (response.success) {
                    $('#sent-message').addClass('popup_show');
                    $('#sent-message').attr("aria-hidden", "false");

                    $('#contactUs').removeClass('popup_show');
                    $('#contactUs').attr("aria-hidden", "true");
                } else {
                    $('.error_form').html(response.data.message);
                }
            },
            error: function(error){
                console.log(error);
            }
        });
    });

    $('#sent-message .popup__close').click(function () {
        $('#sent-message').removeClass('popup_show');
        $('#sent-message').attr("aria-hidden", "true");
    });

    $('#errorEmail .popup__close').click(function () {
        $('#errorEmail').removeClass('popup_show');
        $('#errorEmail').attr("aria-hidden", "true");
    });

    $('#errorEmail .popup__ok').click(function () {
        $('#errorEmail').removeClass('popup_show');
        $('#errorEmail').attr("aria-hidden", "true");
    });

    $('.select_region .select__option').click(function () {
        $('.select_district select').find('option').remove();
        $('.select_district .select__options').find('button').remove();
        $('.select_district .select__value input').attr('placeholder', 'Ваш район');
    });

    $('.popup__okDoc').click(function () {
        var form = $("#user_id").val();

        $.ajax({
            url: custom_ajax.ajaxurl,
            type: "POST",
            data: {
                'action': 'remove_documents',
                'nonce': custom_ajax.nonce,
                'data': form,
            },
            success: function (response) {

            },
            error: function(error){
                console.log(error);
            }
        });
    });

    $('.removeFile').click(function () {
        var form    = $("#user_id").val();
        var id      = $(this).data('id');
        var block   = $(this);

        $.ajax({
            url: custom_ajax.ajaxurl,
            type: "POST",
            data: {
                'action': 'remove_file',
                'nonce': custom_ajax.nonce,
                'data': form,
                'data_id': id
            },
            success: function (response) {
//                block.closest(".questionnaire__add-document").remove();
                    location.reload();
            },
            error: function(error){
                console.log(error);
            }
        });
    });

    $('.popup__okForm').click(function () {
        var form = $("#user_id").val();

        $.ajax({
            url: custom_ajax.ajaxurl,
            type: "POST",
            data: {
                'action': 'remove_questionnaire',
                'nonce': custom_ajax.nonce,
                'data': form,
            },
            success: function (response) {

            },
            error: function(error){
                console.log(error);
            }
        });
    });
});


// баг вічліст
// посилання на сінгл блог
// удалити корзину в хедері
