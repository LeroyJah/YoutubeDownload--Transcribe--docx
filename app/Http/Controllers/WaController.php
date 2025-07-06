<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WaController extends Controller
{

    public function sendMessage()
    {
//        curl -i -X POST \
//    https://graph.facebook.com/v22.0/677078752161030/messages \
//  -H 'Authorization: Bearer EAAnZCirpuV14BPBNmyCBOFiNi2NVriUQv0cYW0aZBhw64D3ZCCW8C6te6MYmxL5oR69Sm6OTN18tggAHVAG9zwRbr3LZBUyyICBvC7SuZA2CmCCQZCIZBMlQYgDjOycKOjHVHNKbdBYBgJCdXPeRPJJKaj8UoXKAjY7Q9aBw3zjoMhuYaY4ea2XM2QppJyP6MExbawsbge839sccZBLNNKHSzNZAxnJS2hFmBr86URFNR3gZDZD' \
//  -H 'Content-Type: application/json' \
//  -d '{ "messaging_product": "whatsapp", "to": "31612430324", "type": "template", "template": { "name": "hello_world", "language": { "code": "en_US" } } }'
    }
    public function getview()
    {
        return view('wa');
    }
}
