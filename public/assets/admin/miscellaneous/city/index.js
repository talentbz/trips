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
    })
    // delete city data
    $('.confirm_delete').click(function(e){
        e.preventDefault();
        e.stopPropagation();
        var id = $(this).data('id');
        $('.delete_button').click(function(){
            $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type:"POST",
                url: delete_url,
                data: { id: id },
                dataType: 'json',
                success: function(res){
                  if(res=="success"){
                    toastr["success"]("Deleted!");
                    $('#deleteModal').modal('hide');
                  }
              }
            });
        })
      })
});