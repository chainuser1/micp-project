$.noConflict();

!function($){
    $(function(){
        $.ajaxSetup({
            headers: { 'X-CSRF-Token' : $('meta[name=csrf-token]').attr('content') }
        });
        $(".datetimepicker").datetimepicker({
            mask:true,
            format:'Y/m/d H:i',
            timepicker:true,
            datepicker:true
        });
        $(".btn-success").click(function(){
            var news_title=$("#title").val();
            var content=$("#content").val();
            var created_at=$("#created_at").val();
            var _token=$('input[name=_token]').val();
            //create our slug
            var slug=news_title.toLowerCase().replace(/([\^\!@\+#\$%^\,\.\'\"&*\s]){1,}/g,"-");
            //our data string
            var dataString="title="+news_title+"&slug="+slug+"&content="+content+"&created_at="+created_at+"&_token="+_token;
            //ajax here
            $.ajax({
                url:"/news/store",
                type: "POST",
                data:dataString
                ,success:function(data){
                    //if the data was validated without errors

                    if(typeof data=="string"){
                        if($(".alert").hasClass("alert-danger")){
                            $(".alert").removeClass("alert-danger");
                        }
                        $(".alert").addClass("alert-success").text(data).fadeIn(2000).fadeOut(7000);
                    }
                    //if there are errors in validation
                    else if(typeof data=="object"){
                        if($(".alert").hasClass("alert-success")){
                            $(".alert").removeClass("alert-success");
                        }
                        $(".alert").addClass("alert-danger");
                        for(var i=data.length-1; i>0; i--){
                            $(".alert").text(data[i]+$(".alert").text()).fadeIn(2000).fadeOut(7000);
                        }
                    }
                    else{
                        console.log(data);
                    }
                },
                error:function(xhr,status){
                    if($(".alert").hasClass("alert-success")){
                        $(".alert").removeClass("alert-success");
                    }
                    $(".alert").addClass("alert-danger");
                    $(".alert").text("An error occurred when the data was submitted." + xhr.responseJSON).fadeIn(2000).fadeOut(7000);
                }

            });

        });
    });
}(window.jQuery);