<?php
    $firstNameIsInvalid   = $errors->first('first_name')  ? "is-invalid": "";
    $LastNameIsInvalid    = $errors->first('last_name')   ? "is-invalid": "";
    $departmentsIsInvalid = $errors->first('departments') ? "is-invalid": "";
?>

<div class="card" style="border: 3px solid white;">
    <div class="card-header bg-white">
        <h5 class="mb-1">Добавление нового сотрудника</h5>
    </div>
    <div class="card-body">
        <form method="post" action="/user-add">
            <?php echo e(csrf_field()); ?>

            <div class="form-group">
                <label>Имя </label>
                <input name="first_name" type="text" class="form-control <?php echo e($firstNameIsInvalid); ?>" value="<?php echo e(old('first_name')); ?>" style="background: rgba(255, 255, 255, 0.58);">
                <?php if ($errors->has('first_name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('first_name'); ?>
                <div class="invalid-feedback"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
            </div>
            <div class="form-group">
                <label>Фамилия</label>
                <input name="last_name" type="text" class="form-control <?php echo e($LastNameIsInvalid); ?>" value="<?php echo e(old('last_name')); ?>" style="background: rgba(255, 255, 255, 0.58);">
                <?php if ($errors->has('last_name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('last_name'); ?>
                <div class="invalid-feedback"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
            </div>
            <div class="form-group">
                <label>Отчество</label>
                <input name="patronymic" type="text" class="form-control" value="<?php echo e(old('patronymic')); ?>" style="background: rgba(255, 255, 255, 0.58);">
            </div>
            <label>Пол</label>
            <div class="form-group">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="1" <?php echo e(old('gender') != 2 ? 'checked' : ''); ?>>
                    <label class="form-check-label" for="male">
                        Мужской
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="2" <?php echo e(old('gender') == 2 ? 'checked' : ''); ?>>
                    <label class="form-check-label" for="female">
                        Женский
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label>Заработная плата</label>
                <input name="wage" type="number" class="form-control" value="<?php echo e(old('wage')); ?>" style="background: rgba(255, 255, 255, 0.58);">
            </div>

            <div class="form-group">
                <label>Отделы</label>
                <select name="departments[]"  multiple="multiple" class="custom-select mr-sm-2 <?php echo e($departmentsIsInvalid); ?>">
                    <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(count(old('departments')) > 0): ?>
                            <option <?php echo e(collect(old('departments'))->search($department->id) !== false ? 'selected' : ''); ?> value="<?php echo e($department->id); ?>"><?php echo e($department->title); ?></option>
                        <?php else: ?>
                            <option value="<?php echo e($department->id); ?>"><?php echo e($department->title); ?></option>
                        <?php endif; ?>                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if ($errors->has('departments')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('departments'); ?>
                <div class="invalid-feedback"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Добавить</button>
        </form>
    </div>
</div>
<?php /**PATH W:\domains\laraandvue\resources\views/user/form_add.blade.php ENDPATH**/ ?>