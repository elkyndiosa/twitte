<template>
	<div class="col-12 col-md-8 mt-4">
		<div class="card-header">
                modifica tu twits
            </div>
            <div class="card-body d-flex justify-content-center flex-wrap">
                <textarea class="form-control col-12" placeholder="Escribe lo que piensas" name="tweets" v-model="tweet.content"></textarea>
            </div>
            <div class="card-footer">
                <button class="btn btn-outline-success col-4 mt-3" @click="save_tweet" >Publicar</button>
            </div>
        </div>
	</div>
</template>
<script>
    export default {
        props: ['tweet'],
        data(){
            return{

            };
        },
        methods:{
            save_tweet(){
                // console.log(this.tweet);
                let url = 'http://localhost/Twitter/public/update';
                var formdata = new FormData();
                formdata.append('content', this.tweet.content);
                formdata.append('id', this.tweet.id);
                axios.post(url, formdata).then(response => {
                    var dir= 'http://localhost/Twitter/public/';
                     $(location).attr('href', dir);
                }).catch(error =>{
                    console.log(error.response);
                });
            }
        }
    }
</script>