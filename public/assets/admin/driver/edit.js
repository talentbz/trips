$(document).ready(function(){
    $(".reset-btn").click(function(){
        $("#custom-form").trigger("reset");
    });
    $('#custom-form').submit(function(e){
        e.preventDefault();
        e.stopPropagation();
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: store,
            method: 'PUT',
            data: $(this).serialize(),
            success: function (res) {
                if(res.result == "success" ){
                    toastr["success"]("Success!!!");
                    setInterval(function(){ 
                        location.href = list_url; 
                    }, 2000);
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
});