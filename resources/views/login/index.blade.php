@extends('login.layouts.main')
@section('container')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="/img/undraw_remotely_2j6y.svg" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <h3>Login</h3>
                                @if (session()->has('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif

                                @if (session()->has('loginError'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session('loginError') }}
                                    </div>
                                @endif
                            </div>
                            <form action="/login" method="post">
                                @csrf
                                <div class="form-group first">
                                    <label for="username">Username</label> @error('username')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <input type="text"
                                        class="form-control @error('username')
                                        is-invalid
                                    @enderror"
                                        id="username" name="username" required>
                                </div>

                                <div class="form-group last mb-4">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required>

                                </div>

                                <button type="submit" class="btn btn-block btn-primary">Login</button>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
