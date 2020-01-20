<template>
	<div>
		<div class="row encabezado-aseguradoras">
            <div class="col-lg-12 mt-3">
                <h3 class="text-left"> Detalle de Detecciones </h3>
            </div>
        </div>
        <div id="rec" class=" box row">
        	<table class="table table-default">
    			<thead align="center">
    				<tr>
    					<th class="col-xs-3 headTable text-warning">
    						Fecha
    					</th>
    					<th class="col-xs-3 headTable text-warning">
    						Ubicación
    					</th>
    					<th class="col-xs-3 headTable text-warning">
    						Velocidad(KPH)
    					</th>
    				</tr>
    			</thead>
    			<tbody>
                    <!-- SISTEMA 0 -->
                    <tr :class="registro.Velocidad >= 81 ? 'text-warning' : 'text-white'" v-if="registros.sistema_0.result.length > 0" v-for="registro in registros.sistema_0.result">
                        <td>{{ registro.date+" "+registro.hora }}</td>
                        <td>Circuito Interior (Av. Rio Churubusco) y Ex Hacienda de Guadalupe</td>
                        <td>{{registro.Velocidad.toFixed(2)}} Km/h</td>
                    </tr>
                    <tr :class="registro.Velocidad >= 81 ? 'text-warning' : 'text-white'" v-if="registros.sistema_1.result.length > 0" v-for="registro in registros.sistema_1.result">
                        <td>{{ registro.date+" "+registro.hora }}</td>
                        <td>Circuito Interior (Av. Rio Churubusco) y Ex Hacienda de Guadalupe</td>
                        <td>{{registro.Velocidad.toFixed(2)}} Km/h</td>
                    </tr>
                    <tr :class="registro.velocidad.velocidad >= 81 ? 'text-warning' : 'text-white'" v-if="registros.sistema_11.result.length > 0" v-for="registro in registros.sistema_11.result">
                        <td>{{ registro.velocidad.date+" "+registro.velocidad.hora }}</td>
                        <td>Viaducto Miguel Alemán  y Av. Patriotismo</td>
                        <td>{{registro.velocidad.velocidad.toFixed(2)}} Km/h</td>
                    </tr>
                    <tr :class="registro.velocidad.velocidad >= 81 ? 'text-warning' : 'text-white'" v-if="registros.sistema_13.result.length > 0" v-for="registro in registros.sistema_13.result">
                        <td>{{ registro.velocidad.date+" "+registro.velocidad.hora }}</td>
                        <td>Viaducto Miguel Alemán  y Av. Patriotismo</td>
                        <td>{{registro.velocidad.velocidad.toFixed(2)}} Km/h</td>
                    </tr>
                    <tr :class="registro.velocidad.velocidad >= 81 ? 'text-warning' : 'text-white'" v-if="registros.sistema_14.result.length > 0" v-for="registro in registros.sistema_14.result">
                        <td>{{ registro.velocidad.date+" "+registro.velocidad.hora }}</td>
                        <td>Viaducto Miguel Alemán  y Av. Patriotismo</td>
                        <td>{{registro.velocidad.velocidad.toFixed(2)}} Km/h</td>
                    </tr>
                    <tr :class="registro.velocidad.velocidad >= 81 ? 'text-warning' : 'text-white'" v-if="registros.sistema_15.result.length > 0" v-for="registro in registros.sistema_15.result">
                        <td>{{ registro.velocidad.date+" "+registro.velocidad.hora }}</td>
                        <td>Viaducto Miguel Alemán  y Av. Patriotismo</td>
                        <td>{{registro.velocidad.velocidad.toFixed(2)}} Km/h</td>
                    </tr>
                    <tr :class="registro.velocidad.velocidad >= 81 ? 'text-warning' : 'text-white'" v-if="registros.sistema_16.result.length > 0" v-for="registro in registros.sistema_16.result">
                        <td>{{ registro.velocidad.date+" "+registro.velocidad.hora }}</td>
                        <td>Viaducto Miguel Alemán  y Av. Patriotismo</td>
                        <td>{{registro.velocidad.velocidad.toFixed(2)}} Km/h</td>
                    </tr>
                    <tr :class="registro.velocidad.velocidad >= 81 ? 'text-warning' : 'text-white'" v-if="registros.sistema_17.result.length > 0" v-for="registro in registros.sistema_17.result">
                        <td>{{ registro.velocidad.date+" "+registro.velocidad.hora }}</td>
                        <td>Viaducto Miguel Alemán  y Av. Patriotismo</td>
                        <td>{{registro.velocidad.velocidad.toFixed(2)}} Km/h</td>
                    </tr>
                    <tr :class="registro.velocidad.velocidad >= 81 ? 'text-warning' : 'text-white'" v-if="registros.sistema_18.result.length > 0" v-for="registro in registros.sistema_18.result">
                        <td>{{ registro.velocidad.date+" "+registro.velocidad.hora }}</td>
                        <td>Viaducto Miguel Alemán  y Av. Patriotismo</td>
                        <td>{{registro.velocidad.velocidad.toFixed(2)}} Km/h</td>
                    </tr>
                    <tr :class="registro.velocidad.velocidad >= 81 ? 'text-warning' : 'text-white'" v-if="registros.sistema_19.result.length > 0" v-for="registro in registros.sistema_19.result">
                        <td>{{ registro.velocidad.date+" "+registro.velocidad.hora }}</td>
                        <td>Viaducto Miguel Alemán  y Av. Patriotismo</td>
                        <td>{{registro.velocidad.velocidad.toFixed(2)}} Km/h</td>
                    </tr>
                    <tr :class="registro.velocidad.velocidad >= 81 ? 'text-warning' : 'text-white'" v-if="registros.sistema_21.result.length > 0" v-for="registro in registros.sistema_21.result">
                        <td>{{ registro.velocidad.date+" "+registro.velocidad.hora }}</td>
                        <td>Viaducto Miguel Alemán  y Av. Patriotismo</td>
                        <td>{{registro.velocidad.velocidad.toFixed(2)}} Km/h</td>
                    </tr>
                    <tr :class="registro.velocidad.velocidad >= 81 ? 'text-warning' : 'text-white'" v-if="registros.sistema_22.result.length > 0" v-for="registro in registros.sistema_22.result">
                        <td>{{ registro.velocidad.date+" "+registro.velocidad.hora }}</td>
                        <td>Viaducto Miguel Alemán  y Av. Patriotismo</td>
                        <td>{{registro.velocidad.velocidad.toFixed(2)}} Km/h</td>
                    </tr>
                    <tr :class="registro.velocidad.velocidad >= 81 ? 'text-warning' : 'text-white'" v-if="registros.sistema_43.result.length > 0" v-for="registro in registros.sistema_43.result">
                        <td>{{ registro.velocidad.date+" "+registro.velocidad.hora }}</td>
                        <td>Viaducto Miguel Alemán  y Av. Patriotismo</td>
                        <td>{{registro.velocidad.velocidad.toFixed(2)}} Km/h</td>
                    </tr>
                    <tr :class="registro.velocidad.velocidad >= 81 ? 'text-warning' : 'text-white'" v-if="registros.sistema_44.result.length > 0" v-for="registro in registros.sistema_44.result">
                        <td>{{ registro.velocidad.date+" "+registro.velocidad.hora }}</td>
                        <td>Viaducto Miguel Alemán  y Av. Patriotismo</td>
                        <td>{{registro.velocidad.velocidad.toFixed(2)}} Km/h</td>
                    </tr>
    			</tbody>
    		</table>
        </div>
	</div>
</template>
<style scoped>
    #rec{
        min-height: 80vh; 
        max-height: 80vh;
    }
</style>
<script>
    export default{
        data(){
            return {
                registros: Object
            }
        },
        methods: {
            setHistorial(res){
                console.log('set historial',res);
                this.registros = res;
            }
        },
        props:{
            response: Object
        },
        watch: {
            'response': function(newValue,oldValue){
                this.setHistorial(newValue);
            },

        },
        mounted(){
        }
    }
</script>