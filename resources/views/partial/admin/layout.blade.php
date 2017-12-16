<html>
    <head>
        <title>TEFF</title>
        <meta charset="UTF-8">

        <link type="text/css" rel="stylesheet" href="{{$path['uploadify']}}css/uploadify.css" />
        <link type="text/css" rel="stylesheet" href="{{$path['css']}}ckeditor.css" />
        <link type="text/css" rel="stylesheet" href="{{$path['css']}}admin.css" />

        <script type="text/javascript" src="{{$path['js']}}jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="{{$path['uploadify']}}js/jquery.uploadify.js"></script>
        <script type="text/javascript" src="{{$path['ckeditor']}}ckeditor.js"></script>
        <script type="text/javascript" src="{{$path['ckfinder']}}ckfinder.js"></script>
    </head>

    <body>
        
        @yield('body')  
    </body>
</html>