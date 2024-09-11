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
    const url = 'http://127.0.0.1:8000/animal/create'

    const payload = JSON.stringify(
        {   tipo_aquisicao: 'Adoção', 
            cpf_ou_cnpj: '41555632076',
            nome: 'Nome do animal',
            codigo_microchip: 'BR3679',
            especie: 'gato',
            data_nascimento: '2015-11-11', // Formato de data correto (YYYY-MM-DD)
            porte: 'medio',
            sexo: 'feminino',                
            hasPedigree: 0,                  // Alinhamento com o campo da view
            telefone_credenciada: '1234567890' // Adicionando campo extra conforme visto na view
    }
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