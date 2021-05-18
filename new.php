
<?php

if(isset($_POST['submit']))
{
$var_one = $_POST['num1'];
$var_two = $_POST['num2'];

$sum = $var_one + $var_two;

echo $sum;
}
?>

<form action="/new.php" method="post">
<input type="text" placeholder="Enter any number" name="num1"/>
<br/>
<input type="text" placeholder="Enter other number" name="num2"/>
<br/>
<input type="submit" name="submit"/>
</form>
