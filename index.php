<?php

$n = 7;
$m = 5;

$digits = function(int $length)
{
    while ($length > 0) {
        yield mt_rand();
        --$length;
    };
};



class Sequence
{
    public $m;
    public $element;
    public $result = [];

    public function __construct($m)//
    {
        $this->m = $m;
    }

    public function add($element) {
        array_push($this->seq, "$el");
    }

    public function getMaxNumbers() {

        rsort($this->seq);
        $this->log("Последовательность отсортирована по убыванию");
        for ($i=0; $i < $this->m; $i++) {
            if ($this->seq[$i]) {
                echo $this->seq[$i];
                echo "<br>";
            }
        }
        $this->log("Вывели максимальные значения последовательности");

    }

    public function log($text) {
        $fd = fopen("log.txt", 'a+');
        fwrite($fd, date("d.m.Y h:i:s A : "));
        fwrite($fd, $text);
        fwrite ($fd, "\n");
        fclose($fd);
    }

}


$sequence = new Sequence($m);
$sequence->log("Начало работы приложения");
foreach ($digits($n) as $number) {
   $sequence->add($number);
}
$sequence->log("Создана последовательность из произвольных чисел");

print_r($sequence->getMaxNumbers());
$sequence->log("Конец работы приложения");
$sequence->log("------------------------------------------------");

