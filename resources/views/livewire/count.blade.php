<div>
    <form wire:submit="createNewUser" class="flex flex-col gap-4 w-max">

        <input type="text" wire:model="name" class="w-[400px] rounded border-gray-200 px-3 py-1" placeholder="Name">

        @error('name')
            <span class="text-red-500">{{ $message }}</span>
        @enderror

        <input type="email" wire:model="email" class="w-[400px] rounded border-gray-200 px-3 py-1" placeholder="Email">

        @error('email')
            <span class="text-red-500">{{ $message }}</span>
        @enderror

        {{-- modelo de diretiva do livewire Model que linka com a class na class public do mesmo --}}
        <input type="password" wire:model="password" class="w-[400px] rounded border-gray-200 px-3 py-1"
            placeholder="password">

        {{-- modelo de diretiva do livewire para mostrar erros --}}
        @error('password')
            <span class="text-red-500">{{ $message }}</span>
        @enderror

        <button class="px-3 py-1 text-white bg-red-500">Create</button>

    </form>

    <div class="mt-4">

        <h1 class="mb-8">Usuarios Cadastrados</h1>

        {{-- loop do laravel  --}}
        <div class="grid grid-cols-4 gap-8">
            @foreach ($users as $user)
                <article class="bg-blue-100 w-[300px] p-4">
                    <h3>{{ $user->name }}</h3>
                    <h4>{{ $user->email }}</h4>
                </article>
            @endforeach
        </div>

        {{-- 
            paginação, customizada, instalando o comandos abaixo:
            1- php artisan livewire:publish --config
            2- php artisan livewire:publish --pagination
            informações na doc do livewire.    

            para personalizar vai na pasta resources/views/vendor/livewire
            e copie o arquivo do tailwind.blade.php mude o nome e personalize o seu style.
        --}}
        {{ $users->links('vendor.livewire.customPaginator') }}
    </div>
</div>
