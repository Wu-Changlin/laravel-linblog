<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FriendshipLink as FriendshipLinkModel ;

class FriendshipLinkController extends Controller
{
    public function showFriendshipLink(){
        $data=FriendshipLinkModel::all();
        $assign=compact('data');
        dd($assign);
    }
}
