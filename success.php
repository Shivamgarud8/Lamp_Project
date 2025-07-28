<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
    <meta http-equiv="refresh" content="4; URL='https://www.linkedin.com/in/shivam-garud-371b5a307/'" />
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

        .success-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(15px);
            border-radius: 25px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            padding: 60px 50px;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.3);
            max-width: 600px;
            width: 100%;
            position: relative;
            z-index: 10;
            animation: slideInUp 0.8s ease-out;
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .success-icon {
            font-size: 80px;
            margin-bottom: 30px;
            animation: bounce 1.5s ease-in-out infinite;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-15px);
            }
            60% {
                transform: translateY(-8px);
            }
        }

        .success-title {
            font-size: 36px;
            font-weight: 700;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 20px;
            line-height: 1.2;
        }

        .success-message {
            color: #4a5568;
            font-size: 18px;
            font-weight: 500;
            margin-bottom: 30px;
            line-height: 1.5;
        }

        .linkedin-link {
            display: inline-block;
            padding: 18px 35px;
            background: linear-gradient(135deg, #0077b5 0%, #005885 100%);
            color: white;
            text-decoration: none;
            border-radius: 15px;
            font-size: 16px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 8px 20px rgba(0, 119, 181, 0.3);
            position: relative;
            overflow: hidden;
        }

        .linkedin-link:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(0, 119, 181, 0.4);
            text-decoration: none;
            color: white;
        }

        .linkedin-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.6s;
        }

        .linkedin-link:hover::before {
            left: 100%;
        }

        .linkedin-icon {
            margin-right: 8px;
            font-size: 18px;
        }

        .countdown-container {
            margin-top: 25px;
            padding: 20px;
            background: rgba(102, 126, 234, 0.1);
            border-radius: 15px;
            border: 1px solid rgba(102, 126, 234, 0.2);
        }

        .countdown-text {
            color: #4a5568;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .countdown-timer {
            font-size: 24px;
            font-weight: 700;
            color: #667eea;
            animation: pulse 1s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
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

        .confetti {
            position: absolute;
            width: 10px;
            height: 10px;
            background: #667eea;
            animation: confetti-fall 3s linear infinite;
        }

        .confetti:nth-child(1) { left: 10%; animation-delay: 0s; background: #667eea; }
        .confetti:nth-child(2) { left: 20%; animation-delay: 0.5s; background: #764ba2; }
        .confetti:nth-child(3) { left: 30%; animation-delay: 1s; background: #25d366; }
        .confetti:nth-child(4) { left: 40%; animation-delay: 1.5s; background: #ff6b6b; }
        .confetti:nth-child(5) { left: 50%; animation-delay: 2s; background: #feca57; }
        .confetti:nth-child(6) { left: 60%; animation-delay: 0.3s; background: #48dbfb; }
        .confetti:nth-child(7) { left: 70%; animation-delay: 0.8s; background: #ff9ff3; }
        .confetti:nth-child(8) { left: 80%; animation-delay: 1.3s; background: #54a0ff; }
        .confetti:nth-child(9) { left: 90%; animation-delay: 1.8s; background: #5f27cd; }

        @keyframes confetti-fall {
            0% {
                transform: translateY(-100vh) rotate(0deg);
                opacity: 1;
            }
            100% {
                transform: translateY(100vh) rotate(720deg);
                opacity: 0;
            }
        }

        .floating-shape {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            animation: float 8s ease-in-out infinite;
        }

        .floating-shape:nth-child(10) {
            width: 120px;
            height: 120px;
            top: 15%;
            left: 10%;
            animation-delay: 0s;
        }

        .floating-shape:nth-child(11) {
            width: 80px;
            height: 80px;
            top: 60%;
            right: 15%;
            animation-delay: 2s;
        }

        .floating-shape:nth-child(12) {
            width: 100px;
            height: 100px;
            bottom: 20%;
            left: 20%;
            animation-delay: 4s;
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

        @media (max-width: 768px) {
            .success-container {
                padding: 40px 30px;
                margin: 20px;
            }

            .success-title {
                font-size: 28px;
            }

            .success-icon {
                font-size: 60px;
            }

            .linkedin-link {
                padding: 15px 25px;
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            .success-container {
                padding: 30px 20px;
            }

            .success-title {
                font-size: 24px;
            }

            .success-message {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="decorative-elements">
        <div class="confetti"></div>
        <div class="confetti"></div>
        <div class="confetti"></div>
        <div class="confetti"></div>
        <div class="confetti"></div>
        <div class="confetti"></div>
        <div class="confetti"></div>
        <div class="confetti"></div>
        <div class="confetti"></div>
        <div class="floating-shape"></div>
        <div class="floating-shape"></div>
        <div class="floating-shape"></div>
    </div>

    <div class="success-container">
        <div class="success-icon">🎉</div>
        <h2 class="success-title">🎉 Congratulations! 🎉</h2>
        <p class="success-message">You have entered the LinkedIn Profile.</p>

        <div class="countdown-container">
            <p class="countdown-text">Redirecting to LinkedIn in:</p>
            <div class="countdown-timer" id="countdown">4</div>
        </div>

        <p><a href="https://www.linkedin.com/in/shivam-garud-371b5a307/" target="_blank" class="linkedin-link">
            <span class="linkedin-icon">💼</span>Click here if not redirected
        </a></p>
    </div>

    <script>
        // Countdown timer
        let timeLeft = 4;
        const countdownElement = document.getElementById('countdown');

        const countdownInterval = setInterval(() => {
            timeLeft--;
            countdownElement.textContent = timeLeft;

            if (timeLeft <= 0) {
                countdownElement.textContent = "Redirecting...";
                clearInterval(countdownInterval);
            }
        }, 1000);
    </script>
</body>
</html>
