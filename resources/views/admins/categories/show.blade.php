@extends('layouts.app')

@section('css')
    <style>
        . {
            display: block;
        }

        .form {

            padding: 8% 0 0;
            margin: auto;

        }

        .form__create {
            width: 890px;
            /* background-color: powderblue; */
            position: relative;
            margin: auto;
            padding: 40px;
            background: #f2f2f2;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
            border-radius: 10px;
        }

        .form__button {
            text-align: center;
        }

        .form__button button {
            padding: 10px 20px;
        }

        .form__title {
            text-align: center;
        }

    </style>
@endsection

@section('content')
    <div class="form">
        <div class="form__create">
            <h1 class="form__title">Tên:{{ $category->name }}</h1>
            <td><img src="{{ Storage::url($category->icon) }}" class="img-fluid" alt="không tồn tại"></td>
        </div>
    </div>
@endsection
