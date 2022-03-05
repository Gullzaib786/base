@extends('admin.admin_master')
@section('admin')
    <div class="py-12">

        <div class="container">
            <div class="row">
                <div class="col-md-8">

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
                                    <th scope="col">Brand Name</th>
                                    <th scope="col">Brand Image</th>
                                    <th scope="col">Created At</th>
                                </tr>
                            </thead>
                            <tbody>
@foreach ($brands as $brand)


                                <tr>
                                    <td>{{ $brands->firstItem() + $loop->index }}</td>
                                    <td>{{ $brand->brand_name }}</td>
                                    <td><img src="{{ asset($brand->brand_image) }}" style="width: 70px;height:40px" ></td>
                                    <td>{{ $brand->created_at->diffforHumans() }}</td>
                                    <td>
                                        <a href="{{ url('edit/brand/'.$brand->id) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ url('delete/brand/'.$brand->id) }}" onclick="return confirm('Are You Sure to Delete it..!')" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
@endforeach
                            </tbody>
                        </table>
                        {{ $brands->links() }}

                    </div>

                </div>
             <div class="col-md-4">
                 <div class="card">
                     <div class="card-header">
                         Add New Brand
                     </div>
                           <div class="card-body">
                            <form action="{{ route('addbrand') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">Add Brand</label>
                                  <input type="text" name="brand_name" class="form-control"  />
                                  @error('brand_name')
                                         <span class="text-danger">{{ $message }}</span>
                                  @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Add image</label>
                                    <input type="file" name="brand_image" class="form-control"  />
                                    @error('brand_image')
                                           <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                  </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                              </form>
                           </div>


                 </div>

             </div>
            </div>
        </div>
    </div>
@endsection
