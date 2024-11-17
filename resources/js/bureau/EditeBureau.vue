<template>
    <div class="grid grid-cols-1 md:grid-cols-2">
        <div class="w-full mx-auto m-5">
            
             <h3 class="text-2xl">Liste Bureau</h3>
            
            <div class="relative" v-for="burx in list" :key="brx.id">
                <router-link  :to="{name: 'roleEdit',params:{id:brx.id}}" class="">
                    <SvgMail/>
                    <label class="cursor-pointer hover:bg-blue-200 hover:underline text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:text-white dark:focus:ring-blue-500">
                        {{ brx.libele }}
                    </label>
                </router-link>
            </div>
        </div>
        <div>
            <form @submit.prevent="onSubmit" class="w-full mx-auto m-5">
                <fieldset class="border p-5 m-5">
                    <legend class="m-4 p-4 text-xl">Enregistrement Bureau</legend>
                    <AlertError :error="echec" v-if="alert2"/>
                    <AlertSuccess :message="message" v-if="alert"/>
                    
                    <Textbox label="Libele"
                        name="libele" id="" type="text" obligatoire v-model="formData.libele" >
                        <SvgMail/>
                    </Textbox>
                    <Textbox label="Latittude"
                        name="lat" id="" type="text" obligatoire v-model="formData.lat" >
                        <SvgMail/>
                    </Textbox>
                    <Textbox label="Longitude"
                        name="lon" id="" type="text" obligatoire v-model="formData.lon" >
                        <SvgMail/>
                    </Textbox>
                    <Textarea label="Description de bureau"
                    name="description"
                    id=""
                    v-model="formData.description"
                    obligatoire/>

                    <Button type="submit" label="Enregistrer"/>
                </fieldset>
            </form>

        </div>
    </div>
</template>
<script setup>
import {ref, onMounted} from 'vue'
import AlertError from '../composant/AlertError.vue';
import AlertSuccess from '../composant/AlertSuccess.vue';
import SvgMail from '../composant/icon/SvgMail.vue';
import Textarea from '../composant/input/Textarea.vue';
import Textbox from '../composant/input/Textbox.vue';
import Button from '../composant/input/Button.vue';
import { ApiMethod } from '../fonction/ApiMethod';

const echec = ref([''])
const message = ref('')

const formData  = ref({
        libele:'',
        description:'',
        lat:'',
        lon:''
    })
    const list = ref([])
    const state = ref('')
    const alert =ref(false)
    const alert2 =ref(false)
    onMounted(async ()=>{
        const resp= await ApiMethod("get",'http://127.0.0.1:8000/api/bureau') 
        state.value= resp.success
        list.value =resp.data
        console.log(resp.data)
    })
const onSubmit = async ()=>{
    try{
        const res = await ApiMethod("post",'http://http://127.0.0.1:8000/bureau',formData.value)
        if(res.success){
            console.log(res.data)
            formData.value.libele ='' 
            formData.value.lat ='' 
            formData.value.lon ='' 
            formData.value.description ='' 
        }else{
            echec.value=res.error
            console.log(res.error)
        }
    }catch(e){
        alert2.value=true
        echec.value=["Erreur de traitement de données"]
        console.log("Erreur de l'enregistrement")
    }
   
}
</script>