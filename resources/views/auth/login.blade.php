@extends('layout.main')

@section('contents')
    <div class="text-center col-12 mt-5">
        <h1 class="fw-bold">WebApps</h1>
    </div>
    <div class="col-sm-8 offset-sm-2 col-md-4 offset-md-4 mt-5">
        <div class="card">
            <h5 class="card-header">Login</h5>
            <div class="card-body">
                <form action="{{ route('login')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="inputemail" class="form-label">Username/Email</label>
                        <input type="email" class="form-control" id="inputemail" name="email" aria-describedby="Email">
                        @if($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name')}}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="inputpassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="inputpassword" name="password">
                        @if($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name')}}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-sm-8 offset-sm-2 col-md-4 offset-md-4 mt-3">
        <p class="">Didn't Have Account yet? <a href="{{ route('register') }}">Register Here!</a></p>
    </div>
@endsection