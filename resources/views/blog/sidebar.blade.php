<div class="medium-3 large-3 columns">
        <div class="blog-sidebar-header">Categorias</div>
        <aside class="blog-sidebar-aside">
            @foreach($categorias as $cat)
            <div><a href="{{url('/blog/index/'.$cat->id_categoria)}}">{{$cat->nome}}</a></div>
            @endforeach
        </aside>
        <div class="blog-sidebar-header">Por data</div>
        <aside class="blog-sidebar-aside">
            @foreach($artigosPorMesAno as $apma)
            <div><a href="{{url('/blog/index/'.$apma->mes.'/'.$apma->ano)}}">@monthname($apma->mes) {{$apma->ano}}</a></div>
            @endforeach
        </aside>
</div>
