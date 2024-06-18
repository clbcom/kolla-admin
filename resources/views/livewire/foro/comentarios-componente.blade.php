<div class="space-y-5 divide-y">
    @if (count($comentarios) > 0)
        @foreach ($comentarios as $comentario)
            <div class="space-y-5 pt-5">
                {{-- Perfil --}}
                <div class="flex space-x-3 items-center ">
                    <div class="w-8 overflow-hidden rounded-full">
                        <img class="object-contain" src="{{ asset('/img/user.png') }}" alt="">
                    </div>
                    <div class="">
                        <span class="block font-bold">
                            {{ $comentario->usuario->nombres }} {{ $comentario->usuario->ap_paterno }}
                            {{ $comentario->usuario->ap_materno }}
                        </span>
                        <span class="opacity-50">Hace {{ $this->calculaDiferenciaDeTiempo($comentario->fecha) }}</span>
                    </div>
                    @if ($comentario->usuario->id === $comentario->publicacion->usuario->id)
                        <div class="text-blue-300">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class=" inline size-6">
                                    <path fill-rule="evenodd"
                                        d="M9 4.5a.75.75 0 0 1 .721.544l.813 2.846a3.75 3.75 0 0 0 2.576 2.576l2.846.813a.75.75 0 0 1 0 1.442l-2.846.813a3.75 3.75 0 0 0-2.576 2.576l-.813 2.846a.75.75 0 0 1-1.442 0l-.813-2.846a3.75 3.75 0 0 0-2.576-2.576l-2.846-.813a.75.75 0 0 1 0-1.442l2.846-.813A3.75 3.75 0 0 0 7.466 7.89l.813-2.846A.75.75 0 0 1 9 4.5ZM18 1.5a.75.75 0 0 1 .728.568l.258 1.036c.236.94.97 1.674 1.91 1.91l1.036.258a.75.75 0 0 1 0 1.456l-1.036.258c-.94.236-1.674.97-1.91 1.91l-.258 1.036a.75.75 0 0 1-1.456 0l-.258-1.036a2.625 2.625 0 0 0-1.91-1.91l-1.036-.258a.75.75 0 0 1 0-1.456l1.036-.258a2.625 2.625 0 0 0 1.91-1.91l.258-1.036A.75.75 0 0 1 18 1.5ZM16.5 15a.75.75 0 0 1 .712.513l.394 1.183c.15.447.5.799.948.948l1.183.395a.75.75 0 0 1 0 1.422l-1.183.395c-.447.15-.799.5-.948.948l-.395 1.183a.75.75 0 0 1-1.422 0l-.395-1.183a1.5 1.5 0 0 0-.948-.948l-1.183-.395a.75.75 0 0 1 0-1.422l1.183-.395c.447-.15.799-.5.948-.948l.395-1.183A.75.75 0 0 1 16.5 15Z"
                                        clip-rule="evenodd" />
                                </svg>
                                Creador
                            </span>
                        </div>
                    @endif
                </div>
                <div class="pl-11">
                    {{-- contenido del comentario --}}
                    <div>
                        <p>{!! nl2br($comentario->contenido) !!}</p>
                    </div>

                    {{-- Imagen si la tiene --}}
                    @if (count($comentario->medios) > 0)
                        <div>
                            <img loading="lazy" src="{{ Storage::url($comentario->medios[0]->url) }}" alt="">
                        </div>
                    @endif
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
                Sin respuestas, <a href="#form-responder" class="font-bold text-amber-500">se el primero en
                    comentar.</a>
            </p>
        </div>
    @endif
</div>
