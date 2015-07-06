@extends('master')

@section('content')
<section id="conteudo">
    <div id="blog_index" class="row">
        <div class="small-12 medium-9 large-9 columns">
            @foreach($artigos as $artigo)
            <article>
                <div id="img_blog"><img src="{{url('img/consultoria_ensino.jpg')}}" width="1000"  /></div>
                <small>Escrito por {{$artigo->autor->nome}}, Publicado em @datetimeformat($artigo->dt_criacao) - Categoria {{$artigo->categoria->nome}}</small>
                <hgroup>
                    <h1><a href="{{url('/blog/'.$artigo->id_artigo)}}">{{$artigo->titulo}}</a></h1>
                    <h2 class="subheader">{{$artigo->subtitulo}}</h2>
                </hgroup>
                <p>{{ strip_tags(str_limit($artigo->texto, 100)) }} <a href="{{url('/blog/'.$artigo->id_artigo)}}" class="button tiny">Leia mais</a></p>
            </article>
            @endforeach
        </div>
        {!! $sidebar !!}
    </div>
    <div class="row">
        <div class="small-9 column pagination-centered">
            {!! $artigos->render() !!}
        </div>
    </div>
</section>
@endsection