<div class="buscar_modal">
	<div class="content-sm src">
	    <form id="target" method="POST" action="<?php echo $this->Url->build(['controller' => 'Frontend', 'action' => 'buscarNota'])?>">
	        <input type="text" name="query">
	        <button type="submit" class="btn-amarillo btn-mas-noticias">BUSCAR</button>
	    </form>
	</div>
	<svg  onclick="cerrar(true);" class="close" width="64" version="1.1" xmlns="http://www.w3.org/2000/svg" height="64" viewBox="0 0 64 64" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 64 64">
	<g>
	    <path fill="#feee00" d="M28.941,31.786L0.613,60.114c-0.787,0.787-0.787,2.062,0,2.849c0.393,0.394,0.909,0.59,1.424,0.59   c0.516,0,1.031-0.196,1.424-0.59l28.541-28.541l28.541,28.541c0.394,0.394,0.909,0.59,1.424,0.59c0.515,0,1.031-0.196,1.424-0.59   c0.787-0.787,0.787-2.062,0-2.849L35.064,31.786L63.41,3.438c0.787-0.787,0.787-2.062,0-2.849c-0.787-0.786-2.062-0.786-2.848,0   L32.003,29.15L3.441,0.59c-0.787-0.786-2.061-0.786-2.848,0c-0.787,0.787-0.787,2.062,0,2.849L28.941,31.786z"/>
	</g>
	</svg>
</div>
