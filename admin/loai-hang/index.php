<?php
// require "../../global.php";
// require "../../dao/loai.php";
extract($_REQUEST);
if (exist_param("btn_insert")) {
    $VIEW_NAME = "loai-hang/new.php";
} else if (exist_param("btn_update")) {
    $VIEW_NAME = "loai-hang/edit.php";
} else if (exist_param("btn_delete")) {
    $VIEW_NAME = "loai-hang/list.php";
} else if (exist_param("btn_edit")) {
    $VIEW_NAME = "loai-hang/edit.php";
} else if (exist_param("btn_list")) {
    $VIEW_NAME = "loai-hang/list.php";
} else {
    $VIEW_NAME = "loai-hang/new.php";
}
require "../layout.php";

if (exist_param("btn_insert")) {
    try {
        loai_insert($ten_loai);
        unset($ten_loai, $ma_loai);
        $MESSAGE = "Thêm mới thành công!";
    } catch (Exception $exc) {
        $MESSAGE = "Thêm mới thất bại!";
    }
    $VIEW_NAME = "loai-hang/new.php";
} else if (exist_param("btn_update")) {
    try {
        loai_update($ma_loai, $ten_loai);
        $MESSAGE = "Cập nhật thành công!";
    } catch (Exception $exc) {
        $MESSAGE = "Cập nhật thất bại!";
    }
    $VIEW_NAME = "loai-hang/edit.php";
} else if (exist_param("btn_delete")) {
    try {
        loai_delete($ma_loai);
        $items = loai_select_all();
        $MESSAGE = "Xóa thành công!";
    } catch (Exception $exc) {
        $MESSAGE = "Xóa thất bại!";
    }
    $VIEW_NAME = "loai-hang/list.php";
} else if (exist_param("btn_edit")) {
    $item = loai_select_by_id($ma_loai);
    extract($item);
    $VIEW_NAME = "loai-hang/edit.php";
} else if (exist_param("btn_list")) {
    $items = loai_select_all();
    $VIEW_NAME = "loai-hang/list.php";
} else {
    $VIEW_NAME = "loai-hang/new.php";
}
