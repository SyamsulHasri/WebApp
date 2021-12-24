@extends('layout.main')

@section('contents')
    <div class="text-center col-12 mt-3">
        <h1 class="fw-bold">WebApps</h1>
    </div>
    <div class="col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-3 mb-5">
        <div class="card">
            <h5 class="card-header">Registeration</h5>
            <div class="card-body">
                <form action="{{ route('registeration')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="inputname" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="inputname" aria-describedby="Name">
                        @if($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name')}}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="inputemail" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="inputemail" aria-describedby="Email">
                        @if($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email')}}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="inputphone" class="form-label">Phone</label>
                        <input type="number" class="form-control" name="phone" id="inputphone" aria-describedby="Phone">
                        @if($errors->has('phone'))
                        <span class="text-danger">{{ $errors->first('phone')}}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="inputpassword" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="inputpassword">
                        @if($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password')}}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection