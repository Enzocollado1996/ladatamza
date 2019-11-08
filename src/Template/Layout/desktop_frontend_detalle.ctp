
<?php include($_SERVER['DOCUMENT_ROOT'].'/ladatamza/src/Template/Layout/header.ctp'); ?>
<?= $this->fetch('content') ?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/ladatamza/src/Template/Layout/categoria_sociales.ctp'); ?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/ladatamza/src/Template/Layout/footer.ctp'); ?>
<?= $this->Html->script('../assets/js/jquery.min'); ?>
<?= $this->Html->script('../assets/js/functions'); ?>

<script type="text/javascript">
    shareEffect ('.container-nota-sociales');
</script>


