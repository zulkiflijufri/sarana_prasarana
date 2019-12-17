@extends('layouts.master')

@section('title', 'Dasboard')

@section('content')
	<div class="main">
		<div class="main-content">
			<div class="row text-center">
				<div class="col-lg-12">
					<h3>Hi {{auth()->user()->name}}, Selamat Datang Di Aplikasi Sarana Dan Prasana</h3>
				</div>	
			</div>
		</div>
	</div>
@endsection