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

        .vcb-example__title {
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

    <div class="vcb-example__title">
        <h2>Danh sách quản lí Vocabulary Examples</h2>
    </div>
    <div class="add__button">
        <a href="{{ route('admin.vcb-examples.create') }}" class="btn btn-dark" role="button" aria-pressed="true">Thêm
            Vocabulary Examples</a>
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
                <th scope="col">Vocabulary Name Kanji</th>
                <th scope="col">Vocabulary Name Hiragana</th>
                <th scope="col">Examples</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($vcb_examples as $vcb_example)
                <tr>
                    {{-- --}}
                    {{-- <th scope="row">
                        {{ $vcb_examples->count() * ($vcb_examples->currentPage() - 1) + ($loop->index + 1) }}</th>
                    --}}
                    <th scope="row">{{ $vcb_examples->firstItem() + $loop->index }}</th>
                    <td>{{ $vcb_example->vocabulary->kanji }}</td>
                    <td>{{ $vcb_example->vocabulary->hiragana }}</td>
                    <td>{{ $vcb_example->examples }}</td>
                    <td>
                        <div class="row">
                            <form method="POST"
                                action="{{ route('admin.vcb-examples.destroy', ['vcb_example' => $vcb_example]) }}">

                                <a href="{{ route('admin.vcb-examples.show', $vcb_example->id) }}" title="show">
                                    <i class="fas fa-eye fa-lg" style="color: #A9A9A9"></i>
                                </a>

                                <a href="{{ route('admin.vcb-examples.edit', $vcb_example->id) }}">
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
                <p>Không có vcb_example nào</p>
            @endforelse
        </tbody>
    </table>
    <div class="pagination__link">
        {{ $vcb_examples->links('pagination::bootstrap-4') }}
    </div>

@endsection
