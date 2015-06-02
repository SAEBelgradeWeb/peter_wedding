<form action="<?php echo esc_url( home_url( '/' ) ); ?>" id="searchform" role="search" method="get" />
        <div class="bgsearch">
        <input type="text" value="<?php echo get_search_query(); ?>" id="s" name="s" /> 
        <input type="submit" value="" class="searchbutton" />
        </div>
    </form>
    <div class="clear"></div>