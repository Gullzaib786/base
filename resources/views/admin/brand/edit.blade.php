@extends('admin.admin_master')
@section('admin')
    @if(session('success'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                          @endif
    <div class="py-12">

        <div class="container">
            <div class="row">
             <div class="col-md-12">
                 <div class="card">
                     <div class="card-header">
                        Edit Brand
                     </div>
                           <div class="card-body">
                            <form action="{{ url('update/brand/'.$brands->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="old_image" value="{{ $brands->brand_image }}" >
                                <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">Brand Name</label>
                                  <input type="text" value="{{ $brands->brand_name }}" name="brand_name" class="form-control"  />
                                  @error('brand_name')
                                         <span class="text-danger">{{ $message }}</span>
                                  @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Brand Image</label>
                                    <input type="file"  name="brand_image" class="form-control"  />
                                    @error('brand_image')
                                           <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                  </div>
                                 <div class="form-group">
                                     <img src="{{ asset($brands->brand_image) }}" style="width:400px;height:200px">
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
