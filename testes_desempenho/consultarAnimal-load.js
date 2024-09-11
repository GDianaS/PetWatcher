import http from 'k6/http'
import {sleep, check} from 'k6'

export const options = {
    // normal
    // pico
    // estabilização
    stages:[
        {duration: '10s', target:1},
        {duration: '30s', target:1},
        {duration: '10s', target:0}

    ],
    thresholds: {
        http_req_duration:['p(90)<5000'], // 90% das requisições devem responder em até 5s
        http_req_failed:['rate<0.05'] // 5% das requisições podem ocorrer erro
    }
}

export default function (){
    const url = 'http://127.0.0.1:8000/consulta_animal'

    const payload = JSON.stringify(
        {email: 'funcionarioCredenciada@gmail.com', password:'12345'}
    )


    const headers = {
        'headers': {
            'Content-Type': 'application/json',
        }
    }
    
    const res = http.post(url, payload,headers)

    //console.log(res.body)
    
    // validação
    check(res, {
        'status should be 200': (r) => r.status == 200
    })

    sleep(1) // usuário pensando
}