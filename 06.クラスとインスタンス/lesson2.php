<?php
// 下記のようにlesson1のファイルをインポートしてください。
// (他のファイルを参照する関数はいくつかあるので調べてください。)
// (lesson1の文字列がそのまま出力されてしまっていても大丈夫とします。)


// 下記のクラスを作成してください。

// Patient 
// lesson1からPersonを継承

// height: float 身長（ｍ）
// weight: float 体重 (kg)

// __construct(name: string, age:int, gender: string, height: float, weight: float)
// 名前、年齢、性別、身長、体重を受け取り初期化する。

// calculateStandardWeight() :float
// 平均体重を返す （身長 × 身長 × 22)

// getHeight()
// 身長を返す

// getWeight()
// 体重を返す

// クラスが完成したら適当なインスタンスを生成し、
// それぞれの関数を使用して下記のフォーマットで出力してください。

// 〇〇さんの身長は〇〇mなので平均体重は〇〇kgです。 現在の体重は〇〇kgです。

require('/Users/takaharashouma/projects/issue_repository/06.クラスとインスタンス/lesson1.php');

class Patient extends Person{
  public float $height;
  public float $weight;

  function __construct($name,$age,$gender,$height,$weight){
    $this->name = $name;
    $this->age = $age;
    $this->gender = $gender;
    $this->height = $height;
    $this->weight = $weight;
  }
  public function calculateStandardWeight(): float{
    return $this->height * $this->height * 22 / 10000;
  }
  public function getHeight(){
    return $this->height/100;
  }
  public function getWeight(){
    return $this->weight;
  }
}
$yamada = new Patient('山田', 20,'男性',175,60);

echo $yamada->name.'さんの身長は'.$yamada->getHeight().'mなので平均体重は'.$yamada->calculateStandardWeight().'kgです。現在の体重は'.$yamada->getWeight().'kgです。';

?>