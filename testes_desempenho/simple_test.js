import http from 'k6/http';
import {sleep, check} from 'k6';

export default function (){
    const res = http.get('http://127.0.0.1:8000/');
    
    // validação do acesso
    check(res, {
        'status should be 200': (r) => r.status == 200
    })

    sleep(1); // usuário pensando
}