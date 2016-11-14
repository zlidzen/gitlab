<?php
// создание бд
$link = mysql_connect('localhost', 'mysql_user', 'mysql_password');
if (!$link) {
    die('Ошибка соединения: ' . mysql_error());
}

$sql = 'CREATE DATABASE my_db';
if (mysql_query($sql, $link)) {
    echo "База my_db успешно создана\n";
} else {
    echo 'Ошибка при создании базы данных: ' . mysql_error() . "\n";
}

mysql_select_db('my_db');


 $sql = "CREATE TABLE 'Points' ('id' int auto_increment primary key, 'val' VARCHAR(16), 'name_out' VARCHAR(16)";
    if (mysql_query($sql))
        echo "Создание таблицы завершено";
    else
        echo "Таблицу создать не удалось";
mysql_close($link);
//end создание бд

// создаем заполненную форму для вывода
$template = "<form id='f1' name='f1' method='post' action=''><table border = '0'>";

for ($i=0;$i<100 ;$i++)
{
$template .="<tr>"
  for ($j=0;$j<100 ;$j++)
  {
	// случайное число или пробел
	$r = rand(1,99999);
	if($r == 99999) 
	$r = " ";

   	$template .="<td><input type='text' name='".$i.$j."' value='".$r."' > </td>"
  }
$template .="</tr>";
}
$template .="</table><input type='submit' id='submitbtn' name='submitbtn' value='Отправить'></form>";

echo $template;
?>

// обработка сообщения
<? 
if (isset($_POST['submitbtn']))
{
$sql = '';

// вставим 100 раз по 100 значений
for ($i=0;$i<100 ;$i++)
{
$sql ="INSERT INTO Points VALUES ('";
  for ($j=0;$j<100 ;$j++)
  {
	$sql .=$_POST[$i.$j]."','";
  }
$sql .="')";


$link = mysql_connect('localhost', 'mysql_user', 'mysql_password');

if (!$link) {
    	die('Ошибка соединения: ' . mysql_error());
	break;
	}
	else {$result = mysql_query ( $sql);}

mysql_close($link);

}// end for i
}// end if

?>



