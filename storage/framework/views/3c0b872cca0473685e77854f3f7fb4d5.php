<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div id="main-wrapper" class="flex">
        <?php echo $__env->make('components.adminSideBar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="w-full ">
            <header class="container full-container w-full text-sm py-5 xl:px-9 px-5">
                <?php echo $__env->make('components.adminNavBar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </header>
            <main class="container mx-auto p-6 bg-white shadow-lg rounded-md">
                <h2 class="text-lg font-semibold mb-4 text-gray-700">Ticket: <?php echo e($ticket->subject); ?></h2>

                <!-- Ticket Details -->
                <div class="p-4 bg-gray-100 rounded-md mb-6">
                    <p><strong>User:</strong> <?php echo e($ticket->user->name); ?></p>
                    <p><strong>Subject:</strong> <?php echo e($ticket->subject); ?></p>
                    <p><strong>Status:</strong> <span class="text-indigo-600"><?php echo e(ucfirst($ticket->status)); ?></span></p>
                    <p><strong>Description:</strong> <?php echo e($ticket->issue_description); ?></p>
                </div>

                <!-- Chat History -->
                <h3 class="text-lg font-semibold mb-4 text-gray-700">Chat History</h3>
                <div class="border rounded-md p-4 mb-6 max-h-96 overflow-y-scroll">
                    <?php $__currentLoopData = $ticket->replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="mb-4">
                            <p class="text-sm font-semibold">
                                <?php echo e($reply->user->name ?? 'Admin'); ?>

                                <span class="text-gray-500 text-xs"><?php echo e($reply->created_at->diffForHumans()); ?></span>
                            </p>
                            <p class="bg-gray-200 p-3 rounded-md"><?php echo $reply->message; ?></p>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <!-- Reply Form -->
                <h3 class="text-lg font-semibold mb-4 text-gray-700">Send a Reply</h3>
                <form method="POST" action="<?php echo e(route('support_tickets.reply')); ?>" class="py-4">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="support_ticket_id" value="<?php echo e($ticket->id); ?>">
                    <input type="hidden" name="email" value="<?php echo e($ticket->user->email); ?>">
                    <textarea name="message" rows="4" class="w-full border-gray-300 rounded-md mb-4" placeholder="Write your reply..."></textarea>
                    <button type="submit" class="bg-indigo-500 text-white py-2 px-4 rounded-md hover:bg-indigo-600">Send</button>
                </form>
            </main>
        </div>
    </div>

    <!-- TinyMCE Script -->
    <script src="https://cdn.tiny.cloud/1/777y55az7scak8uz2l4h3bek84juepd8wt1xdy78p0v50038/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            tinymce.init({
                selector: 'textarea[name="message"]',
                height: 300,
                plugins: 'lists link image preview code',
                toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | link image | code',
                menubar: false,
                branding: false,
            });
        });
    </script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\Affiliate-Get-Osusu-Official-Site\resources\views\admin\support_tickets\show.blade.php ENDPATH**/ ?>