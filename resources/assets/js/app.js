var Vue = require('vue');
window.Vue = Vue;

Vue.use(require('vue-resource'));

var main = new Vue({
		el: '#wilaya_menus',
          data: {
            greetings: 'assalamo allaikum',
            wilayaat: window.wilayaat_list,
            selected_wilaya: '',
            selected_commune: {'id':'', 'nom':'', 'code_postal': ''},
            communes: [],
            communeResults: [],
            searchedCommune: '',
            communeListDisplay: [],
            introduction: false,
            generalResult: '',
            wilayaResult:'',
            communeResult:'',
            general_s: '',
            wilaya_s: '',
            commune_s: '',

            general_url:'',
            wilaya_url:'',
            commune_url:'',
          },

        methods: {
            wilayaChange: function() {
                this.$http.get('/api/wilaya/' + this.selected_wilaya , function(data, status, request){
                    if(status == 200){
                        this.wilayaat[data.wilaya.id].communes = data.wilaya.communes;
                        this.communes = data.wilaya.communes;
                    }
                });
            },
            communeChange: function() {
                for (var i = this.communes.length - 1; i >= 0; i--) {
                    if(this.communes[i].nom == this.selected_commune.nom) {
                        this.selected_commune.nom           = this.communes[i].nom;
                        this.selected_commune.id            = this.communes[i].id;
                        this.selected_commune.code_postal   = this.communes[i].code_postal;
                        break;
                    }
                };
            },
            toggleIntro: function() {
                this.introduction = (!this.introduction);
            },
            generateQueryGeneralSearch: function(){
                this.$http.get('/api/search/' + this.general_s , function(data, status, request){
                    if(status == 200){
                        this.generalResult      = JSON.stringify(data);
                    }
                    });
                this.general_url = '/api/search/' + this.general_s;
            },
            generateQueryWilayaSearch: function(){
                this.$http.get('/api/wilaya/' + this.wilaya_s , function(data, status, request){
                    if(status == 200){
                        this.wilayaResult       = JSON.stringify(data);
                    }
                    });
                this.wilaya_url = '/api/wilaya/' + this.wilaya_s;
            },
            generateQueryCommuneSearch: function(){
                this.$http.get('/api/commune/' + this.commune_s , function(data, status, request){
                    if(status == 200){
                        this.communeResult      = JSON.stringify(data);
                    }
                    });
                this.commune_url = '/api/commune/' + this.commune_s;
            },
            searchCommune: function(){
                if( this.searchedCommune.length > 2 )
                {
                    this.$http.get('/api/search/' + this.searchedCommune , function(data, status, request){
                    if(status == 200){
                        this.communeListDisplay      = data;
                    }
                    });
                }
            },
            getItem: function(item){
                if(item.type == 'wilaya') {
                    this.selected_wilaya        = item.nom;
                    this.wilayaChange();

                    this.selected_commune.nom           = '';
                    this.selected_commune.id            = '';
                    this.selected_commune.code_postal   = '';
                }
                else if (item.type == 'commune') {
                    this.selected_wilaya = item.parent;
                    this.wilayaChange();

                    this.selected_commune.nom           = item.nom;
                    this.selected_commune.id            = item.id;
                    this.selected_commune.code_postal   = item.code;
                }
            }
        }
	});
