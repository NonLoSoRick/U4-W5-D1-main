<?php
session_start();

if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
    setcookie('lang', $_GET['lang'], time() + (86400 * 30), "/");
} elseif (isset($_COOKIE['lang'])) {
    $_SESSION['lang'] = $_COOKIE['lang'];
} else {
    $_SESSION['lang'] = 'en'; // Lingua predefinita
}



// index.php
require_once 'lang/' . $_SESSION['lang'] . '.php';
echo "<a href='?lang=en'>$lang[home]</a>";
echo "<a href='?lang=it'>$lang[home]</a>";
