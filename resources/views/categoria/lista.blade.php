@extends('master')

@section('content')
<section id="conteudo">
    @include('menuadmin')
    <div class="row">
        <div class="large-3 medium-5 small-8 column small-centered">
            <table>
                <caption>Categorias</caption>
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Categoria</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categorias as $categoria)
                    <tr>
                        <td class="text-center">{{$categoria->id_categoria}}</td>
                        <td class="text-center">{{$categoria->nome}}</td>
                        <td class="text-center"><a href="{{action('CategoriaController@edit', $categoria->id_categoria)}}"><img src="{{asset('img/edit_user_icon.png')}}" /></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>         
        </div>
    </div>
</section>

@endsection

