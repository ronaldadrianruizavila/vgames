<template>
    <div>
        <div v-for="(dato,index) in datos">
            <div class="card p-1">
                <div class="card-body p-1">
                    <div class="row">
                        <div class="col-md-6">
                            <div v-text="dato.nombre"></div>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end">
                            <input type="button" value="eliminar" v-on:click="eliminar(index)" class="btn btn-sm btn-danger" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
	import axios from 'axios';

	export default {
		props: ['num'],
		mounted: function () {
			this.getData();
		},
		data() {
			return {
				id: null,
				datos: null
			}
		},
		methods: {
			getData: function() {
				axios.get(`/sala/${this.num}/edit`).then(response => {
					this.datos = response.data;
					console.log(this.datos);
				});
            },
			eliminar: function (id) {
				let dato = this.datos[id];
				console.log(dato);
				axios.delete(`/sesion/${dato.id}`).then(response=>{
					this.getData();
                })
			}
		}
	}
</script>