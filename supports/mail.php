﻿<!doctype html>
<? 
if (isset($_POST['submitbtn']))
{
  if ($_POST['name']=='' or $_POST['email']=='' or
 $_POST['message']=='')
  {
    echo "<font color='red'>Вы ввели не все данные</font>";
    echo "<br><a href=../contacts.html>Назад</a>";
    exit;
  }
 
    //Куда будет отправлено письмо
    $komu="mr.gitlab@mail.ru";
    //Тема письма
    $tema="Вопрос от ".$_POST['name']." ".$_POST['email']." ".$_POST['subject'];
    //Само письмо
    $text_pisma=$_POST['message'];
 
    //Отправляем письмо
    mail($komu,$tema,$text_pisma);
 
  echo "<p>Ваш вопрос был отправлен администратору</p>";
  echo "<br><a href=../contacts.html>Назад</a>";
    //Выполнять больше нечего, выходим из программы
    exit;
?>

<html lang="en">
<head>
<meta charset="utf-8">
<meta name="description" content="Блог о программировании. Контакты для связи." />
<meta name="keywords" content="сайт,блог,контакты" />
<meta name="robots" content="all,follow" />
<meta name="author" content="GIT_labs" />
<!-- disable iPhone inital scale -->
<meta name="viewport" content="width=device-width; initial-scale=1.0">

<title>GIT_Labortory:blog</title>

<!-- main css -->
<link href="../style.css" rel="stylesheet" type="text/css">
<link href="style_form.css" rel="stylesheet" type="text/css">
<!-- media queries css -->
<link href="../media-queries.css" rel="stylesheet" type="text/css">

<!-- html5.js for IE less than 9 -->
<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!-- css3-mediaqueries.js for IE less than 9 -->
<!--[if lt IE 9]>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->

</head>

<body>
<div id="pagewrap">
	<header id="header">
		<hgroup>
			<h1 id="site-logo"><a href="../index.html">GIT_Labortory</a></h1>
			<h2 id="site-description">My blog, vc, for fan:)</h2>
		</hgroup>

		<nav>
			<ul id="main-nav" class="clearfix">
				<li><a href="../index.html">Home</a></li>
				<li><a href="../projects.html" >Projects</a></li>
				<li><a href="../papers.html">Papers</a></li>
				<li><a href="../about.html">About</a> </li>
				<li><a href="../contacts.html" class="active">Contacts</a></li>
			</ul>
			<!-- /#main-nav --> 
		</nav>

		<form id="searchform">
			<input type="search" id="s" placeholder="Search">
		</form>

	</header>
	<!-- /#header -->
	
	<div id="content">
<a href="../contacts.html">Contacts</a> &rarr;Send Mail
		
<article>

<div id="w">
<h1>Написать письмо !</h1>
<form id="contactform" name="contact" method="post" action="scr_mail.php">
<p class="note"><span class="req">*</span> Поля со звездочкой обязательны для заполнения</p>
<div class="row">
<label for="name">Ваше Имя <span class="req">*</span></label>
<input type="text" name="name" id="name" class="txt" tabindex="1" placeholder="Стив Джобс" required>
</div>

<div class="row">
<label for="email">E-mail Адрес <span class="req">*</span></label>
<input type="email" name="email" id="email" class="txt" tabindex="2" placeholder=" address@mail.ru" required>
</div>

<div class="row">
<label for="subject">Тема <span class="req">*</span></label>
<input type="text" name="subject" id="subject" class="txt" tabindex="3" placeholder="Тема письма" required>
</div>

<div class="row">
<label for="message">Сообщение <span class="req">*</span></label>
<textarea name="message" id="message" class="txtarea" tabindex="4" required></textarea>
</div>

<div class="row" align="center">
<input type="submit" id="submitbtn" name="submitbtn" tabindex="5" value="Отправить Сообщение">
</div>
</form>
</div>

		</article>
		<!-- /.post -->
	</div>
	<!-- /#content --> 
		
	<aside id="sidebar">

		<section class="widget">
			<h4 class="widgettitle">Archives</h4>
			<ul>
				<li><a href="#">2016.08</a> (3)</li>
				<li><a href="#">2016.07</a> (23)</li>
				<li><a href="#">2016.09</a>(18)</li>
			</ul>
		</section>
		<!-- /.widget -->

		<section class="widget clearfix">
			<h4 class="widgettitle">Vidgets</h4>
			<script type="text/javascript" src="#"></script>
		</section>
		<!-- /.widget -->
						
	</aside>
	<!-- /#sidebar -->

	<footer id="footer">
	
		<p>&copy; by <a href="../index.html">GIT_Laboratory</a></p>

	</footer>	
</div></body></html>