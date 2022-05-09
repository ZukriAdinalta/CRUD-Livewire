{{-- Tamabah --}}
<div wire:ignore.self class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          @csrf
          <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" wire:model="name" class="form-control @error('name') is-invalid  @enderror" id="name"
              name="name">
            @error('name')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="text" wire:model="email" class="form-control @error('email') is-invalid  @enderror " id="email"
              name="email">
            @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="nohp" class="form-label">Nomor Hp</label>
            <input type="number" wire:model="nohp" class="form-control @error('nohp') is-invalid  @enderror" id="nohp"
              name="nohp">
            @error('nohp')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="text" wire:model="password" class="form-control @error('password') is-invalid  @enderror"
              id="password" name="password">
            @error('password')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          {{-- <div class="mb-3 d-block">
            @if ($foto)
            <label for="foto" class="form-label">Review Foto</label>
            <img src="{{ $foto->temporaryUrl() }}" width="200px" height="100px">
            @endif
          </div> --}}
          <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" wire:model="foto" class="form-control @error('foto') is-invalid  @enderror" id="foto"
              name="foto">
            @error('foto')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" wire:click.prevent="SimpanData">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>



{{-- edit --}}
<div wire:ignore.self class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <input type="hidden" wire:model='iduser' name="iduser">
          @csrf
          <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" wire:model="name" class="form-control @error('name') is-invalid  @enderror" id="name"
              name="name">
            @error('name')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="text" wire:model="email" class="form-control @error('email') is-invalid  @enderror " id="email"
              name="email">
            @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="nohp" class="form-label">Nomor Hp</label>
            <input type="text" wire:model="nohp" class="form-control @error('nohp') is-invalid  @enderror" id="nohp"
              name="nohp">
            @error('nohp')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="text" wire:model="password" class="form-control @error('password') is-invalid  @enderror"
              id="password" name="password">
            @error('password')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="mb-3 d-block">
            @if($foto)
            <label class="d-block" for="foto" class="form-label">Review Foto</label>
            <img src="{{ $isUploaded ? asset('storage/' . $foto) : $foto->temporaryUrl() }}" width="200px" height="100px">
            @endif
          </div>
          <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" wire:model="foto" class="form-control @error('foto') is-invalid  @enderror" id="foto"
              name="foto">
            @error('foto')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" wire:click.prevent="UpdateData()">Edit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
{{-- edit --}}
<div wire:ignore.self class="modal fade" id="deleteUser" tabindex="-1" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content text-white bg-danger">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <p>Yakin Hapus Data User {{ $name }} ?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" wire:click.prevent="DeleteData()">Delete</button>
        </div>
    </div>
  </div>
</div>
@livewireScripts
<script type="text/javascript">
  window.livewire.on('tambah',()=>{
      $('#tambah').modal('hide');
  });
  window.livewire.on('edit',()=> {
      $('#edit').modal('hide');
  });
  window.livewire.on('deleteUser', ()=> {
      $('#deleteUser').modal('hide');
  });
</script> 