@extends('layouts/mainlayout')

@section('content')
<x-guest-layout>
    <x-jet-authentication-card>
        <link href="{{ asset('css/extra.css') }}" rel="stylesheet" type="text/css" >
        <x-slot name="logo">
            
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="block">
                <x-jet-label for="email" value="Correo" />
                <x-jet-input id="email" class="inputs block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="Contraseña" />
                <x-jet-input id="password" class="inputs block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="Confirmar Contraseña" />
                <x-jet-input id="password_confirmation" class="inputs block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button class="buttonlogin">
                    Reiniciar Contraseña
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>

@endsection