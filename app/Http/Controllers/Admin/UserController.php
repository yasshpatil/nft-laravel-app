<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Get all users list.
     *
     * @return void
     */
    public function index()
    {
        return view('admin.userslist');
    }

    public function getUsers(Request $request)
    {
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = ($request->get("length") == null ? 10 : $request->get("length")); // Rows display per page

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        if($columnIndex_arr != null){
            $columnIndex = $columnIndex_arr[0]['column'];  // Column index
        }

        if($columnName_arr != null){
            $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        }else{
            $columnName = 'id';
        }

        if($order_arr != null){
            $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        }else{
            $columnSortOrder = 'asc';
        }

        if($order_arr != null){
            $searchValue = $search_arr['value']; // Search value
        }

        // Total records
        $totalRecords = User::count();
        if(isset($searchValue)){
            $totalRecordswithFilter = User::select('count(*) as allcount')->where('name', 'like', '%' .$searchValue . '%')->orWhere('email', 'like', '%' .$searchValue . '%')->orWhere('surname', 'like', '%' .$searchValue . '%')->orWhere('dob', 'like', '%' .$searchValue . '%')->count();
        }else{
            $totalRecordswithFilter =User::count();
        }
        // Fetch records
        $records = User::orderBy($columnName,$columnSortOrder);
        if(isset($searchValue)){
            $records->where('name', 'like', '%' .$searchValue . '%')->orWhere('email', 'like', '%' .$searchValue . '%')->orWhere('surname', 'like', '%' .$searchValue . '%')->orWhere('dob', 'like', '%' .$searchValue . '%');
        }
        $records=$records->select('id','name','surname','email','dob','know_about_nft','involve_about_nft','invest_about_nft','created_at')
            ->skip($start)
            ->take($rowperpage)
            ->get();
        $data_arr = array();
        $sno = $start+1;
        foreach($records as $record){
            $id = $record->id;
            $name = $record->name;
            $surname = $record->surname;
            $email = $record->email;
            $dob = $record->dob;
            $know_about_nft = $record->know_about_nft;
            $involve_about_nft = $record->involve_about_nft;
            $invest_about_nft = $record->invest_about_nft;
            $created_at = $record->created_at->format('d M Y');

            $data_arr[] = array(
                "id" => $id,
                "name" => $name,
                "surname" => $surname,
                "email" => $email,
                "dob" => $dob,
                "know_about_nft" => $know_about_nft,
                "involve_about_nft" => $involve_about_nft,
                "invest_about_nft" => $invest_about_nft,
                "created_at" => $created_at
            );
        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr
        ); 

        echo json_encode($response);
        exit;
    }
}
