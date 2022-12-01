@extends('layouts/mainlayout')

@section('content')

<x-guest-layout>
    <x-jet-authentication-card>


        <link href="{{ asset('css/extra.css') }}" rel="stylesheet" type="text/css" >
        
        <x-slot name="logo">
            
        </x-slot>

        <x-jet-validation-errors />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="Correo" />
                <x-jet-input id="email" class="inputs w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="Contraseña" />
                <x-jet-input id="password" class="inputs w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span style="margin-left: 2px;">Recuérdame</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="text-sm" href="{{ route('password.request') }}">
                        ¿Olvidaste tu contraseña?
                    </a>
                @endif

                <x-jet-button class="buttonlogin">
                    Iniciar sesión
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>

@endsection