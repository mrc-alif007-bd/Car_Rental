<?php
session_start();
include "db/config.php";

$error = "";
$redirect_to = $_GET['redirect'] ?? 'index.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $loginChecker = $conn->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
    $loginChecker->bindParam(":email", $email);
    $loginChecker->bindParam(":password", $password);
    $loginChecker->execute();

    if ($loginChecker->rowCount() == 1) {
        $_SESSION['admin_log_in'] = true;
        $_SESSION['admin_email'] = $email;
        header("Location: " . $redirect_to);
        exit();
    } else {
        $error = "Authentication Failed: Invalid Credentials";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logistics Portal Access</title>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            /* Logistics Color Palette */
            --navy-dark: #0f172a;
            --navy-light: #1e293b;
            --cargo-orange: #f97316; /* Safety Orange */
            --cargo-orange-hover: #ea580c;
            --concrete: #f1f5f9;
            --steel: #94a3b8;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Barlow', sans-serif;
        }

        body {
            height: 100vh;
            display: flex;
            background-color: var(--concrete);
            overflow: hidden;
        }

        /* --- LEFT SIDE: The Visuals (Image + Overlay) --- */
        .logistic-visual {
            flex: 1.5;
            position: relative;
            background-image: url('https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80'); /* Warehouse/Shipping Image */
            background-size: cover;
            background-position: center;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 60px;
            color: white;
        }

        /* Dark overlay to make text readable */
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to right, rgba(15, 23, 42, 0.9), rgba(15, 23, 42, 0.4));
            z-index: 1;
        }

        .visual-content {
            position: relative;
            z-index: 2;
            max-width: 500px;
        }

        .visual-content h1 {
            font-size: 3rem;
            line-height: 1.1;
            margin-bottom: 20px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .visual-content p {
            font-size: 1.1rem;
            color: #cbd5e1;
            border-left: 4px solid var(--cargo-orange);
            padding-left: 20px;
        }

        /* --- RIGHT SIDE: The Form --- */
        .login-section {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: white;
            padding: 40px;
        }

        .login-wrapper {
            width: 100%;
            max-width: 400px;
        }

        .brand-header {
            margin-bottom: 40px;
        }

        .brand-header h2 {
            color: var(--navy-dark);
            font-size: 24px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* Box Icon */
        .icon-box {
            width: 12px;
            height: 12px;
            background: var(--cargo-orange);
            display: inline-block;
        }

        .brand-header span {
            font-size: 14px;
            color: var(--steel);
            font-weight: 500;
            letter-spacing: 0.5px;
        }

        /* Inputs */
        .input-group {
            margin-bottom: 25px;
            position: relative;
        }

        .input-group label {
            display: block;
            font-size: 12px;
            text-transform: uppercase;
            color: var(--navy-light);
            font-weight: 600;
            margin-bottom: 8px;
            letter-spacing: 0.5px;
        }

        .input-group input {
            width: 100%;
            padding: 15px;
            border: 2px solid #e2e8f0;
            border-radius: 4px; /* Slightly squared corners for industrial look */
            background-color: #f8fafc;
            font-size: 16px;
            font-weight: 500;
            color: var(--navy-dark);
            transition: 0.2s;
        }

        .input-group input:focus {
            outline: none;
            border-color: var(--navy-dark);
            background-color: #fff;
        }

        .input-group input::placeholder {
            color: #cbd5e1;
        }

        /* Button */
        .btn-login {
            width: 100%;
            padding: 16px;
            background-color: var(--navy-dark);
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            cursor: pointer;
            transition: 0.3s;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        .btn-login:hover {
            background-color: var(--cargo-orange);
            color: white;
        }

        /* Arrow animation on hover */
        .btn-login:hover span {
            transform: translateX(5px);
        }
        .btn-login span {
            transition: 0.3s;
        }

        /* Utility Links */
        .meta-links {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            font-size: 14px;
        }

        .meta-links label {
            color: var(--steel);
            display: flex;
            align-items: center;
            gap: 5px;
            cursor: pointer;
        }

        .meta-links a {
            color: var(--navy-light);
            text-decoration: none;
            font-weight: 600;
        }

        /* Error Box */
        .alert-box {
            background-color: #fef2f2;
            border-left: 4px solid #ef4444;
            color: #b91c1c;
            padding: 15px;
            font-size: 14px;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
        }

        /* Decorative "Barcode" line */
        .barcode-strip {
            height: 4px;
            width: 50px;
            background-image: linear-gradient(90deg, 
                var(--navy-dark) 0%, var(--navy-dark) 20%, 
                transparent 20%, transparent 30%, 
                var(--navy-dark) 30%, var(--navy-dark) 60%, 
                transparent 60%, transparent 70%, 
                var(--cargo-orange) 70%, var(--cargo-orange) 100%);
            margin-top: 10px;
        }

        /* Mobile Responsive */
        @media (max-width: 900px) {
            .logistic-visual { display: none; }
            .login-section { flex: 1; }
        }
    </style>
</head>
<body>

    <div class="logistic-visual">
        <div class="overlay"></div>
        <div class="visual-content">
            <h1>Global<br>Supply Chain<br>Solutions</h1>
            <p>Secure Admin Portal access for tracking, fleet management, and inventory control.</p>
        </div>
    </div>

    <div class="login-section">
        <div class="login-wrapper">
            
            <div class="brand-header">
                <h2><div class="icon-box"></div> Courier & Logistics Solution</h2>
                <span>ADMINISTRATION PORTAL v1.2</span>
                <div class="barcode-strip"></div>
            </div>

            <?php if(!empty($error)): ?>
                <div class="alert-box">
                    <strong>ERROR: </strong> &nbsp; <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <form action="" method="POST">
                
                <div class="input-group">
                    <label for="email">Personnel Email ID</label>
                    <input type="email" name="email" id="email" placeholder="user@logistics.com" required>
                </div>

                <div class="input-group">
                    <label for="password">Access Code</label>
                    <input type="password" name="password" id="password" placeholder="••••••••••••" required>
                </div>

                <div class="meta-links">
                    <label>
                        <input type="checkbox" name="remember"> Keep session active
                    </label>
                    <a href="#">Reset Credentials</a>
                </div>
                <br>

                <button type="submit" class="btn-login">
                    Access Dashboard <span>&rarr;</span>
                </button>

            </form>
        </div>
    </div>

</body>
</html>