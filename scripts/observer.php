<?php
interface Investidor //padrao que todos os observers deverão seguir
{
    public function update(float $val);
}

class User implements Investidor
{
    private string $nome;

    public function __construct(string $nome)
    {
        $this->nome = $nome;
    }

    public function update(float $val)
    {
        echo "Olá " . $this->nome . ", O valor da sua ação é " . $val . "\n";
    }
}

//subject, no padrao MVC sempre fica no MODEL. já os observers, podem ficar em outras partes
class Acao
{
    private float $valor;
    private $acionistas = []; // lista que armazena todos os 'ouvintes' do subject

    public function __construct(float $valAcaoInicial)
    {
        $this->valor = $valAcaoInicial;
    }

    public function alterarValor(float $val)
    {
        $this->valor = $val;
        $this->notificar(); // notificará sempre o valor da acao mudar
    }

    public function remover(Investidor $inv)
    {
        $k = array_search($inv, $this->acionistas, true);
        if ($k !== false) {
            unset($this->acionistas[$k]);
        }
    }
    public function add(Investidor $inv)
    {
        $this->acionistas[] = $inv;
    }

    private function notificar()
    {
        foreach ($this->acionistas as $ac) {
            $ac->update($this->valor);
        }
    }
}

$petrobras = new Acao(10000);

$ac1 = new User("Joao");
$ac2 = new User("Maria");

$petrobras->add($ac1);
$petrobras->add($ac2);

$petrobras->alterarValor(90000);

$petrobras->remover($ac1);

//simular variacoes aleatorias 
echo "\n";
for ($i = 0; $i < 5; $i++) {
    $val = rand(1000, 10000);
    $petrobras->alterarValor($val);
    sleep(1);
}
