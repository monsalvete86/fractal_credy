<x-app-layout>
  <x-slot name="header">
      <h2 class="h4 font-weight-bold">
          {{ __('Usuarios de Sistema') }}
      </h2>
  </x-slot>
  <div class="py-2">
    <div class="bg-white">
      
      <livewire:user.user-list>
    </div>
  </div>
  @push('modals')    
    <livewire:user.user-modal>
  @endpush
</x-app-layout>