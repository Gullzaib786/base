@extends('admin.admin_master')
@section('admin')

    <div class="py-12">
        @if(session('success'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card-group">
                        @foreach ($images as $image)

                        <div class="col-md-4 mx-5 my-3">
                        <div class="card">
                            <img src="{{ asset($image->image) }}" alt="">
                        </div>
                        </div>
                         @endforeach
                    </div>

                </div>
             <div class="col-md-4">
                 <div class="card">
                     <div class="card-header">
                         Add Image
                     </div>
                           <div class="card-body">
                            <form action="{{route('store.pics')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Add image</label>
                                    <input type="file" name="brand_image[]" multiple="" class="form-control"  />
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
