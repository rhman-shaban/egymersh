<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reply;

class ReplyController extends Controller
{
    public function reply_store(Request $request)
    {
        $reply = Reply::create($request->all());

        return response()->json($reply);
    }

    public function reply_destroy(Request $request)
    {
        $reply = Reply::where('id',$request->id)->first();

        $reply->delete();

        return response()->json($reply);
    }
}//end pf controller
