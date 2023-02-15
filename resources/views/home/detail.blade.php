@extends('layouts.homem')

@section('homeContent')

<div class="max-w-[70%] mx-auto space-y-8 my-8">
    <div class="flex justify-center mt-5 py-2 items-center space-x-4 bg-gray-200 rounded w-60">
        <a href="{{route('home#page')}}" class=" text-base ">Home</a>
        <div>
            <i class="fa-solid fa-chevron-right  text-base "></i>
        </div>
        <a href="{{route('home#shopPage')}}" class=" text-base ">Shop</a>
        <div>
            <i class="fa-solid fa-chevron-right  text-base "></i>
        </div>
        <p class="text-base">detail</p>
    </div>

    <div class="w-full bg-gray-100 ">
        <img src="{{asset('/storage/'.$item->image)}}" alt="" class="w-auto mx-auto">
    </div>

    <div class="w-full grid grid-cols-2 gap-8">
        <div class="space-y-8">
            <div class="space-y-2">
                <h1 class="text-xl font-bold">{{ $item->name }}</h1>
                <p class="text-indigo-600 text-lg font-semibold">{{ $item->price }}MMK</p>
            </div>
            <div class=" flex justify-between items-center">
                <div class="space-y-2">
                    <p class=" text-md">Type</p>
                    @if ($item->type == '3')
                    <p class="bg-red-100 py-2 px-4 rounded">Sell</p>
                    @elseif ($item->type == '1')
                    <p class="bg-red-100 py-2 px-4 rounded">Buy</p>
                    @else
                    <p class="bg-red-100 py-2 px-4 rounded">Exchange</p>
                    @endif
                </div>
                <div class="space-y-2">
                    <p class=" text-md">Condition</p>
                    @if ($item->condition == '2')
                    <p class="bg-indigo-100 py-2 px-4 rounded">New</p>
                    @else
                    <p class="bg-indigo-100 py-2 px-4 rounded">Second</p>
                    @endif
                </div>
                <div class="space-y-2">
                    <p class=" text-md">Status</p>
                    @if ($item->status == null)
                    <p class="bg-green-100 py-2 px-4 rounded">no avalible</p>
                    @else
                    <p class="bg-green-100 py-2 px-4 rounded">Avalible</p>
                    @endif
                </div>
            </div>
            <div class=" space-y-2 border p-4 rounded">
                <h1 class=" text-xl font-semibold">HightLighted Information</h1>
                <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
            </div>
            <div class=" space-y-2 border p-4 rounded">
                <h1 class=" text-xl font-semibold">Product Description</h1>
                <p>{!! html_entity_decode($item->description) !!}</p>
            </div>
            <div class=" space-y-6">
                <h1 class=" text-xl font-semibold">Owner Information</h1>
                <div class=" space-y-4 py-12 border rounded px-8">
                    <div class="flex item-center space-x-4 text-lg">
                        <i class="fa-solid fa-phone"></i>
                        <p>Contact Number</p>
                    </div>
                    <p class="text-lg">+{{ $item->local }} {{ $item->phone }}</p>
                </div>
            </div>
            <div class="flex items-center space-x-4 py-4 px-4 bg-indigo-300 rounded">
                <div>
                    <i class="fa-solid fa-user text-2xl text-center bg-slate-600 w-12 h-12  rounded-full text-white"></i>
                </div>
                <div>
                    <h1 class=" font-semibold">{{ $item->own_name }}</h1>
                    <p class="text-sm">{{ $item->address }}</p>
                </div>
            </div>
        </div>
        <div>
            <div class=" space-y-4">
                <div class="flex item-center space-x-2">
                    <i class="fa-solid fa-location-dot"></i>
                    <p class=" text-sm font-semibold">location</p>
                </div>
                <h1 class=" font-semibold">{{ $item->address }}</h1>
            </div>
            <div class="w-full h-full mt-5">
                <img src="{{asset('home/map.jpg')}}" alt="" class=" w-full ">
            </div>
        </div>
    </div>
</div>

@endsection
