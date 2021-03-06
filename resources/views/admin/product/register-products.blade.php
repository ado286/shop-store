@extends('layouts.myApp')
@section('title', 'Create')
@section('content')
<div class="container mx-auto mt-10 sm:mt-0">
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="mt-5 md:mt-0 md:col-span-4">
            <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        @if(Session::has('product_message'))
                            <h3 class="bg-green-200">{{session('product_message')}}</h3>
                            @endif
                            <div class="text-red-dark pl-4 pr-8 py-3 rounded relative" role="alert">
                                @if(count($errors)>0)
                                    <div class="bg-red-lightest border border-red-light ">
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li class="bg-red-200">{{$error}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <span class="absolute pin-t pin-b pin-r pr-2 py-3"></span>
                            </div>
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Create product for shop</h3>
                        <hr>
                        <br>
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-3">

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="name" class="block text-sm font-medium text-gray-700">Product name:</label>
                                    <input type="text" name="name" id="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                                <br>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="price" class="block text-sm font-medium text-gray-700">Price for product($):</label>
                                    <input type="text" name="price" id="price" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                                <br>
                                <div class="col-span-6">
                                    <label for="description" class="block text-sm font-medium text-gray-700">Description:</label>
                                    <textarea name="description" id="description" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                                </div>
                            </div>
                            <div class="col-span-3">
                                <div class="col-span-6">
                                    <label for="photo_id" class="block text-sm font-medium text-gray-700">Choose a photo</label>
                                    <input type="file" name="photo" id="photo_id" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Save
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
