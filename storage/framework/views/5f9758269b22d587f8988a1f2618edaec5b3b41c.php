<?php
    $titleIsInvalid   = $errors->first('title')  ? "is-invalid": "";
?>

<div class="card" style="border: 3px solid white;">
    <div class="card-header bg-white">
        <h5 class="mb-1">Редактирование отдела</h5>
    </div>
    <div class="card-body">
        <form method="post" action="/department-edit">
            <?php echo e(csrf_field()); ?>

            <div class="form-group">
                <label>Название отдела</label>
                <?php if($errors->first('title')): ?>
                    <input name="title" type="text" class="form-control <?php echo e($titleIsInvalid); ?>" value="<?php echo e(old('title')); ?>" style="background: rgba(255, 255, 255, 0.58);">
                <?php else: ?>
                    <input name="title" type="text" class="form-control" value="<?php echo e($title); ?>" style="background: rgba(255, 255, 255, 0.58);">
                <?php endif; ?>
                <?php if ($errors->has('title')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('title'); ?>
                <div class="invalid-feedback"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                <input name="id" type="hidden" value="<?php echo e($id); ?>">
            </div>
            <button type="submit" class="btn btn-warning mt-2">Редактировать</button>
        </form>
    </div>
</div>
<?php /**PATH W:\domains\laraandvue\resources\views/department/form_edit.blade.php ENDPATH**/ ?>