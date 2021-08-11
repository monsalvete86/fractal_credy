<div>
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
            {{-- acction: 1-mostrando table-2-registrando nuevos registros o actualizando --}}
            @if ($action == 1)

                <div class="widget-content-area br-4">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 text-center">
                                <h5><b>Tipos de Vehículos</b></h5>
                            </div>
                        </div>
                    </div>
                    <!-- búsqueda y botón para nuevos registros -->
                    @include('common.search')
                    <!-- mensajes -->
                    @include('common.alerts')

                    <div class="table-responsive">
                        <table
                            class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Tipo Documento</th>
                                    <th>Nro Documento</th>
                                    <th>Fecha Nacimiento</th>
                                    <th>Genero</th>
                                    <th>Celular1</th>
                                    <th>Celular2</th>
                                    <th>Direccion</th>
                                    <th>Estado civil</th>
                                    <th>Lugar Trabajo</th>
                                    <th>Cargo</th>
                                    <th>Independiente</th>
                                    <th>Foto</th>
                                    <th class="text-center">ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($info as $r)
                                    <!-- iteración para llenar la tabla-->
                                    <tr>

                                        <td>
                                            <p class="mb-0">{{ $r->id }}</p>
                                        </td>
                                        <td>{{ $r->nombres }}</td>
                                        <td>{{ $r->apellidos }}</td>
                                        <td>{{ $r->tipo_documento }}</td>
                                        <td>{{ $r->nro_documento }}</td>
                                        <td>{{ $r->fecha_nacimiento }}</td>
                                        <td>{{ $r->genero }}</td>
                                        <td>{{ $r->celular1 }}</td>
                                        <td>{{ $r->celular2 }}</td>
                                        <td>{{ $r->direccion }}</td>
                                        <td>{{ $r->estado_civil }}</td>
                                        <td>{{ $r->lugar_trabajo }}</td>
                                        <td>{{ $r->cargo }}</td>
                                        <td>{{ $r->independiente }}</td>
                                        <td>{{ $r->description }}</td>
                                        <td class="text-center">
                                            <!-- botons editar y eliminar -->
                                            @include('common.actions')
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!--paginado de tabla -->
                        {{ $info->links() }}
                    </div>

                </div>

            @elseif($action == 2)
                @include('livewire.suppliers.form')
            @endif
        </div>
        <script type="text/javascript">
            // document.addEventListener('DOMContentLoaded', function() {
            //     window.livewire.on('fileChoosen', () => {
            //         let inputField = document.getElementById('image')
            //         let file = inputField.files[0]
            //         let reader = new FileReader();
            //         reader.onloadend = () => {
            //             window.livewire.emit('fileUpload', reader.result)
            //         }
            //         reader.readAsDataURL(file);
            //     });

            // });


            function Confirm(id) {

                let me = this
                swal({
                        title: 'CONFIRMAR',
                        text: '¿DESEAS ELIMINAR EL REGISTRO?',
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Aceptar',
                        cancelButtonText: 'Cancelar',
                        closeOnConfirm: false
                    },
                    function() {
                        console.log('ID', id);
                        window.livewire.emit('deleteRow', id) //emitimos evento deleteRow
                        toastr.success('info', 'Registro eliminado con éxito') //mostramos mensaje de confirmación 
                        swal.close() //cerramos la modal
                    })

            }
        </script>
    </div>
</div>
