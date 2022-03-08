<x-contenido>
    <x-slot name="cabecera">
        Zapatos
    </x-slot>

    <x-success-message/>

    <table>
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-2 text-xs text-gray-500">
                    Codigo IBAN
                </th>
                <th class="px-6 py-2 text-xs text-gray-500">
                    Denominacion
                </th>
                <th class="px-6 py-2 text-xs text-gray-500">
                    Precio
                </th>
                <th class="px-6 py-2 text-xs text-gray-500">
                    Accion
                </th>
            </tr>
        </thead>
        <tbody class="bg-white">
            @foreach ($zapatos as $zapato)
                <tr class="whitespace-nowrap">

                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900">
                                {{ $zapato->codigo }}
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900">
                            {{ $zapato->denominacion }}
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900">
                            {{ $zapato->precio . ' EUR' }}
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900">
                            <form action="{{ route('anadir-carrito', $zapato) }}" method="post">
                                @csrf
                                @method('POST')
                                <button class="inline-flex bg-purple-600 text-white rounded-full h-6 px-3 justify-center items-center text-" type="submit">Anadir al carrito</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</x-contenido>
