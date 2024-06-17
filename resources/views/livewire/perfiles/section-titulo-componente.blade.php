<div class="flex flex-row items-center p-5">
    <div class="text-xl w-2/3">
        <span class="opacity-50">Mi perfil:</span>
        <h1 class="font-bold">{{ count(Auth::user()->publicaciones) }} publicacion(nes).</h1>
        <span
            class="inline-block rounded-full mt-10 px-5 py-3 bg-amber-500 text-amber-50 hover:shadow-lg transition-shadow">
            <a href="/mio/nuevopost">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="inline size-6">
                    <path fill-rule="evenodd"
                        d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z"
                        clip-rule="evenodd" />
                </svg>
                Nueva publicacion
            </a>
        </span>
    </div>
    <div class="w-1/3">
        <img src="{{ asset('img/casquillo.png') }}" alt="">
    </div>
</div>
