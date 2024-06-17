<div class="container flex flex-row min-h-screen mx-auto p-5 bg-white shadow-lg">
    {{-- Informacion de la materia --}}
    <div class="w-2/3">
        {{-- Seccion titulo --}}
        @livewire('perfiles.section-titulo-componente')

        {{-- Listado de publicaciones --}}
        <div class="text-lg">
            <form class="space-y-5" wire:submit="guardar">
                {{-- Contenido --}}
                <div class="flex flex-col px-5">
                    <label class="font-bold" for="contenido">Contenido:</label>
                    <textarea class="border rounded-xl px-5 py-3 h-64" name="contenido" id="contenido" wire:model.lazy="contenido"></textarea>
                </div>

                {{-- Categorias --}}
                <div class="px-5">
                    <label class="font-bold" for="categorias">Categorias:</label>
                    <div class=" space-y-5 flex flex-wrap items-center justify-between align-baseline">
                        <select class="rounded-xl border px-5 py-3" name="categorias" wire:model="seleccionada"
                            wire:change="actualizar" id="categorias">
                            <option class="opacity-50" selected">Selecione las categorias</option>
                            @foreach ($categorias as $item)
                                @if (array_search($item->nombre, $categoriasSeleccionadas) === false)
                                    <option class="p-5" value="{{ $item->id }}">{{ $item->nombre }}</option>
                                @endif
                            @endforeach
                        </select>
                        <div class="flex flex-wrap items-center justify-center gap-2">
                            @foreach ($categoriasSeleccionadas as $id => $categoria)
                                <div
                                    class="flex justify-between text-sm p-1 border rounded-full border-amber-500 text-amber-500">
                                    <span class="inline-block text-center w-full">{{ $categoria }}</span>
                                    <button class="rounded-full text-red-500"
                                        wire:click="eliminar_categoria({{ $id }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="inline size-6">
                                            <path fill-rule="evenodd"
                                                d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z"
                                                clip-rule="evenodd" />
                                        </svg>

                                    </button>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- Medios --}}
                <div class="px-5 flex flex-col">
                    <span class="font-bold">Medios:</span>
                    <div
                        class="w-full flex items-center justify-center border-2 rounded-xl border-dashed overflow-hidden">
                        @if (!$medio)
                            <label class="p-5 text-center cursor-pointer block hover:text-amber-500 font-bold"
                                for="medio">
                                Seleccione su archivo
                            </label>
                            <input class="hidden" accept="image/*" type="file" name="medio" wire:model="medio" id="medio">
                        @else
                            <div class="h-72 max-h-72 w-auto relative ">
                                <button class="absolute right-0 rounded-full text-red-500"
                                    wire:click="eliminar_medio">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="inline size-6">
                                        <path fill-rule="evenodd"
                                            d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <img class="w-full h-full object-contain" src="{{ $medio->temporaryUrl() }}">
                            </div>
                        @endif
                    </div>
                </div>
                <div class="p-5">
                    <button class="bg-amber-500 font-bold border rounded-xl w-full py-3" type="submit">Enviar</button>
                </div>
            </form>
        </div>

    </div>

    {{-- Informacion adicional sidebar --}}
    @livewire('perfiles.side-bar-componente')
</div>
