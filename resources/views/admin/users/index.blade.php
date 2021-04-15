@extends('layouts.myApp')
@section('title', 'Edit users')
@section('content')


    <div class="text-gray-900 bg-gray-200">
        <div class="p-4 flex">
            <h1 class="text-3xl">
                Users
            </h1>
        </div>
        <div class="px-3 py-4 flex justify-center">
            <table class="w-full text-md bg-white shadow-md rounded mb-4">
                <tbody>
                <tr class="border-b">
                    <th class="text-left p-3 px-5">Name</th>
                    <th class="text-left p-3 px-5">Email</th>
                    <th class="text-left p-3 px-5">Now role</th>
                    <th class="text-left p-3 px-5">Change role</th>
                    <th></th>
                </tr>
                @if($users)
                    @foreach($users as $user)
                        <tr class="border-b hover:bg-orange-100 bg-gray-100">
                            <form action="{{route('admin.update', ['admin'=>$user->id])}}" method="POST">
                                @csrf
                                @method('PATCH')
                                <td class="p-3 px-5"><input type="text" name="name" value="{{$user->name}}" class="bg-transparent"></td>
                                    <td class="p-3 px-5"><input type="text" name="email" value="{{$user->email}}" class="bg-transparent"></td>
                                    <td class="p-3 px-5"><input type="text" name="" value="{{$user->role ? $user->role->name : "no roles"}}" class="bg-transparent"></td>
                                    <td class="p-3 px-5">
                                        <select name="role_id" value="" class="bg-transparent">
                                            <option value="">Choose a option</option>
                                            <option name="role_id" value="1">{{$roles['1']}}</option>
                                            <option name="role_id" value="2">{{$roles['2']}}</option>
                                        </select>
                                    </td>
                                    <td class="p-3 px-5 flex justify-end">
                                        <button class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                            Save</button></td>
                            </form>
                            <td>
                                <form action="{{route('admin.destroy', ['admin'=> $user->id])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                        Delete</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>



    @stop
