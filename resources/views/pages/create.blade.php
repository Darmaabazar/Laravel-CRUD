@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Jobs
                            <a href="{{url('jobs')}}" class="btn btn-outline-dark float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form  action="{{url('/job')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="company">Company</label>
                                <input type="text" name="company" class="form-control" value="{{old('company')}}" placeholder="Enter company">
                                @error('company')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Enter name">
                                @error('name')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control" placeholder="Enter description">{{old('description')}} </textarea>
                                @error('description')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="requirements">Requirements</label>
                                <textarea name="requirements" class="form-control" placeholder="Enter requirements">{{old('requirements')}}</textarea>
                                @error('requirements')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="salary">Salary</label>
                                <input type="number" name="salary" class="form-control" value="{{old('salary')}}" placeholder="Enter salary">
                                @error('salary')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="image">Image</label>
                                <input type="file" name="image" class="form-control" value="{{old('image')}}">
                                @error('image')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Upload</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection