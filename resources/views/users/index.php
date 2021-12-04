<?php $v->layout("_theme") ?>
<div class="main">
    <div class="box-content">
        <form action="/users" method="get">
            <label for="">Pesquisa</label>
            <div class="form-input">
                <input type="text" name="search" value="<?= $search ?? "" ?>">
                <button type="submit" class="button">Pesquisar</button>
            </div>

        </form>
        <?php if (!empty($search) && $search !== "all"): ?>
            <button type="button" class="button" onclick="limparPesquisa()">Limpar pesquisa</button>
        <?php endif; ?>
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user->id; ?></td>
                    <td><?= $user->first_name; ?></td>
                    <td><?= $user->email; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <?= $paginator; ?>
    </div>
</div>
<?php $v->start("scripts"); ?>
<script type="text/javascript">
    function limparPesquisa() {
        window.location.href = "/users"
    }
</script>
<?php $v->end(); ?>
<style>
    body, html {
        background: #f2f2f2;
    }

    .main {
        padding: 30px;
        display: flex;
        align-items: center;
        justify-content: center;

    }

    .box-content {
        max-width: 600px;
        border-radius: 4px;
        background: #fff;
        margin-top: 60px;
        flex: 1;
        border: 1px solid #dcdcdc;
        padding: 30px;
    }

    form {
        margin-bottom: 20px;
    }

    .form-input {
        position: relative;
    }

    form label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .form-input input {
        width: 100%;
        /* padding: 10px; */
        border: 1px solid #dcdcdc;
        height: 35px;
        box-sizing: border-box;
        padding-right: 100px;
        padding-left: 10px;
    }

    .form-input button {
        position: absolute;
        right: 0;
        top: 0;
        height: 35px;
        margin: 0;
    }


    table {
        width: 100%;
    }

    table th {
        text-align: left;
    }

    .button {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 8px;
        color: #fff;
        font-weight: bold;
        background: #24292f;
        border: none;
        border-radius: 4px;
        margin: 10px 0px;
        cursor: pointer;
    }

    .paginator {
        padding: 10px;
        width: 100%;

        display: flex;
        align-items: center;
        justify-content: center;
    }

    .paginator_item {
        display: inline-flex;
        align-items: center;
        justify-content: center;

        flex: 1;
        padding: 5px;
        background: #24292f;
        color: #fff;
        font-weight: bold;
        margin: 0px 5px;
        border-radius: 4px;
        text-decoration: none;
    }

    .paginator_active {
        opacity: 0.6;
    }
</style>
