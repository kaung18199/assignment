@extends('layouts.master')

@section('content')

<div class="px-4">
    <div class="flex justify-start items-center space-x-4 mt-10">
        <a href="{{route('category#list')}}" class="">category</a>
        <i class="fa-solid fa-angle-right"></i>
        <p class="text-indigo-400">add category</p>
    </div>
    <div class="bg-indigo-100 px-2 py-2 rounded-lg mt-8">
        Add Category
    </div>

    <div class="w-1/2 mt-8">
        <form action="{{ route('category#create') }}" method="POST" class=" space-y-4" enctype="multipart/form-data" >
            @csrf
            <div class="space-y-2">
                <label for="" class=" font-semibold">Category <span class="text-red-600">*</span></label>
                <input type="text" name="name" id="" class="w-full border-2 border-indigo-200 p-2 rounded-lg" placeholder="category name">
                @error('name')
                    <small class="text-sm text-red-600">{{ $message }}</small>
                @enderror
            </div>
            <div class="space-y-2">
                <label for="" class=" font-semibold">Category Image<span class="text-red-600">*</span></label>
                <p class="text-sm text-gray-400">Recomended Size 400*200</p>
                {{-- drag and drop --}}
                <div class="border-2 border-indigo-200 text-center py-8 space-y-4">
                    <i class="fa-solid fa-cloud-arrow-down"></i><br>
                    <p class=" text-gray-400 text-sm">Put image here!</p>

                    <input type="file" name="image" id="" class="text-center border-2 border-indigo-200 p-2 rounded-lg">
                </div>
                @error('image')
                    <small class="text-sm text-red-600">{{ $message }}</small>
                @enderror
            </div>
            <div class="space-y-2">
                <label for="" class=" font-semibold">Status</label>
                <div class="form-check">
                    <input class="form-check-input appearance-none h-4 w-4 border-2 border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" value="1" id="flexCheckDefault" name="status">
                    <label class="form-check-label inline-block text-gray-800" for="flexCheckDefault">
                      publish
                    </label>
                  </div>
            </div>
            <div class="flex justify-end items-center space-x-2">
                <a href="{{route('category#create')}}" class="bg-gray-400 rounded-lg px-4 py-2 hover:bg-gray-300">cancel</a>
                <button type="submit" class="bg-indigo-500 rounded-lg px-4 py-2 hover:bg-indigo-300">save</button>
            </div>
        </form>
    </div>
</div>

@endsection


