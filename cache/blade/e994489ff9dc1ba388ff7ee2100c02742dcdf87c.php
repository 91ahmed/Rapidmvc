
<?php $__env->startSection('title', 'RapidMvc'); ?>

<?php $__env->startSection('content'); ?>
	
	<a href="/home" class="route-link" data-params="?page=1">Home</a>
	<a href="/about" class="route-link" data-params="?page=2">About</a>
	<a href="/contact" class="route-link" data-params="?page=3">Contact</a>

	<div id="demo"></div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Rapidmvc\app\view/home.blade.php ENDPATH**/ ?>