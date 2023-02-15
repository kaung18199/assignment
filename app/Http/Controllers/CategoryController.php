<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //go create page
    public function createPage(){
        return view('category.create');
    }

    //go to list page
    public function list(){
        $category = Category::orderBy('created_at','desc')->paginate(5);
        return view('category.list',compact('category'));
    }

    //create
    public function create(Request $request){
        // dd($request->all());
        $this->validationCheck($request,'create');
        $data = $this->getCategory($request);

        //for image
        if($request->hasFile('image')){

            $fileName = uniqid() . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public',$fileName);
            $data['image'] = $fileName;
        }
        // dd($data);
        Category::create($data);

        return redirect()->route('category#list')->with('message','Success Add Category');
    }

    //delete
    public function delete($id){
        //image
        $deleteImage = Category::select('image')->where('id',$id)->first();
        $deleteImage = $deleteImage->image;
        // dd($deleteImage);
        if($deleteImage != null){
            Storage::delete('public/'.$deleteImage);
        }

        Category::where('id',$id)->delete();

        return back()->with('message','Delete success');
    }

    //edit page
    public function edit($id){
        $category = Category::where('id',$id)->first();
        return view('category.edit',compact('category'));
    }

    //edit
    public function editFun(Request $request){
        // dd($request->all());
        $this->validationCheck($request,'edit');
        $data = $this->getCategory($request);

        //image
        if($request->hasFile('image')){
            $oldImageName = Category::select('image')->where('id',$request->id)->first();
            $oldImageName = $oldImageName->image;

            if($oldImageName != null){
                Storage::delete('public/'.$oldImageName);
            }

            $fileName = uniqid().$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public',$fileName);
            $data['image'] = $fileName;
        }

        Category::where('id',$request->id)->update($data);

        return redirect()->route('category#list')->with('message','success update');
    }

    //validation
    private function validationCheck($request,$action){
        $validationRules = [
            'name' => 'required'
        ];
        $validationRules['image'] = $action == "create" ? 'required|mimes:jpg,png,jpeg,webp|file' : "mimes:jpg,png,jpeg,webp|file";

        Validator::make($request->all(),$validationRules)->validate();
    }

    //get data
    private function getCategory($request){
        return [
            'name' => $request->name,
            'status' => $request->status
        ];
    }
}
