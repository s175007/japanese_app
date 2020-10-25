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
        <h2>Danh sách quản lí grammars examples</h2>
    </div>
    <div class="add__button">
        <a href="{{ route('admin.grm-examples.create') }}" class="btn btn-dark" role="button" aria-pressed="true">Thêm
            grammar Example</a>
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
                <th scope="col">Japanese</th>
                <th scope="col">Vietnamese</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($grm_examples as $grm_example)
                <tr>
                    <th scope="row">{{ $grm_examples->firstItem() + $loop->index }}</th>
                    <td>{{ $grm_example->grammar->lesson->book->category->name }}</td>
                    <td>{{ $grm_example->grammar->lesson->book->name }}</td>
                    <td>{{ $grm_example->grammar->lesson->name }}</td>
                    <td>{{ $grm_example->grammar->title }}</td>
                    <td>{{ $grm_example->japanese }}</td>
                    <td>{{ $grm_example->vietnamese }}</td>
                    <td>
                        <div class="row">
                            <form method="POST" action="{{ route('admin.grm-examples.destroy', ['grm_example' => $grm_example]) }}">

                                <a href="{{ route('admin.grm-examples.show', $grm_example->id) }}" title="show">
                                    <i class="fas fa-eye fa-lg" style="color: #A9A9A9"></i>
                                </a>

                                <a href="{{ route('admin.grm-examples.edit', $grm_example->id) }}">
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
        {{ $grm_examples->links('pagination::bootstrap-4') }}
    </div>
@endsection
