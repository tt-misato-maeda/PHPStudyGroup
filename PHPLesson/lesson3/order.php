<?php
$count = 0;
$amount = 0;

//ファイルを開く
$fp = fopen('./csv/output.csv', 'r');
//ファイルを1行ずつ読み込んで配列に格納
while ($dt = fgetcsv($fp)) {
  $data[] = $dt;
}

foreach ($data as $key=>$val) {
  $data[$key][4] = date_format(new DateTime($val[4]), 'Y-m-d'); 
  $allday[] = $data[$key][4];
  $allperson[] = $data[$key][1];
}

$days = array_unique($allday);
$persons = array_unique($allperson);

//日別の件数を取得
foreach ($days as $day){
  foreach ($data as $key=>$val) {
    if ($data[$key][4] == $day) {
      $count ++; 
    }
  }
  echo $day."の件数 : ".$count."件<br>";
  $count=0;
}

// 日別かつ人別の件数を取得
foreach ($days as $day) {
  foreach ($persons as $person) {
    foreach ($data as $key=>$val) {
      if ($data[$key][4] == $day) {
        if ($data[$key][1] == $person) {
          $count ++; 
        }
      }
    }
    if (!0 == $count) {
      echo $day."の".$person." 注文件数 : ".$count."件<br>";
      $count = 0;
    }
  }
}

// 日別の合計金額 
foreach ($days as $day) {
  foreach ($data as $key=>$val) {
    if ($data[$key][4] == $day) {
      $amount += $data[$key][15];
    }
  }
  echo $day."の合計金額 : ".$amount."<br>";
  $amount = 0;
}

// 日別かつ人別の合計金額
foreach ($days as $day) {
  foreach ($persons as $person) {
    foreach ($data as $key=>$val) {
      if ($data[$key][4] == $day && $data[$key][1] == $person) {
        $amount += $data[$key][15];
      }
    }
    if (!0 == $amount) {
      echo $day."の".$person." の合計金額 : ".$amount."<br>";
      $amount = 0;
    }
  }
}

// ファイルを閉じる
fclose($fp);

?>