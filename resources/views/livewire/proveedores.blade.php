<div>
    <div class="container">
        <table class="table">
            <thead>
                <tr class="bg-primary text-white">
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Tipo Documento</th>
                    <th>Nro Documento</th>
                    <th>Celular1</th>
                    <th>Celular2</th>
                    <th>Direccion</th>
                    <th>Correo</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @if ($proveedores->count())
                    @foreach ($proveedores as $proveedor)
                        <tr> 
                            <td>{{ $proveedor->id }}</td>
                            <td>{{ $proveedor->nombres }}</td>
                            <td>{{ $proveedor->apellidos }}</td>
                            <td>{{ $proveedor->tipo_documento }}</td>
                            <td>{{ $proveedor->nro_documento }}</td>
                            <td>{{ $proveedor->celular1 }}</td>
                            <td>{{ $proveedor->celular2 }}</td>
                            <td>{{ $proveedor->direccion }}</td>
                            <td>{{ $proveedor->correo }}</td>
                            <th>
                                <x-jet-button>
                                    Update
                                </x-jet-button>
                                <!-- Boton eliminar -->
                                <x-jet-button class="btn btn-success">
                                    Delete
                                </x-jet-button>
                            </th>
                        </tr>
                    @endforeach
                @else 
                    <tr>
                        <td class="px-6 py-4 text-sm whitespace-no-wrap" colspan="4">No Results Found</td>
                    </tr>
                @endif 
            </tbody>
        </table>
    </div>   
</div>