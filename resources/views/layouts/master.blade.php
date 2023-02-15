<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" /> --}}

    {{-- <link rel="stylesheet" href="dist/leaflet-locationpicker.src.css" /> --}}

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />

    <link rel='stylesheet' href='https://unpkg.com/leaflet@1.8.0/dist/leaflet.css' crossorigin='' />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            fontFamily: {
              sans: ['Inter', 'sans-serif'],
            },
          }
        }
      }
    </script>
</head>
<body>

    <div class=" grid grid-cols-5 ">
        <div class=" col-span-1 h-screen bg-indigo-200 space-y-4 px-2 relative overflow-hidden">
            <div class="flex items-center space-x-2  p-4 ">
                <div class=" w-14 h-14 rounded-full bg-indigo-500 text-white flex items-center justify-center shadow">
                    POS
                </div>
                <div class="text-xl font-semibold ">
                    Kaung Panel
                </div>
            </div>
            <a href="{{route('dashboard')}}" class="flex items-center cursor-pointer hover:bg-indigo-400 rounded-lg space-x-6 py-2 px-6">
                <i class="fa-solid fa-list text-2xl"></i>
                <p class="text-md font-base">Items</p>
            </a>
            <a href="{{route('category#list')}}" class="flex items-center cursor-pointer hover:bg-indigo-400 rounded-lg space-x-6 py-2 px-6">
                <i class="fa-solid fa-layer-group text-2xl"></i>
                <p class="text-md font-base">Category</p>
            </a>
            <form action="{{route('logout')}}" method="POST">
                @csrf
                <button type="submit" class=" absolute bottom-6  flex items-center cursor-pointer hover:bg-red-300 rounded-lg space-x-6 py-2 px-6">
                    <i class="fa-solid fa-right-from-bracket text-2xl"></i>
                    <p class=" text-base font-base">Logout</p>
                </button>
            </form>
        </div>
        <div class=" col-span-4">
            <div class=" flex justify-between items-center px-6 py-2 border-b border-b-gray-400">
                <div class="flex space-x-8 items-center">
                    <a href="{{route('home#page')}}" class="flex items-center border-b-2 border-white hover:border-indigo-600 cursor-pointer">
                        <i class="fa-solid fa-house text-xl mr-2"></i><span class=" font-semibold">HOME</span>
                    </a>
                    <a href="{{route('dashboard')}}" class="flex items-center border-b-2 border-white hover:border-indigo-600 cursor-pointer">
                        <i class="fa-solid fa-bars text-xl mr-2"></i><span class=" font-semibold">DASHBOARD</span>
                    </a>
                </div>
                <div>
                    <div class=" w-8 h-8 p-2 rounded-full bg-indigo-500 text-white flex items-center justify-center shadow">
                        PS
                    </div>
                </div>
            </div>
            <div>
                @yield('content')
            </div>
        </div>
    </div>


    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src='https://unpkg.com/leaflet@1.8.0/dist/leaflet.js' crossorigin=''></script>
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script> --}}
    {{-- <script src="dist/leaflet-locationpicker.min.js"></script> --}}
    @yield('javaScript')
</body>

<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
</html>
