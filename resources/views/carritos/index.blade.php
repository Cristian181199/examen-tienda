<x-contenido>
    <x-slot name="cabecera">
        Carrito
    </x-slot>

    <x-success-message/>

    <table>
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-2 text-xs text-gray-500">
                    Zapato
                </th>
                <th class="px-6 py-2 text-xs text-gray-500">
                    Precio
                </th>
                <th class="px-6 py-2 text-xs text-gray-500">
                    Cantidad
                </th>
                <th class="px-6 py-2 text-xs text-gray-500">
                    Importe total
                </th>
                <th class="px-6 py-2 text-xs text-gray-500">
                    Acciones
                </th>
            </tr>
        </thead>
        <tbody class="bg-white">
            @foreach ($carritos as $carrito)
                <tr class="whitespace-nowrap">

                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900">
                                {{ $carrito->zapato->denominacion }}
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900">
                            {{ $carrito->zapato->precio . ' EUR' }}
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900">
                            {{ $carrito->cantidad }}
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900">
                            {{ $carrito->zapato->precio * $carrito->cantidad . ' EUR' }}
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900">
                            <div>
                                <form action="{{route('sumar-carrito', $carrito->zapato)}}" method="post">
                                    @csrf
                                    @method('POST')
                                    <button class="inline-flex bg-green-600 text-white rounded-full h-6 px-3 justify-center items-center text-" type="submit">+</button>
                                </form>
                            </div>

                            <div>
                                <form action="{{route('restar-carrito', $carrito->zapato)}}" method="post">
                                    @csrf
                                    @method('POST')
                                    <button class="inline-flex bg-red-600 text-white rounded-full h-6 px-3 justify-center items-center text-" type="submit"> - </button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</x-contenido>
