<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Seller;
use App\Models\Notification;
use App\Models\NotificationEye;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function password_index()
    {
        return view('store.chang_password');
    }

    public function password_update(Request $request)
    {
        $request->validate([
            'current_password'     => ['required', new MatchOldPassword],
            'new_password'         => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        Seller::find(auth()->guard('seller')->user()->id)->update(['password'=> Hash::make($request->new_password)]);

        return response()->json(['success'=> true]);

    }//end of password_update


    public function profile_store(Request $request)
    {

        $request->validate([
            'name'     => ['required','max:20'],
            'email'    => ['required','max:20'],
            'phone'    => ['required','max:12'],
        ]);

        try {

            $id = Seller::find(\Auth::guard('seller')->user()->id);

            $request_data = $request->except(['image']);

            if ($request->image) {

                Storage::disk('local')->delete('public/' . $id->image);
                
                $request_data['image']  = $request->file('image')->store('seller_images','public');

            }

            $id->update($request_data);

            return response()->json(['success'=> true]);

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of store

    public function notification_index()
    {
        $notifications = Notification::whenSearch(request()->search)->latest()->paginate(20);

        return view('store.notifications.index',compact('notifications'));
        
    }//end of notification_index

    public function notification_show($id)
    {
        $notification     = Notification::find($id);

        $Notification_eye = NotificationEye::where('notification_id',$notification->id)->where('seller_id',auth()->guard('seller')->user()->id)->first();

        if ($Notification_eye) {

            return view('store.notifications.show',compact('notification'));
            
        } else {
            NotificationEye::create([
                'notification_id' => $notification->id,
                'seller_id'       => auth()->guard('seller')->user()->id,
            ]);

            return view('store.notifications.show',compact('notification'));

        }//end of if

    }//end of notification_show

}//end of controller
