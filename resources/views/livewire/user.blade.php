<div class="mt-4 ">
    <div class="card">
        <div class="card-header">
          <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">
                Tambah Data
            </button>
        </div>
        <div class="card-body">
            @if (session()->has('pesan'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('pesan') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if (session()->has('hapus'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('hapus') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="row mb-2 justify-content-end">
              <div class="col-sm-5">
                <input  wire:model="search" type="text" class="form-control" placeholder="Search...">
              </div>
            </div>
            <table class="table table-striped table-hover table-bordered">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">No Hp</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)    
                    <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                      <td>{{ $user->nohp }}</td>
                      <td class="d-flex justify-content-center">
                        @if ($user->foto)
                        <div style="max-height: 350px; overflow:hidden" >
                          <img src="{{ asset('storage/' . $user->foto) }}" alt="" width="100px" height="100px">
                        </div>
                        @else     
                         <img src="" alt="kosong">
                        @endif
                      </td>
                      <td class="text-center">
                          <button wire:click.prevent="edit({{ $user->id }})" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit">Edit</button>
                          <button wire:click.prevent="edit({{ $user->id }})" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteUser">Delete</button>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
              {{ $users->links() }}
        </div>
      </div>

<!-- Modal -->
@include('modaluser.index')
</div>
