@extends('layouts.base')

@section('title', $title ?? '')

@section('body-class', 'bg-gray-100')

@section('content')
    {{ $slot }}
@endsection