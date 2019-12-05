<?php

$n = 17;
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
        if (count($this->result) < ($this->m - 1) ) {        //если массив для результата еще не полон
            $this->addInResult($element);                    //то просто добавляем элемент в массив
        } else if (count($this->result) == ($this->m - 1)) { //если длина массива равна m
            $this->addInResult($element);                    //то добавляем элемент
            rsort($this->result);                            //и сортируем по убыванию
            print_r($this->result);                          //выводит первые данные для проверки
            echo "<br>";
        } else {                                                //если массив полон
            if ($element >= $this->result[$this->m-1]) {        //то делаем проверку. если число больше последнего  элемента
                for ($i = 0; $i < ($this->m - 1) ; $i++) {      //сверяем с каждым элементом в массиве
                    if ($element > $this->result[$i]) {         //если добавляемый элемент больше, чем i-тый элемент массива
                        for ($j = ($this->m - 1); $j > $i ; $j--) {
                            $this->result[$j] = $this->result[$j -1]; //то все элементы с конца перемещаем на одну позицию вправо
                            //echo "hhhhhhhh<br>";
                        }
                        $this->result[$i] = $element; //добавляемый элемент встает на место i-того элемента
                        return;
                    }
                }
            }
        }

    }

    public function addInResult($element) {         //промежуточная функция добавления элемента, пока массив не полон
        array_push($this->result, "$element");      //чтобы не было дублирования кода
    }

    public function getMaxNumbers() {
        for ($i=0; $i < $this->m; $i++) {
            if ($this->result[$i]) {
                echo $this->result[$i];
                echo "<br>";
            }
        }
    }

}


$sequence = new Sequence($m);
//$sequence->log("Начало работы приложения");
foreach ($digits($n) as $number) {
                    echo $number;                   //для проверки. можно (даже нужно) закомментировать
                echo "<br>";
   $sequence->add($number);
}
//$sequence->log("Создана последовательность из произвольных чисел");
echo "------------------------------------<br>";
print_r($sequence->getMaxNumbers());
//$sequence->log("Конец работы приложения");
//$sequence->log("------------------------------------------------");

