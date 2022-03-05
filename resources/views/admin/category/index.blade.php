<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Category
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="container">
            <div class="row">
                <div class="col-md-8">

                    <div class="card">
                        <div class="card-header">

                            All Category Details
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
                                    <th scope="col">Category Name</th>
                                    <th scope="col">User ID</th>
                                    <th scope="col">Created At</th>
                                </tr>
                            </thead>
                            <tbody>
@foreach ($categories as $category)


                                <tr>
                                    <td>{{ $categories->firstItem() + $loop->index }}</td>
                                    <td>{{ $category->category_name }}</td>
                                    <td>{{ $category->user->name }}</td>
                                    <td>{{ $category->created_at->diffforHumans() }}</td>
                                    <td>
                                        <a href="{{ url('edit/cat/'.$category->id) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ url('soft/delete/cat/'.$category->id) }}"  class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
@endforeach
                            </tbody>
                        </table>
                        {{ $categories->links() }}

                    </div>

                </div>
             <div class="col-md-4">
                 <div class="card">
                     <div class="card-header">
                         Add New Category
                     </div>
                           <div class="card-body">
                            <form action="{{ route('addcat') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">Add Category</label>
                                  <input type="text" name="category_name" class="form-control"  />
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
            <div class="row mt-5">
                <div class="col-md-8">

                    <div class="card">
                        <div class="card-header">

                            All Deleted Category Details
                        </div>
                          @php($i = 1)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Sr#</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">User ID</th>
                                    <th scope="col">Created At</th>
                                </tr>
                            </thead>
                            <tbody>
@foreach ($cattrash as $category)


                                <tr>
                                    <td>{{ $categories->firstItem() + $loop->index }}</td>
                                    <td>{{ $category->category_name }}</td>
                                    <td>{{ $category->user->name }}</td>
                                    <td>{{ $category->created_at->diffforHumans() }}</td>
                                    <td>
                                        <a href="{{ url('restore/category/'.$category->id) }}" class="btn btn-primary">Restore</a>
                                        <a href="{{ url('permanent/delete/category/'.$category->id) }}" title="Permanent Delete" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
@endforeach
                            </tbody>
                        </table>
                        {{ $cattrash->links() }}

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
