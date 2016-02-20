@extends('store.layout')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">

			<p><strong>Preencha agora os dados adicionais de sua conta.</strong></p>
			<a href="#" class="btn btn-warning">
				Deixar para depois
			</a>

			<hr/>

			<div class="panel panel-default">
				<div class="panel-heading">Detalhes da Conta</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					{!! Form::open() !!}

						<div class="row">
							<div class="col-md-10">
								<!-- Nome Form Input -->
								<div class="form-group">
									{!! Form::label('adress', 'Endereço completo:') !!}
									{!! Form::text('adress', null, ['class'=>'form-control']) !!}
								</div>
							</div>

							<div class="col-md-2">
								<!-- Nome Form Input -->
								<div class="form-group">
									{!! Form::label('number', 'Número:') !!}
									{!! Form::text('number', null, ['class'=>'form-control']) !!}
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-4">
								<!-- Nome Form Input -->
								<div class="form-group">
									{!! Form::label('neighbourhood', 'Bairro:') !!}
									{!! Form::text('neighbourhood', null, ['class'=>'form-control']) !!}
								</div>
							</div>

							<div class="col-md-2">
								<!-- Nome Form Input -->
								<div class="form-group">
									{!! Form::label('uf', 'UF:') !!}
									{!! Form::select('status', [
											"AC", "AL", "AM", "AP","BA","CE","DF","ES","GO","MA","MT","MS","MG","PA","PB","PR","PE","PI","RJ","RN","RO","RS","RR","SC","SE","SP","TO"
										], null, ['class'=>'form-control'])
									!!}
								</div>
							</div>

							<div class="col-md-3">
								<!-- Nome Form Input -->
								<div class="form-group">
									{!! Form::label('city', 'Cidade:') !!}
									{!! Form::text('city', null, ['class'=>'form-control']) !!}
								</div>
							</div>

							<div class="col-md-3">
								<!-- Nome Form Input -->
								<div class="form-group">
									{!! Form::label('cep', 'CEP:') !!}
									{!! Form::text('cep', null, ['class'=>'form-control']) !!}
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-4">
								<!-- Nome Form Input -->
								<div class="form-group">
									{!! Form::label('phone', 'Telefone com DDD:') !!}
									{!! Form::text('phone', null, ['class'=>'form-control']) !!}
								</div>
							</div>

							<div class="col-md-4">
								<!-- Nome Form Input -->
								<div class="form-group">
									{!! Form::label('cellphone', 'Celular com DDD:') !!}
									{!! Form::text('cellphone', null, ['class'=>'form-control']) !!}
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								{!! Form::submit('Salvar', ['class'=>'btn btn-primary']) !!}

							</div>
						</div>

						{!! Form::close() !!}

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
