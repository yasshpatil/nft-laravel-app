$(document).ready( function () {
  let getOrdersRoute = route('admin.getorders');
  $('#order_list').DataTable({
    processing: true,
    serverSide: true,
    ajax: getOrdersRoute,
    columns: [
      { data: 'id' },
      { data: 'user' },
      { data: 'total_bricks' },
      { data: 'price' },
      { data: 'user_wallet' },
      { data: 'created_at' },
    ]
  });
});

$(function ()
{
    $('#order_list').wrap('<div class="dataTables_parent"></div>');
});