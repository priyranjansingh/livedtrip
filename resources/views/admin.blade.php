<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin</title>

<link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet"  type="text/css"  href="{{ asset('css/chosen.css') }}" />
<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" />


<script src="{{ asset('/js/jquery-1.10.2.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/chosen.jquery.js') }}"></script>
<script src="{{ asset('js/jquery.validation.js') }}"></script>
<script src="{{ asset('js/custom.js') }}" type="text/javascript"></script>
</head>

<body>
@yield('content')
</body>
</html>
