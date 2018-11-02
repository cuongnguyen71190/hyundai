<div class="search_box">
    <form method="get" class="searchform" action="<?php echo esc_url(home_url('/')) ?>" role="search">
        <div class="flex-row relative">
            <div class="flex-col flex-grow">
            	<input type="search" class="search-field mb-0" name="s" value="<?php echo VsiiInput::request('s') ?>" placeholder="Tìm kiếm&hellip;" />
            	<input type="hidden" name="post_type" value="<?php  echo VsiiInput::request('post_type', 'product') ?>" /></div>
            <div class="flex-col">
            	<button type="submit" class="ux-search-submit submit-button secondary button icon mb-0">
            		<i class="fa fa-search icon-search" ></i>
            	</button>
            </div>
        </div>
    </form>
</div>