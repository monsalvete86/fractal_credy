<x-app-layout>
  <x-slot name="header">
      <h2 class="h4 font-weight-bold">
          {{ __('Usuarios de Sistema') }}
      </h2>
  </x-slot>
  <div class="py-2">
    <div class="bg-white">
      @livewire('user-table')
    </div>
  </div>
  @push('modals')
    <livewire:livewire-modal>
  @endpush
</x-app-layout>