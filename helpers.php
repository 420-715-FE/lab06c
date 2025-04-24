<?php

function generateHTMLHeader($pageTitle) {
?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $pageTitle ?></title>
        <link rel="stylesheet" href="water.css" />
        <link rel="stylesheet" href="gallery.css" />
    </head>
<?php
}

// Source: https://www.usefulids.com/resources/generate-uuid-in-php
function uuid()
{
    // Generate 16 random bytes
    $data = random_bytes(16);

    // Set the version to 4 (0100 in binary)
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    // Set the variant to 2 (10 in binary)
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

    // Return the formatted UUID
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

?>
