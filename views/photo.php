<?php

require_once(__DIR__ . '/../helpers.php');

generateHTMLHeader($photo['description']);

?>

<body>

<nav>
    <a href="?">Retour</a>
</nav>

<img src="<?= $photo['file_path'] ?>" />
<p><strong>Description: </strong><?= $photo['description'] ?></p>
<p><strong>Date et heure: </strong><?= $photo['timestamp'] ?></p>
<p><strong>Latitude: </strong><?= $photo['latitude'] ?></p>
<p><strong>Longitude: </strong><?= $photo['longitude'] ?></p>
<p><strong>Étiquettes: </strong></p>
<ul>
    <?php foreach ($photo['tags'] as $tag): ?>
        <li><?= $tag ?></li>
    <?php endforeach; ?>
</ul>

</body>
</html>
