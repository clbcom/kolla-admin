<div class="w-1/2 min-h-screen m-auto p-5 bg-white shadow">
    <div class="flex flex-row p-5 items-center">
        <div class="w-2/3">
            <h2 class="text-4xl font-bold">Semestres</h2>
            <p>Las materias estan separadas por semestres, esta ayudara a que puedas buscar el tema a repasar.</p>
        </div>
        <div class="w-1/3 ">
            <img src="{{asset('img/casquillo.png')}}" alt="casquillo">
        </div>
    </div>
    <div class="grid grid-cols-2 gap-3">
        @foreach ($semestres as $semestre)
            <div class="rounded-xl bg-white border hover:shadow transition-shadow">
                <span class="text-[rgba(0,0,0,0.7)] block px-5 py-3">Semestre: {{ $semestre->numeral }}</span>
                <a class="block font-bold text-xl ml-5 pl-3 mb-3 border-l-2 border-l-amber-500 hover:text-amber-500"
                    href="/semestres/{{ $semestre->numeral }}">
                    {{ $semestre->literal }}
                </a>
            </div>
        @endforeach
    </div>
</div>
