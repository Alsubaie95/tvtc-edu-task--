<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <table class="table table-striped">
                    <thead>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($post->id); ?></td>
                            <td><?php echo e($post->title); ?></td>
                            <td>
                                <a href="<?php echo e(route('post.show', $post->id)); ?>" class="btn btn-primary">Show Post</a>
                                <a href="<?php echo e(route('post.destroy', $post->id)); ?>" class="btn btn-primary">Delete</a>
                                <a href="<?php echo e(route('post.edit', $post->id)); ?>" class="btn btn-primary">Edit</a>
                            </td>

                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>

                </table>

                <a href="<?php echo e(route('post.create', $post->id)); ?>" class="btn btn-primary">Create Post</a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/law/Documents/blog/resources/views/index.blade.php ENDPATH**/ ?>