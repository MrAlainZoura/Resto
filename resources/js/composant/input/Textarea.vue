<template>
    <textarea :id="props.id" required rows="4"
        :name="props.name" v-model="model"  
        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        :placeholder="props.label"
        :required="props.obligatoire">
    </textarea>

</template>

<script setup >

    const props = defineProps({
        label: String,
        name: String,
        id: String,
        obligatoire: Boolean
    })

    const model = defineModel()
</script>