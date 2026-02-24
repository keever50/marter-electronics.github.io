<?php
$json = file_get_contents(__DIR__ . '/projects.json');
$projects = json_decode($json, true);

if (!$projects) {
    die("Failed to load projects.json");
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>MARTER_ELECTRONICS</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="topbar">
<pre>======== MARTER_ELECTRONICS ========</pre>
<div class="menu">
  <a href="page2.html" class="tui-btn">[ Projects ]</a>
  <a href="page2.html" class="tui-btn">[ About ]</a>
  <a href="page2.html" class="tui-btn">[ Contact ]</a>
</div>
<pre>PROJECTS</pre>
</div>

<main>

<div class="windows">

<?php foreach ($projects as $p): 
  $class = !empty($p["wip"]) ? "tui-window-wip" : "tui-window";
?>

  <div class="<?= $class ?>">
    <div class="tui-title"><?= htmlspecialchars($p["title"]) ?></div>

    <div class="tui-body">
      <pre><?= htmlspecialchars($p["category"]) ?></pre>
    </div>

    <div class="tui-body">
      <a href="<?= htmlspecialchars($p["media"]) ?>" data-heavy="true">
        <img src="<?= htmlspecialchars($p["thumb"]) ?>" height="300" loading="lazy">
      </a>
    </div>

    <div class="tui-footer">
      <a href="<?= htmlspecialchars($p["page"]) ?>" class="tui-btn">
        [ Show more ]
      </a>
    </div>
  </div>

<?php endforeach; ?>

</div>

</main>

<footer>
<pre style="background:#281414;color:white;text-align:center;">
Footer
</pre>
</footer>

<script src="script.js"></script>
</body>
</html>