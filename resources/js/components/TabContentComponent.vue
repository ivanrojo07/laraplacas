<template>
	<div>
		<historial-component class="w-100" v-show="tab == 'velocidad'"></historial-component>
		<exceso-component class="w-100" v-show="tab == 'exceso'"></exceso-component>
		<robo-component class="w-100" v-show="tab == 'robado'"></robo-component>
		<detecciones-component class="w-100" v-show="tab == 'detecciones'"></detecciones-component>
	</div>
</template>
<script>
	export default{
		data(){
			return {
				tab : 'velocidad'
			}
		},
		mounted(){
			this.$root.$on('set-tab',(item)=>{
				console.log(item);
				this.tab = item;
			})
		}

	} 
</script>