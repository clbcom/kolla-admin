<div class="w-1/3">
    <div>
        <span class="font-bold">Categorias:</span>
        <div class="">
            <div
                class="pl-5 py-3 border-l-4 border-l-purple-500 hover:border-l-amber-500 transition-colors hover:bg-gray-200 hover:font-bold">
                <a href="/foro">Todas</a>
            </div>
            @foreach ($categorias as $categoria)
                <div
                    class="pl-5 py-3 border-l-4 border-l-purple-500 hover:border-l-amber-500 transition-colors hover:bg-gray-200 hover:font-bold">
                    <a href="/foro/categorias/{{ $categoria->id }}">{{ $categoria->nombre }}</a>
                </div>
            @endforeach
        </div>
    </div>
</div>