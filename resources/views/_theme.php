<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <?= $head ?? ''; ?>

    <link rel="stylesheet" href="<?= resource("/style.css"); ?>"/>
</head>
<body>


<!--CONTENT-->
<main class="main_content">
    <?= $v->section("content"); ?>
</main>

<script src="<?= resource("/script.js"); ?>"></script>
<?= $v->section("scripts"); ?>

</body>
</html>
