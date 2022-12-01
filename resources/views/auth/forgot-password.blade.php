@extends('layouts/mainlayout')

@section('content')
<x-guest-layout>
    <x-jet-authentication-card>
        <link href="{{ asset('css/extra.css') }}" rel="stylesheet" type="text/css" >
        <x-slot name="logo">
            
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            ¿Olvidaste tu contraseña? No hay problema. Simplemente háganos saber su dirección de correo electrónico y le enviaremos un enlace de restablecimiento de contraseña que le permitirá elegir una nueva.
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-jet-label for="email" value="Correo" />
                <x-jet-input id="email" class="inputs block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button class="buttonlogin">
                    Enviar enlace de restablecimiento de contraseña.
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
@endsection