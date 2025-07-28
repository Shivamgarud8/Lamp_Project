<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// MySQL connection setup
$host = 'localhost';
$db = 'lampdb';
$user = 'root';
$pass = 'root'; // leave blank if no password
$conn = new mysqli($host, $user, $pass, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Handle form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? '';
    $city = $_POST['city'] ?? '';
    $age = $_POST['age'] ?? '';
    $dept = $_POST['dept'] ?? '';
    $stmt = $conn->prepare("INSERT INTO user_form (name, city, age, dept) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $name, $city, $age, $dept);
    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        header("Location: success.php");
        exit();
    } else {
        echo "Error inserting record: " . $stmt->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Info Form</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow: hidden;
        }

        .form-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(15px);
            border-radius: 25px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            padding: 50px 40px;
            width: 100%;
            max-width: 500px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            transform: translateY(0);
            transition: transform 0.4s ease;
            position: relative;
            z-index: 10;
        }

        .form-container:hover {
            transform: translateY(-8px);
        }

        .form-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .form-title {
            font-size: 28px;
            font-weight: 700;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 10px;
        }

        .form-subtitle {
            color: #718096;
            font-size: 14px;
            font-weight: 400;
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-group label {
            display: block;
            color: #4a5568;
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-group input {
            width: 100%;
            padding: 16px 20px;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: #fff;
            outline: none;
            color: #2d3748;
        }

        .form-group input:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            transform: translateY(-2px);
        }

        .form-group input:hover {
            border-color: #cbd5e0;
        }

        .form-group input[type="number"] {
            -moz-appearance: textfield;
        }

        .form-group input[type="number"]::-webkit-outer-spin-button,
        .form-group input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .submit-btn {
            width: 100%;
            padding: 18px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 15px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
            margin-top: 10px;
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(102, 126, 234, 0.4);
        }

        .submit-btn:active {
            transform: translateY(-1px);
        }

        .submit-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.6s;
        }

        .submit-btn:hover::before {
            left: 100%;
        }

        .decorative-elements {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            overflow: hidden;
        }

        .floating-shape {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            animation: float 8s ease-in-out infinite;
        }

        .floating-shape:nth-child(1) {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            top: 10%;
            left: 8%;
            animation-delay: 0s;
        }

        .floating-shape:nth-child(2) {
            width: 80px;
            height: 80px;
            border-radius: 20px;
            top: 70%;
            right: 10%;
            animation-delay: 2s;
        }

        .floating-shape:nth-child(3) {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            bottom: 15%;
            left: 15%;
            animation-delay: 4s;
        }

        .floating-shape:nth-child(4) {
            width: 60px;
            height: 60px;
            border-radius: 15px;
            top: 30%;
            right: 20%;
            animation-delay: 6s;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px) rotate(0deg);
            }
            33% {
                transform: translateY(-25px) rotate(120deg);
            }
            66% {
                transform: translateY(-12px) rotate(240deg);
            }
        }

        .form-icon {
            font-size: 48px;
            margin-bottom: 15px;
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
        }

        @media (max-width: 768px) {
            .form-container {
                padding: 40px 30px;
                margin: 15px;
            }

            .form-title {
                font-size: 24px;
            }

            .form-group input {
                padding: 14px 16px;
                font-size: 15px;
            }

            .submit-btn {
                padding: 16px;
                font-size: 15px;
            }
        }

        @media (max-width: 480px) {
            .form-container {
                padding: 30px 20px;
            }

            .form-title {
                font-size: 22px;
            }
        }

        .required-indicator {
            color: #e53e3e;
            margin-left: 3px;
        }

        .input-group {
            position: relative;
        }

        .input-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #a0aec0;
            font-size: 18px;
            pointer-events: none;
        }
    </style>
</head>
<body>
    <div class="decorative-elements">
        <div class="floating-shape"></div>
        <div class="floating-shape"></div>
        <div class="floating-shape"></div>
        <div class="floating-shape"></div>
    </div>

    <div class="form-container">
        <div class="form-header">
            <div class="form-icon">📝</div>
            <h2 class="form-title">User Details Form</h2>
            <p class="form-subtitle">Please fill out all the required information below</p>
        </div>

        <form method="post">
            <div class="form-group">
                <label for="name">Name <span class="required-indicator">*</span></label>
                <div class="input-group">
                    <input type="text" id="name" name="name" required>
                    <span class="input-icon">👤</span>
                </div>
            </div>

            <div class="form-group">
                <label for="city">City <span class="required-indicator">*</span></label>
                <div class="input-group">
                    <input type="text" id="city" name="city" required>
                    <span class="input-icon">🏙️</span>
                </div>
            </div>

            <div class="form-group">
                <label for="age">Age <span class="required-indicator">*</span></label>
                <div class="input-group">
                    <input type="number" id="age" name="age" required>
                    <span class="input-icon">🎂</span>
                </div>
            </div>

            <div class="form-group">
                <label for="dept">Department <span class="required-indicator">*</span></label>
                <div class="input-group">
                    <input type="text" id="dept" name="dept" required>
                    <span class="input-icon">🏢</span>
                </div>
            </div>

            <input type="submit" value="Submit" class="submit-btn">
        </form>
    </div>
