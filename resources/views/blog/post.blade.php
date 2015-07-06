@extends('master')

@section('content')
<section id="conteudo">
    <div id="blog_post" class="row">
        <div class="small-9 columns">
            <article>
                <small>Publicado em @datetimeformat($artigo->dt_criacao)</small>
                <hgroup>
                    <h1>{{$artigo->titulo}}</h1>
                    <h2 class="subheader">{{$artigo->subtitulo}}</h2>
                </hgroup>
                <p>{!! $artigo->texto !!}</p>
                @if($artigo->dt_criacao != $artigo->dt_alteracao)
                <p><em><small>Artigo alterado em @datetimeformat($artigo->dt_alteracao)</small></em></p>
                @endif
            </article>
        </div>
        {!! $sidebar !!}
    </div>
    <div class="row">
        <div class="small-12 column">
            <a href="{{url('/blog')}}" class="button tiny">Voltar</a>
        </div>
    </div>
</section>
@endsection

