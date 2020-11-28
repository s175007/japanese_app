@extends('layouts.app')

@section('js')
<script src="{{ asset('js/book.js') }}"></script>
@endsection

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
        .form__create {
            margin: 50px;
        }

    </style>
@endsection

@section('content')
    <div class="form">
        <div class="form__create">
            <form action="{{ route('admin.lessons.index') }}" method="GET" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="category_id">Choose Categories</label>
                    <select id="category_id" name="category_id" class="form-control">
                        <option value="">Chọn category</option>
                        @forelse ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @empty
                            <option value="">Không tìm thấy</option>
                        @endforelse
                    </select>
                </div>

                <div class="form-group">
                    @error('book_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <label for="book_id">Choose Books</label>
                    <select id="book_id" name="book_id" class="form-control">
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Lesson Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="" value="{{ old('name') }}">
                </div>

                <div class="form__button">
                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                </div>
            </form>
        </div>
    </div>
    <div class="category__title">
        <h2>Danh sách quản lí lessons</h2>
    </div>
    <div class="add__button">
        <a href="{{ route('admin.lessons.create') }}" class="btn btn-dark" role="button" aria-pressed="true">Thêm
            lesson</a>
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
                <th scope="col">Category</th>
                <th scope="col">Books Name</th>
                <th scope="col">Lesson</th>
                <th scope="col">Image</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($lessons as $lesson)
                <tr>
                    <th scope="row">{{ $lessons->firstItem() + $loop->index }}</th>
                    <td>{{ $lesson->book->category->name }}</td>
                    <td>{{ $lesson->book->name }}</td>
                    <td>{{ $lesson->name }}</td>
                    <td><img src="{{ Storage::url($lesson->img) }}" class="img-fluid" alt="không tồn tại"></td>
                    <td>{{ \Illuminate\Support\Str::limit($lesson->description, 20, $end = '...') }}</td>
                    <td>
                        <div class="row">
                            <form method="POST" action="{{ route('admin.lessons.destroy', ['lesson' => $lesson]) }}">

                                <a href="{{ route('admin.lessons.show', $lesson->id) }}" title="show">
                                    <i class="fas fa-eye fa-lg" style="color: #A9A9A9"></i>
                                </a>

                                <a href="{{ route('admin.lessons.edit', $lesson->id) }}">
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
                <p>Không có lesson nào</p>
            @endforelse
        </tbody>
    </table>

    <div class="pagination__link">
        {{ $lessons->links('pagination::bootstrap-4') }}
    </div>
@endsection
