<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Count extends Component
{

    // validação de dados, do livewire
    #[Rule('required|min:2|max:100')]

    // variavel publica
    public $name = '';

    #[Rule('required|min:5|email|max:255|unique:users')]
    public $email = '';

    #[Rule('required|min:6')]
    public $password = '';


    public function createNewUser()
    {


        $validated = $this->validate();

        // cria um novo usuario
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password'])
        ]);

        // limpa os dados apos a criacao.
        $this->reset(['name', 'email', 'password']);
    }

    public function render()
    {
        // busca todos os usuarios
        $users = User::all();

        return view('livewire.count', [
            'users' => $users
        ]);
    }
}
