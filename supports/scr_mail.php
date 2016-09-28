<?php
$page = file_get_contents('pat.tpl');
//Если была нажата кнопка ОК,
//то отправляем письмо и информируем об этом пользователя
if (isset($_POST['submitbtn']))
{
  if ($_POST['name']=='' or $_POST['email']=='' or
 $_POST['message']=='')
  {
    $textReplace = "Вы ввели не все данные";    
  }
 else
 {
    //Куда будет отправлено письмо
    $komu="mr.gitlab@mail.ru";
    //Тема письма
    $tema="Вопрос от ".$_POST['name']." ".$_POST['email']." ".$_POST['subject'];
    //Само письмо
    $text_pisma=$_POST['message'];
 
    //Отправляем письмо
    mail($komu,$tema,$text_pisma);
 $textReplace = "Ваш вопрос был отправлен администратору";
 }
$page = str_replace('{REPLACER}', $textReplace, $page);

  echo $page;
    //Выполнять больше нечего, выходим из программы
    exit;
}
?>