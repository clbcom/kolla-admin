<div class="bg-[url(../../public/img/bg-code.jpg)] min-h-screen bg-fixed bg-cover">
    <header class="p-5">
        <div
            class="box-border bg-transparent flex flex-row items-center justify-between rounded-full border text-amber-50 text-xl font-bold backdrop-blur">
            <div class="items-center pl-5 text-4xl">
                <span>Kolla</span>
            </div>
            <nav class="flex flex-row items-center justify-end w-auto font-bold">
                <div class="p-5 hover:text-amber-500"><a class="" href="/semestres">Ver semestres</a></div>
                <div class="p-5 hover:text-amber-500"><a class="" href="/foro">Foro</a></div>
                <div class="flex p-5 text-amber-500 items-center ml-5 border-l  hover:text-amber-50">
                    @if (Auth::check())
                        <a href="/mio">{{ Auth::user()->nombres }}</a>
                    @else
                        <a class="" href="/login">Iniciar sesion</a>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                        </svg>
                    @endif
                </div>
            </nav>
        </div>
    </header>

    <div class="h-screen">
        <div class="w-2/5 pt-40 pl-20 pb-20 space-y-10">
            <h1 class="text-amber-50 text-6xl">
                Material y cursos en linea de
                <span class="font-bold text-amber-500">Ingenieria de sistemas.</span>
            </h1>
            <p class="text-xl text-amber-50 opacity-60">Los contenidos necesarios en <span
                    class="font-bold text-amber-500">PDF </span> y <span class="font-bold text-amber-500">video</span>
                que te ayudaran en el repaso de los
                temas
                mas importantes</p>
            <div>
                <div
                    class="inline-block bg-amber-500 px-5 py-3 rounded-full text-xl text-slate-900 hover:shadow-xl transition-shadow">
                    <a href="/semestres">Inicia ahora</a>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6 inline">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                    </svg>
                </div>
            </div>
        </div>

    </div>
    <div class="h-screen">
        <div class="w-2/5 pt-60 pl-20 pb-20  space-y-10">
            <h1 class="text-amber-50 text-6xl">
                Plataforma tipo <span class="font-bold text-amber-300">foro</span>, donde podras publicar y <span
                    class="font-bold text-amber-300">responder</span> a otras.
            </h1>
            <div>
                <div
                    class="inline-block bg-amber-300 px-5 py-3 rounded-full text-xl text-slate-900 hover:shadow-xl transition-shadow">
                    <a href="/foro">Ir al foro</a>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6 inline">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>
