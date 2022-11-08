@extends('layouts.app')

@section('css')
    
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
{{-- <link rel="stylesheet" href="https://preview.colorlib.com/theme/bootstrap/login-form-18/css/A.style.css.pagespeed.cf.EsokhafFue.css"> --}}
<style>
    .login-wrap {
        position:relative;
        background:#fff;
        -webkit-box-shadow:0 10px 34px -15px rgba(0,0,0,.24);
        -moz-box-shadow:0 10px 34px -15px rgba(0,0,0,.24);
        box-shadow:0 10px 34px -15px rgba(0,0,0,.24)
    }
    .login-wrap h3{
        font-weight:700;
        font-size:20px;
        color:#D19C97
    }
    .login-wrap .icon{
        width:80px;
        height:80px;
        background:#D19C97;
        border-radius:50%;
        font-size:30px;
        margin:0 auto;
        margin-bottom:10px
    }
    .login-wrap .icon span{color:#fff}.form-control{
        height:48px;
        background:rgba(0,0,0,.05);
        color:#000;
        font-size:16px;
        -webkit-box-shadow:none;
        box-shadow:none;
        border:1px solid transparent;
        padding-left:20px;
        padding-right:20px;
        -webkit-transition:all .2s ease-in-out;
        -o-transition:all .2s ease-in-out;
        transition:all .2s ease-in-out
    }
    .form-group{
        position:relative
    }
    .form-group .submit{
        position:absolute;
        top:20px;
        left:0;
        right:0;
        margin:0 auto
    }
    @media (max-width:767.98px){
        .form-group .submit{
            top:0
        }
    }
</style>
@endsection

@section('content')
    
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5 mb-4">
            <div class="login-wrap p-4 p-md-5">
                <div class="icon d-flex align-items-center justify-content-center">
                    <span class="fa fa-user-o"></span>
                </div>
                <h3 class="text-center mb-4">Sudah memiliki akun?</h3>
                <form method="POST" action="{{ route('login') }}" class="login-form">
                    @csrf
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email" required="">
                    </div>
                    <div class="form-group d-flex">
                        <input type="password" name="password" class="form-control" placeholder="Password" required="">
                    </div>
                    <div class="form-group d-md-flex">
                        <div class="w-50">
                            <label class="checkbox-wrap checkbox-primary">Ingatkan Saya
                                <input type="checkbox" checked="">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="w-50 text-md-right">
                            <a href="#">Lupa Password</a>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary text-white submit p-3 px-5">Masuk</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
