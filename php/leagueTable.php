<?php
/* ----------------- DESCRIÇÃO DO TESTE -----------------------*/

/*

A classe LeagueTablr acompanha o score de cada jogador em uma liga. Depois de cada jogo, o score do jogador
é salvo utilizanod a função recordResult.

O Rank de jogar na liga é calculado utilizando a seguinte lógica:

1- O jogador com a pontuação mais alta fica em primeiro lugar. O jogador com a pontuação mais baixa fica em último.
2- Se dois jogadores estiverem empatados, o jogador que jogou menos jogos é melhor posicionado.
3- Se dois jogadores estiverem empatados na pontuação e no número de jogos disputados,
então o jogador que foi o primeiro na lista de jogadores é classificado mais alto.


Implemente a funação playerRank que retorna o jogador de uma posição escolhida do ranking.

Exemplo:

$table = new LeagueTable(array('Mike', 'Chris', 'Arnold'));
$table->recordResult('Mike', 2);
$table->recordResult('Mike', 3);
$table->recordResult('Arnold', 5);
$table->recordResult('Chris', 5);
echo $table->playerRank(1);


Todos os jogadores têm a mesma pontuação. No entanto, Arnold e Chris jogaram menos jogos do que Mike,
e como Chris está acima de Arnold na lista de jogadores, ele está em primeiro lugar.

Portanto, o código acima deve exibir "Chris".


*/

class LeagueTable
{
	public function __construct($players)
    {
		$this->standings = array();
		foreach($players as $index => $p)
        {
			$this->standings[$p] = array
            (
                'index' => $index,
                'games_played' => 0, 
                'score' => 0
            );
        }
	}
		
	public function recordResult($player, $score)
    {
        if (!isset($this->standings[$player]['games_played'])) {
            $this->standings[$player]['games_played'] = 0;
        }
		$this->standings[$player]['games_played']++;
		$this->standings[$player]['score'] += $score;
	}
	
	public function playerRank($rank)
    {

        // Uma cópia do array original
        $copyStandings = $this->standings;

        // foreach feito para criar o indice nome do player
        foreach ($this->standings as $i => $p) {
            $copyStandings[$i]['name'] = $i;
        }

        // sorteando o array multidimensional
        usort($copyStandings, function($p1, $p2){

            // se o score e games_played fossem iguais não precisamos sortear para manter
            // a posição original do array
            if ($p2['score'] == $p1['score'] && $p2['games_played'] == $p1['games_played']) {
                return;
            }

            // se o score dos playres fossem iguais a ordenação deveria ser feita através 
            // do games_played
            if ($p2['score'] == $p1['score']) {
                return $p1['games_played'] - $p2['games_played'];
            }

            // sortear o array conforme a quantidade de pontos do player
            return $p2['score'] - $p1['score'];
        });

        //retorna o nome do player desejado
        return $copyStandings[$rank - 1]['name'];
	}
}
      
$table = new LeagueTable(array('Mike', 'Chris', 'Arnold', 'Biel Bueno', 'Joao Bueno', 'Sara'));
$table->recordResult('Mike', 2);
$table->recordResult('Mike', 3);
$table->recordResult('Arnold', 5);
$table->recordResult('Chris', 5);
$table->recordResult('Biel Bueno', 7); ##
$table->recordResult('Biel Bueno', 1); ##
$table->recordResult('Joao Bueno', 8); ##
$table->recordResult('Sara', 7); ##
echo $table->playerRank(1);
