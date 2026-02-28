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
<title>Marter • Fabrica</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<header class="site-header">
  <div class="brand">Marter • Fabrica</div>
  <nav class="nav">
    <a href="page2.html">Projects</a>
    <a href="page2.html">About</a>
    <a href="page2.html">Contact</a>
  </nav>
</header>

<main class="container">

  <section class="projects-grid">

  <?php foreach ($projects as $p): 
    $class = !empty($p["wip"]) ? "project-card wip" : "project-card";
  ?>

    <article class="<?= $class ?>">

      <div class="project-image">
        <a href="<?= htmlspecialchars($p["media"]) ?>" data-heavy="true">
          <img src="<?= htmlspecialchars($p["thumb"]) ?>" loading="lazy">
        </a>
      </div>

      <div class="project-content">
        <div class="project-meta">
          <?= htmlspecialchars($p["category"]) ?>
        </div>

        <h2 class="project-title">
          <?= htmlspecialchars($p["title"]) ?>
        </h2>

        <a href="<?= htmlspecialchars($p["page"]) ?>" class="project-link">
          View Project →
        </a>
      </div>

    </article>

  <?php endforeach; ?>

  </section>

</main>

<footer class="site-footer">
  © <?= date("Y") ?> Marter Fabrica
</footer>

<script src="script.js"></script>
</body>
</html>