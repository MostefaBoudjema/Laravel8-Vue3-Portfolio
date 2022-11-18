<template>
<div class="panel panel-primary" v-cloak>
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-10"><h1 class="panel-title">Competance</h1></div>
						<div class="col-md-2 text-right">
							<button class="btn btn-success" v-on:click="opencompetance =true; editcompetanceToggle=false">ADD</button>
						</div>
					</div>
					
				</div>
				<div class="panel-body">
					<div v-if="opencompetance">
						<div class="form-group">
							<label for="">Titre</label>
							<input type="text" class="form-control" placeholder="le titre" v-model=competance.titre>
						</div>
						<div class="form-group">
							<label for="">Presentation</label>
							<input type="textarea" class="form-control" placeholder="le body" v-model=competance.presentation>
						</div>
						<div class="row">

							<button class="btn btn-success btn-block" v-if="!editcompetanceToggle" v-on:click="addcompetance">ADD</button>
							<button class="btn btn-warning btn-block" v-if="editcompetanceToggle" v-on:click="updatecompetance">Modifier</button>
						</div>

					</div>
					<ul class="list-group">
						<li class="list-group-item" v-for="competance in competances" :key="competance.id">
							<div class="pull-right">
								<button class="btn btn-warning btn-sm" v-on:click="editcompetance(competance)" >Edit</button>
								<button class="btn btn-danger btn-sm" v-on:click="deletecompetance(competance)" >Delete</button>
							</div>
							<h3>{{competance.titre}}</h3>
							<p>{{competance.presentation}}</p>
						</li>						
					</ul>
					<div v-if="competances.length==0">
						No Competances to Display.
					</div>
				</div>
			</div>
</template>

<script>
    export default {
		name: "competance",
        data() {
		return {
			message: 'Hello Vue! Mus',
			competances: [],
			Competanceid: 0,
			opencompetance: false,
			editcompetanceToggle: false,			
			competance: {
				id: 0,
				cv_id: window.Laravel.idCV,
				titre: '',
				presentation: ''
			}
		}
	},
	methods: {
		getCompetance1: function() {
			axios.get(window.Laravel.url + '/api/getcompetances/' + window.Laravel.idCV)
				.then(response => {
					this.competances = response.data;
					console.log('successCompetance1 => ', response);
				})
				.catch(error => {
					console.log('errorCompetance1 => ', error);
				})
		},
		addcompetance: function() {
			axios.post(window.Laravel.url + '/api/addcompetances', this.competance)
				.then(response => {
					// this.competance = response.data;
					console.log('successaddcompetance => ', response.data);
					if (response.data.etat) {
						// this.opencompetance = false;
						this.competance.id = response.data.id;
						this.competances.unshift(this.competance);
						// this.competances.push(this.competance);
						this.competance = {
							id: 0,
							cv_id: window.Laravel.idCV,
							titre: '',
							presentation: ''
						}
					}
				})
				.catch(error => {
					console.log('erroraddcompetance => ', error);
				})
		},
		editcompetance: function(expParam) {
			this.opencompetance = true;
			this.editcompetanceToggle = true;
			this.competance = expParam;
		},
		updatecompetance: function() {
			axios.put(window.Laravel.url + '/api/updatecompetances', this.competance)
				.then(response => {
					// this.competance = response.data;
					console.log('successupdatecompetance => ', response.data);
					if (response.data.etat) {
						// this.opencompetance = false;
						// this.competances.unshift(this.competance);
						// this.competances.push(this.competance);
						this.competance = {
							id: 0,
							cv_id: window.Laravel.idCV,
							titre: '',
							presentation: ''
						}
						this.editcompetanceToggle = false;
					}
				})
				.catch(error => {
					console.log('errorupdatecompetance => ', error);
				})
		},
		deletecompetance: function(expParam) {
			Swal.fire({
				title: 'Are you sure?',
				text: "You won't be able to revert this!",
				icon: 'error',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Oui, Delete!',
				cancelButtonText: 'Annuler'
			}).then((result) => {
				if (result.isConfirmed) {
					axios.delete(window.Laravel.url + '/api/deletecompetances/' + expParam.id)
						.then(response => {
							// this.competance = response.data;
							console.log('successdeletecompetance => ', response.data);
							if (response.data.etat) {
								var pos = this.competances.indexOf(expParam);
								this.competances.splice(pos, 1);

							}
						})
						.catch(error => {
							console.log('errordeletecompetance => ', error);
						})
					Swal.fire(
						'Delete!',
						'competance a etes Delete avec succee.',
						'success'
					)
				}
			})
		}
	},
	mounted: function() {
		this.getCompetance1();
	}
}
</script>
