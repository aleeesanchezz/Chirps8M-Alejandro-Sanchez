<x-layout>
    <x-slot:title>
        Registro
    </x-slot:title>

    <div class="min-h-[calc(100vh-16rem)] flex items-center justify-center">
        <div class="w-96 bg-white rounded-lg shadow-lg">
            <div class="p-8">
                <h1 class="text-3xl font-bold text-center mb-6">Crear Cuenta</h1>

                <form method="POST" action="/register">
                    @csrf

                    <!-- Nombre -->
                    <div class="mb-4">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" value="{{ old('name') }}" required>
                        @error('name')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" required>
                        @error('email')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Contraseña -->
                    <div class="mb-4">
                        <label for="password">Contraseña</label>
                        <input type="password" name="password" required>
                        @error('password')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirmar Contraseña -->
                    <div class="mb-6">
                        <label for="password_confirmation">Confirmar Contraseña</label>
                        <input type="password" name="password_confirmation" required>
                    </div>

                    <button type="submit">Registrarse</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
