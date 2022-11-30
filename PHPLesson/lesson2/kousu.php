<?php
//ファイルを開く
$fp = fopen('./csv/kousu.csv', 'r');
$name = [];
//ファイルを1行ずつ読み込んで配列に格納
while ($dt = fgetcsv($fp)) {
  $lines[] = $dt;
}
/* $lines: array(0=>array(0=>"従業員",1=>"対象月",2=>"登録日",3=>"プロジェクト名",4=>"プロジェクトコード",5=>"業務内容",6=>"工数実績"),
                 1=>array(0=>"名前",1=>"月",2=>"日付",...)
*/

echo "堤さんの「2022年10月05日」のプロジェクト名: ";
echo '<br>';
foreach ($lines as $key=>$val) {
    if ($val[0]=="堤昭允" && $val[2]=="2022年10月05日") {
        echo $val[3];      
        echo "<br>";  
    }
    if (intval($val[6])>=400) {
        array_push($name,$val[0]);
    }
}
echo '<br>';

$uniquename = array_unique($name);
echo "工数実績が 400分以上の工数をつけている人: ";
echo '<br>';
foreach ($uniquename as $answer) {
    echo $answer;
    echo '<br>';  
}

// ファイルを閉じる
fclose($fp);

?>