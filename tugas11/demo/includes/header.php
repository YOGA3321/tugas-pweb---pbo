<?php
// auth.php sudah di-include oleh halaman yang memanggil header ini
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/style-register.css">
    
    <style>
        body { padding: 0; }
        .navbar {
            background: var(--card);
            padding: 0 20px;
            box-shadow: var(--shadow);
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 70px;
        }
        .navbar .brand { margin: 0; font-size: 24px; color: var(--primary); }
        .navbar .user-info { color: var(--muted); }
        .navbar .user-info a { color: var(--primary); text-decoration: none; margin-left: 15px; }
        .container { max-width: 1100px; margin: 20px auto; padding: 20px; }
        .page-title {
            margin-top: 0;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #eee;
        }
        .action-link {
            display: inline-block;
            background: var(--primary);
            color: white;
            padding: 10px 14px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <h1 class="brand">BIMBINGKU</h1>
        <div class="user-info">
            Selamat datang, <strong><?php echo htmlspecialchars($user_name); ?></strong> (<?php echo htmlspecialchars($user_role); ?>)
            
            <a href="<?php echo BASE_URL; ?>logout.php">Logout</a>
        </div>
    </nav>
    
    <div class="container">