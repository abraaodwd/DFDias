@extends('master')

@section('content')
<section id="conteudo">
    @include('menuadmin')
    <div class="row">
        <div class="small-12 medium-9 large-8 large-centered medium-centered columns">
            @if (Session::has('mensagem'))
                    <div class='panel'>
                            <ul class="no-bullet">
                                <li>{{ Session::get('mensagem') }}</li>
                            </ul>
                    </div>
            @endif                 
            <table class="responsive">
                <caption>Artigos</caption>
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="">Título</th>
                        <th class="text-center">Autor</th>
                        <th class="">Categoria</th>
                        <th class="">Dt. Alteração</th>
                        <th class="text-center">Editar</th>
                        <th class="text-center">Remover</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($artigos as $artigo)
                    <tr>
                        <td class="text-center">{{$artigo->id_artigo}}</td>
                        <td class="">{{$artigo->titulo}}</td>
                        <td class="text-center">{{$artigo->autor->nome}}</td>
                        <td class="">{{$artigo->categoria->nome}}</td>
                        <td class="text-center">@dateonly($artigo->dt_alteracao)</td>
                        <td class="text-center"><a href="{{action('BlogController@edit', $artigo->id_artigo)}}"><img src="{{asset('img/edit_user_icon.png')}}" /></a></td>
                        <td class="text-center"><a href="{{action('BlogController@destroy', $artigo->id_artigo)}}"><img src="{{asset('img/delete_icon.png')}}" /></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>            
        </div>
    </div>
    <div class="row">
        <div class="small-12 column pagination-centered">
            {!! $artigos->render() !!}
        </div>
    </div>    
</section>

@endsection

