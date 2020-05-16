<template>
	<div class="col-12 col-md-8 mt-4">
		<div class="card mt-4">
			<div class="card-header">
		    	NO,bre
		 	</div>
		</div>
		<div class="py-4 col-12 my-bg mt-4">
			<div class="border-bottom  py-4 border-light" v-for="tweet in tweets">
				<p v-text="tweet.content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius consectetur, hic laboriosam nemo voluptatibus ab iusto eaque, saepe itaque ipsam sapiente perspiciatis. Repellendus ducimus accusamus, voluptate nihil quibusdam explicabo incidunt?</p>
				<span class="text-muted">publicado el 14/02/2020</span>
			</div>
		</div>
	</div>
</template>
<script>
    export default {
    	props: ['id'],
        data(){
            return{
                tweets: ''
            };
        },
        created(){
            let url = 'http://localhost/Twitter/public/show/'+this.id;
            axios.get(url).then(response => {
               this.tweets = response.data;
               console.log(this.tweets);
            }).catch(error =>{
                console.log(error.response);
            });
        }
    }
</script>