<?php
error_reporting(0);
include "Warning.php";
?>

<?php
$fp1 = fopen('./csv/output.csv','r');
while ($dt = fgetcsv($fp1)){
    $data[$dt[2]]['stock'] += 1;
    if($dt[11] > $data[$dt[2]]['maxprice']){
        $data[$dt[2]]['maxprice'] = $dt[11];
        $data[$dt[2]]['maxpriceitem'] = $dt[3];
    }
}

$fp2 = fopen('./csv/output_shopname.csv','r');
while($dt = fgetcsv($fp2)){
    if (isset($data[$dt[0]])){
        $shops[$dt[1]] = $data[$dt[0]];
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>shop-info</title>
</head>
<body>
    <form action="" method="get">
        <select name="shopname">
            <?php foreach($shops as $key => $val):?>
                <?php if(isset($_GET['shopname']) && $key === $_GET['shopname']) :?>
                    <option value="<?php echo $key; ?>" selected><?php echo $key; ?></option>
                <?php else: ?>
                    <option value="<?php echo $key; ?>"><?php echo $key; ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="送信">
    </form>
</body>
</html>

<?php
if($_GET['shopname']){
    echo $_GET['shopname'],"の情報を表示します。<br><br>";
    echo "在庫数 : ",$shops[$_GET['shopname']]['stock'],"品です。<br><br>";
    echo "もっとも高額な品物は<br>",$shops[$_GET['shopname']]['maxpriceitem'];
}
?>