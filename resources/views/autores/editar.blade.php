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
            
            <form action="{{action('LoginController@update')}}" method="post" enctype="application/x-www-form-urlencoded">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" >
                <input type="hidden" name="id_autor" value="{{$autor->id_autor}}" >
                <fieldset>
                    <legend>Edição de Autor</legend>

                        <div class="row">
                                <div class="large-12 columns">
                                    <label>Nome:
                                        <input type="text" placeholder="Nome" name="nome" value="{{$autor->nome}}">
                                    </label>
                                </div>
                        </div> <!-- /.row -->

                        <div class="row">
                                <div class="large-3 medium-4 small-5 columns">
                                <label>Idade:
                                        <input type="number" min="18" max="120" name="idade" value="{{$autor->idade}}">
                                </label>
                            </div>
                        </div> <!-- /.row -->

                        <div class="row">
                                <div class="large-4 medium-5 small-6 columns">
                                <label>Sexo:
                                    <select name="sexo">
                                        <option value="M" {{$autor->sexo == 'M' ? 'selected="selected"' : ''}}>Masculino</option>
                                        <option value="F" {{$autor->sexo == 'F' ? 'selected="selected"' : ''}}>Feminino</option>
                                    </select>
                                </label>
                            </div>
                        </div> <!-- /.row -->

                        <div class="row">
                                <div class="large-12 columns">
                                <label>E-mail:
                                        <input type="email" placeholder="E-mail" name="email" value="{{$autor->email}}">
                                </label>
                            </div>
                        </div> <!-- /.row -->                    

                        <div class="row">
                            <div class="large-12 columns"><input type="submit" class="button small" value="Enviar" /></div>   
                        </div>
                    </fieldset>      
                </form>
                <a href="{{url('/login')}}" class="button tiny">Voltar</a>
        </div>
        
    </div> <!-- /.row -->
</section>
@endsection

