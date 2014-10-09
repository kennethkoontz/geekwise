@extends('master')

@section('content')
<div style="margin-top: 100px" class="container-fluid">
	<div class="row">
		<div class="col-md-7">
			&nbsp;
		</div>
		<div class="col-md-3">
			<div class="row">
				<div class="well col-md-12">
					<form action="/login" method="POST" class="form-horizontal">
						<div class="form-group">
							<input class="form-control" placeholder="Email" type="text" name="email">
						</div>
						<div class="form-group">
							<input class="form-control" placeholder="Password" type="password" name="password">
						</div>
						<p class="text-danger">{{{ Session::get('login_message') }}}</p>
						<div class="pull-right form-group">
				            <input class="btn btn-primary" type="submit" value="Login">
						</div>
					</form>	
				</div>
				<div class="well col-md-12">
					<form action="/register" method="POST" class="form-horizontal">
						<div class="form-group">
							<input class="form-control" placeholder="Full Name" type="text" name="fullname">
						</div>
						<div class="form-group">
							<input class="form-control" placeholder="Email" type="email" name="email">
						</div>
						<div class="form-group">
							<input class="form-control" placeholder="Password" type="password" name="password">
						</div>
						<p class="text-danger">{{{ Session::get('register_message') }}}</p>
						<div class="pull-right form-group">
							<input class="btn btn-success" type="submit" value="Sign me up!">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
