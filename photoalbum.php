<!doctype html>
<html lang="en">
<head>
    <title>Фотография</title>
</head>
<?php
$files = scandir(__DIR__ . '/uploads');
$links = [];
    foreach ($files as $fileName) {
        if ($fileName === '.' || $fileName === '..') {
            continue;
        }
        $links[] = 'uploads/' . $fileName;
    }
foreach($links as $link):?>
    <a href="<?= $link ?>"><img src="<?= $link ?>" height="80px"></a>
<?php endforeach; ?>
</body>
</html>