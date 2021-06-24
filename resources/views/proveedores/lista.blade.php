<x-app-layout>
  <x-slot name="header">
      <h2 class="h4 font-weight-bold">
          {{ __('Gestion de proveedores') }}
      </h2>
  </x-slot>
  <div class="py-2">
    <div class="bg-white">
      
      <livewire:proveedores.proveedor-lista>
    </div>
  </div>
  @push('modals')    
    <livewire:proveedores.proveedor-modal>
  @endpush
</x-app-layout>