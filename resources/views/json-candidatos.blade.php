{
    "0": {
        "titulo": "deputado federal",
        "numeros": 4,
        "candidatos": {
                {{$json[1]->linha}}
        }
    },

    "1": {
        "titulo": "deputado estadual",
        "numeros": 5,
        "candidatos": {
            {{$json[0]->linha}}
        }
    },
        
    "2": {
        "titulo": "senador",
        "numeros": 3,
        "candidatos": {
            {{$json[2]->linha}}
        }
    },

    "3": {
        "titulo": "governador",
        "numeros": 2,
        "candidatos": {
            {{$json[4]->linha}} 
        }
    },

    "4": {
        "titulo": "presidente",
        "numeros": 2,
        "candidatos": {
            {{$json[3]->linha}}
        }
    }
}
