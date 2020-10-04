@extends('layouts.app')

@section('css')
    <style>
        .login {
            /* margin: 50px; */
            /* text-align: center; */
            max-width: 360px;
            position: relative;
            margin: auto;
            margin-top: 20px;
            background: #76b852;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
            color: #fff;
        }

        .login__content {
            text-align: center;
            padding: 30px 30px 30px;
        }

        .login__input {
            background: #fff;
        }

        .login__button {
            background: #ffffff;
        }

    </style>
@endsection

@section('content')
    <div class="login">
        <form action="{{ route('admin.login') }}" method="POST">
            @csrf

            <div class="login__content">
                @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <p>{!! \Session::get('success') !!}</p>
                    </div>
                @endif
                @error('logout')
                <div class="alert alert-success">
                    <p class="text-danger">{{ $message }}</p>
                </div>
                @enderror
                <div class="form-group">
                    <label for="email">Tài khoản</label>
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input name="email" type="text" class="form-control login__input" placeholder="Enter email" id="email">
                </div>
                <div class="form-group">
                    <label for="pwd">Mật khẩu</label>
                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input name="password" type="password" class="form-control login__input" placeholder="Enter password"
                        id="pwd">
                </div>
                <div class="form-group form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox"> Remember me
                    </label>
                </div>
                <button type="submit" class="btn login__button">Đăng nhập</button>

            </div>
        </form>

    </div>
@endsection
