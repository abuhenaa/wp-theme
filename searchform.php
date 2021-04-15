<?php

/* 
 * Default Search Form 
 */
?>
<div class="search_box">
    <form class="search_form" method="get" action="<?php echo esc_url( home_url( '/' ) )?>">
        <div class="form_group">
            <input type="search" class="form_control" name="s" placeholder="Search Your Keyword">
            <i class="fas fa-search"></i>
        </div>
        <div class="button">
            <input type="submit" class="saiful_btn" value="Search">
        </div>
    </form>
</div>

