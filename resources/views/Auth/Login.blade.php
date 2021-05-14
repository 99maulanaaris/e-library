@extends('Layouts.auth')

@section('content')
    @include('alert')
    <form class="form form-horizontal" method="POST" action="/login">
        @csrf
        <div class="form-body ">
            <div class="row ">
                <div class="col-md-8">
                    <div class="form-group has-icon-left">
                        <div class="position-relative">
                            <input type="email" name="email" class="form-control" placeholder="Email" id="first-name-icon">
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                        </div>
                    </div>
                    @error('email')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-8">
                    <div class="form-group has-icon-left">
                        <div class="position-relative">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                            <div class="form-control-icon">
                                <i class="bi bi-lock"></i>
                            </div>
                        </div>
                    </div>
                    @error('password')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-6 d-flex justify-content-end mt-3">
                    <button type="submit" class="btn btn-primary me-1 mb-1">Login</button>
                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                </div>

                <h5 class=" mt-5">Belum Punya Accounts ? <a href={{ route('form.register') }}>Klik Di sini</a>
                </h5>
            </div>
        </div>
    </form>

@endsection
