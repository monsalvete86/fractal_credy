<div class="table-responsive">
   <table class="table table-sm table-bordered">
       <thead>
           <tr>
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
             <td>{{ $credito->valor_credito}}</td>
             <td>{{ $credito->interes_mensual}}</td>
             <td>{{ $credito->cant_cuotas}}</td>
             <td>{{ $credito->cant_cuotas_pagadas}}</td>
             <td>$5000</td>
             <th>
               <x-jet-button class="btn-sm btn-success" wire:click="updateModalCredito({{ $credito->id }})">
                   {{ __('Update') }}
               </x-jet-button>
               <!-- Boton eliminar -->
               <x-jet-button class="btn-danger btn-sm" wire:click="createModalCredito">
                   <i class="fas fa-trash-alt"></i>{{ __('Delete') }}
               </x-jet-button>
             </th>
           </tr>
         @endforeach
           
       </tbody>
   </table>
   {{$creditos->links()}}  
 </div>