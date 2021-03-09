# API POKEMON

Aqui vamos criar um pagina que recebe dados da - [API POKEMON ](https://pokeapi.co) e interagir com ela trazendo dados, imagens e habilidades, utilizando PHP para as requisições atraves de metódo POST e GET. O javaScript será utilizado para o autocomplete.

## Desenvolvimento

###  Cards inciais

* A página carrega quatro cards aleatório, ao clicar na habilidade vai para a pagina habilidades.php levando na url o pokemon.

  ![Autocomplete/card](https://github.com/sandrosa1/api-fatec/blob/main/public/cardsiniciais.png)

* Na página habilidade capturamos o pokemon atráves do $_GET['var'];

* Em seguida a pagina com card habilidades e gerada

  ![Autocomplete/card](https://github.com/sandrosa1/api-fatec/blob/main/public/habilidades.png)

### Para o autocomplete utilizaremos javaScript .

* fetch promice para trazer dados da url da api
* função array.map para pegar os nomes e criar array com nomes dos pokemons
* função autocomplete com focus, e movimentação através das setas
* ![Autocomplete/card](https://github.com/sandrosa1/api-fatec/blob/main/public/autocomplete.png)



