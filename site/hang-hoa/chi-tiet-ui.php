<div>
    <img src='<?= $CONTENT_URL ?>/images/products/<?= $hinh ?>'>
    <div>
        <p>
        <ul>
            <li>MÃ HH: <?= $ma_hh ?></li>
            <li>TÊN HH: <?= $ten_hh ?></li>
            <li>ĐƠN GIÁ: <?= number_format($don_gia, 2) ?></li>
            <li>GIẢM GIÁ: <?= $giam_gia * 100 ?>%</li>
        </ul>
        </p>
        <div><?= $mo_ta ?></div>
    </div>
</div>
<?php require 'binh-luan.php'; ?>
<?php require 'hang-cung-loai.php'; ?>