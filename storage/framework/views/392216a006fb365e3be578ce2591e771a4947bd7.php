
<div class="card" style="border: 3px solid white;">
    <div class="card-header bg-white">
        <h5 class="mb-1">Сотрудники</h5>
    </div>
    <div class="card-body">
        <?php if(!empty($users->first())): ?>
            <table class="table table-bordered mb-0">
                <thead>
                <tr>
                    <th class="text-center" scope="col">#</th>
                    <th class="text-center" scope="col">Сотрудник</th>
                    <th class="text-center" scope="col">Пол</th>
                    <th class="text-center" scope="col">Заработная плата</th>
                    <th class="text-center" scope="col">Отделы</th>
                    <th class="text-center" scope="col" style="width: 12%;">Действия</th>
                </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th class="text-center" scope="row" style="vertical-align: inherit;"><?php echo e(++$key); ?></th>
                        <td class="text-center" style="vertical-align: inherit;">
                            <?php echo e($user->last_name . ' ' .$user->first_name . ' ' . $user->patronymic); ?>

                        </td>
                        <td class="text-center" style="vertical-align: inherit;">
                            <?php echo e($user->gender == 1 ? 'мужской' : 'женский'); ?>

                        </td>
                        <td class="text-center" style="vertical-align: inherit; white-space: nowrap;"><?php echo e($user->wage); ?></td>
                        <td class="text-center" style="vertical-align: inherit;">
                            <?php echo e(collect($user->departments->toArray())->implode('title', ', ')); ?>

                        </td>
                        <td class="text-center" style="vertical-align: inherit;white-space: nowrap;">
                            <a href="/user-edit/<?php echo e($user->id); ?>" type="button" class="btn btn-warning btn-sm">
                                <img src="https://img.icons8.com/material/20/ffffff/edit-file--v1.png">
                            </a>
                            <a href="/user-delete/<?php echo e($user->id); ?>" type="button" class="btn btn-danger btn-sm">
                                <img src="https://img.icons8.com/ios-glyphs/20/ffffff/delete-sign.png">
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="col-12 text-center">
                <h5 class="text-secondary mb-0">В таблице пока нет записей..</h5>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH W:\domains\laraandvue\resources\views/user/table.blade.php ENDPATH**/ ?>