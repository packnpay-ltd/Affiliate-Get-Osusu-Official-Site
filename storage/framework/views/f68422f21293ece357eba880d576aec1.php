<!DOCTYPE html>
<html>
<head>
    <title>Redirecting to Osusu...</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
        }
        .loader {
            text-align: center;
        }
        .spinner {
            width: 40px;
            height: 40px;
            border: 4px solid #f3f4f6;
            border-top: 4px solid #7c3aed;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 20px auto;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="loader">
        <div class="spinner"></div>
        <p>Redirecting you to Osusu registration...</p>
    </div>

    <script>
        // Store the referral code in localStorage
        localStorage.setItem('osusu_referral_code', '<?php echo e($code); ?>');

        // Add timestamp to track when the referral code was stored
        localStorage.setItem('osusu_referral_timestamp', Date.now());

        // Redirect after a short delay (gives time for localStorage to be set)
        setTimeout(() => {
            window.location.href = '<?php echo e($redirectUrl); ?>';
        }, 1500);
    </script>
</body>
</html><?php /**PATH C:\xampp\htdocs\Affiliate-Get-Osusu-Official-Site\resources\views/referral/redirect.blade.php ENDPATH**/ ?>