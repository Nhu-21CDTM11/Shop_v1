<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="public/css/style.css">
</head>

<body>

    <?php include 'inc/header.php'; ?>
    <?php include 'inc/navbar.php'; ?>
    <!-- breadcrums -->
    <div class="container py-4 flex items-center gap-3">
        <a href="index.html" class="text-primary text-base">
            <i class="fas fa-home"></i>
        </a>
        <span class="text-sm text-gray-400">
            <i class="fas fa-chevron-right"></i>
        </span>
        <p class="text-gray-600 font-medium">Cart</p>
    </div>
    <!-- breadcrums end-->

    <!-- cart wrapper -->
    <div class="container lg:grid grid-cols-12 gap-6 items-start pb-16 pt-4">
        <!-- product cart -->
        <div class="xl:col-span-9 lg:col-span-8">
            <!-- cart title -->
            <div class="bg-gray-200 py-2 pl-12 pr-20 xl:pr-28 mb-4 hidden md:flex">
                <p class="text-gray-600 text-center">Product</p>
                <p class="text-gray-600 text-center ml-auto mr-16 xl:mr-24">Quantity</p>
                <p class="text-gray-600 text-center">Total</p>
            </div>
            <!-- cart title end -->

            <!-- shipping carts -->
            <div class="space-y-4">
                <?php $cart_list = get_cart(); ?>
                <?php foreach ($cart_list as $order_detail) { ?>
                    <!-- single cart -->
                    <div class="flex items-center md:justify-between gap-4 md:gap-6 p-4 border border-gray-200 rounded flex-wrap md:flex-nowrap">
                        <!-- cart image -->
                        <div class="w-32 flex-shrink-0">
                            <img src="" class="w-full">
                        </div>
                        <!-- cart image end -->
                        <!-- cart content -->
                        <div class="md:w-1/3 w-full">
                            <h2 class="text-gray-800 mb-3 xl:text-xl textl-lg font-medium uppercase">
                                <?php echo $order_detail['name'] ?>
                            </h2>
                            <p class="text-primary font-semibold">$<?php echo $order_detail['price'] ?></p>
                            <p class="text-gray-500">Size: M</p>
                        </div>
                        <!-- cart content end -->
                        <!-- cart quantity -->
                        <div class="flex border border-gray-300 text-gray-600 divide-x divide-gray-300">
                            <form action="cart.php" method="post" class="h-8 w-8 text-xl flex items-center justify-center cursor-pointer select-none">
                                <input type="hidden" name="action" value="update">
                                <input type="hidden" name="value" value="-1">
                                <input type="hidden" name="productId" value="<?php echo $order_detail['product_id']; ?>">
                                <button type="submit">-</button>
                            </form>
                            <div class="h-8 w-10 flex items-center justify-center">
                                <?php echo $order_detail['quantity']; ?>
                            </div>
                            <form action="cart.php" method="post" class="h-8 w-8 text-xl flex items-center justify-center cursor-pointer select-none">
                                <input type="hidden" name="action" value="update">
                                <input type="hidden" name="value" value="1">
                                <input type="hidden" name="productId" value="<?php echo $order_detail['product_id']; ?>">
                                <button type="submit">+</button>
                            </form>
                        </div>
                        <!-- cart quantity end -->
                        <div class="ml-auto md:ml-0">
                            <p class="text-primary text-lg font-semibold">$<?php echo total_cart_item($order_detail['price'], $order_detail['quantity']); ?></p>
                        </div>
                        <div class="text-gray-600 hover:text-primary cursor-pointer">
                            <form action="cart.php" method="post">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="productId" value="<?php echo $order_detail['product_id']; ?>">
                                <button type="submit" class="fas fa-trash"></button>
                            </form>
                        </div>
                    </div>
                    <!-- single cart end -->
                <?php } ?>
            </div>
            <!-- shipping carts end -->
        </div>
        <!-- product cart end -->
        <!-- order summary -->
        <div class="xl:col-span-3 lg:col-span-4 border border-gray-200 px-4 py-4 rounded mt-6 lg:mt-0">
            <h4 class="text-gray-800 text-lg mb-4 font-medium uppercase">ORDER SUMMARY</h4>
            <div class="space-y-1 text-gray-600 pb-3 border-b border-gray-200">
                <div class="flex justify-between font-medium">
                    <p>Subtotal</p>
                    <p>$<?php echo total_cart(); ?></p>
                </div>
                <div class="flex justify-between">
                    <p>Delivery</p>
                    <p>Free</p>
                </div>
                <div class="flex justify-between">
                    <p>Tax</p>
                    <p>Free</p>
                </div>
            </div>
            <div class="flex justify-between my-3 text-gray-800 font-semibold uppercase">
                <h4>Total</h4>
                <h4>$320</h4>
            </div>

            <!-- searchbar -->
            <div class="flex mb-5">
                <input type="text" class="pl-4 w-full border border-r-0 border-primary py-2 px-3 rounded-l-md focus:ring-primary focus:border-primary text-sm" placeholder="Coupon">
                <button type="submit" class="bg-primary border border-primary text-white px-5 font-medium rounded-r-md hover:bg-transparent hover:text-primary transition text-sm font-roboto">
                    Apply
                </button>
            </div>
            <!-- searchbar end -->

            <!-- checkout -->
            <a href="checkout.php" class="bg-primary border border-primary text-white px-4 py-3 font-medium rounded-md uppercase hover:bg-transparent
             hover:text-primary transition text-sm w-full block text-center">
                Process to checkout
            </a>
            <!-- checkout end -->
        </div>
        <!-- order summary end -->
    </div>
    <!-- cart wrapper end -->

    <!-- footer -->
    <footer class="bg-white pt-16 pb-12 border-t border-gray-100">
        <div class="container grid grid-cols-3">
            <!-- footer text -->
            <div class="col-span-1 space-y-8">
                <img src="images/logo.svg" class="w-30" alt="">
                <p class="text-gray-500">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis voluptas quasi recusandae
                </p>
                <div class="flex space-x-6">
                    <a href="#" class="text-gray-400 hover:text-gray-500">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-gray-500">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-gray-500">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-gray-500">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>
            <!-- footer text end-->

            <!-- footer links -->
            <div class="col-span-2 grid grid-cols-2 gap-8">
                <div class="grid grid-cols-2 gap-8">
                    <div>
                        <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Solutions</h3>
                        <div class="mt-4 space-y-4">
                            <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Marketing</a>
                            <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Analytics</a>
                            <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Commerce</a>
                            <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Insights</a>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Support</h3>
                        <div class="mt-4 space-y-4">
                            <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Pricing</a>
                            <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Documentation</a>
                            <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Guides</a>
                            <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">API Status</a>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-8">
                    <div>
                        <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Company</h3>
                        <div class="mt-4 space-y-4">
                            <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">About</a>
                            <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Blog</a>
                            <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Jobs</a>
                            <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Press</a>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Legal</h3>
                        <div class="mt-4 space-y-4">
                            <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Claim</a>
                            <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Privacy</a>
                            <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Policy</a>
                            <a href="#" class="text-base text-gray-500 hover:text-gray-900 block">Terms</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer links end-->
        </div>
    </footer>
    <!-- footer end-->

    <!-- copyright -->
    <div class="bg-gray-800 py-4">
        <div class="container flex items-center justify-between">
            <p class="text-white">@ RAFCART - All Rights Reserved</p>
            <img src="images/payment-method.png" class="h-5" alt="">
        </div>
    </div>
    <!-- copyright end-->
</body>

</html>