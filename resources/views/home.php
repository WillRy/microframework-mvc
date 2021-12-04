<?php $v->layout("_theme") ?>

<div class="welcome">
    <div class="welcome-box">
        It Works!
    </div>
</div>
<?php $v->start("scripts"); ?>
    <script type="text/javascript">
        window.alert("It Works!");
    </script>
<?php $v->end(); ?>