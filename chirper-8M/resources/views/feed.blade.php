<x-layout>
    <x-slot:title>
        Home Feed
    </x-slot:title>

    <div class="max-w-2xl mx-auto px-4">
        <div class="bg-white rounded-lg shadow-md p-6 mt-8">
            <h2 class="text-xl font-semibold mb-4 text-gray-800">Crear Nuevo Bulo</h2>
            <form method="POST" action="/bulos">
                @csrf
                <div class="mb-4">
                    <label for="texto" class="block text-sm font-medium text-gray-700 mb-2">
                        Texto del Bulo
                    </label>
                    <textarea
                        id="texto"
                        name="texto"
                        placeholder="Escribe el texto del bulo..."
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 resize-none"
                        rows="3"
                        maxlength="255"
                        required
                    >{{ old('texto') }}</textarea>
                    @error('texto')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="texto_desmentido" class="block text-sm font-medium text-gray-700 mb-2">
                        Explicación/Desmentido
                    </label>
                    <textarea
                        id="texto_desmentido"
                        name="texto_desmentido"
                        placeholder="Escribe la explicación/desmentido..."
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 resize-none"
                        rows="3"
                        maxlength="255"
                        required
                    >{{ old('texto_desmentido') }}</textarea>
                    @error('texto_desmentido')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors">
                        Publicar Bulo
                    </button>
                </div>
            </form>
        </div>

        @if (session('exito'))
            <div class="fixed top-4 right-4 z-50">
                <div class="bg-green-500 text-white px-6 py-3 rounded-md shadow-lg">
                    <span>{{ session('exito') }}</span>
                </div>
            </div>
        @endif
    </div>

    <div class="max-w-5xl mx-auto px-4 mt-12">
        <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">Últimos Bulos</h1>

        <div class="flex flex-col items-center gap-6">
            @forelse ($bulos as $bulo)
                <div class="w-full flex justify-center">
                    <x-bulo-component :bulo="$bulo" />
                </div>
            @empty
                <div class="bg-white rounded-lg shadow-md p-12 text-center max-w-xl w-full">
                    <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                        </path>
                    </svg>
                    <p class="mt-4 text-gray-600 text-lg">¡No hay bulos todavía! Sé el primero en publicar uno.</p>
                </div>
            @endforelse
        </div>
    </div>
</x-layout>