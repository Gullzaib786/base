<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Wellcome <b>{{ Auth::user()->name }}</b><b style="float: right;">Total Users <span class="badge bg-danger">{{ count($users) }}</span></b>
        </h2>
    </x-slot>

    <div class="py-12">

     <div class="container">
         <div class="row">
             @php($i = 1);
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Sr#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Created At</th>
                  </tr>
                </thead>
                <tbody>


                    @foreach ($users as $user)
                  <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ Carbon\Carbon::parse($user->created_at)->diffforHumans() }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>

         </div>
     </div>
    </div>
</x-app-layout>
