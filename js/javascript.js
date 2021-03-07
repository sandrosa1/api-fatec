

fetch("https://pokeapi.co/api/v2/pokemon?limit=1138&offset=0",{
  cache:'no-store'
  })
  //Na pirmeira promisse nos recebemos um JSON
  //Na segunda promisse retorna o json no console.log
  .then(response => response.json())
  .then(json =>  {
    let names = [];
    names = json.results;
    pokemon = names.map((names) => names.name)
    autocomplete(document.getElementById("myInput"), pokemon);
    } )
.catch(erro =>  console.log(erro))


function autocomplete(inp, arr) {
  /*a função de preenchimento automático leva dois argumentos,
  o elemento do campo de texto e uma matriz de possíveis valores preenchidos automaticamente:*/
  var currentFocus;
  /*executa uma função quando alguém escreve no campo de texto:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*feche todas as listas já abertas de valores preenchidos automaticamente*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*crie um elemento DIV que conterá os itens (valores):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*acrescente o elemento DIV como filho do contêiner de preenchimento automático:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*verifique se o item começa com as mesmas letras do valor do campo de texto:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*crie um elemento DIV para cada elemento correspondente:*/
          b = document.createElement("DIV");
          /*deixe as letras correspondentes em negrito:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insira um campo de entrada que conterá o valor do item da matriz atual:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*insira um campo de entrada que irá manter o valor do item da matriz atual:*/
          b.addEventListener("click", function(e) {
              /*insira o valor para o campo de texto de preenchimento automático:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*feche a lista de valores preenchidos automaticamente,
              (ou qualquer outra lista aberta de valores preenchidos automaticamente:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*executar uma função pressionando uma tecla no teclado:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*Se a tecla de seta para BAIXO for pressionada,
        aumente a variável currentFocus:*/
        currentFocus++;
        /* e tornar o item atual mais visível:*/
        addActive(x);
      } else if (e.keyCode == 38) { //cima
        /*Se a tecla de seta para cima for pressionada,
        diminua a variável currentFocus:*/
        currentFocus--;
        /*ee tornar o item atual mais visível:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*Se a tecla ENTER for pressionada, evita que o formulário seja enviado,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*e simular um clique no item "ativo":*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*uma função para classificar um item como "ativo":*/
    if (!x) return false;
    /*comece removendo a classe "ativa" em todos os itens:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*adicione a classe "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /* uma função para remover a classe "ativa" de todos os itens de preenchimento automático:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*feche todas as listas de preenchimento automático no documento,
    exceto aquele passado como um argumento:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*feche todas as listas de preenchimento automático no documento,
    exceto aquele passado como um argumento::*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

/*Uma array contendo pokemons*/


/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/









// function autoComplete(cidade,pokemon) {

// const destino = pokemon;
//   return destino.filter((valor) => { const valorMinusculo = valor.toLowerCase() 
//     const cidadeMinusculo = cidade.toLowerCase()

//   return valorMinusculo.includes(cidadeMinusculo)
//  })
// }

// const campo = document.querySelector('.campo')
// const sugestoes = document.querySelector('.sugestoes')

// campo.addEventListener('input', ({ target }) => {
//   const dadosDoCampo = target.value
//     if(dadosDoCampo.length > 1)
//     {
//       const autoCompleteValores = autoComplete(dadosDoCampo,pokemon)
//       sugestoes.innerHTML = `${autoCompleteValores.map((value) => { return (`<li>${value}</li>`)}).join('')}
//         `
//     }
// })
  





 

  
