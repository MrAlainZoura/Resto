<template>
    <!--
      This example requires updating your template:
  
      ```
      <html class="h-full">
      <body class="h-full">
      ```
    -->
    <main class="grid min-h-full place-items-center bg-white px-6 py-24 sm:py-32 lg:px-8">
      <div class="text-center">
        <p class="text-base font-semibold text-indigo-600">404</p>
        <h1 class="mt-4 text-balance text-5xl font-semibold tracking-tight text-gray-900 sm:text-7xl">Page non disponible</h1>
        <p class="mt-6 text-pretty text-lg font-medium text-gray-500 sm:text-xl/8">Désolé, Nous ne pourrons trouver la page que vous cherchez.</p>
        <div class="mt-10 flex items-center justify-center gap-x-6">
            
          <router-link to="/" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Accueil</router-link>
          <router-link to="/apropos" class="text-sm font-semibold text-gray-900">Voir nos Plat <span aria-hidden="true">&rarr;</span></router-link>
        </div>
      </div>
    </main>
  </template>

<script setup>


</script>

<style>
    .homec{
        color:rgb(119, 4, 250);
    }
</style>