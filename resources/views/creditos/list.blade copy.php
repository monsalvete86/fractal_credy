<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Gestion de Creditos') }}
        </h2>
    </x-slot>
    <div class="py-2">
        <livewire:creditos.creditos-list>
    </div>
    @push('modals')
        <livewire:creditos.creditos-modal>
        @endpush
</x-app-layout>
