<div class="card" style="border: 3px solid white;">
    <div class="card-header bg-white">
        <h5 class="mb-1">Добавление нового сотрудника</h5>
    </div>
    <div class="card-body">
        <form method="post" action="/auth/register">
            <?php echo e(csrf_field()); ?>

            <div class="form-group">
                <label>Имя </label>
                <input name="first_name" type="text" class="form-control" style="background: rgba(255, 255, 255, 0.58);">
            </div>
            <div class="form-group">
                <label>Фамилия</label>
                <input name="last_name" type="text" class="form-control" style="background: rgba(255, 255, 255, 0.58);">
            </div>
            <div class="form-group">
                <label>Отчество</label>
                <input name="patronymic" type="text" class="form-control" style="background: rgba(255, 255, 255, 0.58);">
            </div>
            <label>Пол</label>
            <div class="form-group">
                <div class="form-check form-check-inline">
                    <input class="male" type="radio" name="exampleRadios" id="male" value="1" checked>
                    <label class="form-check-label" for="male">
                        Мужской
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="female" type="radio" name="exampleRadios" id="female" value="2">
                    <label class="form-check-label" for="female">
                        Женский
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label>Заработная плата</label>
                <input name="wage" type="number" class="form-control" style="background: rgba(255, 255, 255, 0.58);">
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect2">Отделы</label>
                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                    <option selected>Choose...</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Добавить</button>
        </form>
    </div>
</div>
<?php /**PATH W:\domains\laraandvue\resources\views/user/form_add.blade.php ENDPATH**/ ?>
