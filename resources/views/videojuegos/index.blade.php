<x-app-layout>
    <div class="relative overflow-x-auto w-3/4 mx-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Título
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Año
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <a href="{{ route('videojuegos.index', ['order' => 'desarrolladoras.nombre', 'order_dir' => order_dir($order == 'desarrolladoras.nombre', $order_dir)]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                            Desarrolladora {{ order_dir_arrow($order == 'desarrolladoras.nombre', $order_dir) }}
                        </a>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <a href="{{ route('videojuegos.index', ['order' => 'distribuidoras.nombre', 'order_dir' => order_dir($order == 'distribuidoras.nombre', $order_dir)]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                            Distribuidora {{ order_dir_arrow($order == 'distribuidoras.nombre', $order_dir) }}
                        </a>
                    </th>
                    <th scope="col" class="px-6 py-3" colspan="2">
                        Acción
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($videojuegos as $videojuego)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $videojuego->titulo }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $videojuego->anyo }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $videojuego->desarrolladora->nombre }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $videojuego->desarrolladora->distribuidora->nombre }}
                        </th>
                        <td class="px-6 py-4">
                            <a href="{{ route('videojuegos.edit', ['videojuego' => $videojuego]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                <x-primary-button>
                                    Editar
                                </x-primary-button>
                            </a>
                        </td>
                        <td class="px-6 py-4">
                            <form action="{{ route('videojuegos.destroy', ['videojuego' => $videojuego]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <x-primary-button class="bg-red-500">
                                    Borrar
                                </x-primary-button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <form action="{{ route('videojuegos.create') }}" class="flex justify-center mt-4 mb-4">
            <x-primary-button class="bg-green-500">Insertar un nuevo videojuego</x-primary-button>
        </form>
    </div>
</x-app-layout>
