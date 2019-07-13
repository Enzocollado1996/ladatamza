<div class="menu">
        <div class="weather">
            <div class="data">LA DATA MZA _</div>
            <div class="temp"></div>
            <img src="" alt="" width="24">
        </div>
        <div class="logo">   <a href="<?=$this->Url->build(['controller' => 'Frontend', 'action' => 'index'])?>">
                <?php echo $this->Html->image("../assets/images/logo.png"); ?>
            </a></div>
        <div class="social">
            <svg  class="lupa" xmlns="http://www.w3.org/2000/svg" onclick="socialModal(true);" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-search">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
            <svg class="heart" onclick="socialModal();" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-heart">
                <path
                    d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                </path>
            </svg>
        </div>
</div>
