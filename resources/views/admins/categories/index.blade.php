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

        .pagination__link{
            margin-bottom: 40px;
        }
        .pagination{
            justify-content: center;
        }
        
        .table{
            margin-bottom: 0px;
        }

    </style>
@endsection

@section('content')

    <div class="category__title">
        <h2>Danh sách quản lí Categories</h2>
    </div>
    <div class="add__button">
        <a href="{{ route('admin.categories.create') }}" class="btn btn-dark" role="button" aria-pressed="true">Thêm
            category</a>
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
                <th scope="col">Name</th>
                <th scope="col">Icon</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    {{--  --}}
                    {{-- <th scope="row">{{ ($categories->count()) * (($categories->currentPage())-1) + ($loop->index + 1) }}</th> --}}
                    <th scope="row">{{ $categories->firstItem() + $loop->index }}</th>

                    <td>{{ $category->name }}</td>
                    <td><img src="{{ Storage::url($category->icon) }}" class="img-fluid" alt="không tồn tại"></td>
                    <td>
                        <div class="row">
                            <form method="POST" action="{{ route('admin.categories.destroy', ['category' => $category]) }}">

                                <a href="{{ route('admin.categories.show', $category->id) }}" title="show">
                                    <i class="fas fa-eye fa-lg" style="color: #A9A9A9"></i>
                                </a>

                                <a href="{{ route('admin.categories.edit', $category->id) }}">
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
                <p>Không có Category nào</p>
            @endforelse
        </tbody>
    </table>
    <div class="pagination__link">
        {{ $categories->links('pagination::bootstrap-4') }}
    </div>

@endsection
