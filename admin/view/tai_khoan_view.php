<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar With Bootstrap</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">

    <!-- jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<?php
include_once ("../include/connect.php");
$hienthi = $dbh->query("SELECT * FROM user");
$dem = $hienthi->rowCount();
$hienthi->fetch(PDO::FETCH_ASSOC)
?>

<body>
    <div class="wrapper">
        <?php
        include_once ("./home_include/sidebar.php");
        ?>
        <div class="main">
            <main class="content px-3 py-4">
                <div class="container-fluid">
                    <div class="mb">
                        <h3 class="fw-bold fs-4 mb-2">Tài khoản</h3>
                        <div class="mb-2">
                        <?php
                         include("taikhoan/modal_them.php")
                        ?>
                        </div>
                        <table id="example" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Email</th>
                                    <th>Họ và Tên</th>
                                    <th>Quyền</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $id = 1;
                                $stt = 0;
                                foreach ($hienthi as $row) {
                                    ?>
                                    <tr>
                                        <td><?php echo $stt += $id; ?></td>
                                        <td><?php echo $row['email']; ?> </td>
                                        <td><?php echo $row['name']; ?> </td>
                                        <td><?php echo $row['role'] ?></td>
                                        <td>
                                        <a href="taikhoan/xoa_taikhoan.php?email=<?php echo $row['email'] ?>">
                                                <input type="button" value="Xóa" />
                                        </td>

                                    </tr>
                                <?php }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-body-secondary">
                        <div class="col-6 text-start ">
                            <a class="text-body-secondary" href=" #">
                                <strong>CodzSwod</strong>
                            </a>
                        </div>
                        <div class="col-6 text-end text-body-secondary d-none d-md-block">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item">
                                    <a class="text-body-secondary" href="#">Contact</a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="text-body-secondary" href="#">About Us</a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="text-body-secondary" href="#">Terms & Conditions</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="./js/script.js"></script>
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>


</body>

</html>