<?php
// zera variaveris
$cards="";
 $pokemon = ""; 
$cards="";
$id = 1;

// Excolher aleatóriamente 4 cards para iniciar a pagina
$n = rand(4,1118);
$n2 = $n - 4;

// url da api para trazer o nome dos pokemons e sua url para consulta
$urlNomes = "https://pokeapi.co/api/v2/pokemon?limit={$n}&offset={$n2}";
//Converte json em objeto
$namesPokemons = json_decode(file_get_contents($urlNomes));
//pega o nome do pokemon e coloca na variavel
$pokemon = isset($_POST["pokemon"]) ? $_POST["pokemon"]: ""; 

// Criando dois arrays para guardar o nome do pokemon e sua url da imagem
$i = 0;
$names = [];
$urlPokemons = [];
foreach($namesPokemons->results as $value){
    $names[$i] = $value->name;
    $urlPokemons[$i] = $value->url;
    $i++;
}


if(isset($_POST['action'])){

    if($pokemon == ""){

         $cards = cardError($names,$urlPokemons);

 
    }
    else
    {
         $cards = createCardsPokemon($pokemon);
         
    }
     
 
 }else{
 
     $cards = createCards($names,$urlPokemons);
 }

 
//Função para criar card pesquisado
function createCardsPokemon($pokemon){

    $urlPokemon = "https://pokeapi.co/api/v2/pokemon/{$pokemon}";
    $namesPokemon = json_decode(file_get_contents($urlPokemon));
   
    if(is_null($namesPokemon)){ 
        //Se nao existir pokemon chama função card error
        $cards = cardError();

        

    }else{
        
        $pokemon = getPokemonProperties($namesPokemon);
        // pokemon recebe suas propriedades
        $cards = createCardsUnique($pokemon);
        // cria card com propriedades
        
    }
    return $cards;
    
}

//Busca a imagem
function getImage($imgPokemon){

    $urlNomes = $imgPokemon;
    $namesPokemons = json_decode(file_get_contents($urlNomes));

    return $namesPokemons->sprites->front_default;

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
//Cria os 4 cards
function createCards($names,$urlPokemons){

    $cards ="";
    for($j = 0; $j < 4; $j++ ){ 
        $pokemon = $names[$j];
        $urlPokemon = $urlPokemons[$j];
        $imgPokemon = getImage($urlPokemon);
        $cards .= "<div class='card'>
        <div class='card-header'>
        <img src='{$imgPokemon}'/>
        </div>
        <div class='card-body'>
        <h4>{$pokemon}</h4>
            <a href='habilidades.php?var={$pokemon}' class='card-btn'>Habilidades</a>
        </div>
    </div>";
    
    }

    return $cards;

}

//crai card com propriedades
function createCardsUnique($pokemon){

    $name = $pokemon[0];
    $img = $pokemon[1];
    $type = $pokemon[2];
    $ability1 = $pokemon[3];
    $ability2 = $pokemon[4];
    $heigth = $pokemon[5];
    $weight = $pokemon[6];

    $cards ="";

        $cards .= "<div class='card-unico'>
        <div class='card-header'>
        <img src='{$img}'/>
        </div>
        <div class='card-body'>
        <h4>{$name}</h4>
        <p>Type: {$type}</p>
        <p>Skllis: {$ability1}, {$ability2}</p>
        <p>Altura: {$heigth}</p>
        <p>Peso: {$weight}</p>
        <a href='index.php' class='card-btn'>Voltar</a>
        </div>
        </div>";
    return $cards;

}

//cria card de error
function cardError(){

    $cards ="";
        $cards .= "<div class='card-unico'>
        <div class='card-header'>
        <img src='./public/chorando.gif'/>
        </div>
        <div class='card-body'>
        <h4>Desculpe!</h4>
        <p>Talvez o nome ou número do pokemon seja inválido, tente outro.</p>
        </div>
        </div>";

    return $cards;
}
