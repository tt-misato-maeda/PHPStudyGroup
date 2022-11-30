<?php
$ary_pets  = array(
    "dogs" => array(
                    array("breeds"=>"ゴールデンレトリーバー","size"=>"大型"),
                    array("breeds"=>"ビーグル","size"=>"中型"),
                    array("breeds"=>"チワワ","size"=>"小型")
                    ),
    "cats" => array(
                    array("breeds"=>"ラグドール","size"=>"大型"),
                    array("breeds"=>"ロシアンブルー","size"=>"中型"),
                    array("breeds"=>"マンチカン","size"=>"小型")
                    )
);

foreach ($ary_pets as $pet) {
    foreach ($pet as $index => $value) {
        echo $value["breeds"]."のサイズは".$value["size"]."です。";
        echo "<br>";
    }
}
?>