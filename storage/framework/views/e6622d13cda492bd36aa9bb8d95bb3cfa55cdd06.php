<?php $__env->startSection('title', 'ハイアンドロー'); ?>
<?php $__env->startSection('content'); ?>
    <p>ディーラのカードは...『<?php echo e($dealersNumber); ?>』</p>
    <form method="POST" action="<?php echo e(route('hi-low')); ?>">
        <?php echo csrf_field(); ?>
        
        <button type="submit" name="guess" value="high">自分のカードが大きい</button>
        <button type="submit" name="guess" value="low">自分のカードが同じか小さい</button>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/hi-low/index.blade.php ENDPATH**/ ?>