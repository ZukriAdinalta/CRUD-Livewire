<div style="text-align: center">
    <button wire:click="increment" class="btn btn-primary">+</button>
    <h1>{{ $count }}</h1>
    <button wire:click="decrement" class="btn btn-danger">-</button>

    <div class="text-center d-block mt-2">
        <button wire:click="pesan" class="btn btn-primary">+</button>
        <h1>{{ $pesan }}</h1>   
        <button wire:click="hapusPesan" class="btn btn-danger">-</button>
    </div>
</div>