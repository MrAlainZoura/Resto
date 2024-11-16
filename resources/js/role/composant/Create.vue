<template>
    <div class="grid grid-cols-1 md:grid-cols-2">
        <div class="m-5">
            <h3 class="text-2xl">Liste Role</h3>
            
            <div class="relative" v-for="roles in list" :key="roles.id">
                <router-link  :to="{name: 'roleEdit',params:{id:roles.id}}" class="">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5  pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                        <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z"/>
                        <path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z"/>
                    </svg>
                    </div>
                    
                    <label class="cursor-pointer hover:bg-blue-200 hover:underline text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:text-white dark:focus:ring-blue-500">
                        {{ roles.libele }}
                    </label>
                </router-link>
                </div>

        </div>
        <form @submit.prevent="onSubmit" class="w-full mx-auto m-5">
           
            <fieldset class="border p-5 m-5">
                <legend class="m-4 p-4 text-xl">Enregistrement Role</legend>
                <Alert  v-if="alert2" :message="information"/>
                <Alert2  v-if="alert" :error="echec"/>
                <Textbox label="Libele"
                    name="libele"
                    id=""
                    type="text"
                    obligatoire 
                    v-model="formData.libele" >
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                        <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z"/>
                        <path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z"/>
                    </svg>
                </Textbox>
                <Textarea label="Description"
                    name="description"
                    id=""
                    v-model="formData.description"
                    obligatoire/>
                
                <Button label="Enregistrer" type="submit" />
            </fieldset>
                
        </form>
    </div>
    
</template>
<script setup>
import {computed, onMounted, ref} from 'vue'
import Alert2 from '../../composant/AlertError.vue';
import Alert from '../../composant/AlertSuccess.vue';
import { ApiMethod } from '../../fonction/ApiMethod';
import Textbox from '../../composant/input/Textbox.vue';
import Textarea from '../../composant/input/Textarea.vue';
import Button from '../../composant/input/Button.vue';

    
    const list = ref([])
    const state = ref('')
    onMounted(async ()=>{
        const res= await ApiMethod("get",'http://127.0.0.1:8000/api/role') 
        state.value= res.success
        list.value =res.data
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
        //    const reponse = await axios.post('http://127.0.0.1:8000/api/role', formData.value)
           const reponse = await ApiMethod("post",'http://127.0.0.1:8000/api/role', formData.value)
           message.value = reponse.data
           const success =reponse.success;           
           if(success){
                console.log(message.value);
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