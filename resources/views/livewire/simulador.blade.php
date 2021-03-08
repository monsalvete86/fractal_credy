
<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Simulador') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <div class=" overflow-hidden shadow-xl">
               
               {{-- Because she competes with no one, no one can compete with her. --}}
               <h5 class="col-12 text-center uppercase">Crédito</h5>

               <div class="card">
                    <div class="card-header row">
                        
                    
                        <ul class="list-group list-group-flush col-md-6">
                            <li class="list-group-item">
                                Fecha: 
                                2016-02-02
                            </li>
                            <li class="list-group-item">
                                Deudor: 
                                Daniel Lopex
                            </li>
                            <li class="list-group-item">
                                N° Cedula: 
                                2323233
                            </li>
                            <li class="list-group-item">
                                Direccion: 
                                cra 12 #23-12
                            </li>
                            <li class="list-group-item">
                                N° Telefono/Celular: 
                                32012345678
                            </li>

                        </ul>
                        
                        <ul class="list-group list-group-flush col-md-6">
                            <li class="list-group-item">
                                Valor del consumo (o del prestamo): 
                                 $ 630000
                                 
                            </li>
                            <li class="list-group-item">
                                Cuotas mensuales de plazo concedidas:
                                $ 630000
                            </li>
                            <li class="list-group-item">
                                Tasa de interés mensual:
                                3%
                            </li>
                            <li class="list-group-item">
                                Valor cuota mensual:
                                $ 630000
                            </li>
                           

                        </ul>


                    
                   </div>
                   <div class="body">
                        <table class="table ">
                            <thead>
                                <tr class="bg-primary text-white">
                                    <th scope="col">N° Cuota</th>
                                    <th scope="col">Valor de cuota mensual</th>
                                    <th scope="col"><small>Parte de la cuota que se convierte en</small> Abono a capital</th>
                                    <th scope="col"><small>Parte de la cuota que se convierte en</small> Abono a interés</th>
                                    <th>Saldo del credito (capital) después del pago</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                            </tbody>
                        </table>
                   </div>

               </div>
            </div>
        </div>
    </div>
</x-app-layout>
