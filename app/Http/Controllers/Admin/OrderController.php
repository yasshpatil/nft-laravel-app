<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Get all orders list.
     *
     * @return void
     */
    public function index()
    {
        return view('admin.orderslist');
    }

    public function getOrders(Request $request)
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
            if($columnName == 'user'){
                $columnName = 'users.name';
            }
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
        $totalRecords = Order::count();
        if(isset($searchValue)){
            $totalRecordswithFilter = Order::select('count(*) as allcount')->join('users', 'users.id', '=', 'orders.user_id')->where('price', 'like', '%' .$searchValue . '%')->orWhere('total_bricks', 'like', '%' .$searchValue . '%')->orWhere('user_wallet', 'like', '%' .$searchValue . '%')->orWhere('users.name', 'like', '%' .$searchValue . '%')->count();
        }else{
            $totalRecordswithFilter =Order::join('users', 'users.id', '=', 'orders.user_id')->count();
        }
        // Fetch records
        $records = Order::join('users', 'users.id', '=', 'orders.user_id')->orderBy($columnName,$columnSortOrder);
        if(isset($searchValue)){
            $records->where('price', 'like', '%' .$searchValue . '%')->orWhere('total_bricks', 'like', '%' .$searchValue . '%')->orWhere('user_wallet', 'like', '%' .$searchValue . '%')->orWhere('users.name', 'like', '%' .$searchValue . '%');
        }
        $records=$records->select('orders.*')
            ->skip($start)
            ->take($rowperpage)
            ->get();
        $data_arr = array();
        $sno = $start+1;
        foreach($records as $record){
            $id = $record->id;
            $user = $record->user->name;
            $total_bricks = $record->total_bricks;
            $price = $record->price;
            $user_wallet = $record->user_wallet;
            $created_at = $record->created_at->format('d M Y');

            $data_arr[] = array(
                "id" => $this->makeId3Digit($id),
                "user" => $user,
                "total_bricks" => $total_bricks,
                "price" => $price,
                "user_wallet" => $user_wallet,
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

    private function makeId3Digit($id){
        
        if(strlen($id) == 1){
            return '00'.$id;
        }else if(strlen($id) == 2){

            return '0'.$id;
        }
        return $id;
    }
}
