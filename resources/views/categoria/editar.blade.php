@extends('master')

@section('content')
<section id="conteudo">
    <div class="row">
        <div class="small-12 medium-6 large-4 columns large-centered medium-centered">
            @if (count($errors) > 0)
                    <div class='panel'>
                            <ul class="no-bullet">
                                    @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                    @endforeach 
                            </ul>
                    </div>
            @endif
            
            @if (Session::has('mensagem'))
                    <div class='panel'>
                            <ul class="no-bullet">
                                <li>{{ Session::get('mensagem') }}</li>
                            </ul>
                    </div>
            @endif             
            
            <form action="{{action('CategoriaController@update')}}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" >
                <fieldset>
                    <legend>Edição de Categoria</legend>
                    
                        <div class="row">
                                <div class="large-3 medium-4 small-5 columns">
                                <label>Id
                                    <input type="text" name="id_categoria" value="{{$categoria->id_categoria}}" readonly="readonly" />
                                </label>
                            </div>
                        </div> <!-- /.row -->
                        
                        <div class="row">
                                <div class="large-12 columns">
                                    <label>Nome:
                                        <input type="text" placeholder="Nome da categoria" name="nome" value="{{$categoria->nome}}">
                                    </label>
                                </div>
                        </div> <!-- /.row -->

                        <div class="row">
                            <div class="large-12 columns"><input type="submit" class="button small" value="Enviar" /></div>   
                        </div>
                    </fieldset>      
                </form>
                <a href="{{url('/categoria/lista')}}" class="button tiny">Voltar</a>
        </div>
        
    </div> <!-- /.row -->
</section>
@endsection



