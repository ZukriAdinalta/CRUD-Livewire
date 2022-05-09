<?php

namespace App\Http\Livewire;

use App\Models\User as ModelsUser;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class User extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public  $iduser, $name, $email, $nohp, $password, $foto;
    public $isUploaded = false;
    
    public $sukses;
    public $search = '';
    protected $rules = [
        'name' => 'required|min:6',
        'email' => 'required|email:dns|',
        'nohp' => 'required|min:12',
        'foto' => 'image|mimes:jpg,jpeg,png|max:1024',
        'password' => 'required',
    ];

    protected $validationAttributes = [
        'name' => 'Nama',
        'email' => 'Email',
        'nohp' => 'Nomor Hp',
        'foto' => 'Foto',
        'password' => 'Password',
    ];
    
    protected $messages = [
        'required' => ':attribute tidak boleh kosong',
        'min'      => ':attribute minimal :min karakter',
        'email' => ':attribute tidak valid',
        'unique' => ':attribute sudah ada',
        'max' => ':attribute maksimal :max kb.',
        'mimes' => ':attribute harus format .jpg .jpeg .png',
    ];

    public function updated($fild)
    {
        $this->validateOnly($fild);
    }

    public function resetForm(){
        $this->name = "";
        $this->email = "";
        $this->nohp = "";
        $this->foto = "";
        $this->password = "";
    }

    public function SimpanData()
    {
        
       $validationData =  $this->validate();
       if($this->foto){
        $validationData['foto'] = $this->foto->store('Photo');
        }

       ModelsUser::create($validationData);
       $this->resetForm();
       $this->emit('tambah');
       session()->flash('pesan', 'Data berhasil disimpan');
        
    }

    public function edit($id)
    {
        $user = ModelsUser::find($id);
        $this->iduser = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->nohp = $user->nohp;
        $this->password = $user->password;
        $this->foto = $user->foto;
        $this->isUploaded = true;
    }

    public function UpdateData()
    {
       $validationData =  $this->validate();
       ModelsUser::where('id', $this->iduser)
       ->update($validationData);
       $this->emit('edit');
       session()->flash('pesan', 'Data berhasil diedit');
        
    }
    public function DeleteData()
    {
        if($this->foto){
            Storage::disk('public')->delete($this->foto);
        }
       ModelsUser::destroy($this->iduser);
       $this->emit('deleteUser');
       session()->flash('hapus', 'Data berhasil Delete');
        
    }

    public function render()
    {
        $data = [
            'users' => ModelsUser::where('name', 'like', '%'.$this->search.'%')
            ->orWhere('email', 'like', '%'.$this->search.'%')
            ->latest()->paginate(5),
        ];
        return view('livewire.user', $data)
        ->extends('layouts.app')->section('content');
    }
}