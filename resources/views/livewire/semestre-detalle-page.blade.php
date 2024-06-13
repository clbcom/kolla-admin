<div class="min-h-screen p-5 mx-auto w-1/2 bg-white">
    <div class="p-5 flex flex-row items-center">
        <div class="w-2/3">
            <h1 class="text-4xl">
                <span class="font-bold">Semestre:</span> {{ $semestre->literal }}
            </h1>
        <p class="text-xl">Este semestre cuenta con <span>{{count($semestre->materias)}} materias.</span></p>
        </div>
        <div class="w-1/3">
            <img src="{{asset('img/casquillo.png')}}" alt="">
        </div>
    </div>
    @livewire('materias-page', ['materias' => $semestre->materias])
</div>
