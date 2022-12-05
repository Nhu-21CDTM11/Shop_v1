<?php require_once 'core/boot.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="public/css/style.css">
</head>

<body>
    <?php include 'inc/header.php'; ?>
    <?php include 'inc/navbar.php'; ?>

    <!-- login -->
    <div class="container py-16">
        <div class="max-w-lg mx-auto shadow px-6 py-7 rounded overflow-hidden">
            <h2 class="text-2xl uppercase font-medium mb-1">Login</h2>
            <p class="text-gray-600 mb-6 text-sm">
                Login if you are a returing customer
            </p>
            <form action="login.php" method="post">
                <i style="color: red;"><?php if(isset( $_SESSION['flash_message'])) echo  $_SESSION['flash_message']; unset( $_SESSION['flash_message']); ?></i>
                <div class="space-y-4">
                    <div>
                        <label class="text-gray-600 mb-2 block">Email Address</label>
                        <input name="email" type="email" class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:border-primary placeholder-gray-400" placeholder="Enter your email address">
                    </div>
                    <div>
                        <label class="text-gray-600 mb-2 block">Password</label>
                        <input name="password" type="password" class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:border-primary placeholder-gray-400" placeholder="Enter your password">
                    </div>
                </div>
                <div class="flex items-center justify-between mt-6">
                    <div class="flex items-center">
                        <input type="checkbox" id="agreement" class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                        <label for="agreement" class="text-gray-600 ml-3 cursor-pointer">Remember me</label>
                    </div>
                    <a href="#" class="text-primary">Forgot password?</a>
                </div>
                <div class="mt-4">
                    <button type="submit" class="block w-full py-2 text-center text-white bg-primary border border-primary roundded hover:bg-transparent hover:text-primary transition uppercase font-roboto font-medium">
                        Login
                    </button>
                </div>
            </form>

            <!-- login with -->
            <div class="mt-6 flex justify-center relative">
                <div class="text-gray-600 uppercase px-3 bg-white z-10 relative">Or login with</div>
                <div class="absolute left-0 top-3 w-full border-b-2 border-gray-200 "></div>
            </div>
            <div class="flex mt-4 gap-4">
                <a href="#" class="w-1/2 py-2 text-center text-white bg-blue-800 rounded uppercase font-roboto font-medium text-sm hover:bg-blue-700 ">Facebook</a>
                <a href="#" class="w-1/2 py-2 text-center text-white bg-yellow-600 rounded uppercase font-roboto font-medium text-sm hover:bg-yellow-500 ">Google</a>
            </div>
            <!-- login with end-->
            <p class="mt-4 text-gray-600 text-center">
                Don't have an account? <a href="register.html" class="text-primary">Register now</a>
            </p>
        </div>
    </div>
    <!-- login end-->

    <?php include 'inc/footer.php'; ?>

</body>

</html>