<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">

  <title>Document</title>
  <style>
  body {
    display: grid;
    place-items: center;
    height: 100vh;
    font-family: -apple-system;
  }
  </style>
  <?php
  function asset($url)
  {
    $filePath = "http://localhost/laracasts-tutorial/assets/" . $url;
    $filePath = str_replace("\\", "/", $filePath);
    return $filePath;
  }
  ?>
  <?php define('ASSET_ROOT', '../assets'); ?>
  <link rel="stylesheet" type="text/css" href="<?php ASSET_ROOT . '/css/progress_bar.css' ?>">


</head>

<body>
  <div class='progress' id="progress_div">
    <div class='bar' id='bar1'></div>
    <div class='percent' id='percent1'></div>
  </div>
  <?php
  $name = "Dark Matter";
  $read = true;
  $message = $read ? "You Have Read $name" : "You Have Not Read $name";
  $books = [
    ["name" => "Do Androids Dream of Electric Sheep", "author" => "Philip K. Dick", "url" => 'http://dadoes.com'],
    ["name" => "The Langoliers", "author" => "Andy Weir", "url" => 'http://thelangoliers.com'],
    ["name" => "Hail Mary", "author" => "Andy Weir", "url" => "http://hailmary.com"]
  ];

  function filter($data, $fn)
  {
    $filteredData = [];
    foreach ($data as $datum) {
      if ($fn($datum)) {
        $filteredData[] = $datum;
      }
    }
    return $filteredData;
  }
  
  $filteredBooks = array_filter($books, function($book) {
    return $book['author'] === "Andy Weir";
  });
  ?> <h1>
    <?= $message ?>
  </h1>
  <h2>Recommended Books</h2>
  <ul>
    <?php
    foreach ($filteredBooks as $book) : ?>
    <li>name: <?= $book["name"] ?> author: <?= $book["author"] ?> url: <a href=<?= $book["url"] ?>><?= $book["url"] ?>
      </a> </li>
    <?php endforeach; ?>
  </ul>
  <script src="/assets/js/jquery-3.6.1.min.js"></script>
  <script src="/assets/progressBar.js"></script>
  <script>
  ProgressBar.int()
  </script>
</body>

</html>