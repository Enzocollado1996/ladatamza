<!DOCTYPE html>
<html lang="en">
    <head>
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

        <title><?= $title_for_layout ?></title>

        <!-- Bootstrap Core CSS -->
        <?= $this->Html->css('backend/bootstrap.min.css') ?>
        <!-- MetisMenu CSS -->
        <?= $this->Html->css('backend/metisMenu.min.css') ?>
        <!-- Custom CSS -->
        <?= $this->Html->css('backend/sb-admin-2.min.css') ?>
        
        <!-- Custom Fonts -->
        <?= $this->Html->css('backend/font-awesome.min.css') ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
        <?= $this->Html->css('backend/backend.css') ?>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?=$this->Url->build(['controller' => 'Backend', 'action' => 'index'], true)?>"><?=\Cake\Core\Configure::read('nombre_portal')?></a>
                </div>
                <!-- /.navbar-header -->

                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li>
                                <a href="<?=$this->Url->build(['controller' => 'Users', 'action' => 'edit', $Auth->user('id')], true)?>"><i class="fa fa-user fa-fw"></i> Perfil de usuario</a>
                            </li>
<!--                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                            </li>-->
                            <!--<li class="divider"></li>-->
                            <li><a href="<?=$this->Url->build(['controller' => 'Users', 'action' => 'logout'], true)?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->
                <?= $this->element('Backend/admin_sidebar') ?>
                <!-- /.navbar-static-side -->
            </nav>

            <div id="page-wrapper">
                <?= $this->fetch('content') ?>
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <?= $this->Html->script('backend/jquery.min'); ?>

        <!-- Bootstrap Core JavaScript -->
        <?= $this->Html->script('backend/bootstrap.min'); ?>

        <!-- Metis Menu Plugin JavaScript -->
        <?= $this->Html->script('backend/metisMenu.min'); ?>
   
        <!-- Custom Theme JavaScript -->
        <?= $this->Html->script('backend/sb-admin-2.min'); ?>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.12.0/moment.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/locale/es.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
        <script type="text/javascript">
            $(function(){
                moment.locale('es');
                $(".btn-delete").click(function(e){
                    e.preventDefault();
                    var link = $(this).attr('href');
                    swal({
                        title: "Está seguro de eliminar este registro?",
                        //text: "",
                        icon: "warning",
                        //buttons: true,
                        dangerMode: true,
                        buttons: ["Cancelar", "Eliminar"]
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            /*swal("Poof! Your imaginary file has been deleted!", {
                                icon: "success",
                            });*/
                            window.location.href = link;
                        } else {
                            //swal("Your imaginary file is safe!");
                            return false;
                        }
                    });
                });                
            });
        </script>
        
        <?= $this->fetch('script') ?>
    </body>
</html>

