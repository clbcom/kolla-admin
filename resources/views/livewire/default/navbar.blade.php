<header
    class="box-border bg-transparent flex flex-row items-center justify-between border-b-solid border-b-[rgba(0,0,0,0.1)] shadow-sm border-b text-xl font-bold">
    <div class="items-center pl-5 text-4xl">
        <span>Kolla</span>
    </div>
    <nav class="flex flex-row items-center justify-end w-auto font-bold">
        <div class="p-5 hover:text-amber-600"><a class="" href="/">Inicio</a></div>
        <div class="p-5 hover:text-amber-600"><a class="" href="/semestres">Ver semestres</a></div>
        <div class="p-5 hover:text-amber-600"><a class="" href="/foro">Foro</a></div>
        <div class="flex p-5 text-amber-600 items-center">
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
</header>
