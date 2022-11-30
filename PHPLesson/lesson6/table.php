<?php 
$num=0;
$fp = fopen('./csv/output.csv','r');

while ($dt = fgetcsv($fp)){
    if ($num == 0) {
        $num++;
        continue;
    }
    $page1[$dt[8]]['数'] = intval($dt[13]);
    $page1[$dt[8]]['合計金額'] = intval($dt[14]);
    $page2[$dt[8]][$dt[10]]['数'] = intval($dt[15]);
    $page2[$dt[8]][$dt[10]]['合計金額'] = intval($dt[16]);
}

$detail = 0;
if (!empty($_GET)){
    $detail = 1;
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admission fee</title>
    <style>
        table {
            border-collapse: collapse; 
            width: 40%;
        }
        th,td {
            border: solid 1px lightgrey; 
        }
        th {
            background: linear-gradient(lightgrey,30%,gray);
            color: white;
        }
        input {
            border: none;
            background-color: white;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <?php if($detail == 0) :?>
        <table>
            <tr>
                <th rowspan="2">売上明細</th>
                <th colspan="2">日計</th>
            </tr>
            <tr>
                <th>数</th>
                <th>金額</th>
            </tr>
            <?php 
                foreach ($page1 as $key=>$val) {
                    echo "<tr><form method='GET' action=''>";
                    echo "<td>";
                    echo "<input type='submit' name='売上明細' value='".$key."'>";
                    echo "</td>";
                    echo "<td>";
                    echo $val['数'];
                    echo "</td>";
                    echo "<td>";
                    echo $val['合計金額'];
                    echo "</td>";                
                    echo "</form><tr>";
                }
            ?>
        </table>
    <?php endif; ?>
    <?php if($detail == 1) :?>
        <table>
            <tr>
                <th rowspan="2">売上明細</th>
                <th colspan="2">日計</th>
            </tr>
            <tr>
                <th>数</th>
                <th>金額</th>
            </tr>
            <?php 
                foreach ($page2[$_GET['売上明細']] as $key=>$val) {
                    echo "<tr><form method='GET' action=''>";
                    echo "<td>";
                    echo $key;
                    echo "</td>";
                    echo "<td>";
                    echo $val['数'];
                    echo "</td>";
                    echo "<td>";
                    echo $val['合計金額'];
                    echo "</td>";                
                    echo "</form><tr>";
                }
            ?>
        </table>
    <?php endif; ?>
</body>
</html>