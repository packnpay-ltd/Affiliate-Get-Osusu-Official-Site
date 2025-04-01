<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <title>Error - Marketplace</title>
    
    
    <script>
        window.location.replace("<?php echo e(url('/login')); ?>");
    </script>
    
    
    
    <?php echo $__env->make('components.marketplace_head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <style>
        .error-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            text-align: center;
            color: #333;
        }
        .error-code {
            font-size: 6rem;
            font-weight: bold;
            color: #ff4a4a;
        }
        .error-message {
            font-size: 1.8rem;
            margin-top: 10px;
        }
        .error-description {
            font-size: 1.2rem;
            margin-top: 10px;
            color: #666;
        }
        .home-btn {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #64b496;
            color: #fff;
            border-radius: 5px;
            text-decoration: none;
            font-size: 1.2rem;
        }
        .home-btn:hover {
            background-color: #509d82;
        }
    </style>
</head>
<body class="body-bg-6">
    <?php echo $__env->make('components.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="error-container">
        <div class="error-code">419</div>
        <div class="error-message">Oops! Page Expired</div>
        <div class="error-description">The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</div>
        <a href="<?php echo e(url('/login')); ?>" class="home-btn">Go Back Home</a>
    </div>

    <script src="<?php echo e(asset('assets/js/main.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\Affiliate-Get-Osusu-Official-Site\resources\views\errors\419.blade.php ENDPATH**/ ?>