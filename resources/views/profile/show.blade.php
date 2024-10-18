<!-- resources/views/profile/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Profile</h1>
    <p><span class="font-black">{{ __('Name:') }}</span> {{ $user->name }}</p>
    <p><span class="font-black">{{ __('Email:') }}</span> {{ $user->email }}</p>
</div>
@endsection
