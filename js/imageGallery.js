// Uma galeria de imagens é um conjunto de imagens com botões de remoção correspondentes.
// Este é o código HTML de uma galeria com duas imagens:

// <div class="image">
//   <img src="https://goo.gl/kjzfbE" alt="First">
//   <button class="remove">X</button>
// </div>
// <div class="image">
//   <img src="https://goo.gl/d2JncW" alt="Second">
//   <button class="remove">X</button>
// </div>

// Implemente uma função de configuração que ao receber um evento de click implementa a seguinte lógica:
// * Quando o botão da classe "remove" é clicado, seu elemento div pai deve ser removido da galeria

// Por exemplo, depois que a primeira imagem da galeria acima foi removida, o código HTML ficaria assim:

// <div class="image">
//   <img src="https://goo.gl/d2JncW" alt="Second">
//   <button class="remove">X</button>
// </div>


//FAZENDO COM JQUERY:
// function setup () {
//   $('.remove').click(function(){
//     $(this).parent().remove();
//  });
// }

//FAZENDO COM JS PURO
function setup () {
  // Write your code here.
  
  // Pega todos os elementos com a classe .image e usa esse elemento para fazer outro querySelector
  // pegando os filhos do .image que tenham a classe .remove e depois adiciona o evento de click, removendo 
  // o elemento com classe .image
  document.querySelectorAll('.image').forEach(el => {
    el.querySelector('.remove').addEventListener('click', () => {
      el.remove()
    })
  })
}
  
  // Example case. 
  document.body.innerHTML = `
  <div class="image">
    <img src="https://goo.gl/kjzfbE" alt="First">
    <button class="remove">X</button>
  </div>
  <div class="image">
    <img src="https://goo.gl/d2JncW" alt="Second">
    <button class="remove">X</button>
  </div>`;
  
  setup();
  
  
