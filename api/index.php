<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Content-Type: application/json; charset=UTF-8');

$uri = basename($_SERVER['REQUEST_URI']);

//Validaçâo do post
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $error = "ERROR";
    $pokemon = (isset($_POST['pokemon'])) ? $_POST['pokemon'] : '';

    if(empty($pokemon)){
        echo json_encode(['mensagem'=> $error]);
        http_response_code(406);
    }
    else{
        if($pokemon == "pagina")
        {
            $cards = createCards();


        }else{

            $urlPokemon = "https://pokeapi.co/api/v2/pokemon/$pokemon";
            $namesPokemon = json_decode(file_get_contents($urlPokemon));

    
            if(is_null($namesPokemon))
            {
                
    
                echo json_encode(['mensagem'=> $error]);
                http_response_code(406);
    
           
                         
            }else{
                $cards = createCardsPokemon($namesPokemon);
                      
            
            }

        }

        echo json_encode(['mensagem'=> $cards]);
    }
}



//______________________________________________Função para criar card pesquisad ou clicado na pagina_____________________________________________________// 

function createCardsPokemon($namesPokemon){

    $cards = getPokemonProperties($namesPokemon);
        
    return $cards;
    
}
//Busca as propriedades
function getPokemonProperties($namesPokemon){
    $pokemonProperties = [];
    $pokemonProperties[0] = $namesPokemon->forms[0]->name;  // 1 nome
    $pokemonProperties[1] = $namesPokemon->sprites->front_default; //2 imagem
    $pokemonProperties[2] = $namesPokemon->types[0]->type->name; // 3 tipo
    $pokemonProperties[3] = $namesPokemon->abilities[0]->ability->name; //4 habidade 1
    $pokemonProperties[4] = $namesPokemon->abilities[1]->ability->name; //5 habilidade 2
    $pokemonProperties[5] = ($namesPokemon->height)/10; //6 altura metros
    $pokemonProperties[6] = ($namesPokemon->weight)/10; //7  peso kg
    return $pokemonProperties;

}


//___________________________________________________________________Cria cards aleatorio para pagina principal___________________________//


function createCards(){

    // Excolher aleatóriamente 4 cards para iniciar a pagina
   $n = rand(4,1118);
   $n2 = 4;

   // url da api para trazer o nome dos pokemons e sua url para consulta
   $urlNomes = "https://pokeapi.co/api/v2/pokemon?limit=$n2&offset=$n";
   //Converte json em objeto
   $namesPokemons = json_decode(file_get_contents($urlNomes));

   //var_dump($namesPokemons);

   $cards =[];

   $cards = getNameAndUrl($namesPokemons);

   $cards = cards($cards);

   return $cards;
}
function cards($cards){
    
    for($j = 0; $j < 4; $j++ ){ 

        $pokemon = $cards[$j][0];
        $imgPokemon = getImage($cards[$j][1]);
        $cards[$j] = [$pokemon,$imgPokemon];
    }

    return $cards;
}

function getNameAndUrl($namesPokemons){

    $i = 0;
   $names = [];
   $urlPokemons = [];
   $nameAndUrl = [];
   foreach($namesPokemons->results as $value){
       $names[$i] = $value->name;
       $urlPokemons[$i] = $value->url;
       $nameAndUrl[$i] = [$names[$i],$urlPokemons[$i]];
       $i++;
   }

   return $nameAndUrl;
}

//Busca a imagem
function getImage($imgPokemon){

    $urlNomes = $imgPokemon;
    $namesPokemons = json_decode(file_get_contents($urlNomes));

    return $namesPokemons->sprites->front_default;

}