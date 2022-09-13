$(document).ready(function(){
    $(".reset-btn").click(function(){
        $("#custom-form").trigger("reset");
    });
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

    $('table').on('click', '.reset-password',function (e) {
        // var id =  $(this).attr('data-id')
        var url =  $(this).attr('data-src')
        $('#rest-form').submit(function(e){
            e.preventDefault();
            e.stopPropagation();
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: url,
                method: 'PUT',
                data: $(this).serialize(),
                success: function (res) {
                    if(res.result == "success" ){
                        toastr["success"]("Success!!!");
                        $('#myModal').modal('hide');
                    }
                },
                error: function (errors){
                    toastr["warning"](errors);
                },
                cache: false,
                // contentType: false,
                processData: false
            })
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
    else {
        table = $('#datatable').DataTable( {
            paging: false
        } );
    }
});