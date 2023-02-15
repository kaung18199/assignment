<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ItemModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ItemController extends Controller
{
    //create page
    public function createPage(){
        $category = Category::get();
        return view('items.create',compact('category'));
    }

    //create
    public function createItem(Request $request){
        // dd($request->all());
        $this->validationCheckItem($request,'create');
        $data = [
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'description' => $request->description,
            'condition' => $request->condition,
            'status' => $request->status,
            'type' => $request->type,
            'own_name' => $request->own_name,
            'phone' => $request->phone,
            'local' => $request->local,
            'address' => $request->address
        ];
        //for image
        if($request->hasFile('image')){

            $fileName = uniqid() . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public',$fileName);
            $data['image'] = $fileName;
        }
        // dd($data);

        ItemModel::create($data);

        return redirect()->route('dashboard');
    }

    //delete
    public function delete($id){
        ItemModel::where('id',$id)->delete();
        return back()->with('message','success delete');
    }

    //edit page
    public function editPage($id){
        $category = Category::get();
        $item = ItemModel::where('id',$id)->first();
        return view('items.edit',compact('item','category'));
    }

    //edit
    public function edit(Request $request){
        $this->validationCheckItem($request,'update');

        $data = [
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'description' => $request->description,
            'condition' => $request->condition,
            'status' => $request->status,
            'type' => $request->type,
            'own_name' => $request->own_name,
            'phone' => $request->phone,
            'local' => $request->local,
            'address' => $request->address
        ];
        //for image
        if($request->hasFile('image')){
            $oldImageName = ItemModel::select('image')->where('id',$request->id)->first();
            $oldImageName = $oldImageName->image;

            if($oldImageName != null){
                Storage::delete('public/'.$oldImageName);
            }

            $fileName = uniqid() . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public',$fileName);
            $data['image'] = $fileName;
        }

        ItemModel::where('id',$request->id)->update($data);
        return redirect()->route('dashboard')->with('message','update Success');
    }

    //validation
    private function validationCheckItem($request,$action){
        $validationRules = [
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'condition' => 'required',
            'type' => 'required',
            'own_name' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ];
        $validationRules['image'] = $action == "create" ? 'required|mimes:jpg,png,jpeg,webp|file' : "mimes:jpg,png,jpeg,webp|file";

        Validator::make($request->all(),$validationRules)->validate();
    }

}
