<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Item;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;


class HomeController2 extends Controller
{
    public function getIndex() {
        $items = Auth::user()->items;


        return view('layouts.home', array(
            'items' => $items
        ));
    }

    public function postIndex() {
        $id = Input::get('id');
        $userId = Auth::user()->id;

        $item = Item::findOrFail($id);

        if ($item->user_id == $userId){
            $item->mark();
        }


        return redirect('/hi');


    }
    //
}
