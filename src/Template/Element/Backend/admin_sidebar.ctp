
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
                <a href="<?=$this->Url->build(['controller' => 'Videos', 'action' => 'index'], true)?>"><i class="fa fa-film fa-fw"></i>&nbsp;Videos</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-bullhorn fa-fw"></i>
                    Publicidades
                    <!--<span class="fa arrow"></span>-->
                </a>
                <ul class="nav nav-second-level collapse in" style="height: auto;">
                    <li>
                        <a href="<?=$this->Url->build(['controller' => 'Publicidades', 'action' => 'principal'], true)?>">Principales</a>
                    </li>
                    <li>
                        <a href="<?=$this->Url->build(['controller' => 'Publicidades', 'action' => 'ruedanotas'], true)?>">Entre notas</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="<?=$this->Url->build(['controller' => 'Imagenes', 'action' => 'index'], true)?>"><i class="fa fa-picture-o"></i>&nbsp;&nbsp;Imágenes</a>
            </li>
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