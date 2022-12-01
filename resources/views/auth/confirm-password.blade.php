@extends('layouts/mainlayout')

@section('content')
<x-guest-layout>
    <x-jet-authentication-card>
        <link href="{{ asset('css/extra.css') }}" rel="stylesheet" type="text/css" >
        <x-slot name="logo">
            
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            Esta es un área segura de la aplicación. Por favor, confirme su contraseña antes de continuar.
        </div>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div>
                <x-jet-label for="password" value="Contraseña" />
                <x-jet-input id="password" class="inputs block mt-1 w-full" type="password" name="password" required autocomplete="current-password" autofocus />
            </div>

            <div class="flex justify-end mt-4">
                <x-jet-button class="buttonlogin">
                    Confirmar
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
@endsection