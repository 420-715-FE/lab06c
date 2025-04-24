<?php

require_once(__DIR__ . '/../helpers.php');

generateHTMLHeader('Galerie de photos');

?>

<body>

<h1>Galerie de photos</h1>

<ul id="gallery">
    <?php foreach ($photos as $photo): ?>
        <li>
            <img src="<?= $photo['file_path'] ?>" alt="<?= $photo['description'] ?>">
            <p><?= $photo["description"] ?></p>
        </li>
    <?php endforeach; ?>
</ul>

</body>
</html>
