<template>
<div class="panel panel-primary" v-cloak>
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-10"><h3 class="panel-title">Formation</h3></div>
						<div class="col-md-2 text-right">
							<button class="btn btn-success" v-on:click="openformation =true; editformationToggle=false">ADD</button>
						</div>
					</div>
					
				</div>
				<div class="panel-body">
					<div v-if="openformation">
						<div class="form-group">
							<label for="">Titre</label>
							<input type="text" class="form-control" placeholder="le titre" v-model=formation.titre>
						</div>
						<div class="form-group">
							<label for="">Presentation</label>
							<input type="textarea" class="form-control" placeholder="le body" v-model=formation.presentation>
						</div>
						<div class="row">

							<button class="btn btn-success btn-block" v-if="!editformationToggle" v-on:click="addformation">ADD</button>
							<button class="btn btn-warning btn-block" v-if="editformationToggle" v-on:click="updateformation">Modifier</button>
						</div>

					</div>
					<ul class="list-group">
						<li class="list-group-item" v-for="formation in formations" :key="formation.id">
							<div class="pull-right">
								<button class="btn btn-warning btn-sm" v-on:click="editformation(formation)" >EDIT</button>
								<button class="btn btn-danger btn-sm" v-on:click="deleteformation(formation)" >DELETE</button>
							</div>
							<h3>{{formation.titre}}</h3>
							<p>{{formation.presentation}}</p>
						</li>						
					</ul>
					<div v-if="formations.length==0">
						No Formations to Display.
					</div>
				</div>
			</div>
</template>

<script>
    export default {
        
	data() {
		return {
			message: 'Hello Vue! Mus',			

			formations: [],
			Formationid: 0,
			openformation: false,
			editformationToggle: false,

			formation: {
				id: 0,
				cv_id: window.Laravel.idCV,
				titre: '',
				presentation: ''
			}			
		}
	},
	methods: {
		getFormation1: function() {
			axios.get(window.Laravel.url + '/getformations/' + window.Laravel.idCV)
				.then(response => {
					this.formations = response.data;
					console.log('successgetFormation1 => ', response);
				})
				.catch(error => {
					console.log('errorgetFormation1 => ', error);
				})
		},
		addformation: function() {
			axios.post(window.Laravel.url + '/addformations', this.formation)
				.then(response => {
					// this.formation = response.data;
					console.log('successaddformation => ', response.data);
					if (response.data.etat) {
						// this.openformation = false;
						this.formation.id = response.data.id;
						this.formations.unshift(this.formation);
						// this.formations.push(this.formation);
						this.formation = {
							id: 0,
							cv_id: window.Laravel.idCV,
							titre: '',
							presentation: ''
						}
					}
				})
				.catch(error => {
					console.log('erroraddformation => ', error);
				})
		},
		editformation: function(expParam) {
			this.openformation = true;
			this.editformationToggle = true;
			this.formation = expParam;
		},
		updateformation: function() {
			axios.put(window.Laravel.url + '/updateformations', this.formation)
				.then(response => {
					// this.formation = response.data;
					console.log('successupdateformation => ', response.data);
					if (response.data.etat) {
						// this.openformation = false;
						// this.formations.unshift(this.formation);
						// this.formations.push(this.formation);
						this.formation = {
							id: 0,
							cv_id: window.Laravel.idCV,
							titre: '',
							presentation: ''
						}
						this.editformationToggle = false;
					}
				})
				.catch(error => {
					console.log('errorupdateformation => ', error);
				})
		},
		deleteformation: function(expParam) {
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
					axios.delete(window.Laravel.url + '/deleteformations/' + expParam.id)
						.then(response => {
							// this.formation = response.data;
							console.log('successdeleteformation => ', response.data);
							if (response.data.etat) {
								var pos = this.formations.indexOf(expParam);
								this.formations.splice(pos, 1);

							}
						})
						.catch(error => {
							console.log('errordeleteformation => ', error);
						})
					Swal.fire(
						'DELETE!',
						'formation a etes DELETE avec succee.',
						'success'
					)
				}
			})

		}
	},
	mounted: function() {		 
		this.getFormation1();
	}
}
</script>
