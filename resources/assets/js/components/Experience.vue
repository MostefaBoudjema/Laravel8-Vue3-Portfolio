<template>
<div class="panel panel-primary" v-cloak>
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-10"><h3 class="panel-title">Experience</h3></div>
						<div class="col-md-2 text-right">
							<button class="btn btn-success" v-on:click="openExperience =true; editExperienceToggle=false">ADD</button>
						</div>
					</div>
					
				</div>
				<div class="panel-body">
					<div v-if="openExperience">
						<div class="form-group">
							<label for="">Titre</label>
							<input type="text" class="form-control" placeholder="le titre" v-model=experience.titre>
						</div>
						<div class="form-group">
							<label for="">Body</label>
							<input type="textarea" class="form-control" placeholder="le body" v-model=experience.body>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="">date debut</label>
									<input type="date" class="form-control" placeholder="date debut" v-model=experience.debut>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Date Fin</label>
									<input type="date" class="form-control" placeholder="Date Fin" v-model=experience.fin>
								</div>
							</div>
							<button class="btn btn-success btn-block" v-if="!editExperienceToggle" v-on:click="addExperience">ADD</button>
							<button class="btn btn-warning btn-block" v-if="editExperienceToggle" v-on:click="updateExperience">Modifier</button>
						</div>

					</div>
					<ul class="list-group">
						<li class="list-group-item" v-for="experience in experiences" :key="experience.id">
							<div class="pull-right">
								<button class="btn btn-warning btn-sm" v-on:click="editExperience(experience)" >EDIT</button>
								<button class="btn btn-danger btn-sm" v-on:click="deleteExperience(experience)" >DELETE</button>
							</div>
							<h3>{{experience.titre}}</h3>
							<p>{{experience.body}}</p>
							<small>{{experience.debut}} - {{experience.fin}}</small>

						</li>						
					</ul>
					<div v-if="experiences.length==0">
						No Experiences to Display.
					</div>
				</div>
			</div>
</template>

<script>
    export default {
        data() {
		return {
			message: 'Hello Vue! Mus',
			experiences: [],
			Experienceid: 0,
			openExperience: false,
			editExperienceToggle: false,

			experience: {
				id: 0,
				cv_id: window.Laravel.idCV,
				titre: '',
				body: '',
				debut: '',
				fin: ''
			}

		}
	},
	methods: {
		getExperience: function() {
			axios.get(window.Laravel.url + '/getexperiences')
				.then(response => {
					this.experiences = response.data;
					console.log('successgetExperience => ', response.data);
				})
				.catch(error => {
					console.log('errorgetExperience => ', error);
				})
		},
		getExperience1: function() {
			axios.get(window.Laravel.url + '/getexperiences/' + window.Laravel.idCV)
				.then(response => {
					this.experiences = response.data;
					console.log('successgetExperience1 => ', response);
				})
				.catch(error => {
					console.log('errorgetExperience1 => ', error);
				})
		},
		addExperience: function() {
			axios.post(window.Laravel.url + '/addexperiences', this.experience)
				.then(response => {
					// this.experience = response.data;
					console.log('successaddExperience => ', response.data);
					if (response.data.etat) {
						// this.openExperience = false;
						this.experience.id = response.data.id;
						this.experiences.unshift(this.experience);
						// this.experiences.push(this.experience);
						this.experience = {
							id: 0,
							cv_id: window.Laravel.idCV,
							titre: '',
							body: '',
							debut: '',
							fin: ''
						}
					}
				})
				.catch(error => {
					console.log('erroraddExperience => ', error);
				})
		},
		editExperience: function(expParam) {
			this.openExperience = true;
			this.editExperienceToggle = true;
			this.experience = expParam;
		},
		updateExperience: function() {
			axios.put(window.Laravel.url + '/updateexperiences', this.experience)
				.then(response => {
					// this.experience = response.data;
					console.log('successupdateExperience => ', response.data);
					if (response.data.etat) {
						// this.openExperience = false;
						// this.experiences.unshift(this.experience);
						// this.experiences.push(this.experience);
						this.experience = {
							id: 0,
							cv_id: window.Laravel.idCV,
							titre: '',
							body: '',
							debut: '',
							fin: ''
						}
						this.editExperienceToggle = false;
					}
				})
				.catch(error => {
					console.log('errorupdateExperience => ', error);
				})
		},
		pickAction: function(expParam) {
			if (expParam = "edit") {
				this.openExperience = true;
				this.editExperienceToggle = true;
			} else {
				this.openExperience = true;
				this.editExperienceToggle = false;
			}
		},
		deleteExperience: function(expParam) {
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
					axios.delete(window.Laravel.url + '/deleteexperiences/' + expParam.id)
						.then(response => {
							// this.experience = response.data;
							console.log('successdeleteExperience => ', response.data);
							if (response.data.etat) {
								var pos = this.experiences.indexOf(expParam);
								this.experiences.splice(pos, 1);

							}
						})
						.catch(error => {
							console.log('errordeleteExperience => ', error);
						})
					Swal.fire(
						'DELETE!',
						'Experience a etes DELETE avec succee.',
						'success'
					)
				}
			})

		},
	},
    	mounted: function() {
		this.getExperience1();
	}
}
</script>
