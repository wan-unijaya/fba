@extends('layouts.app')
@section('content')

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">GoRest User</h1>
          </div>
        </div>
      </div>
    </div>
    <div class="content">
       <div class="container-fluid">
      <div class="card ">
  <div class="card-body">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-dark" href="{{ url('/create') }}"> New User </a>
            </div>
        </div>
    </div>
    
   <br>
    <table class="table table-bordered" id="table">
        <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
       
        @foreach ($finaldata as $key => $value)
        <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $value['name'] }}</td>
            <td>{{ $value['email'] }}</td>
            <td>{{ $value['gender'] }}</td>
            <td>{{ $value['status'] }}</td>
            <td>
                <form action="{{ url('/delete',$value['id']) }}" method="POST">
                  <a class="btn btn-success" href="{{ url('/show',$value['id']) }}">View</a>
                    <a class="btn btn-primary" href="{{ url('/edit',$value['id']) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit" class="text-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
  
    
</div>
</div>
</div>
</div>

@endsection