<?php

namespace App\Http\Controllers\Ajax;

use App\Models\Category;
use App\Models\ItemModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //category row
    public function categoryRow(Request $request){
        // logger($request->all());
        if($request->row == '5'){
            $category = Category::orderBy('created_at','desc')->paginate(5);
        } elseif($request->row == '10'){
            $category = Category::orderBy('created_at','desc')->get();
        }
        return response()->json([
            $category
        ]);
    }

    //item row
    public function itemRow(Request $request){
        if($request->row == '10'){
            $item = ItemModel::select('item_models.*','categories.name as category_name')
            ->leftJoin('categories','item_models.category_id','categories.id')->orderBy('created_at','desc')->get();
        }
        return response()->json([
            $item
        ]);
    }
}
