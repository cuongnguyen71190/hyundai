<?php
$sidebar=vsii_get_sidebar();
echo "<div class='content-sidebar col-xs-12 col-sm-12 col-md-3 left-sidebar'>";
if(is_active_sidebar($sidebar['id'])){

	dynamic_sidebar($sidebar['id']);
}
echo "</div><!--End sidebar-->";

