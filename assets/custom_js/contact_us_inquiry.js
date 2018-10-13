$(document).ready(function (){
    $("#form-inquiry").submit(function(e){
        var url = $(this).attr('action');
        var data = $('form').serialize();
        var btn = $("#btn-submit-inquiry").button('loading');
        $.ajax({
            type: "POST",
            url: url,
            data: data,
            dataType: 'json',
            success: function(data){
                $("#"+data.csrfName).val(data.csrfHash);
                if (data.status === 200) {
                    $("#alert-inquiry-success").text(data.message).show();
                } else {
                    $("#alert-inquiry-failed").text(data.message).show();
                }
                btn.button('reset');
                $("#name-inquiry,#email-inquiry,#phone-inquiry,#message-inquiry").val('');
            },
            error: function(error) {
                $("#alert-inquiry-failed").text('Oops sory something wrong, please try again').show();
                btn.button('reset');
                $("#name-inquiry,#email-inquiry,#phone-inquiry,#message-inquiry").val('');
            }
        });
        setTimeout(function(){$(".alert-inquiry").hide(); }, 5000);
        e.preventDefault();
    });
});