$(document).ready(function(){
    $("select[name='client_filter']").on("change", function (e) { 
        e.preventDefault();
        e.stopPropagation();
        $.ajax({
            url: url,
            method: 'get',
            data: {asds: '123123'},
            success: function (res) {
                if(res.result == "success" ){
                    toastr["success"]("Success!!!");
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
});

