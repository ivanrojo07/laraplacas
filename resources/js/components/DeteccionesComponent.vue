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
    				<tr class="text-white" v-for="registro in registros">
    					<td>Hola/td>
    					<td>Mundo</td>
    					<td>Nuevo</td>
    				</tr>
    			</tbody>
    		</table>
        </div>
	</div>
</template>
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
                console.log(this.registros)
            }
        },
        props:{
            response: Object
        },
        watch: {
            'response': function(newValue,oldValue){
                this.setHistorial(newValue);
            }
        },
        mounted(){
        }
    }
</script>