<template>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-10">
                <h1>Liste of my CV</h1>
            </div>
            <div class="col-md-2 pull-right">
                <a :href="'cvs/create'" class="btn btn-success">NEW CV</a>
            </div>
        </div> 
    </div> 
    <div class="row">
        <div class="col-sm-6 col-md-4" v-for="cv in cvs" :key="cv.id">
            <div class="thumbnail">
                <a :href="'/cvs/'+cv.id"><img style='height: 250px; width: 250px; object-fit: contain' :src="'../storage/'+cv.photo" alt="..."></a>
                 <div class="caption">
                    <h3>{{ cv.titre }}</h3>
                    <p>{{ cv.presentation }}</p>
                    <!-- <form action="/" method="delete"> -->
                        <!-- {{ method_field('DELETE') }} {{ csrf_field() }} -->
                        <a :href="'cvs/'+cv.id" class="btn btn-primary" role="button">SHOW</a>
                        <a :href="'cvs/'+cv.id+'/edit'" class="btn btn-warning" role="button">EDIT</a>
                        <button class="btn btn-danger" v-on:click="deleteCV(cv)" >DELETE</button>
                    <!-- </form> -->
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="text-center">{{ cvs.render() }}</div> -->
</div>
</template>

<script>
    export default {
        data() {
            return {
                message: 'Hello CV! ',			

                cvs: [],
                Cvid: 0,
                

                cv: {
                    id: 0,
                    titre: '',
                    photo: '',
                    render:'',
                    presentation: ''

                }			
            }
	},
        methods: {
            getCv: function() {
                axios.get(window.Laravel.url + '/getCv')
                    .then(response => {
                        this.cvs = response.data;
                        console.log('success getCv => ', response);
                    })
                    .catch(error => {
                        console.log('error getCv => ', error);
                    })
            },
            getLogo(logo){
                return '../assets/'+logo;
            },
            deleteCV: function(CvParam) {
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
					axios.delete(window.Laravel.url + '/deletecv/' + CvParam.id)
						.then(response => {
							// this.experience = response.data;
							console.log('success deleteCV => ', response.data);
							if (response.data.etat) {
								var pos = this.cvs.indexOf(CvParam);
								this.cvs.splice(pos, 1);

							}
						})
						.catch(error => {
							console.log('error deleteCV => ', error);
						})
					Swal.fire(
						'DELETE!',
						'Experience a etes DELETE avec succee.',
						'success'
					)
				}
			})

		}
        },
        mounted() {             
            this.getCv();
        }
    }
</script>
