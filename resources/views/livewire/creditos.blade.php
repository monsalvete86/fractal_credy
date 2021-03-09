    <h5 class="col-12 text-center uppercase">Créditos </h5>        
        </div>
        <div class="body">
            <table class="table ">
                <thead>
                    <tr class="bg-primary text-white">
                       <th>#</th>
                       <th>Cliente</th>
                       <th>Deudor</th>
                       <th>Valor Credito</th>
                       <th>Tasa Interés</th>
                       <th>Nro. Cuotas</th>
                       <th>Cuotas pagadas</th>
                       <th>Saldo restante</th>
                       <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>

                @foreach($creditos as $credito)
                    <tr>
                        <td>{{ $credito->id}}</td>
                        <td>{{ $credito->id_cliente}}</td>
                        <td>{{ $credito->id_deudor}}</td>
                        <td>$ {{ $credito->valor_credito}}</td>
                        <td>{{ $credito->tasa_interes}}</td>
                        <td>{{ $credito->nro_cuotas}}</td>
                        <td>{{ $credito->nro_cuotas_pagas}}</td>
                        <td>$5000</td>
                        <th>
                            <!-- Boton eliminar -->
                            <button class="btn btn-success" wire:click="borrarCredito();">
                            <i class="fas fa-trash-alt"></i>
                            </button>
                        </th>
                    </tr>
                @endforeach
                    
                </tbody>
            </table>
        </div>

    </div>
