<template>
    <div class="grid grid-cols-1 md:grid-cols-2">
        <div class="m-5">
            <h3 class="text-2xl">Liste Role</h3>
            
            <div class="relative" v-for="roles in list" :key="roles.id">
                <router-link  :to="{name: 'roleEdit',params:{id:roles.id}}">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5  pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                        <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z"/>
                        <path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z"/>
                    </svg>
                    </div>
                    
                    <label class=" text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:text-white dark:focus:ring-blue-500">
                        {{ roles.libele }}
                    </label>
                </router-link>
                </div>

        </div>
        <form @submit.prevent="onSubmit" class="w-full mx-auto m-5">
           
            <fieldset class="border p-5 m-5">
                <legend class="m-4 p-4 text-xl">Enregistrement Role</legend>
                <Alert  v-if="alert2" :message="information"/>
                <Alert2  v-if="alert" :error="information"/>
                
                <div class="relative mb-4">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5  pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                        <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z"/>
                        <path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z"/>
                    </svg>
                    </div>
                    <input type="text" required name="libele" v-model="formData.libele"  id="email-address-icon" class="bg-gray-50 border border-gray-300  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="libele role">
                </div>
                <textarea id="message" required rows="4" name="description" v-model="formData.description"  class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
                
                <div class="m-4 flex items-center justify-center gap-2 p-0 m-0">
                    <button class="btn-primary btn text-lg w-1/2" type="submit">Enregistrer</button>
                </div>
            </fieldset>
                
        </form>
    </div>
    
</template>
<script setup>
import { RouterView } from 'vue-router';
import {computed, onMounted, ref} from 'vue'
import axios from 'axios'
import Alert2 from '../../composant/AlertError.vue';
import Alert from '../../composant/AlertSuccess.vue';


    const list = ref([])
    onMounted(async ()=>{
        const roles = await axios.get('http://127.0.0.1:8000/api/role')
         list.value = roles.data.data
    })
    const formData  = ref({
        libele:'',
        description:''
    })
    const information = ref('')
    const echec = ref([])
    const message = ref('')
    const alert = ref(false)
    const alert2 = ref(false)
    const data = ref([])
    const onSubmit = async ()=>{
        try{
           const reponse = await axios.post('http://127.0.0.1:8000/api/role', formData.value)
           message.value = reponse.data
           const success = message.value.success;           
           if(success){
                console.log(message.value.data);
                console.log(success)
                alert2.value=true
                information.value = "Enregistrement éffectué avec succès"
           }else{
               alert.value=true
               data.value = message.value.error
               if(data.value.libele){
                echec.value = [...echec, data.value.libele[0]]
               }
               if(data.value.description){
                echec.value = [...echec, data.value.description[0]]
               }
            
           }
            formData.value.libele =''
            formData.value.description = ''
        }catch(e){
            echec.value = ["Erreur, libele et description doivent avoir au moins 4 caractere"]
            console.log("erreur est survenue lors de l'envoi de data")
        }
    }

</script>