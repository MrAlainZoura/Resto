<template>
    <div class="hero bg-white-200 min-h-screen">
  <div class="hero-content flex-col lg:flex-row-reverse">
    <img
      :src="Plat"
      class="max-w-xl rounded-full shadow-2xl" />
    <div>
      <h1 class="text-5xl font-bold">Bienvenue chez nous!</h1>
      <p class="py-6 text-2xl">
        Bon appetit !
        c'est un plaisir pour nous de vous compter parmi nos clients, sentez-vous à l'aise et profitez du regal du repas!
      </p>
      <router-link to="/apropos" class="btn btn-primary">Voir le menu</router-link>
    </div>
  </div>
</div>
</template>

<script setup>
    import Plat from './img/Plat_cote_de_porc.jpg';
</script>

<style>

</style>