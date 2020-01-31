<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form</title>
</head>
<body>
<form action="results" method="post">
    <label for="color">Color
        <select name="color" id="color">
            <?php foreach (($colors?:[]) as $colorOption): ?>
                <option><?= ($colorOption) ?></option>
            <?php endforeach; ?>
        </select>
    </label>
    <input type="submit" value="Submit">
</form>

</body>
</html>