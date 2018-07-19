<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>{{setting('site.title')}}</title>
		<meta name="description" content="{{setting('site.description')}}">
		<meta name="keywords" content="{{setting('site.keywords')}}">
		<meta name="author" content="Klola Dev">
		<link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">
		<link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
		<link href="{{asset('css/404.css')}}" rel="stylesheet">
	</head>
	<body>
		<audio controls autoplay loop hidden="hidden">
		<source src="http://s0.vocaroo.com/media/download_temp/Vocaroo_s0Jz5C4gpgE0.mp3" type="audio/ogg">
		</audio>
		<div class="container" style="margin-top:5%">
			<div class="row justify-content-around">
				<div class="col-md-3">
						<span class="dracula">
							<div class="con"></div>
						</span>
				</div>
				<div class="col-md-8">
					<div  class="error">
						<p class="p">404</p>
						<div class="page-ms">
							<p class="page-msg"> Oops, the page you're looking for not found </p>
							<button class="go-back"  onclick="goBack()">Go Back</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
	<script>
		function goBack() {
		    window.history.back();
		}
	</script>
</html>
