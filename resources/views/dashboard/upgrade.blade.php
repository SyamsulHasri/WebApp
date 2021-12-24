@extends('layout.main')

@section('contents')
    <div class="mt-3 mb-3">
        <h1>Upgrade Package</h1>
    </div>

    <div class="mt-4 mb-5">
        <form action="{{ route('premium', auth()->user()->id)}}" method="POST">
            @csrf
            <button type="submit" class="btn btn-lg btn-primary">Upgrade to Premium</button>
        </form>
    </div>


@endsection