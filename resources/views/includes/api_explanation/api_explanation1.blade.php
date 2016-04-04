<h3>API use</h3>
<h4>
    {{ env('APP_URL') }}/api/search/<input v-model='general_s' type="text" placeholder="commune or wilaya">
    <button v-on:click='generateQueryGeneralSearch' >Try It</button>

    <p v-if='generalResult' >
     @{{ generalResult }}
    </p>
    <p v-if='general_url' >
        <a href='@{{general_url}}' target="_blank" transition="expand" >@{{general_url}}</a>
    </p>
<h4>

<h4>
    {{ env('APP_URL') }}/api/wilaya/<input v-model='wilaya_s' type="text" placeholder="wilaya">
    <button v-on:click='generateQueryWilayaSearch' >Try It</button>
    <p v-if='wilayaResult' >
        @{{wilayaResult}}
    </p>

    <p v-if='wilaya_url' >
        <a href='@{{wilaya_url}}' target="_blank" transition="expand" >@{{wilaya_url}}</a>
    </p>
<h4>

<h4>
    {{ env('APP_URL') }}/api/commune/<input v-model='commune_s' type="text" v-model="generalSearchedUrl" placeholder="commune"><button v-on:click='generateQueryCommuneSearch' >Try It</button>
    <p v-if='communeResult' >
        @{{communeResult}}
    </p>

    <p v-if='commune_url' >
        <a href='@{{commune_url}}' target="_blank" transition="expand" >@{{commune_url}}</a>
    </p>
<h4>