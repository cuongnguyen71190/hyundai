<?php
extract($data);
?>
<section class="section sp-noi-bat dark" id="product-featured">
    <div class="bg section-bg fill bg-fill  bg-loaded" ></div>
    <div class="section-content relative">
        <div class="row"  id="row-2099103373">
            <div class="col-md-12"  >
                <div class="col-inner"  >
                    <div class="title-special-header">
                        <div class="wrapper-title"><span class="big-title">NHỮNG SẢN PHẨM NỔI BẬT</span><br /> <span class="sub-title">&lt;&lt;&lt;HỖ TRỢ MUA XE TRẢ GÓP, LÃI SUẤT THẤP, THỦ TỤC NHANH CHÓNG&gt;&gt;&gt;</span></div>
                    </div>
                    <?php
                    	echo do_shortcode('[carousel_slide id="' .$data['slider_id']. '"]');
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>