<?php 
$count = 0;
$fp = fopen('./csv/output.csv','r');
while ($dt = fgetcsv($fp)){
    $data[] = $dt;
}
unset($data[0]);

foreach ($data as $key=>$val){
    if ($val[11] >= 10000){
        $count += 1;
    }
    $totalShopAmount[$val[2]] += $val[11];
    $itemList[$val[15]][$val[16]] = $val[3];
}
echo "10,000円を超える商品は",$count,"品<br>";

//array_search : 第一引数をvalueにもつ第二引数(配列)のkeyを返す
echo "一番在庫の合計額が高いお店は",array_search(max($totalShopAmount),$totalShopAmount),"<br>";

// 重複を考慮するなら下記でkey取ってくると良いかも
// $maxAmountShop = array_keys($totalShopAmount, max($totalShopAmount));
// foreach ($maxAmountShop as $key=>$val){
//     if (!0 == $key){
//         echo "、または";
//     }
//     echo "一番在庫の合計額が高いお店は",$val;    
// }

foreach ($itemList as $type=>$categoryList){
    echo "商品タイプ : ", $type ,"<br>";
    foreach ($categoryList as $category=>$item){
        echo "　カテゴリー : ", $category , "　";
        echo "=> ", $item , "<br>";
    }
}

?>