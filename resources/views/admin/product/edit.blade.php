@extends('layouts.myApp')

@section('content')
    <div class="container mx-auto mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form action="{{route('product.update', ['product'=> $product->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Edit product number {{$product->id}} for shop</h3>
                            <hr>
                            <br>
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-3">

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="name" class="block text-sm font-medium text-gray-700">Product name:</label>
                                        <input type="text" name="name" id="name" value="{{$product->name}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    <br>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="price" class="block text-sm font-medium text-gray-700">Price for product($):</label>
                                        <input type="text" name="price" id="price" value="{{$product->price}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    <br>
                                    <div class="col-span-6">
                                        <label for="description" class="block text-sm font-medium text-gray-700">Description:</label>
                                        <textarea name="description" id="description" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{$product->description}}</textarea>
                                    </div>
                                </div>

                                <div class="col-span-3">
                                    <img width="100px" src="{{ $product->photo ?  $product->photo->file : "http://via.placeholder.com/100x100" }}" alt="">
                                    <div class="col-span-6">
                                        <label for="photo_id" class="block text-sm font-medium text-gray-700">Choose another photo</label>
                                        <input type="file" name="file_name" id="photo_id" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Edit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="md:col-span-1">
            </div>
        </div>
    </div>

@stop
