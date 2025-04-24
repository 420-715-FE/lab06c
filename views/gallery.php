<?php

require_once(__DIR__ . '/../helpers.php');

generateHTMLHeader('Galerie de photos');

?>

<body>

<h1>Galerie de photos</h1>

<ul class="gallery">
    <?php foreach ($photos as $photo): ?>
        <li>
            <a href="<?= $photo['url'] ?>">
                <img src="<?= $photo['filepath'] ?>" alt="<?= $photo['description'] ?>">
            </a>
        </li>
    <?php endforeach; ?>
</ul>

</body>
</html>
