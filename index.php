<form action="index.php" method="post">
    <input type="text" placeholder="localhost" name="localhost">
    <input type="text" placeholder="name" name="name">
    <input type="text" placeholder="password" name="password">
    <input type="text" placeholder="data-base" name="data_base">
    <button name="submit" type="submit">Connect</button>
</form>
<?php
include_once "connect.php";
$s1 = new Sql('root','localhost','','data_base') ;

if(isset($_POST['submit'])){
    $ele = new Elements();
    $ele->valid_test($_POST['name'],$_POST['localhost'],$_POST['password'],$_POST['data_base']);
}
?>