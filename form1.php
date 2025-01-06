<!DOCTYPE html>
<html>
<head>
    <title>แบบฟอร์มลงทะเบียน</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        form {
            max-width: 400px;
            margin: auto;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        input[type="text"],
        input[type="date"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        .gender-row {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .gender-row label {
            margin-right: 10px;
        }
        input[type="radio"] {
            margin-right: 5px;
        }
        input[type="submit"] {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 3px;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .result {
            max-width: 400px;
            margin: 20px auto;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // รับค่าจากฟอร์ม
        $gender = isset($_POST["sex"]) ? htmlspecialchars($_POST["sex"]) : "";
        $fname = htmlspecialchars($_POST["fname"]);
        $lname = htmlspecialchars($_POST["lname"]);
        $birthday = htmlspecialchars($_POST["birthday"]);
        $username = htmlspecialchars($_POST["username"]);
        $password = htmlspecialchars($_POST["pwd"]);
    ?>
        <div class="result">
            <h3>ข้อมูลที่คุณกรอก</h3>
            <p><strong>เพศ:</strong> <?php echo $gender == "m" ? "ชาย" : "หญิง"; ?></p>
            <p><strong>ชื่อ:</strong> <?php echo $fname; ?></p>
            <p><strong>สกุล:</strong> <?php echo $lname; ?></p>
            <p><strong>วันเกิด:</strong> <?php echo $birthday; ?></p>
            <p><strong>Username:</strong> <?php echo $username; ?></p>
            <p><strong>Password:</strong> <?php echo $password; ?></p>
        </div>
    <?php
    } else {
    ?>
        <form action="" method="POST">
            <label>เพศ:</label>
            <div class="gender-row">
                <input type="radio" id="male" name="sex" value="m" required>
                <label for="male">ชาย</label>
                <input type="radio" id="female" name="sex" value="f" required>
                <label for="female">หญิง</label>
            </div>
            
            <label for="fname">ชื่อ:</label>
            <input type="text" id="fname" name="fname" placeholder="ป้อนชื่อของคุณ" required>

            <label for="lname">สกุล:</label>
            <input type="text" id="lname" name="lname" placeholder="ป้อนนามสกุลของคุณ" required>

            <label for="birthday">วันเกิด:</label>
            <input type="date" id="birthday" name="birthday" required>

            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="ตั้งค่า Username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="pwd" placeholder="ตั้งค่ารหัสผ่าน" required>

            <input type="submit" value="บันทึกข้อมูล">
        </form>
    <?php
    }
    ?>
</body>
</html>
