<?php
// ＜アルゴリズムの注意点＞
// アルゴリズムではこれまでのように調べる力ではなく物事を論理的に考える力が必要です。
// 検索して答えを探して解いても考える力には繋がりません。
// まずは検索に頼らずに自分で処理手順を考えてみましょう。


// 以下は自動販売機のお釣りを計算するプログラムです。
// 150円のお茶を購入した際のお釣りを計算して表示してください。
// 計算内容は関数に記述し、関数を呼び出して結果表示すること
// $yen と $product の金額を変更して計算が合っているか検証を行うこと

// 表示例1）
// 10000円札で購入した場合、
// 10000円札x0枚、5000円札x1枚、1000円札x4枚、500円玉x1枚、100円玉x3枚、50円玉x1枚、10円玉x0枚、5円玉x0枚、1円玉x0枚

// 表示例2）
// 100円玉で購入した場合、
// 50円足りません。

$yen = 10000;   // 購入金額
$product = 150; // 商品金額

function calc($yen, $product) {
    // この関数内に処理を記述
    $change = $yen - $product;
    $yen10000 = 0;
    $yen5000 = 0;
    $yen1000 = 0;
    $yen500 = 0;
    $yen100 = 0;
    $yen50 = 0;
    $yen10 = 0;
    $yen5 = 0;
    $yen1 = 0;
    if($yen >= $product){
        while($change >= 10000){
            $yen10000++;
            $change = $change - 10000;
        }
        while($change >= 5000){
            $yen5000++;
            $change = $change - 5000;
        }
        while($change >= 1000){
            $yen1000++;
            $change = $change - 1000;
        }
        while($change >= 500){
            $yen500++;
            $change = $change - 500;
        }
        while($change >= 100){
            $yen100++;
            $change = $change - 100;
        }
        while($change >= 50){
            $yen50++;
            $change = $change - 50;
        }
        while($change >= 10){
            $yen10++;
            $change = $change - 10;
        }
        while($change >= 5){
            $yen5++;
            $change = $change - 5;
        }
        while($change >= 1){
            $yen1++;
            $change = $change - 1;
        }
        echo '10000円札x'.$yen10000.'枚'.','.'5000円札x'.$yen5000.'枚'.','.
        '1000円札x'.$yen1000.'枚'.','.'500円玉x'.$yen500.'枚'.','.'100円玉x'.$yen100.'枚'.','.
        '50円玉x'.$yen50.'枚'.','.'10円玉x'.$yen10.'枚'.','.'5円玉x'.$yen5.'枚'.','.'1円玉x'.$yen1.'枚';
    }else{
        echo $product - $yen.'円足りません。';
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>お釣り</title>
</head>
<body>
    <section>
        <!-- ここに結果表示 -->
        <?php calc( 10000, 150); ?><br>
        <?php calc( 100, 150); ?>
    </section>
</body>
</html>