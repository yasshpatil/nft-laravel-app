// function sendRequest(route,method,data={}){
//     $.ajax({
//       headers: {
//           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//       },
//       url: route,
//       data: data,
//       type: method,
//       cache: false,
//       success: function (response) {
//         return response;
//       },
//       error: function (xhr, ajaxOptions, thrownError) {
//           errorMessage(xhr);
//       }
//     });
// }

// function errorMessage(xhr) {
//     if (xhr.status == '401') {
//         toastr.error("You are not authorized to access this resource");
//     } else {
//         toastr.error(xhr.responseJSON.message);
//     }
// }