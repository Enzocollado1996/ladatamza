<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $title_for_layout ?></title>
    <?= $this->Html->meta(
        'favicon.ico',
        'ico/favicon.png',
        ['type' => 'icon']
    );?>
    <?= $this->Html->charset("utf-8") ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap Core CSS -->
    <?= $this->Html->css('backend/bootstrap.min.css') ?>

    <!-- MetisMenu CSS -->
    <?= $this->Html->css('backend/metisMenu.min.css') ?>

    <!-- Custom CSS -->
    <?= $this->Html->css('backend/sb-admin-2.min.css') ?>

    <!-- Custom Fonts -->
    <?= $this->Html->css('backend/font-awesome.min.css') ?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="container">
        <div class="row">
            <?= $this->Flash->render('auth') ?>
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Iniciar sesión</h3>
                    </div>
                    <div class="panel-body">
                        <!--<form role="form">-->
                        <?= $this->Form->create() ?>
                            <fieldset>
                                <div class="form-group">
                                    <?= $this->Form->input('username',['label' => 'Usuario', 'class'=>'form-control', 'placeholder' => 'usuario']) ?>
                                </div>
                                <div class="form-group">
                                    <?= $this->Form->input('password',['label' => 'Contraseña', 'class'=>'form-control', 'placeholder' => 'contraseña', 'type' => 'password']) ?>
                                </div>
<!--                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>-->
                                <?= $this->Form->button(__('Ingresar'),['class'=>'btn btn-lg btn-success btn-block']); ?>
                            </fieldset>
                        <?= $this->Form->end() ?>                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <?= $this->Html->script('backend/jquery.min'); ?>
    <!-- Bootstrap Core JavaScript -->
    <?= $this->Html->script('backend/bootstrap.min'); ?>
    <!-- Metis Menu Plugin JavaScript -->
    <?= $this->Html->script('backend/metisMenu.min'); ?>

    <!-- Custom Theme JavaScript -->
    <?= $this->Html->script('backend/sb-admin-2.min'); ?>
    <?= $this->fetch('script') ?>
</body>

</html>
