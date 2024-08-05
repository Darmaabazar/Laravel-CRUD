@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (session('message'))
                    <div class="alert alert-success">{{session('message')}}</div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Jobs
                            <a href="{{url('jobs/create/')}}" class="btn btn-outline-dark float-end">Create</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Company</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Requirements</th>
                                    <th>Salary</th>
                                    <th>Image</th>
                                    <th>Created_at</th>
                                    <th>Updated_at</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($jobs as $job)
                                    <tr>
                                        <td>{{$job->id}}</td>
                                        <td>{{$job->company}}</td>
                                        <td>{{$job->name}}</td>
                                        <td>{{$job->description}}</td>
                                        <td>{{$job->requirements}}</td>
                                        <td>{{$job->salary}}</td>
                                        <td>{{$job->created_at}}</td>
                                        <td>{{$job->updated_at}}</td>
                                        <td>
                                            <img src="{{asset($job->image)}}" width="100px" alt="Job image">
                                        </td>
                                        <td>{{$job->created_at}}</td>
                                        <td>{{$job->updated_at}}</td>
                                        <td>
                                            <a href="{{url('job/edit/'.$job->id)}}" class="btn btn-outline-primary">Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{"/job/delete/".$job->id}}" method="POST" onclick="return confirm('Are you sure delete this job')">
                                                @csrf
                                                @method("DELETE")
                                                <button class="btn btn-danger" type="submit">Delete</button>
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
    </div>
    
@endsection