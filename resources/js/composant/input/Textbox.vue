<template>
    <div class="relative mb-4">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5  pointer-events-none">
        <slot></slot>
        </div>
        <input :type="props.type" :required="props.obligatoire" 
        :name="props.name" v-model="model"  
        :id="props.id" 
        class="bg-gray-50 border border-gray-300  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        :placeholder="props.label">
    </div>

</template>

<script setup >

    const props = defineProps({
        label: String,
        name: String,
        id: String,
        type: String,
        obligatoire: Boolean,
    })

    const model = defineModel()
</script>