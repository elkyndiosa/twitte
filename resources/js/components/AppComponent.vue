<template>
    <div class="row justify-content-center">
        <header>
            <div class="jumbotron-fluid pb-3 pt-4 px-5 px-md-3">
                <h4>eto va en todas las paginas</h4>
            </div>
        </header>
        <transition name='slide-fade' mode='out-in'>
            <router-view :key="$route.fullPath"></router-view>
        </transition>
    </div>
</template>
<script>
    export default {
        data(){
            return{

            };
        }
     }
</script>

