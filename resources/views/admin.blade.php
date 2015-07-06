@extends('master')

@section('content')

<section id="conteudo">
        @include('menuadmin')
	<div class="row">
            <div class="small-12 medium-9 large-8 large-centered medium-centered columns ">
                @if (Session::has('mensagem'))
                        <div class='panel'>
                                <ul class="no-bullet">
                                    <li>{{ Session::get('mensagem') }}</li>
                                </ul>
                        </div>
                @endif                 
                <table class="responsive">
                    <caption>Autores</caption>
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="">Nome</th>
                            <th class="text-center">Idade</th>
                            <th class="">Sexo</th>
                            <th class="">E-mail</th>
                            <th class="text-center">Dt. Cadastro</th>
                            <th class="text-center">Editar</th>
                            <th class="text-center">Remover</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($autores as $autor)
                        <tr>
                            <td class="text-center">{{$autor->id_autor}}</td>
                            <td class="">{{$autor->nome}}</td>
                            <td class="text-center">{{$autor->idade}}</td>
                            <td class="">{{$autor->sexo == 'M' ? 'Masculino' : 'Feminino'}}</td>
                            <td class="">{{$autor->email}}</td>
                            <td class="text-center">@dateonly($autor->dt_cadastro)</td>
                            <td class="text-center"><a href="{{action('LoginController@edit', $autor->id_autor)}}"><img src="{{asset('img/edit_user_icon.png')}}" /></a></td>
                            <td class="text-center"><a href="{{action('LoginController@destroy', $autor->id_autor)}}"><img src="{{asset('img/delete_icon.png')}}" /></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
	</div>
</section>
@endsection

