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
            width: 360px;
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

    </style>
@endsection

@section('content')
    <div class="form">
        <div class="form__create">
            <form action="{{ route('admin.lessons.update', ['lesson' => $lesson]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <label for="exampleInputEmail1">Chọn Books</label>
                <select name="book_id" class="form-control">
                    @forelse ($books as $book)
                        <option value="{{ $book->id }}" {{ $book->id == $lesson->book_id ? 'selected' : '' }}>
                            {{ $book->name }}
                        </option>
                    @empty
                        <option value="">Không tìm thấy</option>
                    @endforelse
                </select>
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="" value="{{ $lesson->name }}">
                </div>


                <div class="form-group">
                    <label for="exampleInputPassword1">Image</label>
                    @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input type="file" name="img" class="form-control" id="exampleInputPassword1" placeholder="">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <textarea type="file" name="description" class="form-control" id="exampleInputPassword1" placeholder=""
                        value="{{ old('description') }}"></textarea>
                </div>

                <div class="form__button">
                    <button type="submit" class="btn btn-primary">Sửa</button>
                </div>
            </form>
        </div>
    </div>
@endsection
