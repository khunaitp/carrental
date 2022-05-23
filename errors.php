<!-- เช็ค error ตามที่ต่างๆ ถ้ามีerror ให้เอา error มาแสดง -->
<?php $errors = array(); ?>
<?php if (count($errors) > 0) : ?>
    <div class="error">
        <?php foreach ($errors as $error) : ?>
            <p><?php echo $error ?></p>
        <?php endforeach ?>
    </div>
<?php endif ?>