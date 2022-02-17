<?php
define('admin23', true);
include("include/db_connect.php");
include("functions/functions.php");

session_start();

$cat= clear_string($_GET["cat"]);
$type= clear_string($_GET["type"]);

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>

    <link href="css/reset.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" media="all" href="css/animate.css">
	
	<link href="slick/slick.css" rel="stylesheet" type="text/css" />
	 <link href="slick/slick-theme.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript" src="/js/jquery-3.1.1.min"></script>
    <script type="text/javascript" src="/js/ji.js"></script>
    <script type="text/javascript" src="/js/jquery.cookie.min.js"></script>
    <script type="text/javascript" src="/js/textchange.js"></script>
	<script type="text/javascript" src="/js/wow.min.js"></script>
	<script>new WOW().init();</script>
	
	<script type="text/javascript" src="/slick/slick.js"></script>
	
	<meta charset="utf-8">
	
	<title>Оформление недвижимости</title>

	<meta name="viewport" content="device-width=640, initial-scale=0.4">
	
	<meta name="Description" content="Оформление разрешительных документов в Одессе, правоустанавливающие документы, землеустроительные и оценочные работы, оформление недвижимости, техническая инвентаризаия">
		
		<meta name="keywords" content="Оформление правоустанавливающих докуметов, разрешение на строительство, работа с проблемной недвижимостью,
										приватизация недвижимости, оформление недвижимости, оформление наследства, регистрация права собственности,
										техническая инвентаризация, оценка, землеустроительные работы.">
	
		<meta name="google-site-verification" content="zoxMZvxQnschibnBy0OpVuhQIMW8C6BEJObnzHmpbDI" />
	
	    <meta name="msvalidate.01" content="6488F9AA41AA09F37184AD99ED4148DD" />
		
		<script type='application/ld+json'> 
{
  "@context": "http://www.schema.org",
  "@type": "адвокат",
  "url": "https://kadastr.od.ua",
  "description": "Оформление правоустанавливающих документов, разрешение на строительство, работа с проблемной недвижимостью, приватизация недвижимости, оформление недвижимости, оформление наследства, регистрация права собственности, техническая инвентаризация, оценка, землеустроительные работы.",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "просп. Гагарина,25",
    "addressLocality": "Одесса",
    "postalCode": "65000",
    "addressCountry": "Украина"
  },
  "openingHours": "Mo, Tu, We, Th, Fr 09:00-18:00",
  "contactPoint": {
    "@type": "ContactPoint",
    "telephone": "+38 (073) 310-17-17"
  }
}
 </script>

</head>

