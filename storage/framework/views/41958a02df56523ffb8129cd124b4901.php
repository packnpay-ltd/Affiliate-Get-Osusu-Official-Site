<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo e(Str::limit(strip_tags($blog->content), 160)); ?>">
    <meta name="keywords" content="<?php echo e(implode(', ', explode(' ', $blog->title))); ?>">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="<?php echo e($blog->title); ?>">
    <meta property="og:description" content="<?php echo e(Str::limit(strip_tags($blog->content), 160)); ?>">
    <meta property="og:image" content="<?php echo e(asset('storage/' . $blog->image)); ?>">
    <meta property="og:url" content="<?php echo e(url()->current()); ?>">
    <meta property="og:type" content="article">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo e($blog->title); ?>">
    <meta name="twitter:description" content="<?php echo e(Str::limit(strip_tags($blog->content), 160)); ?>">
    <meta name="twitter:image" content="<?php echo e(asset('storage/' . $blog->image)); ?>">
    
    <title><?php echo e($blog->title); ?> | Osusu Marketplace</title>

          <?php echo $__env->make('components.marketplace_head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

</head>

<body class="body-bg-6">

 
       <?php echo $__env->make('components.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Breadcrumb -->
    <section class="section-breadcrumb">
        <div class="cr-breadcrumb-image w-full h-[70px] bg-[#a566d1] z-[0] relative flex items-center max-[575px]:h-[100px]">
            <div class="container min-[1400px]:max-w-[1320px] min-[1200px]:max-w-[1140px] min-[992px]:max-w-[960px] min-[768px]:max-w-[720px] min-[576px]:max-w-[540px] w-full m-auto">
                <div class="flex flex-wrap w-full">
                    <div class="w-full px-[12px]">
                        <div class="cr-breadcrumb-title flex items-center justify-between flex-row max-[575px]:flex-col">
                            <h2 class="mb-[0] font-Manrope text-[19px] leading-[1] font-bold text-white max-[1199px]:text-[18px] max-[767px]:text-[17px] max-[575px]:mb-[5px] max-[575px]:text-[20px]">Blog</h2>
                            <span class="font-Poppins text-[14px] leading-[1.3] font-medium text-white capitalize max-[991px]:mt-[4px]"> <a href="/" class="text-white">Home</a> - Blog</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

   
    <div class="container mx-auto py-8">
        <div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16">
            <div class="bg-cover h-64 text-center overflow-hidden" style="height: 450px; background-image: url('<?php echo e(asset('storage/' . $blog->image)); ?>')" title="<?php echo e($blog->title); ?>"></div>
            <div class="max-w-2xl mx-auto">
                <div class="bg-white rounded-lg p-5">
                    <h1 class="text-gray-900 font-bold text-3xl lg:text-4xl mb-2"><?php echo e($blog->title); ?></h1>
                    <p class="text-gray-700 text-xs mt-2">Written By: <a href="#" class="text-indigo-600 font-medium hover:text-gray-900">Flipbz.org</a></p>
                    <p class="text-base leading-8 my-5"><?php echo $blog->content; ?></p>
                </div>

                

            </div>
        </div>
         <!-- related post section  -->
                <h1 class=" mb-4 text-2xl p-4 font-extrabold text-left tracking-tight text-black md:text-2xl lg:text-2xl">
                  Related
                </h1>
                <div class="grid lg:grid-cols-3 grid-cols-2 gap-2">
                    <?php $__currentLoopData = $relatedBlogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex flex-col justify-between p-2 bg-white gap-2 border border-gray-200 rounded-lg shadow-md h-full">
                        <div class="lg:flex grid-cols-1 items-start gap-1">
                            <a href="<?php echo e(route('blog.show', $item->slug)); ?>" class="mr-4">
                                <div class="w-44 h-24 bg-cover bg-center rounded-md" style="background-image: url('<?php echo e(asset('storage/' . $item->image)); ?>');"></div>
                            </a>
                            <div class="text-sm space-y-1">
                                <p class="text-xs text-gray-600"><?php echo e($item->created_at->format('M d')); ?></p>
                                <a href="<?php echo e(route('blog.show', $item->slug)); ?>" class="text-gray-900 text-sm font-medium hover:text-indigo-600">
                                    <?php echo e(Str::limit($item->title, 60)); ?>

                                </a>
                        
                            </div>
                        </div>
                        
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
               

    
       
    </div>
          
         <?php echo $__env->make('components.marketplace_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Tab to top -->
    <a href="#Top" class="back-to-top result-placeholder h-[38px] w-[38px] hidden fixed right-[15px] bottom-[15px] z-[10] cursor-pointer rounded-[20px] bg-[#fff] text-[#64b496] border-[1px] border-solid border-[#64b496] text-center text-[22px] leading-[1.6] hover:transition-all hover:duration-[0.3s] hover:ease-in-out">
        <i class="ri-arrow-up-line text-[20px]"></i>
        <div class="back-to-top-wrap">
            <svg viewBox="-1 -1 102 102" class="w-[36px] h-[36px] fixed right-[16px] bottom-[16px]">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" class="fill-transparent stroke-[#64b496] stroke-[5px]" />
            </svg>
        </div>
    </a>


      <!-- Vendor Custom -->
    <script src="<?php echo e(asset('assets/js/vendor/jquery-3.6.4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/vendor/jquery.zoom.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/vendor/mixitup.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/vendor/range-slider.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/vendor/aos.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/vendor/swiper-bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/vendor/slick.min.js')); ?>"></script>

    <!-- Main Custom -->
    <script src="<?php echo e(asset('assets/js/main.js')); ?>"></script>

</body>

</html><?php /**PATH C:\xampp\htdocs\Affiliate-Get-Osusu-Official-Site\resources\views\admin\blog\show.blade.php ENDPATH**/ ?>