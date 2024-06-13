<div class="flex flex-row items-center justify-between bg-white rounded-xl border text-lm overflow-hidden hover:shadow-md transition-shadow">
    <div class="px-5 py-3 ">
        <span class="block">Materia:</span>
        <a href="/materias/{{$materia->id}}" class="pl-3 font-bold border-l-2 border-l-amber-500 hover:text-amber-500">{{ $materia->nombre }}</a>
    </div>
    <div class="w-1/12 mr-5">
        <img src="{{asset('img/icon/gorro32x32.png')}}" alt="">
    </div>
</div>
