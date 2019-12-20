window.onload = function() {
	window.csrf_token = "{{ csrf_token() }}";
              axios.get(rutaApp+"dashboard",{
                headers:{
                  'X-Requested-With': 'XMLHttpRequest',
                  'X-CSRF-TOKEN': window.csrf_token
                },
                data:{
                  /*select_incidente: this.select_incidente,
                  select_estado: this.select_estado,
                  idincidente:this.select_incidente,
                  idestado:this.select_estado,*/
                }
              }).then((response) =>{
                  console.log(response.data);
                  respuesta = response.data;
                  var obtincidentes='{!! $dts !!}';
			        var arr_incidetes=JSON.parse(obtincidentes);

			        var obtestados='{!! $edos !!}';
			        var arr_estados=JSON.parse(obtestados);
			        
			        var obtloc='{!! $archivo !!}';
			        var arr_loc=JSON.parse(obtloc);
                  //this.descripcion = respuesta.archivo;
                 /* this.archivo = respuesta.archivo;
                  this.fechaH = respuesta.fechaH;
                  this.horaAct = respuesta.horaAct;
                  this.nomincidente = respuesta.nomincidente;
                  this.nomedo = respuesta.nomedo;
                  this.prefijoedo = respuesta.prefijoedo;
                  this.id_usuario = respuesta.id_usuario;
                  this.clave = respuesta.clave[0].clave;
                  this.options_localidades = respuesta.archivo;
                  dibujarEstado();*/
                  
                },(error) =>{
                console.log("error");
              })
};


function dibujarEstado(){
        var data = {
        "type": "FeatureCollection",
            "features": [{
            "type": "Feature",
                "properties": {
                "fillColor": "blue"
            },
                "geometry": {
                "type": "Polygon",
                "coordinates": [
                    [
                        [-73.98779153823898, 40.718233223261],
                        [-74.004946447098, 40.723575517498],
                        [-74.006771211624, 40.730592217474],
                        [-73.99010896682698, 40.746712376146],
                        [-73.973135948181, 40.73974615047701],
                        [-73.975120782852, 40.736128627654],
                        [-73.973997695541, 40.730787341083],
                        [-73.983317613602, 40.716639396436],
                        [-73.98779153823898, 40.718233223261]
                    ]
                ]
            }
        }, {
            "type": "Feature",
                "properties": {
                "fillColor": "red"
            },
                "geometry": {
                "type": "MultiPolygon",
                "coordinates": [
    [
      [
        [
          -104.219999999999999,
          19.07
        ],
        [
          -104.240000000000009,
          19.129999999999999
        ],
        [
          -104.269999999999996,
          19.16
        ],
        [
          -104.340000000000003,
          19.190000000000001
        ],
        [
          -104.260000000000005,
          19.219999999999999
        ],
        [
          -104.180000000000007,
          19.210000000000001
        ],
        [
          -104.060000000000002,
          19.260000000000002
        ],
        [
          -104.010000000000005,
          19.390000000000001
        ],
        [
          -103.900000000000006,
          19.350000000000001
        ],
        [
          -103.879999999999995,
          19.359999999999999
        ],
        [
          -103.840000000000003,
          19.330000000000002
        ],
        [
          -103.799999999999997,
          19.330000000000002
        ],
        [
          -103.650000000000006,
          19.400000000000002
        ],
        [
          -103.650000000000006,
          19.370000000000001
        ],
        [
          -103.590000000000003,
          19.309999999999999
        ],
        [
          -103.600000000000009,
          19.219999999999999
        ],
        [
          -103.590000000000003,
          19.150000000000002
        ],
        [
          -103.609999999999999,
          19.07
        ],
        [
          -103.579999999999998,
          19
        ],
        [
          -103.600000000000009,
          18.969999999999999
        ],
        [
          -103.650000000000006,
          18.969999999999999
        ],
        [
          -103.700000000000003,
          18.93
        ],
        [
          -103.719999999999999,
          18.84
        ],
        [
          -103.75,
          18.809999999999999
        ],
        [
          -103.879999999999995,
          18.890000000000001
        ],
        [
          -103.930000000000007,
          18.940000000000001
        ],
        [
          -104.030000000000001,
          18.98
        ],
        [
          -104.079999999999998,
          19.02
        ],
        [
          -104.219999999999999,
          19.07
        ]
      ]
    ]
  ]

            }
        }]
    };
    map.data.addGeoJson(data);
     map.data.setStyle(function (feature) {
        var color = feature.getProperty('fillColor');
        return {
            fillColor: color,
            strokeWeight: 5
        };
    });
    
    map.setCenter({lat:24.448319, lng:-107.092817});
    map.setZoom(6);

      }


      /*function initMap() {
         map = new google.maps.Map(document.getElementById('map'), {
            zoom: 4,
            center: {
            lat: 23.877435178885975,
            lng: -102.62050005000003
          },
          mapTypeId: 'satellite'
        });
       
        ////////////////
        var input = document.getElementById('autocomplete');
      var autocomplete = new google.maps.places.Autocomplete(input,{types: ['geocode']});
      google.maps.event.addListener(autocomplete, 'place_changed', function(){
         var place = autocomplete.getPlace();
        var geocoder = new google.maps.Geocoder();
        geocodeAddress(geocoder, map);

      })
       
      }*/
      function ubicarIncidente() {
        //document.getElementById('latitud').value=lat;
        //document.getElementById('longitud').value=long;
        var coordenads= document.getElementById("coordenadas").value;
        console.log(coordenads);
        var rescord=JSON.parse(coordenads);
        var la= document.getElementById("latitud").value;
        console.log("latitudddddd",la);
        var lo= document.getElementById("longitud").value;
        console.log("longituddddddd",lo);
          var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 17,
            center: rescord,
            mapTypeId: 'satellite'
        });
        //alert("Arrastre el icono para determinar la ubicacion del incidente");
        marker = new google.maps.Marker({
          map: map,
          draggable: true,
          animation: google.maps.Animation.DROP,
          position: rescord
        });
        marker.addListener('mouseup', toggleBounce);
      }

        var obtincidentes='{!! $dts !!}';
        var arr_incidetes=JSON.parse(obtincidentes);

        var obtestados='{!! $edos !!}';
        var arr_estados=JSON.parse(obtestados);
        
        var obtloc='{!! $archivo !!}';
        var arr_loc=JSON.parse(obtloc);

