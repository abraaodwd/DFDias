@extends('master')

@section('content')
<section id="conteudo">
	<div class="row">
		<div class="large-4 medium-6 small-12 columns large-centered medium-centered">
			<div>
				<div>
					@if (count($errors) > 0)
						<div class="panel">
							<ul class="no-bullet">
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								 @endforeach 
							</ul>
						</div>
					@endif

					<form role="form" method="POST" action="{{action('AuthController@authenticate')}}">
                                            <fieldset>
                                                <legend>Login</legend>
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div>
							<label>E-Mail</label>
							<div>
								<input type="email"  name="email" id="email" value="{{ old('email') }}">
							</div>
						</div>

						<div>
							<label>Senha</label>
							<div>
								<input type="password" name="senha" id="senha" />
							</div>
						</div>

						<div>
							<div>
								<div>
									<label>
										<input type="checkbox" name="remember"> Continuar conectado
									</label>
								</div>
							</div>
						</div>

						<div>
							<div>
								<button type="submit" style="margin-right: 15px;">
									Login
								</button>

								<a href="/password/email">Esqueceu sua senha?</a>
							</div>
						</div>
                                            </fieldset>    
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
