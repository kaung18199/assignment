<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
    <div class=" flex justify-center items-center h-screen">
        <div class="border px-4 py-6 pb-8 shadow rounded">
            <div class="space-y-2 text-center">
                <div class=" w-14 h-14 rounded-full bg-indigo-500 text-white flex items-center justify-center mx-auto shadow">
                    POS
                </div>
                <p class="text-4xl font-bold px-4">Log in to your account</p>
                <p class="text-sm font-semibold">wellcome Back!</p>
            </div>
            <form action="{{route('login')}}" method="Post" class="space-y-4">
                @csrf
                <div class=" space-y-2">
                    <label for="" class="text-sm font-medium">Email</label><br>
                    <input type="email" name="email" id="" class="w-full border p-2 rounded" placeholder="admin@gmail.com">
                </div>
                <div class=" relative">
                    <label for="" class="text-sm font-medium">Password</label><br>
                    <input type="password" name="password" id="password" class="w-full border p-2 rounded" placeholder="password">
                    <div class="absolute right-3 cursor-pointer bottom-3" id="eye">
                        <i class="fa-solid fa-eye-slash " id="show-password"></i>
                        <i class="fa-solid fa-eye hidden" id="hide-password"></i>
                    </div>
                </div>
                <div class="">
                    <input type="submit" value="Sign in" class="w-full text-white hover:bg-indigo-400 py-2 bg-indigo-500 rounded cursor-pointer" >
                </div>
            </form>
        </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>

    $(document).ready(function(){
        $('#show-password').click(function() {
            $('#password').attr('type', 'text');
            $('#show-password').addClass('hidden');
            $('#hide-password').removeClass('hidden');
        });

        $('#hide-password').click(function() {
            $('#password').attr('type', 'password');
            $('#hide-password').addClass('hidden');
            $('#show-password').removeClass('hidden');
        });
    })

</script>

<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
</html>
