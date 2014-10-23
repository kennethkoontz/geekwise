@extends('master')
@section('content')
<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <a class="navbar-brand" href="#">Lo0Tz</a>
	      <a class="navbar-text pull-right" href="/logout">logout</a>
	    </div>
	</div>

</nav>
<div style="margin-top: 100px" class="container-fluid">
	<div class="row">
		<div class="col-md-3">
			<form method="POST" action="/messages">
				<div class="form-group">
					<textarea class="form-control" rows="3" name="message"></textarea>
				</div>
				<div class="form-group">
					<input class="pull-right btn btn-primary" type="submit" value="Create Message">
				</div>
			</form>
		</div>
		<div class="col-md-9">
			@foreach ($messages as $message)
				<div class="media">
					<a class="pull-left" href="#">
						<img class="media-object" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI2NCIgaGVpZ2h0PSI2NCI+PHJlY3Qgd2lkdGg9IjY0IiBoZWlnaHQ9IjY0IiBmaWxsPSIjZWVlIi8+PHRleHQgdGV4dC1hbmNob3I9Im1pZGRsZSIgeD0iMzIiIHk9IjMyIiBzdHlsZT0iZmlsbDojYWFhO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjEycHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+NjR4NjQ8L3RleHQ+PC9zdmc+"alt="...">
					</a>
					<div class="media-body">
						<h4 class="media-heading">{{ $message->full_name }}</h4>
						{{ $message->body; }}
						foo
					</div>
				</div>
			@endforeach
		</div>
	</div>
</div>
@stop