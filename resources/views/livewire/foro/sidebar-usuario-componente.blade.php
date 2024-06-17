<div class="w-1/3 p-5 space-y-5 text-lg">
    {{-- Botones --}}
    <div class="">
        <a class="w-full text-center inline-block border-2 border-purple-400 text-purple-400 hover:bg-purple-400 hover:text-purple-50 transition-colors rounded-full text-lg px-5 py-3"
            href="/foro">
            Volver
        </a>
    </div>
    <div class="w-1/3 m-auto">
        <img src="{{ asset('img/user.png') }}" alt="">
    </div>
    <div class="text-center flex flex-col">
        <span class="">{{ ucwords($user->tipo_usuario) }}</span>
        <span class="font-bold">{{ $user->nombres }} {{ $user->ap_paterno }} {{ $user->ap_materno }}</span>
        <span class="opacity-50">{{ $user->email }}</span>
    </div>
    <div>
        <span class="font-bold">Mas informacion:</span>
        <div class="border-l-4 border-l-lime-500 pl-5">
            <span class="block">{{ count($user->publicaciones) }} post(s)</span>
            @if ($user->tipo_usuario === 'docente')
                <span class="block">{{ count($user->materias) }} materia(s)</span>
            @endif
        </div>
    </div>

</div>
