<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Category
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="container">
            <div class="row">
             <div class="col-md-4">
                 <div class="card">
                     <div class="card-header">
                        Edit Category
                     </div>
                           <div class="card-body">
                            <form action="{{ url('update/cat/'.$category->id) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">Edit Category</label>
                                  <input type="text" value="{{ $category->category_name }}" name="category_name" class="form-control"  />
                                  @error('catname')
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
</x-app-layout>
