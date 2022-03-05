@extends('admin.admin_master')
@section('admin')
    <div class="py-12">

        <div class="container">
            <div class="row">
                <a href="{{ route('create.about') }}" class="btn btn-info ml-3"> Add About</a>

                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header">

                            All Abouts Details
                        </div>
                        @if(session('success'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>

                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                          @endif
                          @php($i = 1)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Sr#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Short Description</th>
                                    <th scope="col">Long Description</th>
                                    <th scope="col">Created At</th>
                                </tr>
                            </thead>
                            <tbody>
@foreach ($abouts as $about)


                                <tr>
                                    <td>{{ $i++}}</td>
                                    <td>{{ $about->name }}</td>
                                    <td>{{ $about->short_des }}</td>
                                    <td>{{ $about->long_des }}</td>
                                    <td>{{ $about->created_at->diffforHumans() }}</td>
                                    <td>
                                        <a href="{{ url('edit/about/'.$about->id) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ url('delete/about/'.$about->id) }}" onclick="return confirm('Are You Sure to Delete it..!')" class="btn btn-danger">Delete</a>
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
