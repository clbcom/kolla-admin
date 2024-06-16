<div class="container flex flex-row min-h-screen mx-auto p-5 bg-white">
    <div class="w-2/3">
        <div class="flex flex-row p-5 items-center">
            <div class="w-2/3">
                <p class="opacity-60">Cuestionario:</p>
                <h2 class="text-4xl font-bold">{{ $cuestionario->titulo }}</h2>
            </div>
            <div class="w-1/3">
                <img src="{{ asset('img/casquillo.png') }}" alt="casquillo">
            </div>
        </div>

        {{-- Preguntas --}}
        <div>
            <h2 class="opacity-60 pl-5 text-lg">Preguntas:</h2>
            <form class="" wire:submit="calificar">
                @foreach ($cuestionario->preguntas as $pregunta)
                    <div class="p-5 text-lg border-r-2 border-b-2 border-dashed rounded-r-full">
                        <h3 class="font-bold">{{ $pregunta->texto_pregunta }}</h3>
                        @if ($esta_calificado)
                            <div
                                class="border-l-4 pl-5 {{ $calificados[$pregunta->id]['es_correcta'] ? 'border-l-lime-600' : 'border-l-red-600' }}">
                                @foreach ($pregunta->opciones as $opcion)
                                    <div>
                                        <input disabled required type="radio" name="{{ $pregunta->id }}"
                                            wire:model="respuestas.{{ $pregunta->id }}" id="{{ $opcion->id }}"
                                            value="{{ $opcion->id }}" />
                                        @if (isset($calificados[$pregunta->id][$opcion->id]))
                                            <label
                                                class="font-bold {{ $calificados[$pregunta->id][$opcion->id] === 1 ? 'text-lime-600' : 'text-red-600' }}"
                                                for="{{ $opcion->id }}">
                                                {{ $opcion->texto_opcion }}
                                            </label>
                                        @else
                                            <label for="{{ $opcion->id }}">
                                                {{ $opcion->texto_opcion }}
                                            </label>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="border-l-4 pl-5">
                                @foreach ($pregunta->opciones as $opcion)
                                    <div>
                                        <input required type="radio" name="{{ $pregunta->id }}"
                                            wire:model="respuestas.{{ $pregunta->id }}" id="{{ $opcion->id }}"
                                            value="{{ $opcion->id }}" />
                                        <label for="{{ $opcion->id }}">{{ $opcion->texto_opcion }}</label>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endforeach
                <div class="p-5">
                    @if ($esta_calificado)
                        <button wire:click.prevent="reintentar"
                            class="bg-amber-500 text-amber-50 text-lg rounded-r-full px-5 py-3 hover:shadow-lg transition-shadow">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="inline size-6">
                                <path fill-rule="evenodd"
                                    d="M4.755 10.059a7.5 7.5 0 0 1 12.548-3.364l1.903 1.903h-3.183a.75.75 0 1 0 0 1.5h4.992a.75.75 0 0 0 .75-.75V4.356a.75.75 0 0 0-1.5 0v3.18l-1.9-1.9A9 9 0 0 0 3.306 9.67a.75.75 0 1 0 1.45.388Zm15.408 3.352a.75.75 0 0 0-.919.53 7.5 7.5 0 0 1-12.548 3.364l-1.902-1.903h3.183a.75.75 0 0 0 0-1.5H2.984a.75.75 0 0 0-.75.75v4.992a.75.75 0 0 0 1.5 0v-3.18l1.9 1.9a9 9 0 0 0 15.059-4.035.75.75 0 0 0-.53-.918Z"
                                    clip-rule="evenodd" />
                            </svg>
                            Reintentar
                        </button>
                    @else
                        <button
                            class="bg-amber-500 text-amber-50 text-lg rounded-r-full px-5 py-3 hover:shadow-lg transition-shadow"
                            type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="inline size-6">
                                <path fill-rule="evenodd"
                                    d="M19.916 4.626a.75.75 0 0 1 .208 1.04l-9 13.5a.75.75 0 0 1-1.154.114l-6-6a.75.75 0 0 1 1.06-1.06l5.353 5.353 8.493-12.74a.75.75 0 0 1 1.04-.207Z"
                                    clip-rule="evenodd" />
                            </svg>

                            Calificar
                        </button>
                    @endif
                </div>
            </form>
        </div>
    </div>

    {{-- Informacion adicional --}}
    <div class="w-1/3 p-5 space-y-5">
        <div>
            <span class="font-bold">Calificacion:</span>
            <div class="text-lg opacity-60 border-l-4 border-l-amber-500 pl-5">
                @if ($esta_calificado)
                    <span
                        class="text-6xl font-bold {{ $calificacion < count($cuestionario->preguntas) / 2 ? 'text-red-600' : 'text-lime-600' }}">{{ $calificacion }}</span>
                    <span>/ {{ count($cuestionario->preguntas) }}</span>
                @else
                    <span>Responda primero el cuestionario.</span>
                @endif
            </div>
        </div>
        <div>
            <span class="font-bold">Instrucciones:</span>
            <div class="border-l-4 border-l-lime-600 px-5">
                <ul class="list-disc pl-3">
                    <li class="">
                        El cuestionario consta de
                        <span class="font-bold">{{ count($cuestionario->preguntas) }} pregunta(s)</span>.
                    </li>
                    <li>Hay preguntas de opción múltiple y de verdadero/falso.</li>
                    <li>Solo hay una respuesta correcta por pregunta.</li>
                    <li>Lee cada pregunta cuidadosamente y selecciona la opción que consideres correcta.</li>
                </ul>
            </div>
        </div>
        <div>
            <span class="font-bold">Descripcion:</span>
            <div class="border-l-4 border-l-purple-400 px-5">
                @if ($cuestionario->descripcion)
                    <p>{!! $cuestionario->descripcion !!}</p>
                @else
                    <p class="opacity-35">Sin descripcion.</p>
                @endif
            </div>
        </div>
        <div class="flex justify-center">
            <a class="inline-block border-2 border-purple-400 text-purple-400 hover:bg-purple-400 hover:text-purple-50 transition-colors rounded-full text-lg px-5 py-3"
                href="/materias/{{ $cuestionario->tema->id_materia }}/temas/{{ $cuestionario->tema->id }}">
                Volver a materia
            </a>
        </div>
    </div>
</div>
