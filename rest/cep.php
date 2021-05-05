<?php


/* ----------------- DESCRIÇÃO DO TESTE -----------------------*/

/*

Postmon é uma API para consultar CEP e encomendas de maneira fácil.

Implemente uma função que recebe CEP e retorna todos os dados reltivos ao endereço correspondente.

Exemplo:

getAddressByCep('13566400') retorna:
{
	"bairro": "Vila Marina",
	"cidade": "São Carlos",
	"logradouro": "Rua Francisco Maricondi",
	"estado_info": {
	"area_km2": "248.221,996",
	"codigo_ibge": "35",
		"nome": "São Paulo"
	},
	"cep": "13566400",
	"cidade_info": {
		"area_km2": "1136,907",
		"codigo_ibge": "3548906"
	},
	"estado": "SP"
}



Documentação:
https://postmon.com.br/


*/

class CEP
{
    public static function getAddressByCep($cep)
    {
		$url = 'https://api.postmon.com.br/v1/cep/'.$cep;

		// iniciando requisção http
		$curl = curl_init($url);

		// precisamos setar CURLOPT_RETURNTRANSFER como true, para receber os dados que a API
		// está enviando  
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		// executando a requisição 
		$response = curl_exec($curl);

		// finalizando o curl
		curl_close($curl);

		// Caso queira converter para Objeto:
		// $response = json_decode($response);

        return $response;
    }
}

print_r(CEP::getAddressByCep('13566400'));
