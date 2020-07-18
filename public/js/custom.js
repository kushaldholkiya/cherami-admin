$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).on("click",".slider1_action",function(){
    var slide_id = $(this).attr('data-id');
    var slide_lang = $(this).attr('data-lang');

    $.ajax({
        type:'POST',
        url:'/getslidedata',
        data : {"slide_id":slide_id,"slide_lang":slide_lang},
        success:function(data) {
            if(data.msg == "Slider data sent ! "){
                if(slide_lang == "en"){
                    $("#edit_slide_heading_en").text(data.response_data.heading);
                    $("#slide_id_en").val(slide_id);
                    $("#slide_image_en").attr("src",data.response_data.image);
                    $("#edit_heading_en").val(data.response_data.heading);
                    $("#edit_time_en").val(data.response_data.time);
                    $("#edit_subtitle_en").val(data.response_data.subtitle);
                    $("#edit_description_en").val(data.response_data.description);

                    $("#editslidemodal_en").modal("show");
                }else{
                    $("#edit_slide_heading_ar").text(data.response_data.heading);
                    $("#slide_id_ar").val(slide_id);
                    $("#slide_image_ar").attr("src",data.response_data.image);
                    $("#edit_heading_ar").val(data.response_data.heading);
                    $("#edit_time_ar").val(data.response_data.time);
                    $("#edit_subtitle_ar").val(data.response_data.subtitle);
                    $("#edit_description_ar").val(data.response_data.description);

                    $("#editslidemodal_ar").modal("show");
                }
            }
        }
    });
});


$(document).on("click",".slider2_action",function(){
    var slide_id = $(this).attr('data-id');
    var slide_lang = $(this).attr('data-lang');

    $.ajax({
        type:'POST',
        url:'/getslidedata2',
        data : {"slide_id":slide_id,"slide_lang":slide_lang},
        success:function(data) {
            if(data.msg == "Slider data sent ! "){
                if(slide_lang == "en"){
                    $("#slider2_edit_slide_heading_en").text(data.response_data.heading);
                    $("#slider2_slide_id_en").val(slide_id);
                    $("#slider2_slide_image_en").attr("src",data.response_data.image);
                    $("#slider2_edit_heading_en").val(data.response_data.heading);
                    $("#slider2_edit_description_en").val(data.response_data.description);
                    $("#slider2_edit_slide_type_en").val(data.response_data.slide_type);
                    $("#slider2_editslidemodal_en").modal("show");
                }else{
                    $("#slider2_edit_slide_heading_ar").text(data.response_data.heading);
                    $("#slider2_slide_id_ar").val(slide_id);
                    $("#slider2_slide_image_ar").attr("src",data.response_data.image);
                    $("#slider2_edit_heading_ar").val(data.response_data.heading);
                    $("#slider2_edit_description_ar").val(data.response_data.description);
                    $("#slider2_edit_slide_type_ar").val(data.response_data.slide_type);

                    $("#slider2_editslidemodal_ar").modal("show");
                }
            }
        }
    });
});

$(document).on("click",".getclientimage",function(){
    var client_id = $(this).attr('data-id');

    $.ajax({
        type:'POST',
        url:'/getclientimage',
        data : {"client_id":client_id},
        success:function(data) {
            if(data.msg == "client data sent ! "){
                $("#client_id").val(client_id);
                $("#client_image_show").attr("src",data.response_data.image);
                $("#page_slug").val(data.response_data.page_slug);
                $("#editclientmodal").modal("show");
            }
        }
    });
});
