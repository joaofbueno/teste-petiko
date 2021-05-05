// Implemente a função removeProperty, que recebe um objeto e o nome de uma propriedade.

// Faça o seguinte:

// Se o objeto obj tiver uma propriedade prop, a função removerá a propriedade do objeto e retornará true;
// em todos os outros casos, retorna falso.

var objeto = {
    nome: 'João',
    idade: 20,
}


function removeProperty(obj, prop) {

    /**
     * A função delete do JS sempre retorna true, sendo assim precisamos fazer um
     * if para verificar se a propriedade do objeto é existente. Porém caso o if 
     * fosse feito (!obj[prop]) e o valor de obj[prop] fosse false, 0 ou uma string 
     * vazia sempre iria retornar false, ainda que a propriedade existisse
     * 
     * 
     * Para corrigir esse problema precisamos fazer assim:
     */
    if (obj[prop] === undefined) {
        return false
    }

    return delete obj[prop]
}

console.log(removeProperty(objeto, 'nome'))
console.log(objeto)