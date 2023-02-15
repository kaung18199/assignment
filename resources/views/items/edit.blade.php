@extends('layouts.master')

@section('content')

<div class="px-4 my-4">
    <div class="flex justify-start items-center space-x-4 mt-10">
        <a href="{{route('dashboard')}}" class="">items</a>
        <i class="fa-solid fa-angle-right"></i>
        <p class="text-indigo-400">edit items</p>
    </div>
    <div class="bg-indigo-100 px-2 py-2 rounded-lg mt-8">
        edit items
    </div>
    <form action="{{route('item#editItem')}}" method="POST" class="mt-5" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-2 gap-16">
            <input type="hidden" name="id" value="{{$item->id}}">
            <div class=" space-y-3">
                <div class=" space-y-2">
                    <label for="" class="font-semibold">Item Name</label>
                    <input type="text" name="name" id="" class="border-2 border-indigo-200 p-2 w-full rounded" placeholder="input Name" value="{{$item->name}}">
                    @error('name')
                        <small class="text-sm text-red-600">{{ $message }}</small>
                    @enderror
                </div>
                <div class=" space-y-2">
                    <label for="" class="font-semibold">Select Category</label>
                    <select name="category_id" id="" class="border-2 border-indigo-200 p-2 w-full rounded ">
                        <option value="" >Select category</option>
                        @foreach ($category as $c)
                        <option value="{{$c->id}}" @if ($item->category_id == $c->id)
                            selected
                        @endif>{{ $c->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <small class="text-sm text-red-600">{{ $message }}</small>
                    @enderror
                </div>
                <div class=" space-y-2">
                    <label for="" class="font-semibold">Price</label>
                    <input type="text" name="price" id="" class="border-2 border-indigo-200 p-2 w-full rounded" placeholder="Enter price" value="{{$item->price}}">
                    @error('price')
                        <small class="text-sm text-red-600">{{ $message }}</small>
                    @enderror
                </div>
                {{-- ckeditor --}}
                <div class=" space-y-2">
                    <label for="" class="font-semibold">Description</label>
                    <textarea name="description" id="editor" cols="30" rows="10" class="border-2 border-indigo-200 p-2 w-full rounded" placeholder="Enter Description">
                        {{$item->description}}
                    </textarea>
                    @error('description')
                        <small class="text-sm text-red-600">{{ $message }}</small>
                    @enderror
                </div>
                <div class=" space-y-2">
                    <label for="" class="font-semibold">Select item Condition</label>
                    <select name="condition" id="" class="border-2 border-indigo-200 p-2 w-full rounded ">
                        <option value="" >Select condition</option>
                        <option value="2" @if ($item->condition == '2')
                            selected
                        @endif>New</option>
                        <option value="1" @if ($item->condition == '1')
                            selected
                        @endif>Second Hand</option>
                    </select>
                    @error('condition')
                        <small class="text-sm text-red-600">{{ $message }}</small>
                    @enderror
                </div>
                <div class=" space-y-2">
                    <label for="" class="font-semibold">Select item Type</label>
                    <select name="type" id="" class="border-2 border-indigo-200 p-2 w-full rounded ">
                        <option value="" >Select type</option>
                        <option value="3" @if ($item->type == '3')
                            selected
                        @endif>For Sell</option>
                        <option value="1" @if ($item->type == '1')
                            selected
                        @endif>For Buy</option>
                        <option value="2" @if ($item->type == '2')
                            selected
                        @endif>For Exchange</option>
                    </select>
                    @error('type')
                        <small class="text-sm text-red-600">{{ $message }}</small>
                    @enderror
                </div>
                <div class="space-y-2">
                    <label for="" class=" font-semibold">Status</label>
                    <div class="form-check">
                        <input class="form-check-input appearance-none h-4 w-4 border-2 border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" value="1" id="flexCheckDefault" name="status" @if ($item->status == '1')
                        checked
                    @endif>
                        <label class="form-check-label inline-block text-gray-800" for="flexCheckDefault">
                          publish
                        </label>
                      </div>
                </div>
                <div class="space-y-2">
                    <label for="" class=" font-semibold">Item Photo<span class="text-red-600">*</span></label>
                    <p class="text-sm text-gray-400">Recomended Size 400*200</p>
                    {{-- drag and drop --}}
                    <div class="grid grid-cols-2">
                        <div class="border text-center py-8 space-y-4">
                            <i class="fa-solid fa-cloud-arrow-down"></i><br>
                            <p class=" text-gray-400 text-sm">Put image here!</p>

                            <input type="file" name="image" id="" class="text-center border p-2 rounded-lg">
                        </div>
                        <div>
                            <img src="{{asset('/storage/'.$item->image)}}" class="w-full" alt="">
                        </div>
                    </div>
                    @error('image')
                        <small class="text-sm text-red-600">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class=" space-y-3">
                <div class=" space-y-2">
                    <label for="" class="font-semibold">Owner Name</label>
                    <input type="text" name="own_name" id="" class="border-2 border-indigo-200 p-2 w-full rounded" placeholder="input Name" value="{{$item->own_name}}">
                    @error('own_name')
                        <small class="text-sm text-red-600">{{ $message }}</small>
                    @enderror
                </div>
                <div class=" space-y-2">
                    <label for="" class="font-semibold">Contact Number</label>
                    <div class="grid grid-cols-12">
                        <select name="local" id="" class=" col-span-2 border-2 border-indigo-200 p-2 w-full rounded">
                            <option value="+95"
                            @if ($item->local == '+95')
                                selected
                            @endif>+95</option>
                            <option value="+94"
                            @if ($item->local == '+94')
                                selected
                            @endif>+94</option>
                            <option value="+93" @if ($item->local == '+93')
                                selected
                            @endif>+93</option>
                            <option value="+92" @if ($item->local == '+92')
                                selected
                            @endif>+92</option>
                            <option value="+91" @if ($item->local == '+91')
                                selected
                            @endif>+91</option>
                        </select>
                        <input type="text" name="phone" id="" class=" col-span-10 border-2 border-indigo-200 p-2 w-full rounded" placeholder="add number" value="{{ $item->phone }}">
                        <div class="col-span-12">
                            @error('phone')
                                <small class="text-sm text-red-600">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class=" space-y-2">
                        <label for="" class="font-semibold">Add Address</label>
                        <textarea name="address" id="" cols="30" rows="5" class="border-2 border-indigo-200 p-2 w-full rounded" placeholder="Enter address">{{ $item->address }}</textarea>
                        @error('address')
                            <small class="text-sm text-red-600">{{ $message }}</small>
                        @enderror
                    </div>

                </div>
            </div>
        </div>
        <div class="flex justify-end items-center space-x-2">
            <a href="{{route('dashboard')}}" class="bg-gray-600 cursor-pointer px-4 py-2 rounded-lg text-white">cancel</a>
            <input type="submit" value="save" class="bg-indigo-600 px-4 cursor-pointer py-2 rounded-lg text-white">
        </div>
    </form>
</div>

@endsection

@section('javaScript')

<script>
    ClassicEditor
    .create( document.querySelector( '#editor' ) )
    .catch( error => {
    console.error( error );
    } );


</script>


@endsection

