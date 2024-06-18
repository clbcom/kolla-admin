<div class="container bg-white m-auto min-h-dvh flex p-5 flex-row shadow-lg">
    {{-- publicaciones --}}
    <div class="w-2/3 space-y-5">
        <div class="p-5">
            <h2 class="text-4xl">El foro del <span class="font-bold text-amber-500">Kolla</span></h2>
        </div>
        <div class="px-5 space-y-3">
            <div class="border p-5 rounded-xl space-y-5">
                {{-- Perfil --}}
                <div class="flex justify-between items-conter border-b-4 pb-3">
                    {{-- Categorias del publicacion --}}
                    <div>
                        @foreach ($publicacion->categorias as $categoria)
                            <span
                                class="rounded-full border border-amber-600 text-amber-600 p-1 text-sm ">{{ $categoria->nombre }}</span>
                        @endforeach
                    </div>

                    {{-- Estado --}}
                    <div class="text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="inline-block size-6 {{ $publicacion->estado === 'cerrado' ? 'text-amber-500' : 'text-gray-300' }}">
                            <path fill-rule="evenodd"
                                d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span>{{ ucwords($publicacion->estado) }}</span>
                    </div>
                </div>

                {{-- Contenido des publicacion --}}
                <div class="">
                    <p>{!! nl2br($publicacion->contenido) !!}</p>
                </div>

                @if (count($publicacion->medios) > 0)
                    <div>
                        <img src="{{ Storage::url($publicacion->medios[0]->url) }}" alt="">
                    </div>
                @endif


                {{-- Acciones des publicacion --}}
                <div class="flex justify-between border-t-4 pt-3">
                    <div class="space-x-3">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="inline size-6">
                                <path
                                    d="M7.493 18.5c-.425 0-.82-.236-.975-.632A7.48 7.48 0 0 1 6 15.125c0-1.75.599-3.358 1.602-4.634.151-.192.373-.309.6-.397.473-.183.89-.514 1.212-.924a9.042 9.042 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75A.75.75 0 0 1 15 2a2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H14.23c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23h-.777ZM2.331 10.727a11.969 11.969 0 0 0-.831 4.398 12 12 0 0 0 .52 3.507C2.28 19.482 3.105 20 3.994 20H4.9c.445 0 .72-.498.523-.898a8.963 8.963 0 0 1-.924-3.977c0-1.708.476-3.305 1.302-4.666.245-.403-.028-.959-.5-.959H4.25c-.832 0-1.612.453-1.918 1.227Z" />
                            </svg>

                        </span>
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="inline size-6">
                                <path
                                    d="M15.73 5.5h1.035A7.465 7.465 0 0 1 18 9.625a7.465 7.465 0 0 1-1.235 4.125h-.148c-.806 0-1.534.446-2.031 1.08a9.04 9.04 0 0 1-2.861 2.4c-.723.384-1.35.956-1.653 1.715a4.499 4.499 0 0 0-.322 1.672v.633A.75.75 0 0 1 9 22a2.25 2.25 0 0 1-2.25-2.25c0-1.152.26-2.243.723-3.218.266-.558-.107-1.282-.725-1.282H3.622c-1.026 0-1.945-.694-2.054-1.715A12.137 12.137 0 0 1 1.5 12.25c0-2.848.992-5.464 2.649-7.521C4.537 4.247 5.136 4 5.754 4H9.77a4.5 4.5 0 0 1 1.423.23l3.114 1.04a4.5 4.5 0 0 0 1.423.23ZM21.669 14.023c.536-1.362.831-2.845.831-4.398 0-1.22-.182-2.398-.52-3.507-.26-.85-1.084-1.368-1.973-1.368H19.1c-.445 0-.72.498-.523.898.591 1.2.924 2.55.924 3.977a8.958 8.958 0 0 1-1.302 4.666c-.245.403.028.959.5.959h1.053c.832 0 1.612-.453 1.918-1.227Z" />
                            </svg>
                        </span>
                    </div>
                </div>
            </div>

            {{-- Listado Comentarios --}}
            <div class="border p-5 rounded-xl space-y-5">
                <span class="font-bold">Respuestas:</span>
                @livewire('foro.comentarios-componente', ['comentarios' => $publicacion->comentarios])
            </div>

            {{-- Formulario para comentar --}}
            <div id="form-responder" class="border p-5 rounded-xl space-y-5">
                <span class="font-bold">Deja tu respuesta:</span>
                @livewire('foro.form-comentario-componente', ['publicacion' => $publicacion])
            </div>
        </div>

    </div>

    {{-- categorias --}}
    @livewire('foro.sidebar-usuario-componente', ['user' => $publicacion->usuario])
</div>
