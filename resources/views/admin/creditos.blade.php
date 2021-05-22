

<x-app-layout>
    <x-slot name="header">
        <h5 class="h5 font-weight-bold title-page">
            {{ __('Credito') }}            
        </h5>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <div class=" overflow-hidden shadow-xl sm:rounded-lg">
                @livewire('creditos')
            </div>
        </div>
    </div>
</x-app-layout>
