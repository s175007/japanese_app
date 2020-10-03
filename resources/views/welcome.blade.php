@extends('layouts.app')

@section('content')
@if(session()->has('message'))
@if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif
@endif
    @error('logout')
    <p class="text-danger">{{ $message }}</p>
    @enderror
    <p class="p-3 mb-2 text-light bg-dark">Đây là phần content tuỳ chỉnh</p>
@endsection
