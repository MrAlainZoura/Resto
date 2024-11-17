<template>
    <Hearder/>
    <main>   
        <router-view/>
    </main>
    
    <Footer/>

</template>
<script setup>
import { RouterLink, RouterView } from 'vue-router';
import Create from './composant/Create.vue';
import Footer from '../composant/footer/Footer.vue';
import Hearder from '../composant/Hearder.vue';


</script>