<div class="container bg-white m-auto min-h-dvh flex p-5 flex-row shadow-lg">
    {{-- publicaciones --}}
    <div class="w-2/3 space-y-5">
        <div class="px-5">
            <h2 class="text-xl opacity-50">El foro del <span class="font-bold text-amber-500">Kolla</span></h2>
            <h2 class="text-4xl">{{ $categoria->nombre }}</h2>
        </div>
        <div class="px-5 space-y-3">
            @if (count($publicaciones) === 0)
                <div class="text-lg bg-white p-10 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6 inline-block w-20 h-20 text-amber-500">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v3.75m0-10.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.75c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.75h-.152c-3.196 0-6.1-1.25-8.25-3.286Zm0 13.036h.008v.008H12v-.008Z" />
                    </svg>
                    <p>No existen publicaciones para <span
                            class="font-bold text-amber-500">{{ $categoria->nombre }}</span></p>
                </div>
            @endif
            @foreach ($publicaciones as $post)
                <div class="border p-5 rounded-xl space-y-5">
                    {{-- Perfil --}}
                    <div class="flex space-x-3 border-b-4">
                        <div class="w-10 overflow-hidden rounded-full">
                            <img class="object-contain" src="{{ asset('/img/user.png') }}" alt="">
                        </div>
                        <div class="w-full ">
                            <span class="block font-bold">
                                {{ $post->usuario->nombres }} {{ $post->usuario->ap_paterno }}
                                {{ $post->usuario->ap_materno }}
                            </span>
                            <span class="block opacity-70">{{ $post->usuario->email }}</span>
                        </div>
                        @if ($post->estado === 'cerrado')
                            <div class="text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="inline size-6 text-amber-500">
                                    <path fill-rule="evenodd"
                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span>Resuelto</span>
                            </div>
                        @endif
                    </div>

                    {{-- Contenido des post --}}
                    <div class="">
                        <p>{!! nl2br($post->contenido) !!}</p>
                    </div>

                    @if (count($post->medios) > 0)
                        <div class="w-1/2">
                            <img src="{{ Storage::url($post->medios[0]->url) }}" alt="">
                        </div>
                    @endif

                    {{-- Categorias del post --}}
                    <div>
                        @foreach ($post->categorias as $categoria)
                            <span
                                class="rounded-full border border-amber-600 text-amber-600 p-1 text-sm ">{{ $categoria->nombre }}</span>
                        @endforeach
                    </div>

                    {{-- Acciones des post --}}
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
                        <div>
                            <a class="hover:text-amber-500" href="/foro/post/{{ $post->id }}">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="inline size-6">
                                    <path fill-rule="evenodd"
                                        d="M4.848 2.771A49.144 49.144 0 0 1 12 2.25c2.43 0 4.817.178 7.152.52 1.978.292 3.348 2.024 3.348 3.97v6.02c0 1.946-1.37 3.678-3.348 3.97a48.901 48.901 0 0 1-3.476.383.39.39 0 0 0-.297.17l-2.755 4.133a.75.75 0 0 1-1.248 0l-2.755-4.133a.39.39 0 0 0-.297-.17 48.9 48.9 0 0 1-3.476-.384c-1.978-.29-3.348-2.024-3.348-3.97V6.741c0-1.946 1.37-3.68 3.348-3.97ZM6.75 8.25a.75.75 0 0 1 .75-.75h9a.75.75 0 0 1 0 1.5h-9a.75.75 0 0 1-.75-.75Zm.75 2.25a.75.75 0 0 0 0 1.5H12a.75.75 0 0 0 0-1.5H7.5Z"
                                        clip-rule="evenodd" />
                                </svg>
                                {{ count($post->comentarios) }} Respuestas
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

    {{-- categorias --}}
    @livewire('foro.sidebar-categoria-componente')
</div>
