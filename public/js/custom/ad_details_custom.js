/**
 * Created by Gaëtan on 09/11/2016.
 */
$(function(){
    var ad_id = $("#ad_id").val();
    var user_id = $("#user_id").val();
    var token = $("#token").val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#select-favourite").click(function(e){
        e.preventDefault();
        var url = this.href;

        $.ajax({
            type: "POST",
            url: url,
            data: {user_id: user_id, ad_id: ad_id},
            dataType: "json"
        })
        .done(function (data) {
            console.log(data);
        });

    });
});