<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="{{ asset('/assets/style.css') }}">
</head>
<body class="content">
	@include('includes.menu')
	@yield('content')
</body>
</html>