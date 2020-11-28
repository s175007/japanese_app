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
            <form action="{{ route('admin.vcb-examples.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="exampleInputEmail1">Chọn Lesson</label>

                <select name="vocabulary_id" class="form-control">
                    @forelse ($vocabularies as $vocabulary)
                        <option value="{{ $vocabulary->id }}">
                            {{ 'Hiragana:' . $vocabulary->hiragana . ' Kanji: ' . $vocabulary->kanji }}</option>
                    @empty
                        <option value="">Không tìm thấy</option>
                    @endforelse
                </select>

                <div class="form-group">
                    <label for="exampleInputEmail1">Examples</label>
                    @error('examples')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <textarea type="text" name="examples" class="form-control" id="" placeholder=""
                        value="{{ old('examples') }}"></textarea>
                </div>

                <div class="form__button">
                    <button type="submit" class="btn btn-primary">Tạo</button>
                </div>
            </form>
        </div>
    </div>
@endsection
