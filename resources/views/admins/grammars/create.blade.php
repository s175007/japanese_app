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
            <form action="{{ route('admin.grammars.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="exampleInputEmail1">Chọn Lesson</label>

                <select name="lesson_id" class="form-control">
                    @forelse ($lessons as $lesson)
                        <option value="{{ $lesson->id }}">{{ $lesson->name }}</option>
                    @empty
                        <option value="">Không tìm thấy</option>
                    @endforelse
                </select>

                <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby=""
                        placeholder="" value="{{ old('name') }}">
                </div>


                <div class="form-group">
                    <label for="exampleInputPassword1">Mean</label>
                    @error('mean')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input type="text" name="mean" class="form-control" id="exampleInputEmail1" aria-describedby=""
                        placeholder="" value="{{ old('name') }}">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Using</label>
                    @error('using')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <textarea type="file" name="using" class="form-control" id="exampleInputPassword1" placeholder=""
                        value="{{ old('using') }}"></textarea>
                </div>

                <div class="form__button">
                    <button type="submit" class="btn btn-primary">Tạo</button>
                </div>
            </form>
        </div>
    </div>
@endsection
