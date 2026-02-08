<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{config('app.name')}}</title>

        @vite('resources/css/app.css')
    </head>
    <body class="bg-[#FFEDD6]" >
        {{-- Header --}}
        <x-header></x-header>

        <!-- Aqui começa o slot-->
        {{ $slot }}
        <!-- Aqui termina o slot-->

        {{-- Footer --}}
        <x-footer></x-footer>
    </body>
</html>