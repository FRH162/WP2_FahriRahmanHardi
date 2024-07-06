<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container">
    <?= // var_dump()
    d($_SERVER)
    ?>
    <?= // var_dump() and die()
    dd($_SERVER)
    ?>
</div>
<?= $this->endSection() ?>