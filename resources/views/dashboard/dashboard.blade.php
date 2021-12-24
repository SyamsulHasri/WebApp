@extends('layout.main')

@section('contents')

    <div class="row">
        <div class=" col-3 mt-3 mb-3">
            <h1>To DO List</h1>
        </div>

        <div class="float-end offset-3 col-3 mt-3 mb-3">
            <span style="font-size: 40px; color: orange;"><i class="fas fa-trophy"></i> {{$achievement}} </span>
            <h4>Achievement</h4>
        </div>

        <div class=" float-end col-3 mt-3 mb-3">
            <span style="font-size: 40px; color: navy;"><i class="fas fa-shield-alt"></i> {{$badge}} </span>
            <h4>Badge</h4>
        </div>
    </div>


    <div class="mt-4 mb-5">
        <div class="mb-3">
            <a type="button" href="{{ route('createtdl') }}" class="btn btn-md btn-primary"><i class="fas fa-calendar-plus"></i> Create</a>
        </div>
        <div class="table-responsive">
            <table id="activity" class="display table table-info table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Reminder</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($activity as $act)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$act->title}}</td>
                        <td>{{$act->description}}</td>
                        <td>{{$act->date->format('d-m-Y')}}</td>
                        <td>
                            @if($act->reminder === 1)
                                Yes
                            @else
                                No
                            @endif
                        </td>
                        <td>
                            <a href="{{route('edit.view', $act->id)}}" type="button" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                            <a href="{{route('delete',  $act->id)}}" type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#activity').DataTable();
    } );
    </script>

@endsection