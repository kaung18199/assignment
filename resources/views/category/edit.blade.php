@extends('layouts.master')

@section('content')

<div class="px-4">
    <div class="flex justify-start items-center space-x-4 mt-10">
        <a href="{{route('category#list')}}" class="">category</a>
        <i class="fa-solid fa-angle-right"></i>
        <p class="text-indigo-400">edit category</p>
    </div>
    <div class="bg-indigo-100 px-2 py-2 rounded-lg mt-8">
        Edit Category
    </div>

    <div class="w-1/2 mt-8 mb-4">
        <form action="{{ route('category#editFun') }}" method="POST" class=" space-y-4" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$category->id}}">
            <div class="space-y-2">
                <label for="" class="">Category <span class="text-red-600">*</span></label>
                <input type="text" value="{{$category->name}}" name="name" id="" class="w-full border p-2 rounded-lg" placeholder="category name">
                @error('name')
                    <small class="text-sm text-red-600">{{ $message }}</small>
                @enderror
            </div>
            <div class="space-y-2">
                <label for="" class="">Category Image<span class="text-red-600">*</span></label>
                <p class="text-sm text-gray-400">Recomended Size 400*200</p>
                <div class="grid grid-cols-2">
                    <div class="border text-center py-8 space-y-4">
                        <i class="fa-solid fa-cloud-arrow-down"></i><br>
                        <p class=" text-gray-400 text-sm">Put image here!</p>

                        <input type="file" name="image" id="" class="text-center border p-2 rounded-lg">
                    </div>
                    <div>
                        <img src="{{asset('/storage/'.$category->image)}}" class="w-full" alt="">
                    </div>
                </div>
                @error('image')
                    <small class="text-sm text-red-600">{{ $message }}</small>
                @enderror
            </div>

            <div class="space-y-2">
                <label for="" class="">Status</label>
                <div class="form-check">
                    <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" value="1" id="flexCheckDefault" name="status" @if ($category->status == '1')
                        checked
                    @endif>
                    <label class="form-check-label inline-block text-gray-800" for="flexCheckDefault">
                      publish
                    </label>
                  </div>
            </div>
            <div class="flex justify-end items-center space-x-2">
                <a href="{{route('category#list')}}" class="bg-gray-400 rounded-lg px-4 py-2 hover:bg-gray-300">cancel</a>
                <button type="submit" class="bg-indigo-500 rounded-lg px-4 py-2 hover:bg-indigo-300">save</button>
            </div>
        </form>
    </div>
</div>

@endsection
