<?php $zona = $articulos[0]->zona?>
<div class="header-notices" style="background-color: #a5a0a0;">
    <div class="region" style="<?php echo $zona == 'NORTE' ? 'background-color:#feee00;color:black' : '' ?>" onclick="goNews('<?=$this->Url->build(['controller' => 'Frontend', 'action' => 'ver_seccion', 'norte'])?>')">

        norte

    </div>
    <div class="region" style="<?php echo $zona == 'CENTRO' ? 'background-color:#feee00;color:black' : '' ?>" onclick="goNews('<?=$this->Url->build(['controller' => 'Frontend', 'action' => 'ver_seccion', 'centro'])?>')">

        centro

    </div>
    <div class="region" style="<?php echo $zona == 'SUR' ? 'background-color:#feee00;color:black' : '' ?>" onclick="goNews('<?=$this->Url->build(['controller' => 'Frontend', 'action' => 'ver_seccion', 'sur'])?>')">

sur
</div>
</div>