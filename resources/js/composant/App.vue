<template>
    <header class="z-100">
        <NavBar/>
    </header>

    <main>
        <router-view/>
    </main>

    <Footer/>
</template>

<script setup>
import { RouterView } from 'vue-router';
import NavBar from './navBar/NavBar.vue';
import Footer from './footer/Footer.vue';


</script>