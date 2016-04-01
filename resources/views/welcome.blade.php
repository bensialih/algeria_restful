
<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.12/vue.js"></script>

        <link rel="stylesheet" href="{{ elixir('css/token.css') }}">
    </head>
    <body>
        <div class="container">
            <div class="content">
                    <div id="app" >
                        @{{ menu }}
                        <br/>
                        @{{ greetings }}
                        <br/>

                        @{{ arr1 }}
                    </div>

                <script src="{{ elixir('js/app.js') }}"></script>
                <br/>
                <h2 >Algeria: the beautiful</h2>
                <h3>Bismillah</h3>
                <h3>The simple Web Api for getting Communes and Wilayaat in Algeria</h3>
                <h3>This Api is made for dynamic loading for menus. We are currently working 
                    on fleshing out key functions.</h3>
                <h3>Salam</h3>

                

            </div>
        </div>
    </body>
</html>
