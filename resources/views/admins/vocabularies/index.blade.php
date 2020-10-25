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

        .vocabulary__title {
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

    <div class="vocabulary__title">
        <h2>Danh sách quản lí vocabularies</h2>
    </div>
    <div class="add__button">
        <a href="{{ route('admin.vocabularies.create') }}" class="btn btn-dark" role="button" aria-pressed="true">Thêm
            vocabulary</a>
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
                <th scope="col">Lesson Name</th>
                <th scope="col">Kanji</th>
                <th scope="col">Hiragana</th>
                <th scope="col">Mean</th>
                <th scope="col">Action</th>


            </tr>
        </thead>
        <tbody>
            @forelse ($vocabularies as $vocabulary)
                <tr>
                    {{-- --}}
                    {{-- <th scope="row">
                        {{ $vocabularies->count() * ($vocabularies->currentPage() - 1) + ($loop->index + 1) }}</th>
                    --}}
                    <th scope="row">{{ $vocabularies->firstItem() + $loop->index }}</th>

                    <td>
                        @if (isset($vocabulary->lesson))
                            {{ $vocabulary->lesson->name }}
                        @endif
                    </td>
                    <td>{{ $vocabulary->kanji }}</td>
                    <td>{{ $vocabulary->hiragana }}</td>
                    <td>{{ $vocabulary->mean }}</td>
                    <td>
                        <div class="row">
                            <form method="POST"
                                action="{{ route('admin.vocabularies.destroy', ['vocabulary' => $vocabulary]) }}">

                                <a href="{{ route('admin.vocabularies.show', $vocabulary->id) }}" title="show">
                                    <i class="fas fa-eye fa-lg" style="color: #A9A9A9"></i>
                                </a>

                                <a href="{{ route('admin.vocabularies.edit', $vocabulary->id) }}">
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
                <p>Không có vocabulary nào</p>
            @endforelse
        </tbody>
    </table>
    <div class="pagination__link">
        {{ $vocabularies->links('pagination::bootstrap-4') }}
    </div>

@endsection
