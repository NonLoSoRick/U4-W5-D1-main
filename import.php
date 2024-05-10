<?php
$host = 'localhost';
$db = 'notizie';
$user = 'root';
$pass = '';
$dsn = "mysql:host=$host;dbname=$db";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$pdo = new PDO($dsn, $user, $pass, $options);

$fo = fopen('utenti.csv', 'r');



while (($data = fgetcsv($fo, 1000, ",")) !== FALSE) {
    $title = $data[1];
    $content = $data[2];
    $language = $data[3];


    $query = "INSERT INTO news ( title, content, language) VALUES ( :title, :content, :language)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([

        ':title' => $title,
        ':content' => $content,
        ':language' => $language
    ]);
}
fclose($fo);
