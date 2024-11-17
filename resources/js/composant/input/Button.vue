<template>
  <div class="m-4 flex items-center justify-center gap-2 p-0 m-0">
        <button class="btn-primary btn text-lg w-1/2" :type="type">{{ props.label }}</button>
    </div>
</template>

<script setup >

    const props = defineProps({
        label: String,
        type:String
    })

</script>