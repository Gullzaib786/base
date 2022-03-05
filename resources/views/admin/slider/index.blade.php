@extends('admin.admin_master')
@section('admin')
    <div class="py-12">

        <div class="container">
            <div class="row">
                <a href="{{ route('create.slider') }}" class="btn btn-info ml-3"> Add Slider</a>

                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header">

                            All Brands Details
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
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Created At</th>
                                </tr>
                            </thead>
                            <tbody>
@foreach ($sliders as $slider)


                                <tr>
                                    <td>{{ $i++}}</td>
                                    <td>{{ $slider->title }}</td>
                                    <td>{{ $slider->description }}</td>
                                    <td><img src="{{ asset($slider->image) }}" style="width: 70px;height:40px" ></td>
                                    <td>{{ $slider->created_at->diffforHumans() }}</td>
                                    <td>
                                        <a href="{{ url('edit/slider/'.$slider->id) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ url('delete/slider/'.$slider->id) }}" onclick="return confirm('Are You Sure to Delete it..!')" class="btn btn-danger">Delete</a>
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
