<div class="container flex flex-row min-h-screen mx-auto p-5 bg-white shadow-lg">
    {{-- Informacion de la materia --}}
    <div class="w-2/3">
        {{-- Seccion titulo --}}
        @livewire('perfiles.section-titulo-componente')

        {{-- Listado de publicaciones --}}
        <div class="space-y-5 divide-y-2">
            @if (count($publicaciones) > 0)
                @foreach ($publicaciones as $post)
                    <div class="text-lg bg-white p-5">
                        <p>{{ $post->contenido }}</p>
                        <div class="flex justify-between gap-2">
                            <div>
                                <a class="text-lime-700 font-bold" href="/mio/post/{{ $post->id }}">Editar</a>
                            </div>
                            <div>
                                @if (count($post->medios) > 0)
                                    <span class="text-sky-600 p-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="inline size-6">
                                            <path fill-rule="evenodd"
                                                d="M19.902 4.098a3.75 3.75 0 0 0-5.304 0l-4.5 4.5a3.75 3.75 0 0 0 1.035 6.037.75.75 0 0 1-.646 1.353 5.25 5.25 0 0 1-1.449-8.45l4.5-4.5a5.25 5.25 0 1 1 7.424 7.424l-1.757 1.757a.75.75 0 1 1-1.06-1.06l1.757-1.757a3.75 3.75 0 0 0 0-5.304Zm-7.389 4.267a.75.75 0 0 1 1-.353 5.25 5.25 0 0 1 1.449 8.45l-4.5 4.5a5.25 5.25 0 1 1-7.424-7.424l1.757-1.757a.75.75 0 1 1 1.06 1.06l-1.757 1.757a3.75 3.75 0 1 0 5.304 5.304l4.5-4.5a3.75 3.75 0 0 0-1.035-6.037.75.75 0 0 1-.354-1Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                @endif
                                @if (count($post->categorias) > 0)
                                    @foreach ($post->categorias as $categoria)
                                        <span
                                            class="rounded-full border border-purple-500 text-purple-500 p-1 text-sm">{{ $categoria->nombre }}</span>
                                    @endforeach
                                @else
                                    <span>Sin categorias</span>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="text-lg bg-white p-10 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6 inline-block w-20 h-20 text-amber-500">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v3.75m0-10.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.75c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.75h-.152c-3.196 0-6.1-1.25-8.25-3.286Zm0 13.036h.008v.008H12v-.008Z" />
                    </svg>
                    <p class="">
                        Sin publicaciones
                    </p>
                </div>
            @endif
        </div>
    </div>

    {{-- Informacion adicional sidebar --}}
    @livewire('perfiles.side-bar-componente')
</div>
