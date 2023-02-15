@extends('layouts.homem')

@section('homeContent')

<div class="max-w-[80%] mx-auto">
    <div class="flex justify-center mt-5 py-2 items-center space-x-4 bg-gray-200 rounded w-52">
        <a href="{{route('home#page')}}" class=" text-base ">Home</a>
        <div>
            <i class="fa-solid fa-chevron-right  text-base "></i>
        </div>
        <p class=" text-base ">Search</p>
    </div>

    <div class="w-full grid grid-cols-8 py-8 gap-8 mt-5">
        <div class=" col-span-2 ">
            <div class=" sticky top-4">
                <div class=" flex justify-between items-center">
                    <h2 class=" font-semibold text-indigo-500">Filter By</h2>
                    <a href="{{route('home#shopPage')}}">
                        <h2 class=" font-semibold text-red-500">Clear Filter</h2>
                    </a>
                </div>
                <form action="{{route('home#shopPage')}}" method="GET">

                    <div class=" mt-5 space-y-2">
                        <div>
                            <label for="">Sorting</label>
                        </div>
                        <div class=" flex justify-between items-center px-8">
                            <div class="form-check">
                                <input class="form-check-input appearance-none h-4 w-4 border-2 border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" value="latest" id="flexCheckDefault" name="late" @if (request('late') != '')
                                    checked
                                @endif>
                                <label class="form-check-label inline-block text-gray-800" for="flexCheckDefault">
                                  Latest
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input appearance-none h-4 w-4 border-2 border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" value="popular" id="flexCheckDefault" name="popu" @if (request('popu') != '')
                                checked
                            @endif>
                                <label class="form-check-label inline-block text-gray-800" for="flexCheckDefault">
                                  Popular
                                </label>
                            </div>
                         </div>
                        </div>
                        <div class=" mt-5 space-y-2">
                            <div>
                                <label for="">Item Name</label>
                            </div>
                            <div class=" flex justify-between items-center">
                                <input type="text" name="name" id="" class="bg-indigo-100 p-2 w-full rounded" placeholder="put item name" value="{{request('name')}}">
                            </div>
                        </div>
                        <div class=" mt-5 space-y-2">
                            <div>
                                <label for="">Price Range</label>
                            </div>
                            <div class=" grid grid-cols-2 gap-2">
                                <input type="number" name="min" id="" class="bg-indigo-100 p-2 w-full rounded" placeholder="Min" value="{{request('min')}}">
                                <input type="number" name="max" id="" class="bg-indigo-100 p-2 w-full rounded" placeholder="Max" value="{{request('max')}}">
                            </div>
                        </div>
                        <div class=" mt-5 space-y-2">
                            <div>
                                <label for="">Category</label>
                            </div>
                            <select name="category" class="bg-indigo-100 p-2 w-full rounded" id="">
                                <option value="">Category</option>
                                @foreach ($category as $c)
                                <option value="{{$c->id}}" @if (request('category') == $c->id)
                                    selected
                                @endif>{{ $c->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class=" mt-5 space-y-2">
                            <div>
                                <label for="">Item Condition</label>
                            </div>
                            <select name="condition" class="bg-indigo-100 p-2 w-full rounded" id="">
                                <option value="">select Condition</option>
                                <option value="2" @if (request('condition') == '2')
                                    selected
                                @endif>new</option>
                                <option value="1" @if (request('condition') == '1')
                                selected
                            @endif>second</option>
                            </select>
                        </div>
                        <div class=" mt-5 space-y-2">
                            <div>
                                <label for="">Type</label>
                            </div>
                            <select name="type" class="bg-indigo-100 p-2 w-full rounded" id="">
                                <option value="">select Type</option>
                                <option value="3" @if (request('type') == '3')
                                    selected
                                @endif>for sell</option>
                                <option value="1" @if (request('type') == '1')
                                    selected
                                @endif>for buy</option>
                                <option value="2" @if (request('type') == '2')
                                    selected
                                @endif>for exchange</option>
                            </select>
                        </div>
                        <button type="submit" class="mt-5 bg-indigo-500 py-2 text-white w-full rounded">Apply Filter</button>

                </form>
            </div>

            </div>
            <div class=" col-span-6">
                <div class=" grid grid-cols-3 gap-8">

                    @foreach ($item as $i)
                    <div class="flex justify-center">
                        <div class="rounded-lg shadow-lg bg-white max-w-sm">
                          <a href="{{route('home#detail',$i->id)}}" data-mdb-ripple="true" data-mdb-ripple-color="light">
                            <img class="rounded-t-lg" src="{{asset('/storage/'.$i->image)}}" alt=""/>
                          </a>
                          <div class="p-6 ">
                            <div class="flex justify-between items-center ">
                                <h5 class=" font-semibold text-lg">{{ $i->name }}</h5>
                                @if ($i->condition == '2')
                                <p class=" text-blue-800 font-semibold">new</p>
                                @else
                                <p class=" text-blue-800 font-semibold">second</p>
                                @endif
                            </div>
                            <p class="text-blue-500 font-semibold mb-5">{{ $i->price }}MMK</p>
                            <div class="flex justify-start items-center space-x-4">
                                <i class="fa-solid fa-user text-2xl text-center bg-slate-600 w-8 h-8  rounded-full text-white"></i>
                                <p>{{ $i->own_name }}</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
