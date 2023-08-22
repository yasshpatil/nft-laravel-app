<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function changePassword(){
        return view('front.changepassword');
    }

    public function updatePassword(Request $request)
    {
        $validator=$request->validate([
            '_token' => ['required'],
            'old_password' => ['required'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        
        if(Hash::check($request->old_password,Auth::user()->password) == false){
            return response()->json([
                'status' => false,
                'message'=>'Old password is wrong'
            ]);
        }
        
        $user = User::find(Auth::id());

        if($user){
            $user->password = Hash::make($request->password);
            $user->save();
            return response()->json([
                'status' => true,
                'message'=>'Password changed successfully'
            ]);
        }else{
            return response()->json([
                'status' => false,
                'message'=>'Please try again'
            ]);
        }
       
    }

    public function userQuestionsUpdate(Request $request){
        $know_about_nft= $request->input('know_about_nft');
        $involve_about_nft= $request->input('involve_about_nft');
        $invest_about_nft= $request->input('invest_about_nft');
        $user= User::find(Auth::id());
        $user->know_about_nft = $know_about_nft;
        $user->involve_about_nft = $involve_about_nft;
        $user->invest_about_nft = $invest_about_nft;
        $user->save();
        return response()->json([
            'status' => true,
            'message'=>'Your feedback saved'
        ]);
    }

    public function saveUserDetail(Request $request) {

        $updateData = [];
        $updateData['username'] = $request->User_name;
        $updateData['bio'] = $request->Bio;
        if ($request->hasFile('image_url')) {
            $image = $request->file('image_url');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('/front/nft/userImage'),$image_name);
            $updateData['profile_image'] = "/front/nft/userImage/" . $image_name;
        }
        $user = Auth::user();
        $user->update($updateData);
        return response()->json(["status" => true, "message" => "Successfully done." ]);
    }
        
}
