<template>
    <div class="card bg-base-100 w-96 shadow-xl mb-5">
        <figure class="px-10 pt-10">
            <img
            :src="Plat"
            
            alt="Shoes"
            class="rounded-xl" />
        </figure>
        <div class="card-body items-center text-center">
            <h2 class="card-title">Shoes!</h2>
            <p>If a dog chews shoes whose shoes does he choose?</p>
            <div class="card-actions">
                <button class="btn btn-primary">Commander</button>
            </div>
        </div>
    </div>
</template>

<script setup>
    import Plat from '../img/Plat_cote_de_porc.jpg';
</script>