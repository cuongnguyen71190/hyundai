<form action="<?php the_permalink(); ?>" method="POST" class="register-learning">
	<input type="hidden" name="vsii-action" value="actionRegister">
    <div class="form-group">
        <label class="control-label" for="parent-name">Họ tên*</label>
        <input type="text" class="form-control" id="parent-name" name="parent-name" required=""
        	oninvalid="this.setCustomValidity('Nhập họ tên')"
		 	oninput="setCustomValidity('')">
    </div>
    <div class="form-group">
        <label for="your-phone">Số điện thoại*</label>
        <input class="form-control" type="tel" value="" id="your-phone" name="your-phone" required=""
        	oninvalid="this.setCustomValidity('Nhập số điện thoại')"
		 	oninput="setCustomValidity('')">
    </div>
    <div class="form-group">
        <label for="email">Địa chỉ email*</label>
        <input type="email" class="form-control" id="email" name="email" required=""
            oninvalid="this.setCustomValidity('Nhập địa chỉ email')"
            oninput="setCustomValidity('')">
    </div>
    <div class="form-group">
        <label for="car-type">Xe quan tam*</label>
        <input type="text" class="form-control" id="car-type" name="car-type" required=""
        	oninvalid="this.setCustomValidity('Nhập loai xe quan tam')"
		 	oninput="setCustomValidity('')">
    </div>
    <div class="form-group">
        <label for="message">Tin Nhan*</label>
        <textarea name="message" id="message" cols="43" rows="5" required=""
            oninvalid="this.setCustomValidity('Nhập tin nhan')"
            oninput="setCustomValidity('')"></textarea>
    </div>
    <input type="submit" class="btn btn-default" id="learning-submit" name="submit" value="Gui">
</form>