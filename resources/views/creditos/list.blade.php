<x-app-layout>
  <x-slot name="header">
      <h2 class="h4 font-weight-bold">
          {{ __('Gestion de creditos') }}
      </h2>
  </x-slot>
  <div class="py-2">
    <div class="bg-white">
      dfadsf
      <livewire:creditos.creditos-list>
    </div>
  </div>
  @push('modals')    
    <livewire:creditos.creditos-modal>
  @endpush
</x-app-layout>