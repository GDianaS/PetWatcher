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
        http_req_duration:['p(95)<2000'], // 95% das requisições devem responder em até 2s
        http_req_failed:['rate<0.05'] // 5% das requisições podem ocorrer erro
    }
}

export default function (){
    const url = 'http://127.0.0.1:8000/license/'

    const payload = JSON.stringify(
        {CNPJ: '83.585.146/0001-73'}
    )


    const headers = {
        'headers': {
            'Content-Type': 'application/json',
        }
    }
    
    const res = http.get(url, payload,headers)

    //console.log(res.body)
    
    // validação
    check(res, {
        'status should be 200': (r) => r.status == 200
    })

    sleep(1) // usuário pensando
}