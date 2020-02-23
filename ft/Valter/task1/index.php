
<form action="#" method="post">
	<input type="text" name="text">
	<input type="submit" name="submit" value="Check">
</form>
<?php
$text  = $_POST['text'];
$check_text = strrev($text);
$split_text = str_split($check_text);
$res = '';
foreach ($split_text as $value){
    $res .=$value;
}
print $res;
if ($text == $res){
    print "<br>Palindrome";
} else {
    print "<br>Not Palindrome";
}
?>