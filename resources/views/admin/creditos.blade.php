

<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Credito') }}            
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <div class=" overflow-hidden shadow-xl sm:rounded-lg">
                @livewire('creditos')
            </div>
        </div>
    </div>
</x-app-layout>
