<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\OrderComment;
use Auth;
class OrderCommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , $order)
    {
        $this->validate($request , [
            'comment' => "required" , 
        ]);
        $comment = new OrderComment;
        $comment->comment = $request->comment;
        $comment->order_id = $order;
        $comment->admin_id = Auth::guard('admin')->id();
        $comment->save();
        return back()->with('success'  , 'Comment added successfully' );
    }

   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderComment$comment)
    {
        $comment->delete();

        return back()->with('success' , 'Comment deleted Successfully' );
    }
}
