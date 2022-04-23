<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\User;

class NoticeController extends Controller
{
    public function index ()
    {
        return view('favorites');
    }
    public function addOrRemoveFavorite(Request $request)
    {
        $user = User::where('email', $request->user_email)->first();

        $validateNotice = Favorite::where('user_id', $user->id)->where('notice_id', $request->notice_id)->first();
        if ($validateNotice) {
            $validateNotice->delete();
            return response()->json(['success' => 'Removed from favorite list.']);
        }
        
        Favorite::create([
            'notice_id' => $request->notice_id,
            'title' => $request->title,
            'user_id' => $user->id,
            'url'=>$request->url,
        ]);
        return response()->json(['success' => 'Added to favorite list.']);
    }

    public function getFavorites(Request $request)
    {       
        $user = User::where('email', $request->user_email)->first();
        $favorites = Favorite::where('user_id', $user->id)->get();
        return response()->json($favorites);

    }


}
