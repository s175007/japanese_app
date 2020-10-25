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
            <form action="{{ route('admin.grm-examples.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="exampleInputEmail1">Chọn Lesson</label>

                <select name="grammar_id" class="form-control">
                    @forelse ($grammars as $grammar)
                        <option value="{{ $grammar->id }}">{{ $grammar->title }}</option>
                    @empty
                        <option value="">Không tìm thấy</option>
                    @endforelse
                </select>

                <div class="form-group">
                    <label for="exampleInputEmail1">Japanese</label>
                    @error('japanese')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input type="text" name="japanese" class="form-control" id="exampleInputEmail1" aria-describedby=""
                        placeholder="" value="{{ old('japanese') }}">
                </div>


                <div class="form-group">
                    <label for="exampleInputPassword1">vietnamese</label>
                    @error('vietnamese')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input type="text" name="vietnamese" class="form-control" id="exampleInputEmail1" aria-describedby=""
                        placeholder="" value="{{ old('vietnamese') }}">
                </div>

                <div class="form__button">
                    <button type="submit" class="btn btn-primary">Tạo</button>
                </div>
            </form>
        </div>
    </div>
@endsection
