@extends('master')

@section('content')
<section id="conteudo">
    @include('menuadmin')
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
                            <ul class="">
                                <li>{{ Session::get('mensagem') }}</li>
                            </ul>
                    </div>
            @endif              
            <form action="{{action('LoginController@store')}}" method="post" enctype="application/x-www-form-urlencoded">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" >
                <fieldset>
                    <legend>Cadastro de Autor</legend>

                        <div class="row">
                                <div class="large-12 columns">
                                    <label>Nome:
                                        <input type="text" placeholder="Nome" name="nome" value="{{ old('nome') }}">
                                    </label>
                                </div>
                        </div> <!-- /.row -->

                        <div class="row">
                                <div class="large-12 columns">
                                    <label>Senha:
                                        <input type="password" name="senha" />
                                    </label>
                                </div>
                        </div> <!-- /.row -->

                        <div class="row">
                                <div class="large-3 medium-4 small-5 columns">
                                <label>Idade:
                                        <input type="number" min="18" max="120" name="idade" value="{{ old('idade') }}" />
                                </label>
                            </div>
                        </div> <!-- /.row -->

                        <div class="row">
                                <div class="large-5 medium-5 small-6 columns">
                                <label>Sexo:
                                    <select name="sexo">
                                        <option value="M" {{old('sexo') == 'M' ? 'selected' : '' }}>Masculino</option>
                                        <option value="F" {{old('sexo') == 'F' ? 'selected' : '' }}>Feminino</option>
                                    </select>
                                </label>
                            </div>
                        </div> <!-- /.row -->

                        <div class="row">
                                <div class="large-12 columns">
                                <label>E-mail:
                                        <input type="email" placeholder="E-mail" name="email" value="{{ old('email') }}"/>
                                </label>
                            </div>
                        </div> <!-- /.row -->                    

                        <div class="row">
                            <div class="large-12 columns"><input type="submit" class="button small" value="Enviar" /></div>   
                        </div>
                    </fieldset>      
                </form>
        </div>
        
    </div> <!-- /.row -->
</section>
@endsection

