@extends('master')

@section('title')
    Contato - DFDias Sistemas Web
@endsection

@section('content')
<section id="conteudo">
    <div class="row">
        <div class="large-12 columns">            
            @if (count($errors) > 0)
                    <div class="panel">
                        <ul class="no-bullet">
                            @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                            @endforeach 
                        </ul>
                    </div>
            @endif
            @if (Session::has('mensagem'))
                    <div class="panel">
                            <ul class="no-bullet">
                                <li>{{ Session::get('mensagem') }}</li>
                            </ul>
                    </div>
            @endif             
            <form action="{{action('ContatoController@sendMail')}}" method="post" enctype="application/x-www-form-urlencoded">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" >
                <fieldset>
                <legend>Contato</legend>
                    <div class="row">
                            <div class="large-7 columns">
                                <label>Nome:
                                    <input type="text" placeholder="Seu nome" name="nome" value="{{old('nome')}}">
                                </label>
                            </div>
                    </div> <!-- /.row -->

                    <div class="row">
                            <div class="large-7 columns">
                            <label>E-mail:
                                    <input type="email" placeholder="Seu email" name="email" value="{{old('email')}}">
                            </label>
                        </div>
                    </div> <!-- /.row -->

                    <div class="row">
                        <div class="large-12 columns">
                          <label>Mensagem:
                                <textarea placeholder="Digite sua mensagem" rows="8" name="mensagem" >{{old('nome')}}</textarea>
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

