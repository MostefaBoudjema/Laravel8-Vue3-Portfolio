<template>
<div class="panel panel-primary" v-cloak>
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-10"><h3 class="panel-title">Portefolio</h3></div>
						<div class="col-md-2 text-right">
							<button class="btn btn-success" v-on:click="openportefolio =true; editportefolioToggle=false">ADD</button>
						</div>
					</div>
					
				</div>
				<div class="panel-body">
					<div v-if="openportefolio">
						<div class="form-group">
							<label for="">Titre</label>
							<input type="text" class="form-control" placeholder="le titre" v-model=portefolio.titre>
						</div>
						<div class="form-group">
							<label for="">Presentation</label>
							<input type="textarea" class="form-control" placeholder="le body" v-model=portefolio.presentation>
						</div>
						<div class="row">

							<button class="btn btn-success btn-block" v-if="!editportefolioToggle" v-on:click="addportefolio">ADD</button>
							<button class="btn btn-warning btn-block" v-if="editportefolioToggle" v-on:click="updateportefolio">Modifier</button>
						</div>

					</div>
					<ul class="list-group">
						<li class="list-group-item" v-for="portefolio in portefolios" :key="portefolio.id">
							<div class="pull-right">
								<button class="btn btn-warning btn-sm" v-on:click="editportefolio(portefolio)" >EDIT</button>
								<button class="btn btn-danger btn-sm" v-on:click="deleteportefolio(portefolio)" >DELETE</button>
							</div>
							<h3>{{portefolio.titre}}</h3>
							<p>{{portefolio.presentation}}</p>
						</li>						
					</ul>
					<div v-if="portefolios.length==0">
						No Portfolios to Display.
					</div>

				</div>
			</div>
</template>

<script>
    export default {
        data() {
		return {
			message: 'Hello Vue! Mus',

			portefolios: [],
			Portefolioid: 0,
			openportefolio: false,
			editportefolioToggle: false,

	
			
			portefolio: {
				id: 0,
				cv_id: window.Laravel.idCV,
				titre: '',
				presentation: ''
			},

		}
	},
	methods: {

		getPortefolio1: function() {
			axios.get(window.Laravel.url + '/getportefolios/' + window.Laravel.idCV)
				.then(response => {
					this.portefolios = response.data;
					console.log('successPortefolio1 => ', response);
				})
				.catch(error => {
					console.log('errorPortefolio1 => ', error);
				})
		},
		addportefolio: function() {
			axios.post(window.Laravel.url + '/addportefolios', this.portefolio)
				.then(response => {
					// this.portefolio = response.data;
					console.log('successaddportefolio => ', response.data);
					if (response.data.etat) {
						// this.openportefolio = false;
						this.portefolio.id = response.data.id;
						this.portefolios.unshift(this.portefolio);
						// this.portefolios.push(this.portefolio);
						this.portefolio = {
							id: 0,
							cv_id: window.Laravel.idCV,
							titre: '',
							presentation: ''
						}
					}
				})
				.catch(error => {
					console.log('erroraddportefolio => ', error);
				})
		},
		editportefolio: function(expParam) {
			this.openportefolio = true;
			this.editportefolioToggle = true;
			this.portefolio = expParam;
		},
		updateportefolio: function() {
			axios.put(window.Laravel.url + '/updateportefolios', this.portefolio)
				.then(response => {
					// this.portefolio = response.data;
					console.log('successupdateportefolio => ', response.data);
					if (response.data.etat) {
						// this.openportefolio = false;
						// this.portefolios.unshift(this.portefolio);
						// this.portefolios.push(this.portefolio);
						this.portefolio = {
							id: 0,
							cv_id: window.Laravel.idCV,
							titre: '',
							presentation: ''
						}
						this.editportefolioToggle = false;
					}
				})
				.catch(error => {
					console.log('errorupdateportefolio => ', error);
				})
		},
		deleteportefolio: function(expParam) {
			Swal.fire({
				title: 'etes vous sur?',
				text: "You won't be able to revert this!",
				icon: 'error',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Oui, DELETE!',
				cancelButtonText: 'Annuler'
			}).then((result) => {
				if (result.isConfirmed) {
					axios.delete(window.Laravel.url + '/deleteportefolios/' + expParam.id)
						.then(response => {
							// this.portefolio = response.data;
							console.log('successdeleteportefolio => ', response.data);
							if (response.data.etat) {
								var pos = this.portefolios.indexOf(expParam);
								this.portefolios.splice(pos, 1);

							}
						})
						.catch(error => {
							console.log('errordeleteportefolio => ', error);
						})
					Swal.fire(
						'DELETE!',
						'portefolio a etes DELETE avec succee.',
						'success'
					)
				}
			})

		}
	},
	mounted: function() {
		this.getPortefolio1();
	}
}
</script>
