<div class="w-1/3 p-5 space-y-5">
    {{-- Informacion del docente --}}
    <div>
        <span class="font-bold">Datos personales:</span>
        <div class="flex flex-row items-center ">
            <div class="w-20 h-20 flex rounded-full border overflow-hidden items-center">
                <img class="w-full m-auto" src="{{ asset('img/user.png') }}" alt="">
            </div>
            <div class="px-5">
                <h3 class="font-bold">
                    <span>{{ Auth::user()->nombres }}</span>
                    <span>{{ Auth::user()->ap_paterno }}</span>
                    <span>{{ Auth::user()->ap_materno }}</span>
                </h3>
                <h3>{{ ucwords(Auth::user()->tipo_usuario) }}</h3>
                <h3 class="text-[rgba(0,0,0,0.5)]">{{ Auth::user()->email }}</h3>
            </div>
        </div>
    </div>
</div>
