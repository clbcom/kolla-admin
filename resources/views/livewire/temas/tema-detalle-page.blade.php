<div class="container bg-white m-auto min-h-dvh flex flex-row shadow-lg">
    {{-- Seccion del recurso --}}
    <div class="w-2/3">
        <div class="w-full h-2/3 p-5">
            @switch($tema->recurso->tipo)
                @case('video')
                    @livewire('temas.video-componente', ['url' => $tema->recurso->url])
                @break

                @case('pdf')
                    @livewire('temas.pdf-componente', ['url' => $tema->recurso->url])
                @break

                @case('img')
                    @livewire('temas.img-componente', ['url' => $tema->recurso->url])
                @break

                @default
            @endswitch
        </div>

        <div class="p-5 text-4xl text-amber-500">
            @if ($tema->recurso->tipo === 'video')
                <a target="_blank" href="{{ $tema->recurso->url }}">
                    {{ $tema->nro_orden }}. {{ $tema->titulo }}
                </a>
            @else
                <a target="_blank" href="{{ Storage::url($tema->recurso->url) }}">
                    {{ $tema->nro_orden }}.
                    {{ $tema->titulo }}
                </a>
            @endif
        </div>
    </div>

    {{-- Seccion de informacion --}}
    <div class="w-1/3 p-5 space-y-5">
        {{-- Descripcion --}}
        <div>
            <span class="font-bold">Descripcion:</span>
            <div class="border-l-4 border-l-purple-600 px-5">
                @if ($tema->descripcion)
                    <p>{{ $tema->descripcion }}</p>
                @else
                    <p class="opacity-35">Sin descripcion.</p>
                @endif
            </div>
        </div>

        {{-- Cuestionarios --}}
        <div>
            <span class="font-bold">Cuestionario:</span>
            <div class="border-l-4 border-l-sky-500 pl-5">
                @if ($tema->cuestionario)
                    <a class="hover:text-sky-500"
                        href="/cuestionarios/{{ $tema->cuestionario->id }}">{{ $tema->cuestionario->titulo }}</a>
                @else
                    <h3>Este tema no tiene cuestionarios</h3>
                @endif
            </div>
        </div>

        {{-- Acciones --}}
        <div class="flex flex-row justify-center items-center text-purple-50 space-x-1">
            <div
                class="{{ $anterior && $anterior->recurso ? 'border-purple-400 text-purple-400 hover:bg-purple-400 hover:text-purple-50' : 'border-purple-200 text-purple-200' }} border-2 p-3 rounded-l-full  transition-colors">
                @if ($anterior && $anterior->recurso)
                    <a href="/materias/{{ $anterior->id_materia }}/temas/{{ $anterior->id }}">
                        Anterior
                    </a>
                @else
                    <span>Anterior</span>
                @endif
            </div>

            <div
                class="border-purple-400 text-purple-400 hover:bg-purple-400 hover:text-purple-50 border-2 p-3 w-full text-center transition-colors">
                <a href="/materias/{{ $tema->id_materia }}">Materias</a>
            </div>

            <div
                class="{{ $siguiente && $siguiente->recurso ? 'border-purple-400 text-purple-400 hover:bg-purple-400 hover:text-purple-50' : 'border-purple-200 text-purple-200' }} border-2 p-3 rounded-r-full transition-colors">
                @if ($siguiente && $siguiente->recurso)
                    <a href="/materias/{{ $siguiente->id_materia }}/temas/{{ $siguiente->id }}">Siguiente</a>
                @else
                    <span>Siguiente</span>
                @endif
            </div>
        </div>
    </div>
</div>
