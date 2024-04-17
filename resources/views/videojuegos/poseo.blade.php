<x-app-layout>
    <div class="relative overflow-x-auto w-3/4 mx-auto shadow-md sm:rounded-lg">
        <form class="max-w-sm mx-auto mt-4" action="{{ route('videojuegos.update-poseo') }}" method="POST">
            @csrf
            <select name="videojuego_id" id="videojuego_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach ($videojuegos as $videojuego)
                    <option value="{{ $videojuego->id }}">
                        {{ $videojuego->titulo }}
                    </option>
                @endforeach
            </select>
            <div class="mx-auto mt-4">
                <x-primary-button name="tengo" class="bg-red-500">Lo tengo</x-primary-button>
                <x-primary-button name="no_tengo" class="bg-blue-500">No lo tengo</x-primary-button>
            </div>
        </form>

        <a href="{{ route('videojuegos.index') }}" class="flex justify-center mt-4 mb-4">
            <x-primary-button class="bg-green-500">Volver</x-primary-button>
        </a>
    </div>
</x-app-layout>
