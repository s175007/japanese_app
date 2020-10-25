@extends('layouts.app')

@section('js')
    <script src="{{ asset('js/lesson.js') }}"></script>
@endsection

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
            <form action="{{ route('admin.vocabularies.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    @error('category_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
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
                    @error('vocabulary_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <label for="lesson_id">Choose Lessons</label>
                    <select id="lesson_id" name="lesson_id" class="form-control">
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Kanji</label>
                    @error('kanji')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input type="text" name="kanji" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="" value="{{ old('name') }}">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Hiragana</label>
                    @error('hiragana')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input type="text" name="hiragana" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="" value="{{ old('name') }}">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Mean</label>
                    @error('mean')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <textarea type="file" name="mean" class="form-control" id="exampleInputPassword1" placeholder=""
                        value="{{ old('mean') }}"></textarea>
                </div>

                <div class="form__button">
                    <button type="submit" class="btn btn-primary">Tạo</button>
                </div>
            </form>
        </div>
    </div>

    {{-- <script>
        let url = ""

    </script> --}}
@endsection
