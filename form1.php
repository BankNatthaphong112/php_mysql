<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <style>
        /* จัดการฟอร์มให้ตรงกลางและดูสวยงาม */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9; /* พื้นหลังสีอ่อน */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #ffffff; /* พื้นหลังสีขาว */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); /* เงา */
            width: 100%;
            max-width: 400px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333; /* สีข้อความ */
            font-weight: bold;
        }

        .gender-row {
            display: flex; /* จัดเรียงในแนวนอน */
            align-items: center;
            gap: 10px; /* เพิ่มช่องว่างระหว่างตัวเลือก */
            margin-bottom: 15px; /* เว้นระยะด้านล่าง */
        }

        input[type="text"],
        input[type="date"],
        input[type="password"],
        input[type="radio"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc; /* ขอบ */
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="radio"] {
            width: auto; /* ขนาด radio ปรับอัตโนมัติ */
        }

        input[type="submit"] {
            background-color: #007BFF; /* สีปุ่ม */
            color: #ffffff; /* สีตัวอักษรในปุ่ม */
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #0056b3; /* สีเข้มขึ้นเมื่อ hover */
        }

        h2 {
            color: #007BFF; /* สีหัวข้อ */
            text-align: center;
        }

        p {
            color: #333;
        }

        /* จัดให้ฟอร์มแสดงผลบนมือถือได้ดี */
        @media (max-width: 600px) {
            form {
                padding: 15px;
            }

            input[type="submit"] {
                font-size: 14px;
                padding: 8px 16px;
            }
        }
    </style>
</head>
<body>
    <?php
    // ตรวจสอบว่ามีการส่งข้อมูลผ่าน POST หรือไม่
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // รับค่าที่ส่งมาจากฟอร์ม
        $sex = $_POST["sex"] ?? "";
        $fname = $_POST["fname"] ?? "";
        $lname = $_POST["lname"] ?? "";
        $birthday = $_POST["birthday"] ?? "";
        $username = $_POST["username"] ?? "";
        $password = $_POST["pwd"] ?? ""; // ในที่นี้ไม่แนะนำให้โชว์รหัสผ่านในหน้าเว็บจริง
    }
    ?>

    <form action="" method="POST">
        <label>เพศ:</label>
        <div class="gender-row">
            <input type="radio" id="female" name="sex" value="f" <?php if (isset($sex) && $sex == "f") echo "checked"; ?>>
            <label for="female">หญิง</label>
            <input type="radio" id="male" name="sex" value="m" <?php if (isset($sex) && $sex == "m") echo "checked"; ?>>
            <label for="male">ชาย</label>
        </div>

        <label for="fname">ชื่อ:</label>
        <input type="text" id="fname" name="fname" value="<?php echo isset($fname) ? $fname : ''; ?>">

        <label for="lname">สกุล:</label>
        <input type="text" id="lname" name="lname" value="<?php echo isset($lname) ? $lname : ''; ?>">

        <label for="birthday">วันเกิด:</label>
        <input type="date" name="birthday" value="<?php echo isset($birthday) ? $birthday : ''; ?>">

        <label for="username">Username:</label>
        <input type="text" name="username" value="<?php echo isset($username) ? $username : ''; ?>">

        <label for="password">Password:</label>
        <input type="password" name="pwd" value="<?php echo isset($password) ? $password : ''; ?>">

        <input type="submit" value="บันทึกข้อมูล">
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
        <h2>ข้อมูลที่คุณกรอก:</h2>
        <p><strong>เพศ:</strong> <?php echo $sex == "f" ? "หญิง" : ($sex == "m" ? "ชาย" : ""); ?></p>
        <p><strong>ชื่อ:</strong> <?php echo htmlspecialchars($fname); ?></p>
        <p><strong>สกุล:</strong> <?php echo htmlspecialchars($lname); ?></p>
        <p><strong>วันเกิด:</strong> <?php echo htmlspecialchars($birthday); ?></p>
        <p><strong>Username:</strong> <?php echo htmlspecialchars($username); ?></p>
        <p><strong>Password:</strong> <?php echo htmlspecialchars($password);?></p>
    <?php } ?>
</body>
</html>
