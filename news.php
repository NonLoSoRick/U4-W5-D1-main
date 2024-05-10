<?php
require_once 'db.php';

$lang = $_SESSION['lang'];

$query = "SELECT title, content FROM news WHERE language = '$lang'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<h2>" . $row['title'] . "</h2>";
        echo "<p>" . $row['content'] . "</p>";
    }
} else {
    echo "Nessuna notizia disponibile.";
}


// news.php
require_once 'lang/' . $_SESSION['lang'] . '.php';
echo "<h1>$lang[news]</h1>";
