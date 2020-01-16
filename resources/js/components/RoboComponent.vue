<template>
	<div>
		<div class="row encabezado-aseguradoras">
                <div class="col-lg-12 mt-3">
                    <h3 class="text-left"> Reporte de Robo </h3>
                </div>
        </div>
        <div id="rec" class=" box row">
            <div v-if="!(Object.keys(robo_details).length === 0 )" class="alert alert-danger w-100" role="alert">
                <h1> Este vehículo cuenta con reporte de robo</h1>
            </div>
        	<table class="table table-default">
      			<thead align="center">
      				<tr>
      					<th class="col-xs-3 headTable text-warning">
      						Reportó
      					</th>
      					<th class="col-xs-3 headTable text-warning">
      						Fecha de averiguación
      					</th>
      					<th class="col-xs-3 headTable text-warning">
      						Fecha de robo
      					</th>
      				</tr>
      			</thead>
      			<tbody>
      				<tr class="text-white">
      					<td>{{robo_details.entidad}}</td>
      					<td>{{robo_details.fecha_averiguacion}}</td>
      					<td>{{robo_details.fecha_robo}}</td>
      				</tr>
      			</tbody>
      		</table>
        </div>
	</div>
</template>
<script>
    export default{
        data(){
            return{
                robo_details: Object
            }
        },
        methods:{
            setRobo(res){
                this.robo_details = res
                console.log(this.robo_details);
            }
        },
        props:{
            response: Object
        },
        watch:{
            'response':function(newValue,oldValue){
                this.setRobo(newValue);
            }
        },
        mounted(){
            console.log('robo component cargado');
        }
    }
</script>