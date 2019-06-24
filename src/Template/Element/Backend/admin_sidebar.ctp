
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">            
            <li>
                <a href="<?=$this->Url->build(['controller' => 'Backend', 'action' => 'index'], true)?>"><i class="fa fa-dashboard fa-fw"></i>&nbsp;Inicio</a>
            </li>
            <li>
                <a href="<?=$this->Url->build(['controller' => 'Articulos', 'action' => 'index'], true)?>"><i class="fa fa-file-text"></i>&nbsp;&nbsp;Artículos</a>
            </li>
            <li>
                <a href="<?=$this->Url->build(['controller' => 'Imagenes', 'action' => 'index'], true)?>"><i class="fa fa-picture-o"></i>&nbsp;Imágenes</a>
            </li>
<!--            <li>
                <a href="<?=$this->Url->build(['controller' => 'Banners', 'action' => 'index'], true)?>"><i class="fa fa-th-large fa-fw"></i> Banners</a>
            </li>-->
            <?php
            if($Auth->user('role') == 'admin'):
            ?>
            <li>
                <a href="<?=$this->Url->build(['controller' => 'Users', 'action' => 'index'], true)?>"><i class="fa fa-user fa-fw"></i>&nbsp;Usuarios</a>
            </li>
            <?php
            endif;
            ?>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>