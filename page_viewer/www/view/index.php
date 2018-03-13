<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= $model['title'] ?></title>
</head>

<body>

    <form method="POST">
        <label>Файл:</label>
        <select name="file_name">
            <option value="denebola">denebola</option>
            <option value="space">space</option>
            <option value="bender.txt">bender.txt</option>
            <option value="clockwork.txt">clockwork.txt</option>
            <option value="devil.txt">devil.txt</option>
            <option value="vector.txt">vector.txt</option>
        </select>
        <button name="Submit" type="submit">Выполнить</button>
    </form>
    <hr>
    <div style="margin-top: 20px;">
        <?= $model['text'] ?>
    </div>
</body>
</html>
