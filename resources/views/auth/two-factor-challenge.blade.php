@extends('layouts/mainlayout')

@section('content')
<x-guest-layout>
    <x-jet-authentication-card>
        <link href="{{ asset('css/extra.css') }}" rel="stylesheet" type="text/css" >
        <x-slot name="logo">
            
        </x-slot>

        <div x-data="{ recovery: false }">
            <div class="mb-4 text-sm text-gray-600" x-show="! recovery">
                Confirma el acceso a tu cuenta con el código que aparece en tu app de autenticación (Ej. Google Authenticator)
            </div>

            <div class="mb-4 text-sm text-gray-600" x-show="recovery">
                Confirma el acceso a tu cuenta con uno de los códigos de emergencia de tu cuenta
            </div>

            <x-jet-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('two-factor.login') }}">
                @csrf

                <div class="mt-4" x-show="! recovery">
                    <x-jet-label for="code" value="Código" />
                    <x-jet-input id="code" class="inputs block mt-1 w-full" type="text" inputmode="numeric" name="code" autofocus x-ref="code" autocomplete="one-time-code" />
                </div>

                <div class="mt-4" x-show="recovery">
                    <x-jet-label for="recovery_code" value="Código de Recuperación" />
                    <x-jet-input id="recovery_code" class="inputs block mt-1 w-full" type="text" name="recovery_code" x-ref="recovery_code" autocomplete="one-time-code" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <button type="button" class="text-sm text-gray-600 hover:text-gray-900 underline cursor-pointer"
                                    x-show="! recovery"
                                    x-on:click="
                                        recovery = true;
                                        $nextTick(() => { $refs.recovery_code.focus() })
                                    ">
                        Usar código de recuperación
                    </button>

                    <button type="button" class="text-sm text-gray-600 hover:text-gray-900 underline cursor-pointer"
                                    x-show="recovery"
                                    x-on:click="
                                        recovery = false;
                                        $nextTick(() => { $refs.code.focus() })
                                    ">
                        Usar código de Autenticación
                    </button>

                    <x-jet-button class="buttonlogin">
                        Iniciar sesión
                    </x-jet-button>
                </div>
            </form>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
@endsection