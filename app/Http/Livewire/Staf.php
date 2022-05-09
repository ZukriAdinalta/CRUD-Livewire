<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Staf extends Component
{
    public $nama;
    public $email;
    public $nohp;
    
    public $sukses;
    protected $rules = [
        'nama' => 'required|min:6',
        'email' => 'required|email:dns',
        'nohp' => 'required|min:12'
    ];

    protected $attributes = [
        'nama' => 'Nama',
        'email' => 'Email',
        'nohp' => 'Nomor Hp'
    ];
    protected $messages = [
        'required' => ':attribute tidak boleh kosong',
        'min'      => ':attribute minimal :min karakter',
        'email' => ':attribute tidak valid',
    ];

    public function updated($fild)
    {
        $this->validateOnly($fild);
    }

    public function SimpanData()
    {
        
        $this->validate($this->rules, $this->messages, $this->attributes);

        $this->sukses = 'Data berhasil disimpan';
        
    }
    
    public function render()
    {
        return view('livewire.staf') 
        ->extends('layouts.app')->section('content');
    }
}