</body>
</html>
[ec2-user@ip-172-31-23-242 lamp_project]$ sudo cat form.php
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// MySQL connection setup
$host = 'localhost';
$db = 'lampdb';
$user = 'root';
$pass = 'root'; // leave blank if no password
$conn = new mysqli($host, $user, $pass, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Handle form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? '';
    $city = $_POST['city'] ?? '';
    $age = $_POST['age'] ?? '';
    $dept = $_POST['dept'] ?? '';
    $stmt = $conn->prepare("INSERT INTO user_form (name, city, age, dept) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $name, $city, $age, $dept);
    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        header("Location: success.php");
        exit();
    } else {
        echo "Error inserting record: " . $stmt->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Info Form</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow: hidden;
        }

        .form-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(15px);
            border-radius: 25px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            padding: 50px 40px;
            width: 100%;
            max-width: 500px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            transform: translateY(0);
            transition: transform 0.4s ease;
            position: relative;
            z-index: 10;
        }

        .form-container:hover {
            transform: translateY(-8px);
        }

        .form-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .form-title {
            font-size: 28px;
            font-weight: 700;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 10px;
        }

        .form-subtitle {
            color: #718096;
            font-size: 14px;
            font-weight: 400;
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-group label {
            display: block;
            color: #4a5568;
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-group input {
            width: 100%;
            padding: 16px 20px;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: #fff;
            outline: none;
            color: #2d3748;
        }

        .form-group input:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            transform: translateY(-2px);
        }

        .form-group input:hover {
            border-color: #cbd5e0;
        }

        .form-group input[type="number"] {
            -moz-appearance: textfield;
        }

        .form-group input[type="number"]::-webkit-outer-spin-button,
        .form-group input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .submit-btn {
            width: 100%;
            padding: 18px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 15px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
            margin-top: 10px;
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(102, 126, 234, 0.4);
        }

        .submit-btn:active {
            transform: translateY(-1px);
        }

        .submit-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.6s;
        }

        .submit-btn:hover::before {
            left: 100%;
        }

        .decorative-elements {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            overflow: hidden;
        }

        .floating-shape {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            animation: float 8s ease-in-out infinite;
        }

        .floating-shape:nth-child(1) {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            top: 10%;
            left: 8%;
            animation-delay: 0s;
        }

        .floating-shape:nth-child(2) {
            width: 80px;
            height: 80px;
            border-radius: 20px;
            top: 70%;
            right: 10%;
            animation-delay: 2s;
        }

        .floating-shape:nth-child(3) {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            bottom: 15%;
            left: 15%;
            animation-delay: 4s;
        }

        .floating-shape:nth-child(4) {
            width: 60px;
            height: 60px;
            border-radius: 15px;
            top: 30%;
            right: 20%;
            animation-delay: 6s;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px) rotate(0deg);
            }
            33% {
                transform: translateY(-25px) rotate(120deg);
            }
            66% {
                transform: translateY(-12px) rotate(240deg);
            }
        }

        .form-icon {
            font-size: 48px;
            margin-bottom: 15px;
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
        }

        @media (max-width: 768px) {
            .form-container {
                padding: 40px 30px;
                margin: 15px;
            }

            .form-title {
                font-size: 24px;
            }

            .form-group input {
                padding: 14px 16px;
                font-size: 15px;
            }

            .submit-btn {
                padding: 16px;
                font-size: 15px;
            }
        }

        @media (max-width: 480px) {
            .form-container {
                padding: 30px 20px;
            }

            .form-title {
                font-size: 22px;
            }
        }

        .required-indicator {
            color: #e53e3e;
            margin-left: 3px;
        }

        .input-group {
            position: relative;
        }

        .input-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #a0aec0;
            font-size: 18px;
            pointer-events: none;
        }
    </style>
</head>
<body>
    <div class="decorative-elements">
        <div class="floating-shape"></div>
        <div class="floating-shape"></div>
        <div class="floating-shape"></div>
        <div class="floating-shape"></div>
    </div>

    <div class="form-container">
        <div class="form-header">
            <div class="form-icon">📝</div>
            <h2 class="form-title">User Details Form</h2>
            <p class="form-subtitle">Please fill out all the required information below</p>
        </div>

        <form method="post">
            <div class="form-group">
                <label for="name">Name <span class="required-indicator">*</span></label>
                <div class="input-group">
                    <input type="text" id="name" name="name" required>
                    <span class="input-icon">👤</span>
                </div>
            </div>

            <div class="form-group">
                <label for="city">City <span class="required-indicator">*</span></label>
                <div class="input-group">
                    <input type="text" id="city" name="city" required>
                    <span class="input-icon">🏙️</span>
                </div>
            </div>

            <div class="form-group">
                <label for="age">Age <span class="required-indicator">*</span></label>
                <div class="input-group">
                    <input type="number" id="age" name="age" required>
                    <span class="input-icon">🎂</span>
                </div>
            </div>

            <div class="form-group">
                <label for="dept">Department <span class="required-indicator">*</span></label>
                <div class="input-group">
                    <input type="text" id="dept" name="dept" required>
                    <span class="input-icon">🏢</span>
                </div>
            </div>

            <input type="submit" value="Submit" class="submit-btn">
        </form>
    </div>
</body>
</html>