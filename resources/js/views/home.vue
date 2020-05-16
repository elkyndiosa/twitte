<template>
	<div class="col-12 col-md-8 mt-4">
		<div class="card mt-4">
			<div class="card-header">
		    	Escribe tu twits
		 	</div>
			<div class="card-body d-flex justify-content-center flex-wrap">
				<textarea class="form-control col-12" placeholder="Escribe lo que piensas" name="tweets" v-model="tweet_content"></textarea>
			</div>
			<div class="card-footer">
				<button class="btn btn-outline-success col-4 mt-3" @click="save_tweet">Publicar</button>
			</div>
		</div>
		<div class="py-4 col-12 my-bg mt-4">
			<div class="border-bottom  py-4 border-light" v-for="tweet in tweets">
				<router-link :to="{name: 'show', params: {id: tweet.user_id}}" class="btn-link text-white" v-text="tweet.user.name+' :'"></router-link>
				<p v-text="tweet.content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius consectetur, hic laboriosam nemo voluptatibus ab iusto eaque, saepe itaque ipsam sapiente perspiciatis. Repellendus ducimus accusamus, voluptate nihil quibusdam explicabo incidunt?</p>
				<span class="text-muted">publicado el 14/02/2020</span>
				<div v-if="current_user == tweet.user_id">
					<router-link :to="{name: 'edit', params: {tweet: tweet}}" class="btn btn-outline-success">Editar</router-link>
                    <button class="btn btn-outline-danger" @click="destroy(tweet.id)">eliminar</button>
				</div>
			</div>
            <InfiniteLoading @infinite="infiniteHandler"></InfiniteLoading>
		</div>
	</div>
</template>
<script>
    export default {
        data(){
            return{
                tweets: '',
                current_user: '',
                tweet_content: '',
                page: 1
            };
        },
        created(){
            this.getTweets();
        },
        methods:{
            save_tweet(){
                let url = 'http://localhost/Twitter/public/store';
                var formdata = new FormData();
                formdata.append('content', this.tweet_content);
                formdata.append('user_id', this.current_user);
                axios.post(url, formdata).then(response => {
                    this.getTweets();
                    this.tweet_content= '';
                }).catch(error =>{
                    console.log(error.response);
                });
            },
            destroy(id){
            	let url = 'http://localhost/Twitter/public/delete/'+id;
                axios.get(url).then(response => {
                    this.page= 1;
                    this.getTweets();
                }).catch(error =>{
                    console.log(error.response);
                });
            },
            getTweets(){
                let url = 'http://localhost/Twitter/public/index?page='+this.page;
                axios.get(url).then(response => {
                   this.tweets = response.data.tweets.data;
                   this.current_user = response.data.current_user;
                   console.log(this.current_user);
                }).catch(error =>{
                    console.log(error.response);
                });
            },
            infiniteHandler($state) {
                this.page++
                let url = 'http://localhost/Twitter/public/index?page='+this.page;
                axios.get(url)
                .then(response => {
                    let tweetss = response.data.tweets.data;

                    if(tweetss.length){
                        this.tweets = this.tweets.concat(tweetss);
                        $state.loaded();
                    }else{
                        $state.complete();
                    }
                })

            }
        }
    }
</script>