<body>
<div id="block-body">

    <div id="block-header">
        <?php
            include("include/block-header.php");
        ?>
    </div>
	

	
	<div id="block-first">
	
		<div id="block-first-fon">
		
		<div id="block-first-content">
				
		<h1>
			Разрешение на строительство
			</br>
			Приватизация недвижимости
			</br>
			Оформление недвижимости
			</br>
			Регистрация прав собственности
			</br>
			Техническая инвентаризация
			</br>
			Оценка
			</br>
			Представление в суде
			</br>
			Землеустроительные работы
			</br>
			Правоустанавливающие документы
			
				
		</h1>
		
		</div>
		
		</div>
	
	</div>
	
	<div>
	
	    <?php
            include("include/block-indikator.php");
        ?>
	
	</div>
	
	<div>
	
	    <?php
            include("include/block-yslugi.php");
        ?>
	
	</div>
	
	<div>
	
	    <?php
            include("include/block-object.php");
        ?>
	
	</div>
	
	<div>
	
	    <?php
            include("include/block-vibor.php");
        ?>
	
	</div>
	
	<div>
	
	    <?php
            include("include/block-prior.php");
        ?>
	
	</div>
	
	<div id="block-otziv">
	
		<h2>Отзывы о нашей компании</h2>
	
		<div class="otziv-top">
	
		<div class="otziv-cont">
	
	    <div class="slaid-main">	
	
			<div class="main">
 
				<div class="sl">
							
						<div class="sl__text">
						
							<table>
								<tr>
									<td><img src="images/foto33.png"></td>
									<td><a>Виктория</a></td>
								</tr>
								
							</table>
							
							<div id="text-otziv">
								<p>Обратилась осенью в данную компанию. Помогли быстро, качественно
								и профессионально оформить все документы о вступлении в наследство.
								Очень довольна.</p>
							
							</div>
						
						</div>
						
						<div class="sl__text">
						
							<table>
								<tr>
									<td><img src="images/foto22.png"></td>
									<td><a>Алексей</a></td>
								</tr>
								
							</table>
							
							<div id="text-otziv">
								<p>Приватизировал квартиру. Обратился в данную компанию. Все сделали на
								высшем уровне. Возникнет необходимость, буду обращаться еще.</p>
							
							</div>
						
						</div>
						
						<div class="sl__text">
						
							<table>
								<tr>
									<td><img src="images/foto41.png"></td>
									<td><a>Мария Ивановна</a></td>
								</tr>
								
							</table>
							
							<div id="text-otziv">
								<p>Обратилась в данную компанию для переоформления технического паспорта.
								Взялись за работу сразу и вкратчайшие сроки получина нужный документ.</p>
							
							</div>
						
						</div>
						
						<div class="sl__text">
						
							<table>
								<tr>
									<td><img src="images/foto11.png"></td>
									<td><a>Кристина</a></td>
								</tr>
								
							</table>
							
							<div id="text-otziv">
								<p>Возникла необходимость сделать экспертную оценку земельного 
								участка для выкупа. Обратилась к ребятам. Сделали все профессионально и
								и в срок. Буду рекомендовать их своим знакомым.</p>
							
							</div>
						
						</div>
						
						<div class="sl__text">
						
							<table>
								<tr>
									<td><img src="images/foto5.png"></td>
									<td>
										<ul>
											<li><a>Николай Петрович</a></li>
											<li id="ivanovna"><a>Вера Ивановна</a></td></li>
										</ul>
									</td>
								</tr>
								
							</table>
							
							<div id="text-otziv">
								<p>Оформляли договор дарения на дом. Ребята взялись и без проволочек все сделали.
								Большое им спасибо.</p>
							
							</div>
						
						</div>

				</div>
	
			</div>
 
		</div>
		
		</div>
		
		</div>
								 
	</div>
	
	

	
	<div id="block-contact">
			
		<h4>Как с нами связатся</h4>
		
		<div class="feed-flex-container">
			
			<div class="feed-flex-block">
			
				<?php function check_mobile_device() { 
				$mobile_agent_array = array('ipad', 'iphone', 'android', 'pocket', 'palm', 'windows ce', 'windowsce', 'cellphone', 'opera mobi', 'ipod', 'small', 'sharp', 'sonyericsson', 'symbian', 'opera mini', 'nokia', 'htc_', 'samsung', 'motorola', 'smartphone', 'blackberry', 'playstation portable', 'tablet browser');
				$agent = strtolower($_SERVER['HTTP_USER_AGENT']);    
				foreach ($mobile_agent_array as $value) {    
				if (strpos($agent, $value) !== false) return true;   
				};     
				return false; 
				};?>
				<p>Позвоните нам</p>
				<p id="number-telephon">+38 073 910 13 13</p>
				<p>или напишите нам </p>
				
				<? if(check_mobile_device()) :?>
					<a href="viber://chat?number=380733101717"><img src="/images/Viber.png"/></a> 
							

						<? else : ?>
					<a title="Должен быть устоновлен Viber для ПК" href="viber://chat?number=+380733101717"><img src="/images/Viber.png"/></a>
				<? endif; ?>
				
									
				<a href="https://wa.me/380733101717?text=Здравствуйте.%20Вопрос%20по%20поводу%20оформления%20документов."><img src="/images/WhatsApp.png"/></a>

			
				<a href="tg://resolve?domain=@YakhaBot"><img src="/images/Telegram.png"/></a>
				
			</div>
			

				
			<div class="feed-flex-block">
					
						<?php


							if ($_POST["send_message"])
								{
								$error = array();
									if (!$_POST["feed_name"])
									$error[] = "Укажите имя!";
							if (!$_POST["feed_phone"])
								$error[] = "Укажите номер телефона!";
							if (!preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i",trim($_POST["feed_email"])))
								{
								$error[] = "Укажите корректный email!";
								}
								if (!$_POST["feed_subject"])
								$error[] = "Укажите тему заявки!";
									if (!$_POST["feed_text"])
									$error[] = "Укажите текст заявки!";

									if (count($error))
										{
										$_SESSION['message'] = "<p id='form-error'>".implode('<br/>',$error)."</p>";
										} else
											{
										send_mail($_POST["feed_mail"],'KADASTR@ONLINE.UA',$_POST["feed_subject"],'От:'.$_POST["feed_name"].'телефон-:'.$_POST["feed_phone"].' email-:'.$_POST["feed_email"].'<br/>'.$_POST["feed_text"]);
										$_SESSION['message'] = "<p id='form-success'>Ваша заявка успешно отправлена! Мы скоро с вами свяжемся!</p>";
										}
											}
										?>


				
					<div id="block-content-feedback">
    
							<div id="error">
								<?php

								if (isset($_SESSION['message'])){
								echo $_SESSION['message'];
								unset($_SESSION['message']);
								}
								?>
							</div>

			<h3>или оставьте заявку и мы сами с вами свяжемся</h3>

			<form method="post">
				<div id="block-feedback">

				<ul id="feedback">
	
                <li>
				<div class="field">
                <label id="feed-name">имя</label>
                <input type="text" name="feed_name"/>
				</div>
                </li>

                <li>
				<div class="field">
                <label id="feed-phone">телефон</label>
                <input type="text" name="feed_phone"/>
				</div>
                </li>

                <li><div class="field">
                <label id="feed-email">email</label>
                <input type="text" name="feed_email"/>
				</div>
                </li>

                <li>
				<div class="field">
                <label id="feed-sabgect">тема</label>
                <input type="text" name="feed_subject"/>
				</div>
                </li>

                <li>
				<div class="field">
                <label>сообщение</label>
                <textarea name="feed_text"></textarea>
				</div>
                </li>
				
				</ul>
						
				<p align="right"><input type="submit" name="send_message" id="form_submit" /></p>
			
				</div>

					</form>
			
					</div>

			</div>
			
</div>
	

	
	<div id="maps">
	
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2748.743539526881!2d30.741450115635583!3d46.45377837912516!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40c633db1bccfc77%3A0x68b9b751f66b6ca2!2z0L_RgNC-0YHQvy4g0JPQsNCz0LDRgNC40L3QsCwgMjUsINCe0LTQtdGB0YHQsCwg0J7QtNC10YHRgdC60LDRjyDQvtCx0LvQsNGB0YLRjCwgNjUwMDA!5e0!3m2!1sru!2sua!4v1579990551636!5m2!1sru!2sua" width="100%" height="600" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
		
	</div>
	

<div>	
	<?php

		include("include/block-footer.php");	

	?>
</div>
</div>

</body>
</html>