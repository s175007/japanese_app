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
            <h1 class="form__title">Tên Ngữ pháp:{{ $grammar->title }}</h1>
            <h1 class="form__title">Nội dung Ngữ pháp:{{ $grammar->mean }}</h1>
            <h1 class="form__title">Sử dụng Ngữ pháp:{{ $grammar->using }}</h1>
            <h2 class="form__title">Thuộc Lesson:{{ $grammar->lesson->name }}</h2>
            <h2 class="form__title">Thuộc Sách:{{ $grammar->lesson->book->name }}</h2>
            <h2 class="form__title">Thuộc Category:{{ $grammar->lesson->book->category->name }}</h2>
        </div>
    </div>
@endsection
