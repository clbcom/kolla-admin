<div class="container flex flex-row min-h-screen mx-auto p-5 bg-white shadow-xl">
    {{-- Informacion de la materia --}}
    <div class="w-2/3">
        <div class="flex flex-row items-center p-5">
            <div class="text-xl w-2/3">
                <span class="opacity-50">Materia:</span>
                <h1 class="font-bold">{{ $materia->nombre }}</h1>
                <span
                    class="inline-block rounded-full mt-10 px-5 py-3 bg-amber-500 text-amber-50 hover:shadow-lg transition-shadow">
                    <a href="/materias/{{ $materia->id }}/temas/{{ $materia->temas[0]->id }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6 inline">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z" />
                        </svg>
                        Iniciar
                    </a>

                </span>
            </div>
            <div class="w-1/3">
                <img src="{{ asset('img/casquillo.png') }}" alt="">
            </div>
        </div>
        <div class="p-5">
            <span class="font-bold text-xl opacity-50">Contenido:</span>
            @livewire('temas.componente-tema', ['temas' => $materia->temas])
        </div>
    </div>
    {{-- Informacion adicional --}}
    <div class="w-1/3 p-5 space-y-5">

        {{-- Acciones --}}
        <div class="flex flex-row justify-center items-center text-lg text-purple-50 space-x-1">
            <div
                class="{{ $anterior ? 'border-purple-400 text-purple-400 hover:bg-purple-400 hover:text-purple-50' : 'border-purple-200 text-purple-200' }} border-2 p-3 rounded-l-full transition-colors">
                @if ($anterior)
                    <a class="inline-block" href="/materias/{{ $anterior->id }}">
                        Anterior
                    </a>
                @else
                    <span>Anterior</span>
                @endif
            </div>

            <div
                class="border-purple-400 text-purple-400 hover:bg-purple-400 hover:text-purple-50 border-2 p-3 w-full text-center transition-colors">
                <a href="/semestres/{{ $materia->semestre->numeral }}">Materias</a>
            </div>

            <div
                class="{{ $siguiente ? 'border-purple-400 text-purple-400 hover:bg-purple-400 hover:text-purple-50' : 'border-purple-200 text-purple-200' }} border-2 p-3 rounded-r-full transition-colors">
                @if ($siguiente)
                    <a href="/materias/{{ $siguiente->id }}">Siguiente</a>
                @else
                    <span>Siguiente</span>
                @endif
            </div>
        </div>

        {{-- Informacion del docente --}}
        <div>
            <span class="font-bold">Docente:</span>
            <div class="flex flex-row items-center ">
                <div class="w-20 h-20 flex rounded-full border overflow-hidden items-center">
                    <img class="w-full m-auto" src="{{ asset('img/user.png') }}" alt="">
                </div>
                <div class="px-5">
                    <h3 class="font-bold">
                        <span>{{ $materia->usuario->nombres }}</span>
                        <span>{{ $materia->usuario->ap_paterno }}</span>
                        <span>{{ $materia->usuario->ap_materno }}</span>
                    </h3>
                    <h3>{{ count($materia->usuario->materias) }} materia(s).</h3>
                    <h3 class="text-[rgba(0,0,0,0.5)]">{{ $materia->usuario->email }}</h3>
                </div>
            </div>
        </div>

        {{-- Informacion del desafio --}}
        <div>
            <span class="font-bold">Desafio:</span>
            <div class="p-3 border-l-lime-600 border-l-4">
                @if ($materia->desafio)
                    <a class="hover:text-amber-500"
                        href="/desafio/{{ $materia->desafio->id }}">{{ $materia->desafio->nombre }}</a>
                @else
                    <span>Esta materia no tiene desafios aun.</span>
                @endif
            </div>
        </div>

        {{-- Descripcion del tema --}}
        <div class="">
            <span class="font-bold">Descripcion:</span>
            <div class="pl-5 border-l-4 border-l-purple-400">
                {!! $materia->descripcion !!}
            </div>
        </div>
    </div>
</div>
