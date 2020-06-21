<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script>
        var siteUrl = '{!! url("/") !!}';
     
    </script>
    <style>
        #chat-container {
            width: 60%;
            margin: 0 auto;
        }

        #chat-window {
            width: 100%;
            min-height: 200px;
            border: 1px dotted black;
        }
    </style>




 
</head>

<body class=" pace-done">
    <div id="app">

        <div id="container" class="effect aside-float aside-bright mainnav-lg" >
                 <div id="content-container" class="overlay-container"> 
                     <router-view></router-view> 
                </div>


        </div>
    </div>

    
    <script src="{{ url('/js/app.js')}}"></script>



</body>
</html>
