<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">
<head>

    <meta charset="utf-8" />
    <title>@yield('title','Multimedia Artworks')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description" />
    <meta content="Multimedia Artworks" name="author" />  
    <!-- Bootstrap Css --> 
    <style>
        td:nth-child(odd){ font-weight: 900; width: 20% }
        table{ border-collapse: collapse; width: 100%; }
        table td{ border: 1px solid #CCC; padding: 5px; width: 25% }
    </style>
</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">
        <div class="container">
            @foreach ($components as $comp) 
                <x-pdf :id="$comp->id"></x-pdf> 
            @endforeach
        </div>
</div> 
</body>
</html>