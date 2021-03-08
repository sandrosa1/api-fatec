## Desenvolvimento

###  Cards inciais

* A página carrega quatro cards aleatório, ao clicar na habilidade vai a pagina habilidade levando na url o pokemon.

  ![Autocomplete/card](https://github.com/sandrosa1/api-fatec/blob/main/public/cardsiniciais.png)

* Na página habilidade capturamos o pokemon atráves do $_GET['var'];

* Em seguida a pagina com card habilidades e gerada

  ![Autocomplete/card](https://github.com/sandrosa1/api-fatec/blob/main/public/habilidades.png)

### Para o autocomplete utilizaremos javaScript .

* fetch promice para trazer dados da url da api
* funçao array.map para pegar os nome e criar array com pokemon nomes
* função autocomplete com focus, e movimentação atraves das setas
* ![Autocomplete/card](https://github.com/sandrosa1/api-fatec/blob/main/public/autocomplete.png)

