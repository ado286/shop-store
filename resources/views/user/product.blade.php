@extends('layouts.myApp')


@section('title', $product->name)
@section('content')
<!-- component -->
    <main class="my-8">
        <div class="container mx-auto px-6">
            @if(Session::has('success_message'))
               <h3 class="bg-green-200">{{session('success_message')}}</h3>
                <hr>
                <br>
            @endif
            <div class="md:flex md:items-center">
                <div class="w-full h-64 md:w-1/2 lg:h-96">
                    <img class="h-full w-full rounded-md object-cover max-w-lg mx-auto" src="{{$product->photo->file ?? "http://via.placeholder.com/250x250" }}" alt="Nike Air">
{{--                    https://images.unsplash.com/photo-1578262825743-a4e402caab76?ixlib=rb-1.2.1&auto=format&fit=crop&w=1051&q=80--}}
{{--                    https://images.unsplash.com/photo-1544441893-675973e31985?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1500&q=80--}}
{{--                    https://images.unsplash.com/photo-1563170351-be82bc888aa4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=376&q=80--}}
{{--                    https://images.unsplash.com/photo-1532667449560-72a95c8d381b?ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80--}}
{{--                    https://images.unsplash.com/photo-1590664863685-a99ef05e9f61?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=345&q=80--}}
                </div>
                <div class="w-full max-w-lg mx-auto mt-5 md:ml-8 md:mt-0 md:w-1/2">
                    <h3 class="text-gray-700 uppercase text-lg">{{$product->name}}</h3>
                    <span class="text-gray-500 mt-3">{{$product->price}}€</span>
                    <hr class="my-3">
                    <div class="mt-2">
{{--                        <label class="text-gray-700 text-sm" for="count">Count:</label>--}}
{{--                        <div class="flex items-center mt-1">--}}
{{--                            <button class="text-gray-500 focus:outline-none focus:text-gray-600">--}}
{{--                                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>--}}
{{--                            </button>--}}
{{--                            <span class="text-gray-700 text-lg mx-2">20</span>--}}
{{--                            <button class="text-gray-500 focus:outline-none focus:text-gray-600">--}}
{{--                                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>--}}
{{--                            </button>--}}
{{--                        </div>--}}
                        <p>{{$product->description}}</p>
                    </div>
                    <div class="mt-3">
                        <label class="text-gray-700 text-sm" for="count">Color:</label>
                        <div class="flex items-center mt-1">
                            <button class="h-5 w-5 rounded-full bg-blue-600 border-2 border-blue-200 mr-2 focus:outline-none"></button>
                            <button class="h-5 w-5 rounded-full bg-teal-600 mr-2 focus:outline-none"></button>
                            <button class="h-5 w-5 rounded-full bg-pink-600 mr-2 focus:outline-none"></button>
                        </div>
                    </div>
                    <div class="flex items-center mt-6">
                        <button class="px-8 py-2 bg-indigo-600 text-white text-sm font-medium rounded hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500">Order Now</button>
                        <form action="{{route('addCart')}}" method="GET">
                            @method('POST')
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            <input type="hidden" name="product_name" value="{{$product->name}}">
                            <input type="hidden" name="product_price" value="{{$product->price}}">
                            <input type="hidden" name="product_photo" value="{{$product->photo->file}}">

                            <button class="mx-2 text-gray-600 border rounded-md p-2 hover:bg-gray-200 focus:outline-none">
                                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="mt-16">
                <h3 class="text-gray-600 text-2xl font-medium">More Products</h3>
                <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
                @foreach($products as $product)
                    <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                        <div class="flex items-end justify-end h-56 w-full bg-cover" style="background-image: url('{{$product->photo->file ?? "http://via.placeholder.com/250x250"}}')">
                            <form action="{{route('addCart')}}" method="GET">
                                @method('POST')
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <input type="hidden" name="product_name" value="{{$product->name}}">
                                <input type="hidden" name="product_price" value="{{$product->price}}">
                                <input type="hidden" name="product_photo" value="{{$product->photo->file}}">
                            <button class="p-2 rounded-full bg-blue-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            </button>
                            </form>
                        </div>
                        <div class="px-5 py-3">
                            <h3 class="text-gray-700 uppercase">{{$product->name}}</h3>
                            <span class="text-gray-500 mt-2">{{$product->price}}€</span>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </main>


    @stop
