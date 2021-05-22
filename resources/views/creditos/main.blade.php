<x-app-layout>
  <x-slot name="header">
      <h2 class="h4 font-weight-bold">
          {{ __('Creditos') }}
      </h2>
  </x-slot>
  <div class="py-2">
    <div class="bg-white">
      
      <livewire:creditos.creditos-list>
    </div>
  </div>
  @push('modals')    
    <livewire:creditos.creditos-modal>
  @endpush
</x-app-layout>