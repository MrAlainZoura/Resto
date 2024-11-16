import {onMounted, onUnmounted, ref} from 'vue'
import axios from 'axios'

export function ApiMethod  (method="get", url, data){

    const config = {
        method: method,
        url: url,
        data: data
    }
  
    return axios(config).then((response)=>{
        return response.data
    })
}