<?php
include_once ('../../include/connect.php');

$select = "SELECT * FROM tin_tuc where id_tin = :id_tin";
$queryselect = $dbh->prepare($select);
$queryselect->bindParam(':id_tin', $_GET['id_tin']);
$queryselect->execute();
$row = $queryselect->rowCount();
if ($row == 1) {
    $delete = "DELETE FROM tin_tuc WHERE id_tin = :id_tin";
    $query = $dbh->prepare($delete);
    $query->bindParam(':id_tin', $_GET['id_tin']);
    $query->execute();
    echo'
    <script>
    confirm("Xóa thành công");
    window.location.href = "../admin.php?admin=tintuc";
    </script>
    ';
} else {
    echo'
    <script>
    confirm("Xóa thất bại");
    window.location.href = "../admin.php?admin=tintuc";
    </script>
    ';
}

?>
