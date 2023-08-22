

$('#kt_account_profile_details_form').on('submit',function(){
    var frmData = $(this).serialize();
    $.ajax({
        url: BASE_URL + "updatepassword",
        dataType: "json",
        type: "Post",
        data: frmData,
        success: function(result){
                if (result.status) {
                    toastr.success(result.message);
                } else {
                    toastr.error(result.message);
                }
        },
        error: function (data) {
            if (data.responseJSON.errors.password) {
                data = data.responseJSON.errors.password;
                var errors = data.join('<br />');
                toastr.error(errors);                
            }
        }
    });
    return false;
});
$('#frmUserDetail').on('submit',function(){
    var formData = new FormData(this);    
    $.ajax({
        url: BASE_URL + "save/user/detail",
        type: "POST",
        data: formData,
        success: function(result){
                if (result.status) {
                    toastr.success(result.message);
                } else {
                    toastr.error(result.message);
                }
        },
        cache: false,
        contentType: false,
        processData: false
    });
    return false;
});