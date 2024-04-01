<?php

require __DIR__ . '/auth.php';
$login = getUserLogin();

if ($login !== null && !empty($_FILES['attachment'])) {

        $file = $_FILES['attachment'];

        $srcFileName = $file['name'];
        $newFilePath = __DIR__ . '/uploads/' . $srcFileName;

        $allowedSize = 1024 * 1024 * 8;
        $fileSize = $file['tmp_name'];
        $allowedExtensions = ['jpg', 'png', 'gif'];
        $extension = pathinfo($srcFileName, PATHINFO_EXTENSION);

        if ($fileSize > $allowedSize) {
            $error = 'Слишком большой файл, максимум 8 Мб';
        }
        if (!in_array($extension, $allowedExtensions)) {
            $error = 'Загрузка файлов с таким расширением запрещена';
        }
        if ($file['error'] !== UPLOAD_ERR_OK) {
            $error = 'Ошибка при загрузке файла.';
        }
        elseif (file_exists($newFilePath)) {
            $error = 'Файл с таким именем уже существует';
        }
        elseif (!move_uploaded_file($file['tmp_name'], $newFilePath)) {
            $error = 'Ошибка при загрузке файла';
        }
        else {
            $result = 'http://localhost/uploads/' . $srcFileName;
        }
}
?>
<!doctype html>
<html lang="en">
<head>
    <title>Загрузка файла</title>
</head>
<body>
<?php if ($login === null): ?>
    <a href="/login.php">Авторизуйтесь</a>
<?php else: ?>
    Добро пожаловать, <?= $login ?> |
    <a href="/logout.php">Выйти</a>
    <br>
<?php if (!empty($error)): ?>
    <?= $error ?>
<?php elseif (!empty($result)): ?>
    <?= $result ?>
<?php endif; ?>
<br>
<form action="/upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="attachment">
    <input type="submit">
</form>
<?php endif; ?>
</body>
</html>