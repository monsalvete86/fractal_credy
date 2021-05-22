<x-app-layout>
  <x-slot name="header">
      <h2 class="h4 font-weight-bold">
          {{ __('Gestion de creditos') }}
      </h2>
  </x-slot>
  <div class="py-2">
    <div class="bg-white">
      
      <livewire:creditos.credit-list>
    </div>
  </div>

</x-app-layout>