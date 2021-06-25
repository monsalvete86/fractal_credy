<x-app-layout>
  <x-slot name="header">
      <h2 class="h4 font-weight-bold">
          {{ __('Gestion de proveedores') }}
      </h2>
  </x-slot>
  <div class="py-2">
      <livewire:proveedores.proveedor-lista>
  </div>
  @push('modals')    
    <livewire:proveedores.proveedor-modal>
  @endpush
</x-app-layout>