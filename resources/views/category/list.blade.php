@extends('layouts.master')

@section('content')

<div class=" px-6 py-6">
    <h1 class="text-lg text-indigo-500 font-semibold">Category List</h1>
</div>
<div class="mt-4 px-6">
    @if (session('message'))
    <div class="alert bg-green-100 rounded-lg py-5 px-6 mb-3 text-base text-green-700 inline-flex items-center w-full alert-dismissible fade show" role="alert">
        <p>{{ session('message') }}</p>
        <button type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-yellow-900 border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
</div>
<div class="px-6 py-6">
    <a href="{{route('category#create')}}" class="bg-indigo-500 hover:bg-indigo-400 space-x-4 rounded-lg float-right px-4 py-2 text-white">
        <i class="fa-solid fa-plus"></i>
        <button>Add Item</button>
    </a>
</div>
<div class="px-6 py-2 flex justify-start items-center space-x-4 ">
    <p>show : </p>
    <select name="" id="rowSelect" class="border px-6 py-2 rounded-lg">
        <option value="">5 rows</option>
        <option value="10">all rows</option>
    </select>
</div>
<div>
    <div class="flex flex-col px-2">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden">
              <table class="min-w-full">
                <thead class=" border-b bg-indigo-500">
                  <tr class="text-white">
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4 text-left">
                      Action
                    </th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4 text-left">
                      No.
                    </th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4 text-left">
                      Category <i class="fa-solid fa-chevron-down text-sm ml-2"></i>
                    </th>
                    <th scope="col" class="text-sm font-medium text-white px-6 py-4 text-left">
                        Public <i class="fa-solid fa-chevron-down text-sm ml-2"></i>
                    </th>

                  </tr>
                </thead>
                <tbody id="rowChange">
                  @foreach ($category as $c)
                  <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">
                        <div class="">
                            <a href="{{route('category#edit',$c->id)}}" class="bg-green-500 hover:bg-green-400 p-2 rounded-lg"><i class="fa-regular fa-pen-to-square text-lg "></i></a>
                            <a href="{{route('category#delete',$c->id)}}" class="bg-red-500 hover:bg-red-400 p-2 rounded-lg"><i class="fa-regular fa-trash-can text-lg"></i></a>
                        </div>
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      {{$c->id}}
                    </td>
                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                      {{$c->name}}
                    </td>

                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                        @if ($c->status == null)
                            <div class="form-check form-switch mb-7">
                              <input class="form-check-input appearance-none w-14 -ml-10 rounded-full float-left h-6 align-top  bg-no-repeat bg-contain bg-gray-300 focus:outline-none cursor-pointer shadow-sm" type="checkbox" role="switch" id="flexSwitchCheckDefault56">
                            </div>
                        @else
                        <div class="form-check form-switch">
                            <input class="form-check-input appearance-none w-14 -ml-10 rounded-full float-left h-6 align-top  bg-no-repeat bg-contain bg-gray-300 focus:outline-none cursor-pointer shadow-sm" type="checkbox" role="switch" id="flexSwitchCheckChecked76" checked>
                          </div>
                        @endif
                    </td>

                  </tr>
                  @endforeach

                </tbody>

              </table>
              <div class="mt-2" id="pagination">
                {{$category->links()}}
              </div>
            </div>
          </div>
        </div>
      </div>
</div>

@endsection

@section('javaScript')

<script>
    $(document).ready(function(){
        $('#rowSelect').change(function(){
            $eventValue = $('#rowSelect').val();
            // console.log($eventValue);
            if($eventValue == '10'){
                $row = {'row' : $eventValue}
                $.ajax({
                    type : 'get',
                    url : 'http://localhost:8000/category/row/select',
                    data : $row,
                    dataType : 'json',
                    success : function(response){

                        // console.log(response[0]);
                        $data = response;
                        // console.log($data);
                        $pagi = `

                        `

                        $list = '';
                        for (let $i = 0; $i < response[0].length; $i++) {

                            $list += `

                              <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">
                                    <div class="">
                                        <a href="#" class="bg-green-500 hover:bg-green-400 p-2 rounded-lg"><i class="fa-regular fa-pen-to-square text-lg "></i></a>
                                        <a href="#" class="bg-red-500 hover:bg-red-400 p-2 rounded-lg"><i class="fa-regular fa-trash-can text-lg"></i></a>
                                    </div>
                                </td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                  ${response[0][$i].id}
                                </td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    ${response[0][$i].name}
                                </td>

                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    ${response[0][$i].status == null ? `<div class="form-check form-switch mb-7">
                                      <input class="form-check-input appearance-none w-14 -ml-10 rounded-full float-left h-6 align-top  bg-no-repeat bg-contain bg-gray-300 focus:outline-none cursor-pointer shadow-sm" type="checkbox" role="switch" id="flexSwitchCheckDefault56">
                                    </div>` : `<div class="form-check form-switch">
                                        <input class="form-check-input appearance-none w-14 -ml-10 rounded-full float-left h-6 align-top  bg-no-repeat bg-contain bg-gray-300 focus:outline-none cursor-pointer shadow-sm" type="checkbox" role="switch" id="flexSwitchCheckChecked76" checked>
                                      </div>`}
                                </td>

                              </tr>
                            `
                        }
                        $('#rowChange').html($list);
                        $('#pagination').html($pagi);
                    }

                })
            }else{
                window.location.href = "http://localhost:8000/category/list";
            }

        })
    })
</script>

@endsection
