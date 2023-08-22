<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use App\Models\Admin;
use App\Models\Order;
use App\Models\User;
use App\Models\Box;
use Auth;

class AdminController extends Controller
{

    public function index(){
        $orders_count = Order::count();
        $users_count = User::count();
        $bricks_count = Box::whereNotNull('order_id')->count();
        return view('admin.dashboard',['orders_count' => $orders_count,'users_count' => $users_count,'bricks_count'=>$bricks_count]);
    }

    public function changePassword(){
        return view('admin.changepassword');
    }

    public function updatePassword(Request $request)
    {
        $validator=$request->validate([
            'old_password' => ['required'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if(Hash::check($request->old_password,Auth::user()->password)== false){
            return back()->with(['error' => 'Old password is wrong']);
        }
        
        $user = Admin::find(Auth::id());

        if($user){
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->route('admin.changepassword')->with('success', 'Password changed successfully');
        }else{
            return back()->with(['error' => 'Please try again']);
        }
       
    }
}
