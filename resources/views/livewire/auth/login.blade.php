<div class="bg-[url(../../public/img/bg-code.jpg)] min-h-screen bg-fixed bg-cover">
    <header class="p-5">
        <div
            class="box-border bg-transparent flex flex-row items-center justify-between rounded-full border text-amber-50 text-xl font-bold backdrop-blur">
            <div class="items-center pl-5 text-4xl">
                <span>Kolla</span>
            </div>
            <nav class="flex flex-row items-center justify-end w-auto font-bold px-5">
                <div class="p-5 hover:text-amber-500"><a class="" href="/">Inicio</a></div>
                <div class="p-5 hover:text-amber-500"><a class="" href="/semestres">Ver semestres</a></div>
                <div class="p-5 hover:text-amber-500"><a class="" href="/foro">Foro</a></div>
            </nav>
        </div>
    </header>

    <section class="flex items-center justify-center">
        <div class="w-1/3 p-5 backdrop-blur-lg rounded-2xl border overflow-hidden text-lg">
            <div class="p-5 text-5xl text-center font-bold text-amber-500">
                <h2>Iniciar sesion</h2>
            </div>
            <form wire:submit.prevent="login">
                @csrf
                <div class="p-5 flex flex-col">
                    <label class="text-white text-xl" for="email">Correo electronico</label>
                    <input
                        class="p-3 rounded-full bg-transparent border outline-none focus-within:border-amber-400 text-amber-50"
                        type="text" id="email" wire:model="email" required>
                    @error('email')
                        <span class="pl-5 text-lg text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="p-5 flex flex-col">
                    <label class="text-white text-xl" for="password">Contraseña</label>
                    <div class="flex">
                        <input
                            class="w-full p-3 rounded-l-full bg-transparent border outline-none focus-within:border-amber-400 text-amber-50"
                            type="{{ $es_visible ? 'text' : 'password' }}" id="password" wire:model="password"
                            required>
                        <button class="rounded-r-full border-l-0 border pl-4 pr-5 text-amber-50"
                            wire:click.prevent="cambiar_visibilidad">
                            @if (!$es_visible)
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="inline size-7">
                                    <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                    <path fill-rule="evenodd"
                                        d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                                        clip-rule="evenodd" />
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="inline size-7">
                                    <path
                                        d="M3.53 2.47a.75.75 0 0 0-1.06 1.06l18 18a.75.75 0 1 0 1.06-1.06l-18-18ZM22.676 12.553a11.249 11.249 0 0 1-2.631 4.31l-3.099-3.099a5.25 5.25 0 0 0-6.71-6.71L7.759 4.577a11.217 11.217 0 0 1 4.242-.827c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113Z" />
                                    <path
                                        d="M15.75 12c0 .18-.013.357-.037.53l-4.244-4.243A3.75 3.75 0 0 1 15.75 12ZM12.53 15.713l-4.243-4.244a3.75 3.75 0 0 0 4.244 4.243Z" />
                                    <path
                                        d="M6.75 12c0-.619.107-1.213.304-1.764l-3.1-3.1a11.25 11.25 0 0 0-2.63 4.31c-.12.362-.12.752 0 1.114 1.489 4.467 5.704 7.69 10.675 7.69 1.5 0 2.933-.294 4.242-.827l-2.477-2.477A5.25 5.25 0 0 1 6.75 12Z" />
                                </svg>
                            @endif
                        </button>
                    </div>
                    @error('password')
                        <span class="pl-5 text-lg text-red-500">{{ $message }}</span>
                    @enderror


                </div>
                <div class="p-5">
                    <button
                        class="bg-amber-500 text-white rounded-full w-full py-3 text-2xl transition-shadow hover:shadow-xl"
                        type="submit">Login</button>
                </div>
                <div class="p-5 text-center">
                    <p class="text-amber-50">¿Eres nuevo? <a
                            class="font-bold text-amber-500 hover:border-b-2 hover:border-b-amber-500 transition-colors"
                            href="/registrar">Crear una cuenta aqui.</a></p>
                </div>
            </form>
        </div>
    </section>
</div>
