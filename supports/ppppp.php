<?PHP

$arr = array();
$buff;

// заполнение массива
for ($i=0;$i<1 000 000 ;i++ )
{
// генерация случайного числа 
do
{ 
 $pow = rand(1,32);
 $even = rand(0,1);
 $item = pow(2,$pow) - $even;
}while(in_array($item,$arr))

$arr[$i] = $item;
}//end for в массиве нет совпадений, массив не отсортирован

//генерация совпадения
$a = rand(0,999999);
do
{ $b = rand(0,999999);} while($a != $b)

$arr[$a] = $arr[$b];

// поиск совпадения
// 1

foreach ($arr as $value)
{
 $buff = $value;
 $value = -1;

 if(in_array($buff,$arr))	
 	break;

$value = $buff;
}

// 2
for($i=0;$i < 1000000;i++)
{
  for ($j=$i+1;$j<1000000 ;$j++ )
  {
    if ($arr[$i] ==$arr[$j])
    {
      $buff = $arr[$i];
    }
  }
}

// общий вывод ответа
echo $buff;
?>
