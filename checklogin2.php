<!DOCTYPE html>
<html>

<head>
    <title>Swal example</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php
    require_once 'db_connection.php';


    // ตรวจสอบว่ามีการ submit ข้อมูลหรือไม่
    if (isset($_POST['submit'])) {
        // ดึงข้อมูล username และ password จาก form
        $username = $_POST['username'];
        $password = $_POST['password'];

        // เขียน query สำหรับค้นหาผู้ใช้
        $sql = "SELECT * FROM admin WHERE Username = '$username' AND Password = '$password'";

        // รัน query
        $result = $conn->query($sql);

        // ตรวจสอบว่ามีผู้ใช้ตรงกับข้อมูลที่ป้อนหรือไม่
        if ($result->num_rows > 0) {
            // ผู้ใช้ถูกต้อง แสดง alert สำเร็จ
            echo "<script>
                Swal.fire({
                title: 'เข้าสู่ระบบสำเร็จ!',
                icon: 'success',
                confirmButtonText: 'ตกลง',
                });
            </script>";
            echo Header("Location: home.html");
        } else {
            // ผู้ใช้ไม่ถูกต้อง แสดง alert ผิดพลาด
            echo "<script>
      Swal.fire({
        title: 'เข้าสู่ระบบไม่สำเร็จ!',
        icon: 'error',
        text: 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง',
        confirmButtonText: 'ตกลง',
      });
    </script>";
    echo "window.history.back()";
        }
    }
    ?>
</body>

</html>