<div>
    @if ($esta_logueado)
        <form class="space-y-5" wire:submit.prevent="guardar">

            {{-- Contenido --}}
            <div class="flex flex-col px-5">
                <label class="font-bold" for="contenido">Contenido:</label>
                <textarea class="border rounded-xl px-5 py-3 h-64" name="contenido" id="contenido" wire:model.lazy="contenido"></textarea>
            </div>

            {{-- Medios --}}
            <div class="px-5 flex flex-col">
                <span class="font-bold">Imagen:</span>
                <div class="w-full flex items-center justify-center border-2 rounded-xl border-dashed overflow-hidden">
                    @if (!$imagen)
                        <label class="p-5 text-center cursor-pointer block hover:text-amber-500 font-bold"
                            for="imagen">
                            Seleccione su archivo
                        </label>
                        <input class="hidden" accept="image/*" type="file" name="imagen" wire:model="imagen"
                            id="imagen">
                    @else
                        <div class="h-72 max-h-72 w-auto relative ">
                            <button class="absolute right-0 rounded-full text-red-500" wire:click="eliminar_imagen">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="inline size-6">
                                    <path fill-rule="evenodd"
                                        d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                            <img class="w-full h-full object-contain" src="{{ $imagen->temporaryUrl() }}">
                        </div>
                    @endif
                </div>
            </div>
            <div class="p-5">
                <button class="bg-amber-500 font-bold border rounded-xl w-full py-3" type="submit">Enviar</button>
            </div>
        </form>
    @else
        <div>
            <p>
                Necesita
                <a class="font-bold text-amber-500"
                    href="{{ route('login', ['redirect' => url()->current()]) }}">Iniciar sesion</a> para
                poder
                responder a
                esta publicacion.
            </p>
        </div>
    @endif
</div>
