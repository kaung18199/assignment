<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HomePage</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
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
    <div>
        <div class=" flex justify-between items-center px-6 py-2 border-b border-b-gray-400 z-30 bg-indigo-500 bg-opacity-30 text-gray-600">
            <div class="flex space-x-8 items-center">
                <a href="{{route('home#page')}}" class="flex items-center border-b-2 border-indigo-500 border-opacity-0 hover:border-indigo-600 cursor-pointer">
                    <i class="fa-solid fa-house text-xl mr-2"></i><span class=" font-semibold">HOME</span>
                </a>
                <a href="{{route('dashboard')}}" class="flex items-center border-b-2 border-indigo-500 border-opacity-0 hover:border-indigo-600 cursor-pointer">
                    <i class="fa-solid fa-bars text-xl mr-2"></i><span class=" font-semibold">DASHBOARD</span>
                </a>
            </div>
            <div>
                <div class=" w-8 h-8 p-2 rounded-full bg-indigo-500 text-white flex items-center justify-center shadow">
                    PS
                </div>
            </div>
        </div>
        @yield('homeContent')
    </div>



    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
</body>
</html>
