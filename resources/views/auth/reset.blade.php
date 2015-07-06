@extends('master')

@section('content')
<section id="conteudo">
    <div class="row">
        <div class="small-12 medium-8 large-6 column large-centered medium-centered">
            <div class="panel">
                <div>Alterar Senha</div>
                @if (count($errors) > 0)
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form role="form" method="POST" action="/password/reset">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div>
                        <label>Endereço de E-mail</label>
                        <div>
                            <input type="email" name="email" value="{{ old('email') }}">
                        </div>
                    </div>

                    <div>
                        <label>Senha</label>
                        <div>
                            <input type="password" name="password">
                        </div>
                    </div>

                    <div>
                        <label>Confirme a senha</label>
                        <div>
                            <input type="password" name="password_confirmation">
                        </div>
                    </div>

                    <div>
                        <div>
                            <button type="submit" class="small">
                                Alterar Senha
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>
@endsection
