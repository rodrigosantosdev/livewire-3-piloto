<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Count extends Component
{
    // use WithPagination;
    use WithPagination;

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
        // User::paginate() retorna uma todos os dados da tabela user, paginado, passe a quantidade no parametro.
        // User::all() retorna todos os dados da tabela user
        $users = User::paginate(4);

        return view('livewire.count', [
            'users' => $users
        ]);
    }
}
