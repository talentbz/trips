$(document).ready(function(){
    $(".reset-btn").click(function(){
        $("#custom-form").trigger("reset");
    });
    $(".add-new-form").hide()
    $(".add-new").click(function(){
        $(".add-new-form").slideToggle(1000);
    });
    $(".edit").click(function(){
        $(".add-new-form").hide()
        $(".add-new-form").slideToggle(1000);
        id = $(this).attr("data-id")
        $.ajax({
            url: window.location.href + "/" + id,
            method: 'get',
            success: function (res) {
                result = res.data;
                if(result){
                    $("input[name='id']").val(id)
                    $("input[name='name_en']").val(result.area_name_en)   
                    $("input[name='name_ar']").val(result.area_name_ar)
                    if(result.status == 1){
                        $("input[name='status'][value='1']").prop('checked', true);
                    } else {
                        $("input[name='status'][value='0']").prop('checked', true);
                    }  
                    $("select[name='city']").val(result.city_id);
                    $("input[name='latitude']").val(result.location_latitude);  
                    $("input[name='longitude']").val(result.location_longitude);  

                }
            },
            error: function (res){
                console.log(res)
            },
            cache: false,
            contentType: false,
            processData: false
        })
    })
    // create bus type
    $('#custom-form').submit(function(e){
        e.preventDefault();
        e.stopPropagation();
        var formData = new FormData(this);
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: store,
            method: 'post',
            data: formData,
            success: function (res) {
                if(res.result == "success" ){
                    toastr["success"]("Success!!!");
                    setInterval(function(){ 
                        location.href = list_url; 
                    }, 2000);
                } else if (res.result == "faild") {
                    toastr["warning"]("The data is already exist. Please insert another data.");
                } else {
                    toastr["error"](res.error[0]);
                }
            },
            error: function (errors){
                toastr["warning"](errors);
            },
            cache: false,
            contentType: false,
            processData: false
        })
    })
    $('.price-status').change(function(){
        var status= $(this).prop('checked');
        var id=$(this).val();
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type:'POST',
            dataType:'JSON',
            url:status_url,
            data:{status:status, id:id},
            success:function(res){
                if(res.result == "success" ){
                    toastr["success"]("Success!!!");
                }
            }
        })
    })
    if ( $.fn.dataTable.isDataTable( '#datatable' ) ) {
        table = $('#datatable').DataTable({
            bDestroy: true,
            dom: 'Bfrtip',
            buttons: [
                'csv', 'excel', 'pdf'
            ]
        });
    }
});