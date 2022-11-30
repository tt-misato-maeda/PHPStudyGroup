<!-- form の内容を表示する -->
<?php
echo '入力した名前は ';
print($_POST['store']['name']);
echo '<br>';
echo '入力した年齢は ';
print($_POST['store']['age']);
?>