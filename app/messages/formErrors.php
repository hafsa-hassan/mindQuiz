<?php if (count($errors) > 0): ?>
    <div class="message error-message">
        <?php foreach($errors as $error): ?>
            <li><?php echo $error; ?></li>
        <?php endforeach; ?>
    </div>
<?php endif; ?>