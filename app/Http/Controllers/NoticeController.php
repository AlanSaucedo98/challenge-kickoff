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
        $validateNotice = Favorite::where('user_id', $request->user_id)->where('notice_id', $request->notice_id)->first();
        if ($validateNotice) {
            $validateNotice->delete();
            return response()->json(['success' => 'Removed from favorite list.']);
        }
        Favorite::create([
            'notice_id' => $request->notice_id,
            'title' => $request->title,
            'user_id' => $request->user_id
        ]);
        return response()->json(['success' => 'Added to favorite list.']);
    }

    public function getFavorites($user_id)
    {       
        
        $favorites = Favorite::where('user_id', $user_id)->get();
        return response()->json($favorites);

    }


}
