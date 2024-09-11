import http from 'k6/http'
import {sleep, check} from 'k6'

export const options = {
    // normal
    // pico
    // estabilização
    stages:[
        {duration: '1m', target:50}, // bellow normal load
        {duration: '2m', target:50}, 
        {duration: '1m', target:100}, // normal load
        {duration: '2m', target:100},
        {duration: '1m', target:300},// around breaking 
        {duration: '2m', target:300},
        {duration: '1m', target:400}, // beyond breaking
        {duration: '2m', target:400},
        {duration: '1m', target:0}, //recovery

    ],
    thresholds: {
        http_req_duration:['p(95)<2000'], // 95% das requisições devem responder em até 2s
        http_req_failed:['rate<0.01'] // 1% das requisições podem ocorrer erro
    }
}

export default function (){
    const url = 'http://127.0.0.1:8000/login'

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