<?php

// if (exist_param("btn_insert")) {
//     $up_hinh = save_file("hinh", "$IMAGE_DIR/users/");
//     $hinh = strlen(".$up_hinh.") > 0 ? $up_hinh : 'user.png';
// } else if (exist_param("btn_update")) {
//     $up_hinh = save_file("up_hinh", "$IMAGE_DIR/users/");
//     $hinh = strlen(".$up_hinh.") > 0 ? $up_hinh : $hinh;
// }
// require "../../global.php";
// require "../../dao/loai.php";


extract($_REQUEST);
if (exist_param("btn_insert")) {
    $VIEW_NAME = "hang-hoa/new.php";
} else if (exist_param("btn_update")) {
    $VIEW_NAME = "hang-hoa/edit.php";
} else if (exist_param("btn_delete")) {
    $VIEW_NAME = "hang-hoa/list.php";
} else if (exist_param("btn_edit")) {
    $VIEW_NAME = "hang-hoa/edit.php";
} else if (exist_param("btn_list")) {
    $VIEW_NAME = "hang-hoa/list.php";
} else {
    $VIEW_NAME = "hang-hoa/new.php";
}
require "../layout.php";

if (exist_param("btn_insert")) {
    try {
        hang_hoa_insert($ten_hh, $don_gia, $giam_gia, $hinh, $ngay_nhap, $mo_ta, $dat_biet, $so_luot_xem, $ma_loai);
        unset($ten_hh, $don_gia, $giam_gia, $hinh, $ngay_nhap, $mo_ta, $dat_biet, $so_luot_xem, $ma_loai);
        $MESSAGE = "Thêm mới thành công!";
    } catch (Exception $exc) {
        $MESSAGE = "Thêm mới thất bại!";
    }
    $VIEW_NAME = "hang-hoa/new.php";
} else if (exist_param("btn_update")) {
    try {
        hang_hoa_update($ma_hh, $ten_hh, $don_gia, $giam_gia, $hinh, $ngay_nhap, $mo_ta, $dat_biet, $so_luot_xem, $ma_loai);
        $MESSAGE = "Cập nhật thành công!";
    } catch (Exception $exc) {
        $MESSAGE = "Cập nhật thất bại!";
    }
    $VIEW_NAME = "hang-hoa/edit.php";
} else if (exist_param("btn_delete")) {
    try {
        hang_hoa_delete($ma_hh);
        $items = hang_hoa_select_all();
        $MESSAGE = "Xóa thành công!";
    } catch (Exception $exc) {
        $MESSAGE = "Xóa thất bại!";
    }
    $VIEW_NAME = "hang-hoa/list.php";
} else if (exist_param("btn_edit")) {
    $item = hang_hoa_select_by_id($ma_hh);
    extract($item);
    $VIEW_NAME = "hang-hoa/edit.php";
} else if (exist_param("btn_list")) {
    $items = hang_hoa_select_all();
    $VIEW_NAME = "hang-hoa/list.php";
} else {
    $VIEW_NAME = "hang-hoa/new.php";
}
