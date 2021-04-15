@extends('errors::minimal')

@section('title', __('Not Found'))
@section('code')
    <h3>Sorry, that page doesn't exist.</h3>
    <a style="color:blue" href="/">Return back</a>
@stop
@section('message')
