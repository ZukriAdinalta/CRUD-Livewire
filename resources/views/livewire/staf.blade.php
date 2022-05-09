<div class="mt-4">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <h5 class="card-header">Staf</h5>
                <div class="card-body">
                    <form wire:submit.prevent="SimpanData">
                        <div class="mb-3">
                          <label for="email" class="form-label">Email address</label>
                          <input type="text" wire:model="email" class="form-control @error('email') is-invalid  @enderror " id="email" name="email" >
                          @error('email') 
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                          @enderror
                        </div>
                        <div class="mb-3">
                          <label for="nama" class="form-label">Nama</label>
                          <input type="text" wire:model="nama" class="form-control @error('nama') is-invalid  @enderror" id="nama" name="nama">
                          @error('nama') 
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                          @enderror
                        </div>
                        <div class="mb-3">
                          <label for="nohp" class="form-label">Nomor Hp</label>
                          <input type="number" wire:model="nohp" class="form-control @error('nohp') is-invalid  @enderror" id="nohp" name="nohp">
                          @error('nohp') 
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                          @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                      {{ $sukses }}
                </div>
              </div>
        </div>
    </div>
    
</div>
