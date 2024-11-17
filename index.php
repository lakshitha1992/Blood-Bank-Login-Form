<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heart Rate Monitor</title>
    <!-- Bootstrap CSS CDN -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Full Page Settings */
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            background-color: #000;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Arial', sans-serif;
            position: relative;
        }

        /* Heart Monitor Container */
        .monitor-container {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            background: radial-gradient(circle, #002e4f, #000);
            overflow: hidden;
            border: 2px solid #0077be;
            border-radius: 10px;
        }

        /* Grid Background */
        .grid {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image:
                linear-gradient(transparent 95%, rgba(255, 0, 0, 0.2) 5%),
                linear-gradient(90deg, transparent 95%, rgba(255, 0, 0, 0.2) 5%);
            background-size: 20px 20px;
            pointer-events: none;
        }

        /* Animated Heartbeat Line */
        .line {
            position: absolute;
            bottom: 50%;
            left: 0;
            width: 200%;
            height: 2px;
            background-color: #ff0000;
            transform: translateY(50%);
            animation: heartbeat 3s infinite linear;
        }

        @keyframes heartbeat {
            0% {
                transform: translateX(0);
            }

            25% {
                transform: translateX(10%) scaleY(1);
            }

            30% {
                transform: translateX(12%) scaleY(3);
            }

            35% {
                transform: translateX(20%) scaleY(1);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        /* Pulse Glow Effect */
        .line::before {
            content: "";
            position: absolute;
            top: -10px;
            left: 0;
            width: 100%;
            height: 20px;
            background: linear-gradient(to right, transparent, rgba(255, 0, 0, 0.5), transparent);
            animation: pulse-glow 3s infinite linear;
        }

        @keyframes pulse-glow {
            0% {
                transform: translateX(100%);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        /* Heart Rate Display */
        .heart-rate {
            position: absolute;
            top: 10px;
            right: 10px;
            color: #ff0000;
            font-size: 24px;
            font-weight: bold;
            z-index: 2;
        }

        /* Center the login form */
        .custom-container {
            z-index: 2;
            max-width: 400px;
            width: 90%;
            position: relative;
            animation: fadeInUp 1s ease-out;
        }

        /* Fade and Open Animation */
        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card-header {
            background-color: red;
            color: white;
        }

        .btn {
            background-color: red;
        }

        .card {
            border-color: red;
        }
    </style>
</head>

<body>
    <!-- Heart Rate Percentage -->
    <div class="heart-rate">Heart Rate: 75%</div>

    <!-- Heart Monitor Section -->
    <div class="monitor-container">
        <div class="grid"></div>
        <div class="line"></div>
    </div>

    <!-- Login Form -->
    <div class="custom-container">
        <div class="card border-danger mb-3">
            <div class="card-header text-center">Blood Bank System</div>
            <div class="card-body">
                <h4 class="card-title text-center">Login</h4>
                <form>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" oninput="adjustHeartRate()">
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" autocomplete="off" oninput="adjustHeartRate()">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <button type="button" class="btn btn-danger w-100">Login</button>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript for Key Interaction -->
    <script>
        // Simulate a dynamic heart rate percentage
        let heartRate = 75;

        function adjustHeartRate() {
            heartRate = Math.min(100, heartRate + 1); // Simulate slight increase
            document.querySelector('.heart-rate').textContent = `Heart Rate: ${heartRate}%`;
        }

        document.addEventListener('keydown', () => {
            const line = document.querySelector('.line');
            line.style.animation = 'none'; // Temporarily disable animation
            setTimeout(() => {
                line.style.animation = ''; // Restart animation
            }, 50);
        });
    </script>
</body>

</html>