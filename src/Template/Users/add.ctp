<!-- src/Template/Users/add.ctp -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Usuario
            <a href="<?=$this->Url->build(['action' => 'index'], true)?>" class="btn btn-default pull-right"><span class="fa fa-th-list"></span>&nbsp;Listado</a>
        </h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-6">
    <?= $this->Form->create($user, ['role' => 'form']) ?>
        <div class="form-group">
            <?=$this->Form->control('username',['label' => 'Usuario', 'class'=>'form-control']);?>
        </div>
        <div class="form-group">
            <?=$this->Form->control('password',['label' => 'Contraseña', 'class'=>'form-control', 'type' => 'password']);?>
        </div>
        <div class="form-group">
            <?=$this->Form->control('role',['label' => 'Rol', 'class'=>'form-control','options' => ['admin' => 'Admin', 'operador' => 'Operador']]);?>
        </div>
        <?= $this->Form->button(__('Guardar'),['class'=>'btn btn-success pull-right','type' => 'submit']) ?>
    <?= $this->Form->end() ?>
    </div>
</div>
<br>