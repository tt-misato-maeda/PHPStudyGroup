<?php
$fp = fopen("./csv/kousu.csv", 'r');

/* $lines: array(0=>array(0=>"従業員",1=>"対象月",2=>"登録日",3=>"プロジェクト名",4=>"プロジェクトコード",5=>"業務内容",6=>"工数実績"),
                 1=>array(0=>"名前",1=>"月",2=>"日付",...)
*/
while ($dt = fgetcsv($fp)) {
  $lines[] = $dt;
}

/* $ary_pjid: array(プロジェクトコード=>"プロジェクト名")*/
foreach ($lines as $key=>$val) {
    $ary_pjid[$val[4]] = $val[3];
}

$fp_saishin = fopen("./csv/saishin_kousu.csv" , 'r');
while ($dt_saishin = fgetcsv($fp_saishin)) {
    $lines_saishin[] = $dt_saishin;
  }

/* $ary_pj: array(プロジェクト名=>"プロジェクトコード")*/
foreach ($lines_saishin as $key=>$val) {
    $ary_pj[$val[3]] = $val[4];
}

/*csvヘッダーがいらないので削除*/
unset($ary_pj["プロジェクト"]);

foreach ($ary_pj as $key=>$val) {
    if(isset($ary_pjid[$val])) {
        $ary_pjonid[$key] = $ary_pjid[$val];
    }
    else {
        $ary_pjonid[$key] = "該当なし";
    }
}

foreach ($ary_pjonid as $key=>$val) {
    echo $key." , ".$val;
    echo '<br>';
}

fclose($fp);
?>