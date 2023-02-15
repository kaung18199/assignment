<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ItemModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //home Page
    public function homePage(){
        $category = Category::get();
        $item = ItemModel::select('item_models.*','categories.name as category_name')
                           ->leftJoin('categories','item_models.category_id','categories.id')
                           ->when(request('key') ,function($q){
                            $q->where('item_models.name','like','%'.request('key').'%');
                            })
                            ->when(request('category') ,function($q){
                                $q->where('item_models.category_id',request('category'));
                            })
                           ->get();
        return view('home.homePage',compact('category','item'));
    }

    //shop Page
    public function shopPage(){
        $category = Category::get();
        $item = ItemModel::select('item_models.*','categories.name as category_name')
                           ->leftJoin('categories','item_models.category_id','categories.id')
                           ->when(request('late') ,function($q){
                            $q->orderBy('created_at','desc');
                            })
                            ->when(request('name') ,function($q){
                                $q->where('item_models.name','like','%'.request('name').'%');
                            })
                            ->when(request('min')&& request('max') ,function($q){
                                $q->whereBetween('price', [request('min')*1 , request('max')*1]);
                            })
                            ->when(request('category') ,function($q){
                                $q->where('item_models.category_id',request('category'));
                            })
                            ->when(request('condition') ,function($q){
                                $q->where('item_models.condition',request('condition'));
                            })
                            ->when(request('type') ,function($q){
                                $q->where('item_models.type',request('type'));
                            })
                           ->get();
        return view('home.itemPage',compact('category','item'));
    }

    //detail page
    public function detail($id){
        $item = ItemModel::select('item_models.*','categories.name as category_name')
                           ->leftJoin('categories','item_models.category_id','categories.id')
                           ->where('item_models.id',$id)
                           ->first();
        return view('home.detail',compact('item'));
    }
}
