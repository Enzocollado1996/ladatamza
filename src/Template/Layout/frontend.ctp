<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'La Data Mza';
?>
<!DOCTYPE html>
<html>
<head>
    
    <?= $this->Html->charset() ?>
    <?= $this->Html->meta(
            'favicon.png',
            ['type' => 'png']
        );?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-site-verification" content="37hPb73JDnZXMRMYt7S7V5UyMh_R_pzregFx-BosqHo" />
    <meta name="description" content="No podemos vivir aislados pero estamos hartos del ruido? Informar &aacute;gil y simple es el nuevo mantra con la data justa, lo contrario es pasado!!" />
    <meta name="keywords" content="la data mza, La Data Mza, ladatamza,ladatajusta,diarioagil,ladata san rafael, la data san rafael, la data" />
    
    <title>
        <?= $cakeDescription ?>
 
    </title>
    <?= $this->fetch('meta') ?>
    <?= $this->Html->css('../assets/style.css') ?>
    <?= $this->HTml->css('../assets/normalize.css') ?>
</head>
<body>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
