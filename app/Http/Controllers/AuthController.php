<?php

namespace App\Http\Controllers;

use App\Models\ItemModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //login system
    public function loginSystem(){
        if(Auth::user()->role == '0'){
            return ('404');
        }
        else{
            $item = ItemModel::select('item_models.*','categories.name as category_name')
                               ->leftJoin('categories','item_models.category_id','categories.id')
                               ->orderBy('created_at','desc')
                               ->paginate(5);
            return view('dashboard',compact('item'));
        }
    }
}
