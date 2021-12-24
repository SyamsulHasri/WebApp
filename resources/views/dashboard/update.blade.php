@extends('layout.main')

@section('contents')
    <div class="mt-3 mb-3">
        <h1>Edit To Do Activity</h1>
    </div>

    <div class="card">
        <div class="card-header">
            Edit To Do
        </div>
        <div class="card-body">
            <form action="{{ route('update', $activity->id)}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="inputtitle" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" value="{{$activity->title}}" id="inputtitle" >
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title')}}</span>
                @endif
            </div>
            <div class="mb-3">
                <label for="inputdesc" class="form-label">Description</label>
                <textarea class="form-control" id="inputdesc" name="description" rows="3">{{$activity->description}}</textarea>
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description')}}</span>
                @endif
            </div>
            <div class="mb-3 col-md-3">
                <label for="inputdate" class="form-label">Date</label>
                <input type="date" class="form-control" name="date" value="{{$activity->date->format('Y-m-d')}}" id="inputdate" >
                @if($errors->has('date'))
                    <span class="text-danger">{{ $errors->first('date')}}</span>
                @endif
            </div>
            <div class="form-check form-switch mb-3">
                <label class="form-check-label" for="inputsetreminder">Set Reminder</label>
                <input class="form-check-input" type="checkbox" role="switch" name="reminder" value="1" id="inputsetreminder" @if($activity->reminder == 1 ) checked @endif>
                @if($errors->has('reminder'))
                    <span class="text-danger">{{ $errors->first('reminder')}}</span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection