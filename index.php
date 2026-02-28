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
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>MONOLITH █ FIELD</title>
<link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@400;600&family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
</head>

<body>

<header class="site-header">
  <div class="brand-block">
    <div class="brand-main">
      MONOLITH █ FIELD<span class="cursor"></span>
    </div>
    <div class="brand-sub">-</div>
  </div>

  <nav class="nav">
    <a href="#">PROJECTS</a>
    <a href="#">ABOUT</a>
    <a href="#">CONTACT</a>
  </nav>
</header>

<main class="container">

  <section class="projects-grid">

  <?php foreach ($projects as $index => $p): 
    $class = !empty($p["wip"]) ? "project-card wip" : "project-card";
  ?>

    <article class="<?= $class ?>">

      <div class="project-index">
        <?= str_pad($index + 1, 2, "0", STR_PAD_LEFT) ?>
      </div>

      <div class="project-image">
        <a href="<?= htmlspecialchars($p["media"]) ?>" data-heavy="true">
          <img src="<?= htmlspecialchars($p["thumb"]) ?>" loading="lazy">
        </a>
      </div>

      <div class="project-content">

        <div class="project-meta">
          <span class="meta-label">TYPE</span>
          <?= htmlspecialchars($p["category"]) ?>
        </div>

        <h2 class="project-title">
          <?= htmlspecialchars($p["title"]) ?>
        </h2>

        <div class="project-footer">
          <span class="sys-id">
            HASH: <?= substr(md5($p["title"]), 0, 6) ?>
          </span>

          <a href="<?= htmlspecialchars($p["page"]) ?>" class="project-link">
            OPEN →
          </a>
        </div>

      </div>

    </article>

  <?php endforeach; ?>

  </section>

</main>

<footer class="site-footer">
  <div>© <?= date("Y") ?> MARTER.FABRICA</div>
</footer>

</body>
</html>