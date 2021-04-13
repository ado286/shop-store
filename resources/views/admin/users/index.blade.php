@extends('layouts.myApp')

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
                    <th class="text-left p-3 px-5">Role</th>
                    <th></th>
                </tr>
                @if($users)
                    @foreach($users as $user)
                        <form action="">
                        <tr class="border-b hover:bg-orange-100 bg-gray-100">
                            <td class="p-3 px-5"><input type="text" name="name" value="{{$user->name}}" class="bg-transparent"></td>
                            <td class="p-3 px-5"><input type="text" name="email" value="{{$user->email}}" class="bg-transparent"></td>
                            <td class="p-3 px-5">
                                <select value="user.re" class="bg-transparent">
                                    <option value="user">{{$user->role->name ?? "no roles"}}</option>
                                    <hr>
                                    <option value="1">{{$roles['1']}}</option>
                                    <option value="2">{{$roles['2']}}</option>
                                </select>
                            </td>
                            <td class="p-3 px-5 flex justify-end">
                                <button type="button" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                    Save</button></td>
                        </form>
                            <td>
                                <button type="button" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                    Delete</button>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>



    @stop
