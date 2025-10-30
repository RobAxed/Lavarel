<!DOCTYPE html>
<html>
<head>
    <title>APS Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@yield('content')

</body>
</html>
