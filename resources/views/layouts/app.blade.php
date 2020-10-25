<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    {{-- Css Boostrap --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Nunito';
        }

        .dashboard__title {
            text-align: center;
        }

        .dashboard__button {
            text-align: center;
        }

    </style>

    <link rel="stylesheet" type="text/css" href="{{ asset('icons/fontawesome-free-5.15.0-web/css/all.css') }}">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    @yield('js')

    @yield('css')

</head>

<body>
    {{-- header --}}
    @include('layouts.menu')
    @auth('admins')
        <h3 class="dashboard__title">Danh sách quản lý các mục</h3>
        <div class="dashboard__button">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-light" role="button" aria-pressed="true">Dashboard</a>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-light" role="button"
                aria-pressed="true">Categories</a>
            <a href="{{ route('admin.books.index') }}" class="btn btn-light" role="button" aria-pressed="true">Books</a>
            <a href="{{ route('admin.lessons.index') }}" class="btn btn-light" role="button" aria-pressed="true">Lessons</a>
            <a href="{{ route('admin.grammars.index') }}" class="btn btn-light" role="button" aria-pressed="true">Grammars</a>
            <a href="{{ route('admin.grm-examples.index') }}" class="btn btn-light" role="button" aria-pressed="true">Grammars Ex</a>
            <a href="{{ route('admin.vocabularies.index') }}" class="btn btn-light" role="button" aria-pressed="true">Vocabulary</a>



        </div>
    @endauth
    {{-- body --}}
    @yield('content')

    {{-- footer --}}
</body>

</html>
