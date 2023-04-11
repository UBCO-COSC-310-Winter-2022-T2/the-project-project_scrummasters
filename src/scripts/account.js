
$(document).ready(function(){

    $("button").on("click", function(){
        const link = $(this).attr("link");
        $.get(link, function(data){
            $("#content").html(data);
        });

        $(this).addClass("active");
        $(this).prop("disabled", true);
        $(this).parent().siblings().children().removeClass("active");
        $(this).parent().siblings().children().prop("disabled", false);
    });



})