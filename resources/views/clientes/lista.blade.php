<x-app-layout>
  <x-slot name="header">
      <h2 class="h4 font-weight-bold">
          {{ __('Gestion de clientes') }}
      </h2>
  </x-slot>
  <div class="py-2">
    <livewire:clientes.cliente-lista>
  </div>
  @push('modals')    
    <livewire:clientes.cliente-modal>
  @endpush
</x-app-layout>