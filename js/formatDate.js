// Escreva uma função que converta a data de entrada do usuário formatada como MM/DD/YYYY em um formato exigido por uma API (YYYYMMDD). O parâmetro "userDate" e o valor de retorno são strings.

// Por exemplo, ele deve converter a data de entrada do usuário "31/12/2014" em "20141231" adequada para a API.
function formatDate(userDate) {

  var date = new Date(userDate)

  var year = date.getFullYear()

  //o getMonth começa a contagem do 0, então para mostra o m~es certo precisa adicionar 1
  var month = date.getMonth() + 1

  var day = date.getDate()

  // o operedor ternario adiciona um 0 na frente dos dias e meses menores que 9
  // o concat garante que não será feita soma do 0 com o numeros, e sim concatenar eles
  var mm = month < 10 ? '0'.concat(month) : month
  var dd = day < 10 ? '0'.concat(day) : day

  //usando o toSring para converter os numeros em strings, para garantir que não havera somas
  return year.toString() + mm.toString() + dd.toString();

}

console.log(formatDate("12/31/2014"));
      

