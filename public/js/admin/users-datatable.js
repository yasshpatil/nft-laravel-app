$(document).ready( function () {
  let getusersRoute = route('admin.getusers');
  $('#user_list').DataTable({
    processing: true,
    serverSide: true,
    ajax: getusersRoute,
    columns: [
      { data: 'id' },
      { data: 'name' },
      { data: 'surname' },
      { data: 'email' },
      { data: 'dob' },
      { data: 'know_about_nft' },
      { data: 'involve_about_nft' },
      { data: 'invest_about_nft' },
      { data: 'created_at' },
    ]
  });
});
$(function ()
{
    $('#user_list').wrap('<div class="dataTables_parent"></div>');
});