<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Dashboard</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?=('88')?></div>
                        <div>FAQs</div>
                    </div>
                </div>
            </div>
            <a href="<?=$this->Url->build(['controller' => 'faqs', 'action' => 'index'], true)?>">
                <div class="panel-footer">
                    <span class="pull-left">Ver</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-th-large fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?=('77')?></div>
                        <div>Banners</div>
                    </div>
                </div>
            </div>
            <a href="<?=$this->Url->build(['controller' => 'banners', 'action' => 'index'], true)?>">
                <div class="panel-footer">
                    <span class="pull-left">Ver</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <?php
    if($Auth->user('role') == 'admin'):
    ?>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?=$users_count?></div>
                        <div>Usuarios</div>
                    </div>
                </div>
            </div>
            <a href="<?=$this->Url->build(['controller' => 'users', 'action' => 'index'], true)?>">
                <div class="panel-footer">
                    <span class="pull-left">Ver</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <?php
    endif;
    ?>
    
</div>