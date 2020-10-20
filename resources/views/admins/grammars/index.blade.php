@extends('layouts.app')


@section('css')
    <style>
        .add__button {
            text-align: center;
            background: #f2f2f2;
        }

        .add__button a {
            margin: 20px;
        }

        .category__title {
            text-align: center;
            text-decoration: none;
            margin: 40px;
        }

        .img-fluid {
            width: 50px;
            height: 50px;
        }

        .pagination__link {
            margin-bottom: 40px;
        }

        .pagination {
            justify-content: center;
        }

        .table {
            margin-bottom: 0px;
        }

    </style>
@endsection

@section('content')
    <div class="category__title">
        <h2>Danh sách quản lí grammars</h2>
    </div>
    <div class="add__button">
        <a href="{{ route('admin.grammars.create') }}" class="btn btn-dark" role="button" aria-pressed="true">Thêm
            grammar</a>
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif


        @if (session('fail'))
            <div class="alert alert-danger" role="alert">
                {{ session('fail') }}
            </div>
        @endif
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Category Name</th>
                <th scope="col">Books Name</th>
                <th scope="col">Lesson Name</th>
                <th scope="col">Grammar Title</th>
                <th scope="col">Grammar Mean</th>
                <th scope="col">Grammar Using</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($grammars as $grammar)
                <tr>
                    <th scope="row">{{ $grammars->firstItem() + $loop->index }}</th>
                    <td>{{ $grammar->lesson->book->category->name }}</td>
                    <td>{{ $grammar->lesson->book->name }}</td>
                    <td>{{ $grammar->lesson->name }}</td>
                    <td>{{ $grammar->title }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($grammar->mean, 10, $end='...') }}</td>
                    <td>{{ $grammar->using }}</td>
                    <td>
                        <div class="row">
                            <form method="POST" action="{{ route('admin.grammars.destroy', ['grammar' => $grammar]) }}">

                                <a href="{{ route('admin.grammars.show', $grammar->id) }}" title="show">
                                    <i class="fas fa-eye fa-lg" style="color: #A9A9A9"></i>
                                </a>

                                <a href="{{ route('admin.grammars.edit', $grammar->id) }}">
                                    <i class="fas fa-edit fa-lg" style="color: #A9A9A9"></i>
                                </a>

                                @csrf
                                @method('DELETE')

                                <button type="submit" title="delete" style="border: none; background-color:transparent;">
                                    <i class="fas fa-trash fa-lg" style="color: #A9A9A9"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <p>Không có grammar nào</p>
            @endforelse
        </tbody>
    </table>

    <div class="pagination__link">
        {{ $grammars->links('pagination::bootstrap-4') }}
    </div>
@endsection
