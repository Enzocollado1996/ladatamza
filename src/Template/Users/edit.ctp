<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Usuario
            <?php
            if($Auth->user('role') == 'admin'):
            ?>
            <a href="<?=$this->Url->build(['action' => 'delete', $user->id], true)?>" class="btn btn-danger pull-right"><span class="fa fa-trash"></span>&nbsp;Eliminar</a>
            <a href="<?=$this->Url->build(['action' => 'index'], true)?>" class="btn btn-default pull-right" style="margin-right:5px;"><span class="fa fa-th-list"></span>&nbsp;Listado</a>
            <?php
            endif;
            ?>            
        </h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-6">
    <?= $this->Form->create($user, ['role' => 'form', 'type' => 'post']) ?>
        <div class="form-group">
            <?=$this->Form->control('username',['label' => 'Usuario', 'class'=>'form-control', 'required' => 'required']);?>
        </div>
        <div class="form-group">
            <?=$this->Form->control('password',['label' => 'Contraseña','placeholder' => 'Para cambiar, complete este campo', 'class'=>'form-control', 'type' => 'password', 'value'=>'','required' => false]);?>
        </div>
        <div class="form-group">
            <?=$this->Form->control('role',['label' => 'Rol', 'class'=>'form-control','options' => ['admin' => 'Admin', 'operador' => 'Operador']]);?>
        </div>
    <?= $this->Form->button(__('Guardar'),['class'=>'btn btn-success pull-right','type' => 'submit']) ?>
    <?= $this->Form->end() ?>
    </div>
</div>
<br>