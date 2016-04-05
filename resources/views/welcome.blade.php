<!DOCTYPE html>
<html >
    <head>
        <title>Laravel</title>
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <script src="{{ asset('js/vue.min.js') }}" ></script>
        <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
        
        <link rel="stylesheet" href="{{ elixir('css/token.css') }}">
    </head>
    <body  >
        <div class='bgImage' >
            <img src='{{ asset("images/background.jpg") }}' style='' />
            </div>
        <div class="container">
            <div class="content">

            <script>
                window.wilayaat_list = {!! $wilaya !!};
            </script>

            <div id='wilaya_menus' >
                <select name="parent" class="form-control" v-model="selected_wilaya" 
                v-on:change="wilayaChange" required>
                    <option v-for="wilaya in wilayaat" value="@{{ wilaya.nom }}">
                        @{{ wilaya.nom }}
                    </option>
                </select>
                <br/>
                <br/>

                <select name="parent" class="form-control" v-model="selected_commune.nom" 
                v-on:change="communeChange" required >
                    <option v-for="commune in communes" value="@{{ commune.nom }}" >
                        @{{ commune.nom }} - @{{ commune.code_postal }}
                    </option>
                </select>
                <br/>
                <br/>
                
                <p v-if="selected_commune.nom" >code postal : @{{ selected_commune.code_postal }}</p>

                <input type="text" v-on:keyup="searchCommune" v-model="searchedCommune" placeholder="find commune">
                <br/>
                <ul id='search_list' v-if="communeListDisplay.length > 0" transition="stagger" stagger="100">
                    <li v-for="item in communeListDisplay" class="@{{item.type}}_colors" v-on:click="getItem( item )" >
                        @{{ item.nom }}
                    </li>
                </ul>

                <br/>
                <div style='background-color: white;padding: 20px'>
                    @include('includes/text_explanation')
                </div>
                <br/>
                <br/>
                <p>Abdel Hakim <a href='http://www.bensialih.co.uk' >Bensiali</a></p>
                <p><a href='https://github.com/bensialih/algeria_restful' >github repo</a></p>
                    <script src="{{ elixir('js/app.js') }}"></script>
            </div>
            </div>
                @include('includes/bottom_images')
                <p>Images by <a href='https://twitter.com/Sakhreddine' >Sakhreddine</a></p>
        </div>
    </body>
</html>
