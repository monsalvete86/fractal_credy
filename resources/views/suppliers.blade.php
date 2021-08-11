{{-- @extends('layouts.app')

@section('content')

    @livewire('suppliers-controller')

@endsection --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Gestion de Clientes') }}
        </h2>
    </x-slot>
    @livewire('suppliers-controller')

</x-app-layout>
