<?php $__env->startSection('content'); ?>
  <section class="row py-5">
    <div class="col-md-10 mx-auto">
      <?php echo $__env->make('partials.page-header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <?php if(!have_posts()): ?>
        <div class="alert alert-warning text-center">
          <h2 class="text-center mb-2">404</h2>
          <p class="text-center mb-0">The page you were trying to view does not exist</p>
          <a class="d-block text-center" href="<?php echo e(home_url('/')); ?>">
            Home
          </a>
        </div>
      <?php endif; ?>
    </div>
  </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>