Vue.component('modal', {
  template: '#modal-template'
})

        var app = new Vue({
          el: '#app-formulario',
          components: {
            Multiselect: VueMultiselect.default,

          },
          data: {
          	map:null,
//******* Variables para cargar el incidente y estado ******//
            select_incidente: null,
            select_estado: null,
            select_localidad: null,
            options_incidentes:arr_incidetes,
            options_estados: arr_estados,
            options_localidades: arr_loc,
            id_usuario:null,
            clave:null,
            nomincidente:null,
            nomedo:null,
            prefijoedo:null,
            fechaH:null,
            horaAct:null,
            archivo:null,
//******* Variables para el registro de un nuevo incidente ******//
            descripcion:null,
            lugaresafectados:null,
            coordenadas:null,
            latitud:null,
            longitud:null,
            otro:null,
            fecharegistro:null,
            fechaocurrencia:null,
            horaregistro:null,
            horaocurrencia:null,
            personasafectadas:null,
            personasevacuadas:null,
            personasdesaparecidas:null,
            personaslesionadas:null,
            personasfallecidas:null,
            danoscolaterales : null ,

            infraestructuraafectada : null,
            afectacionvial : null,
            respuestainstitucional:null,
            idinc:null,
            prefijoestado:null,
            radioNivelImpacto:null,
            tiposeguimiento:null,
            status:null,
            //id_usuario:null,

            medidascontrol : null,
            dependencia : null,
            nombretrabdep : null,
            cargotrabdep : null,




            showModal: false,


            //latitud:null,
            //longitud:null,





          },
          methods: {
            incidenteSelected (incidente) {
                this.select_incidente = incidente;
            },
             estadoSelected (estado) {
          this.select_estado = estado
            },
            estadoLocalidad (localidad) {
          this.select_localidad = localidad;
        },
            customLabel (lugaresafectados) {
               // this.latitud = lugaresafectados.lat;
                //this.longitud = lugaresafectados.lon;
      return `${lugaresafectados.edo} - ${lugaresafectados.mun} - ${lugaresafectados.loc}`
    },
    initMap:function(){
    	this.map = new google.maps.Map(document.getElementById('map'), {
            zoom: 4,
            center: {
            lat: 23.877435178885975,
            lng: -102.62050005000003
          },
          mapTypeId: 'satellite'
        });
    },
    coordenadasMultiselect:function(){
        var lugaresafectados = this.select_localidad[0];
        var lugaresafectadosJSON = JSON.stringify(lugaresafectados);
        this.lugaresafectados = "["+lugaresafectadosJSON+"]";
        this.latitud = parseFloat(lugaresafectados.lat);
        this.longitud = parseFloat(lugaresafectados.lon);
        var coordenadas = '{"lat":'+this.longitud+', "lng":'+this.latitud+'}';
        this.coordenadas = JSON.parse(coordenadas);
        console.log(coordenadas);
        console.log(this.latitud);
        console.log(this.coordenadas);
        //ubicarIncidente();
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 17,
            center: this.coordenadas,
            mapTypeId: 'satellite'
        });
        //alert("Arrastre el icono para determinar la ubicacion del incidente");
        marker = new google.maps.Marker({
          map: map,
          draggable: true,
          animation: google.maps.Animation.DROP,
          position: this.coordenadas
        });
        //marker.addListener('mouseup', toggleBounce);
    },
           registrar: function() {

                      //console.log("hola en  vue"+data);
                      window.csrf_token = "{{ csrf_token() }}";
                      axios.post(rutaApp+"registroincidente",{
                        headers:{
                          'X-Requested-With': 'XMLHttpRequest',
                          'X-CSRF-TOKEN': window.csrf_token
                        },
                        data:{
                          id_usuario : parseInt(document.getElementById('id_usuario').value),
                          clave : this.clave,
                          nomincidente : "Accidente de aeronave con lesionado",
                          descripcion : this.descripcion,
                          nombreestado : this.nomedo,
                          prefijoestado : this.prefijoedo,
                          lugaresafectados : this.lugaresafectados,
                         // flexdatalist_lugaresafectados : null,
                          otro : document.getElementById('otro').value,
                          latitud : document.getElementById('latitud').value,
                          longitud : document.getElementById('longitud').value,
                          fechaocurrencia : this.fechaH,
                          fecharegistro : this.fechaH,
                          horaocurrencia : this.horaAct,
                          horaregistro : this.horaAct,
                          afectacionvial : this.afectacionvial,
                          infraestructuraafectada : this.infraestructuraafectada,
                          danoscolaterales : this.danoscolaterales,
                          status : document.getElementById('status_incidente').value,
                          tiposeguimiento : parseInt(document.getElementById('tiposeguimiento').value),
                          radioNivelImpacto : parseInt(document.querySelector('input[name="radioNivelImpacto"]:checked').value),
                          medidascontrol : this.medidascontrol,
                          personasafectadas : this.personasafectadas,
                          personaslesionadas : this.personasfallecidas,
                          personasfallecidas : this.personasfallecidas,
                          personasdesaparecidas : this.personasdesaparecidas,
                          personasevacuadas : this.personasevacuadas,
                          dependencia : this.dependencia,
                          nombretrabdep : this.nombretrabdep,
                          cargotrabdep : this.cargotrabdep,
                        }
                      }).then((response) =>{
                          console.log(response.data);
                          this.showModal = true;
                          this.archivo = null;
                          this.fechaH = null;
                          this.horaAct = null;
                          this.nomincidente = null;
                          this.nomedo = null;
                          this.prefijoedo = null;
                          this.id_usuario = null;
                          this.clave = null;   
                          
                        this.descripcion=null;
                        //document.getElementById('lugaresafectados').value = "";
                        this.coordenadas=null;
                        document.getElementById('latitud').value = null;
                        document.getElementById('longitud').value = null;
                        document.getElementById('otro').value = null;
                        this.fecharegistro=null;
                        this.fechaocurrencia = null;
                        this.horaregistro = null;
                        this.horaocurrencia = null;
                        this.personasafectadas = null;
                        this.personasevacuadas = null;
                        this.personasdesaparecidas = null;
                        this.personaslesionadas = null;
                        this.personasfallecidas = null;
                        this.danoscolaterales = null ;

                        this.infraestructuraafectada = null;
                        this.afectacionvial = null;
                        this.respuestainstitucional = null;
                        this.idinc = null;
                        this.prefijoestado = null;
                        this.radioNivelImpacto = null;
                        this.tiposeguimiento = null;
                        this.status = null;
                        //id_usuario: null;

                        this.medidascontrol = null;
                        this.dependencia = null;
                        this.nombretrabdep = null;
                        this.cargotrabdep = null;




                        },(error) =>{
                        console.log("error");
                      })
        

    },
    vistaregistroincidente: function(){
        if(this.select_incidente == null  || this.select_estado == null){
            document.getElementById("alerta").innerHTML = "Error: Selecciona el incidente y el estado !";
        }else{

            document.getElementById("alerta").innerHTML = "";

                window.csrf_token = "{{ csrf_token() }}";
              axios.post(rutaApp+"nuevoincidente",{
                headers:{
                  'X-Requested-With': 'XMLHttpRequest',
                  'X-CSRF-TOKEN': window.csrf_token
                },
                data:{
                  select_incidente: this.select_incidente,
                  select_estado: this.select_estado,
                  idincidente:this.select_incidente,
                  idestado:this.select_estado,
                }
              }).then((response) =>{
                  console.log(response.data);
                  respuesta = response.data;
                  //this.descripcion = respuesta.archivo;
                  this.archivo = respuesta.archivo;
                  this.fechaH = respuesta.fechaH;
                  this.horaAct = respuesta.horaAct;
                  this.nomincidente = respuesta.nomincidente;
                  this.nomedo = respuesta.nomedo;
                  this.prefijoedo = respuesta.prefijoedo;
                  this.id_usuario = respuesta.id_usuario;
                  this.clave = respuesta.clave[0].clave;
                  this.options_localidades = respuesta.archivo;
                  dibujarEstado();
                  
                },(error) =>{
                console.log("error");
              })

        }

    }
      },
        })