
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">            
            <li>
                <a href="<?=$this->Url->build(['controller' => 'Backend', 'action' => 'index'], true)?>"><i class="fa fa-dashboard fa-fw"></i> Inicio</a>
            </li>
<!--            <li>
                <a href="<?=$this->Url->build(['controller' => 'Faqs', 'action' => 'index'], true)?>"><i class="fa fa-comments fa-fw"></i> FAQs</a>
            </li>
            <li>
                <a href="<?=$this->Url->build(['controller' => 'Banners', 'action' => 'index'], true)?>"><i class="fa fa-th-large fa-fw"></i> Banners</a>
            </li>-->
            <?php
            if($Auth->user('role') == 'admin'):
            ?>
            <li>
                <a href="<?=$this->Url->build(['controller' => 'Users', 'action' => 'index'], true)?>"><i class="fa fa-user fa-fw"></i> Usuarios</a>
            </li>
            <?php
            endif;
            ?>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>