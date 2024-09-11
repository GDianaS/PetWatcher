import http from 'k6/http'
import {sleep, check} from 'k6'

export const options = {
    vus: 10,
    duration: '30s',
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