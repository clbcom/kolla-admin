<div class="container flex flex-row min-h-screen mx-auto p-5 bg-white shadow-lg">
    {{-- Informacion de la materia --}}
    <div class="w-2/3">
        {{-- Seccion titulo --}}
        @livewire('perfiles.section-titulo-componente')

        {{-- Listado de publicaciones --}}
        <div class="">
            @if (count(Auth::user()->publicaciones) > 0)
                {{-- tiene publicaciones --}}
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
