@extends('layouts.app')

@section('bodyLoginPageContent')
    <div class="login-box">
        <div class="card card-outline card-primary">

            <div class="card-body login-card-body">
                <p class="login-box-msg">تسجيل الدخول</p>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    @error('email')
                        <div class="alert alert-danger">
                            {{ trans('auth.failed') }}
                        </div>
                    @enderror
                    <div class="input-group mb-1">
                        <div class="form-floating">
                            <input id="loginEmail" type="email" name="email" class="form-control text-start"
                                value="{{ old('email') }}" placeholder="" />
                            <label for="loginEmail">البريد الالكتروني</label>

                        </div>
                        <div class="input-group-text"><span class="bi bi-envelope"></span></div>


                    </div>
                    <div class="input-group mb-1">
                        <div class="form-floating">
                            <input id="loginPassword" type="password" name="password" class="form-control" placeholder="" />
                            <label for="loginPassword">كلمة السر</label>
                        </div>
                        <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
                    </div>
                    <!--begin::Row-->
                    <div class="row">

                        <!-- /.col -->
                        <div class="col-12">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">تسجيل الدخول</button>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!--end::Row-->
                </form>


            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
@endsection
