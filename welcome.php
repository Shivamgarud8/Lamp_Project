<?php
$user = $_GET['user'] ?? 'Guest';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
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
            overflow: hidden;
            position: relative;
        }

        .welcome-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(15px);
            border-radius: 25px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            padding: 60px 50px;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.3);
            transform: translateY(0);
            transition: transform 0.4s ease;
            max-width: 600px;
            width: 100%;
            position: relative;
            z-index: 10;
        }

        .welcome-container:hover {
            transform: translateY(-10px);
        }

        .welcome-header {
            margin-bottom: 40px;
        }

        .welcome-title {
            font-size: 32px;
            font-weight: 700;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 10px;
            line-height: 1.2;
        }

        .user-name {
            color: #2d3748;
            font-weight: 600;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        }

        .welcome-subtitle {
            color: #718096;
            font-size: 16px;
            margin-top: 15px;
            font-weight: 400;
        }

        .action-button {
            display: inline-block;
            padding: 18px 35px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-decoration: none;
            border-radius: 15px;
            font-size: 16px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
        }

        .action-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(102, 126, 234, 0.4);
            text-decoration: none;
            color: white;
        }

        .action-button:active {
            transform: translateY(-1px);
        }

        .action-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.6s;
        }

        .action-button:hover::before {
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
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            animation: float 8s ease-in-out infinite;
        }

        .floating-shape:nth-child(1) {
            width: 120px;
            height: 120px;
            top: 15%;
            left: 10%;
            animation-delay: 0s;
        }

        .floating-shape:nth-child(2) {
            width: 80px;
            height: 80px;
            top: 60%;
            right: 15%;
            animation-delay: 2s;
        }

        .floating-shape:nth-child(3) {
            width: 150px;
            height: 150px;
            bottom: 20%;
            left: 20%;
            animation-delay: 4s;
        }

        .floating-shape:nth-child(4) {
            width: 60px;
            height: 60px;
            top: 25%;
            right: 25%;
            animation-delay: 6s;
        }

        .welcome-icon {
            font-size: 64px;
            margin-bottom: 20px;
            animation: bounce 2s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px) rotate(0deg);
            }
            33% {
                transform: translateY(-30px) rotate(120deg);
            }
            66% {
                transform: translateY(-15px) rotate(240deg);
            }
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-10px);
            }
            60% {
                transform: translateY(-5px);
            }
        }

        .particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
        }

        .particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: rgba(255, 255, 255, 0.6);
            border-radius: 50%;
            animation: particle-float 10s linear infinite;
        }

        .particle:nth-child(odd) {
            animation-delay: -5s;
        }

        @keyframes particle-float {
            0% {
                transform: translateY(100vh) rotate(0deg);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                transform: translateY(-10vh) rotate(360deg);
                opacity: 0;
            }
        }

        @media (max-width: 768px) {
            .welcome-container {
                padding: 40px 30px;
                margin: 20px;
            }

            .welcome-title {
                font-size: 24px;
            }

            .action-button {
                padding: 15px 25px;
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            .welcome-container {
                padding: 30px 20px;
            }

            .welcome-title {
                font-size: 20px;
            }
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

    <div class="particles">
        <div class="particle" style="left: 10%; animation-duration: 8s;"></div>
        <div class="particle" style="left: 20%; animation-duration: 12s;"></div>
        <div class="particle" style="left: 30%; animation-duration: 10s;"></div>
        <div class="particle" style="left: 40%; animation-duration: 14s;"></div>
        <div class="particle" style="left: 50%; animation-duration: 9s;"></div>
        <div class="particle" style="left: 60%; animation-duration: 11s;"></div>
        <div class="particle" style="left: 70%; animation-duration: 13s;"></div>
        <div class="particle" style="left: 80%; animation-duration: 15s;"></div>
        <div class="particle" style="left: 90%; animation-duration: 7s;"></div>
    </div>

    <div class="welcome-container">
        <div class="welcome-header">
            <div class="welcome-icon">🎉</div>
            <h2 class="welcome-title">Welcome to  leaning DevOps, <span class="user-name"><?php echo htmlspecialchars($user); ?></span>!</h2>
            <p class="welcome-subtitle">You've successfully logged into the system. Ready to get started?</p>
        </div>

        <a href="form.php" class="action-button">Fill Out the Form</a>
    </div>
</body>
</html>