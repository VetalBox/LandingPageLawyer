<?php
define('admin23', true);

?>
<div id="block-header">

<div id="block-header1">
<h3>Панель управления</h3>
<p id="link-nav"><?php echo $_SESSION['urlpage'];?></p>
</div>

<div id="block-header2">
<p align="right"><a href="administrators.php">Администратор</a> | <a href="?logout">Выход</a></p>
<p align="right">Вы - <span><?php echo $_SESSION['admin_role']; ?></span></p>
</div>

</div>

<div id="left-nav">
<ul>

<li><a href="tovar.php">Статьи</a></li>

</ul>
</div>