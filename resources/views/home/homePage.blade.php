@extends('layouts.homem')

@section('homeContent')

<div class="sticky -top-[550px] shadow-lg">
    <div class="relative ">
        <div class="h-[600px] overflow-hidden">
            <img src="{{asset('home/background.jpg')}}" alt="" class=" w-full">
        </div>
        <div class="absolute -bottom-3 left-[30%] z-10 flex justify-center items-center">
            <form action="{{route('home#page')}}" method="GET" class="flex justify-center items-center ">
                <div class="relative">
                    <i class="fa-solid fa-magnifying-glass text-xl absolute left-3 bottom-3 cursor-pointer"></i>
                    <input type="text" name="key" id="" class="border-2 border-gray-400 rounded-tl-lg rounded-bl-lg pl-12 py-3 w-[400px]" placeholder="search" value="{{request('key')}}">

                </div>
                <div>
                    <select name="category" id="" class=" rounded-tr-lg rounded-br-lg pt-3 pb-4  px-8 border-2 border-gray-400  ">
                        <option value="">category</option>
                        @foreach ($category as $c)
                        <option value="{{$c->id}}" @if (request('category') == $c->id)
                            selected
                        @endif>{{ $c->name }}</option>
                        @endforeach
                    </select>

                </div>
                <button type="submit" class="px-6 text-white hover:bg-indigo-600 pt-3 pb-4 rounded-lg bg-indigo-500 ml-4" >Search</button>
                <a href="{{route('home#page')}}" class=" @if (request('key') == '' && request('category') == '')
                    hidden
                @endif px-6 text-white hover:bg-red-400 pt-3 pb-4 rounded-lg bg-red-500 ml-4">
                    clear
                </a>
            </form>
        </div>
    </div>
</div>

<div class="container max-w-[70%] mx-auto my-16">
    <div class="flex justify-between items-center cursor-pointer">
        <h1 class="text-[30px] font-medium">What are you looking for ?</h1>
        <p class=" font-medium text-indigo-600 text-lg">view more -></p>
    </div>
    <div class=" py-16 grid grid-cols-6 gap-8">
        @foreach ($category as $c)
        <a href="{{route('home#shopPage')}}" class=" @if ($c->status != '1')
            hidden
        @endif text-center bg-gray-500 bg-opacity-10 hover:bg-opacity-20 shadow rounded py-8">
            {{-- <i class="fa-solid fa-laptop text-4xl bg-gray-200 p-2 rounded-full text-indigo-800"></i> --}}
            <img src="{{asset('/storage/'.$c->image)}}" class=" w-16 opacity-100 border-2 border-indigo-600  h-16 rounded-full mx-auto" alt="">
            <p class="py-3">{{ $c->name }}</p>
        </a>
        @endforeach

    </div>

    <div class="flex justify-between items-center cursor-pointer">
        <h1 class="text-[30px] font-medium">Recent Items</h1>
        <p class=" font-medium text-indigo-600 text-lg">view more -></p>
    </div>

    <div class="py-8">
        <div class="grid grid-cols-4 gap-4">

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



@endsection
