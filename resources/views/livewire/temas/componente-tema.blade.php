<div class="space-y-5">
    @foreach ($temas as $tema)
        <div class="border-l-4 pl-5 py-5 border-l-lime-600 hover:border-l-amber-500">
            <div class="font-bold text-lg">
                <a href="/materias/{{ $tema->id_materia }}/temas/{{ $tema->id }}">
                    {{ $tema->titulo }}
                </a>
            </div>
            <div>
                @if ($tema->recurso)
                    <div>
                        <span>{{ $tema->recurso->tipo }}</span>
                    </div>
                @else
                    <span class="text-[rgba(0,0,0,0.6)]">Si recursos</span>
                @endif
            </div>
        </div>
    @endforeach
</div>
