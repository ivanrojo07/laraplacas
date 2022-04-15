<template>
	<div>
		<div class="row encabezado-aseguradoras">
            <div class="col-lg-12 mt-3">
                <h3 class="text-left"> Detalle de Detecciones </h3>
            </div>
        </div>
        <div id="rec" class=" box row" style="display: block; overflow: auto;">
        	<table class="table table-default">
                <thead align="center">
                    <tr>
                        <th class="col-xs-4 headTable text-warning" style="width: 20% !important;">
                            Fecha
                        </th>
                        <th class="col-xs-4 headTable text-warning" style="width: 65% !important;">
                            Ubicación
                        </th>
                        <th class="col-xs-4 headTable text-warning" style="width: 15% !important;">
                            Velocidad(KPH)
                        </th>
                    </tr>
                </thead>
    			<tbody>
                    <!-- SISTEMA 0 -->
                    <tr :class="registro.velocidad >= 81 ? 'text-warning' : 'text-white'" v-if="registros.sistema_0.result.length > 0" v-for="registro in registros.sistema_0.result">
                        <td>{{ registro.date+" "+registro.time }}</td>
                        <td>Circuito Interior (Av. Rio Churubusco) y Ex Hacienda de Guadalupe</td>
                        <td>{{ parseFloat(registro.velocidad).toFixed(2) }} Km/h</td>
                    </tr>
                    <!-- SISTEMA 1 -->
                    <tr :class="registro.velocidad >= 81 ? 'text-warning' : 'text-white'" v-if="registros.sistema_1.result.length > 0" v-for="registro in registros.sistema_1.result">
                        <td>{{ registro.date+" "+registro.time }}</td>
                        <td>Circuito Interior (Av. Rio Churubusco) y Ex Hacienda de Guadalupe</td>
                        <td>{{ parseFloat(registro.velocidad).toFixed(2) }} Km/h</td>
                    </tr>
                    <!-- SISTEMA 11 -->
                    <tr :class="registro.velocidad >= 81 ? 'text-warning' : 'text-white'" v-if="registros.sistema_11.result.length > 0" v-for="registro in registros.sistema_11.result">
                        <td>{{ registro.date+" "+registro.time }}</td>
                        <td>Viaducto Miguel Alemán  y Av. Patriotismo</td>
                        <td>{{ parseFloat(registro.velocidad).toFixed(2) }} Km/h</td>
                    </tr>
                    <!-- SISTEMA 13 -->
                    <tr :class="registro.velocidad >= 81 ? 'text-warning' : 'text-white'" v-if="registros.sistema_13.result.length > 0" v-for="registro in registros.sistema_13.result">
                        <td>{{ registro.date+" "+registro.time }}</td>
                        <td>Circuito Interior Oriente (Av. Rio Consulado) y Tanger</td>
                        <td>{{ parseFloat(registro.velocidad).toFixed(2) }} Km/h</td>
                    </tr>
                    <!-- SISTEMA 14 -->
                    <tr :class="registro.velocidad >= 81 ? 'text-warning' : 'text-white'" v-if="registros.sistema_14.result.length > 0" v-for="registro in registros.sistema_14.result">
                        <td>{{ registro.date+" "+registro.time }}</td>
                        <td>Insurgentes Sur (Ciudad Universitaria)</td>
                        <td>{{ parseFloat(registro.velocidad).toFixed(2) }} Km/h</td>
                    </tr>
                    <!-- SISTEMA 15 -->
                    <tr :class="registro.velocidad >= 81 ? 'text-warning' : 'text-white'" v-if="registros.sistema_15.result.length > 0" v-for="registro in registros.sistema_15.result">
                        <td>{{ registro.date+" "+registro.time }}</td>
                        <td>Circuito Interior Poniente (Av. Rio Consulado) y Chelines</td>
                        <td>{{ parseFloat(registro.velocidad).toFixed(2) }} Km/h</td>
                    </tr>
                    <!-- SISTEMA 16 -->
                    <tr :class="registro.velocidad >= 81 ? 'text-warning' : 'text-white'" v-if="registros.sistema_16.result.length > 0" v-for="registro in registros.sistema_16.result">
                        <td>{{ registro.date+" "+registro.time }}</td>
                        <td>Av. Tlalpan Sur y Museo (Xotepingo)</td>
                        <td>{{ parseFloat(registro.velocidad).toFixed(2) }} Km/h</td>
                    </tr>
                    <!-- SISTEMA 17 -->
                    <tr :class="registro.velocidad >= 81 ? 'text-warning' : 'text-white'" v-if="registros.sistema_17.result.length > 0" v-for="registro in registros.sistema_17.result">
                        <td>{{ registro.date+" "+registro.time }}</td>
                        <td>Av. Tlalpan Norte y  Xotepingo</td>
                        <td>{{ parseFloat(registro.velocidad).toFixed(2) }} Km/h</td>
                    </tr>
                    <!-- SISTEMA 18 -->
                    <tr :class="registro.velocidad >= 81 ? 'text-warning' : 'text-white'" v-if="registros.sistema_18.result.length > 0" v-for="registro in registros.sistema_18.result">
                        <td>{{ registro.date+" "+registro.time }}</td>
                        <td>Av. Tlalpan Norte y Los Atletas (General Anaya)</td>
                        <td>{{ parseFloat(registro.velocidad).toFixed(2) }} Km/h</td>
                    </tr>
                    <!-- SISTEMA 19 -->
                    <tr :class="registro.velocidad >= 81 ? 'text-warning' : 'text-white'" v-if="registros.sistema_19.result.length > 0" v-for="registro in registros.sistema_19.result">
                        <td>{{ registro.date+" "+registro.time }}</td>
                        <td>Viaducto Miguel Alemán  y Dr. Andrade</td>
                        <td>{{ parseFloat(registro.velocidad).toFixed(2) }} Km/h</td>
                    </tr>
                    <!-- SISTEMA 21 -->
                    <tr :class="registro.velocidad >= 81 ? 'text-warning' : 'text-white'" v-if="registros.sistema_21.result.length > 0" v-for="registro in registros.sistema_21.result">
                        <td>{{ registro.date+" "+registro.time }}</td>
                        <td>Viaducto Rio de la Piedad  y Eje 3 (Azúcar)</td>
                        <td>{{ parseFloat(registro.velocidad).toFixed(2) }} Km/h</td>
                    </tr>
                    <!-- SISTEMA 22 -->
                    <tr :class="registro.velocidad >= 81 ? 'text-warning' : 'text-white'" v-if="registros.sistema_22.result.length > 0" v-for="registro in registros.sistema_22.result">
                        <td>{{ registro.date+" "+registro.time }}</td>
                        <td>Av. Tlalpan Sur y Dakota</td>
                        <td>{{ parseFloat(registro.velocidad).toFixed(2) }} Km/h</td>
                    </tr>
                    <!-- SISTEMA 43 -->
                    <tr :class="registro.velocidad >= 81 ? 'text-warning' : 'text-white'" v-if="registros.sistema_43.result.length > 0" v-for="registro in registros.sistema_43.result">
                        <td>{{ registro.date+" "+registro.time }}</td>
                        <td>Periférico Sur  y Las Flores</td>
                        <td>{{ parseFloat(registro.velocidad).toFixed(2) }} Km/h</td>
                    </tr>
                    <!-- SISTEMA 44 -->
                    <tr :class="registro.velocidad >= 81 ? 'text-warning' : 'text-white'" v-if="registros.sistema_44.result.length > 0" v-for="registro in registros.sistema_44.result">
                        <td>{{ registro.date+" "+registro.time }}</td>
                        <td>Periferico Norte y Las Flores</td>
                        <td>{{ parseFloat(registro.velocidad).toFixed(2) }} Km/h</td>
                    </tr>
    			</tbody>
    		</table>
        </div>
	</div>
</template>
<style scoped>
    
</style>
<script>
    export default{
        data(){
            return {
                registros: {
                    sistema_0:{result:[]},
                    sistema_1:{result:[]},
                    sistema_11:{result:[]},
                    sistema_13:{result:[]},
                    sistema_14:{result:[]},
                    sistema_15:{result:[]},
                    sistema_16:{result:[]},
                    sistema_17:{result:[]},
                    sistema_18:{result:[]},
                    sistema_19:{result:[]},
                    sistema_21:{result:[]},
                    sistema_22:{result:[]},
                    sistema_43:{result:[]},
                    sistema_44:{result:[]},
                }
            }
        },
        methods: {
            setHistorial(res){
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
            _.debounce(()=>alert('detecciones component mounted'),500);
        }
    }
</script>