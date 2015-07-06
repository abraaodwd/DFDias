@extends('master')

@section('content')
<section id="conteudo">
    <div class="row">
        <div class="small-12 medium-8 large-6 column large-centered medium-centered">
            <div class="panel">
                <div>Recuperar senha</div>
                @if (session('status'))
                <div>
                    {{ session('status') }}
                </div>
                @endif

                @if (count($errors) > 0)
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form role="form" method="POST" action="/password/email">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div>
                        <label>Endereço de E-mail</label>
                        <div>
                            <input type="email" name="email" value="{{ old('email') }}">
                        </div>
                    </div>

                    <div>
                        <div>
                            <button type="submit" class="small">
                                Enviar
                            </button>
                        </div>
                    </div>
                </form>

            </div>
	</div>
</section>
@endsection