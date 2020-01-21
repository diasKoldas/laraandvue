
<div class="card" style="border: 3px solid white;">
    <div class="card-header bg-white">
        <h5 class="mb-1">Отделы</h5>
    </div>
    <div class="card-body">
        @if(!empty($departments->first()))
            <table class="table table-bordered mb-0">
                <thead>
                <tr>
                    <th class="text-center" scope="col">#</th>
                    <th class="text-center" scope="col">Название отдела</th>
                    <th class="text-center" scope="col">Количество сотрудников отдела</th>
                    <th class="text-center" scope="col">Максимальная заработная плата среди сотрудников отдела</th>
                    <th class="text-center" scope="col" style="width: 12%;">Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($departments as $key => $department)
                    <tr>
                        <th class="text-center" scope="row" style="vertical-align: inherit;">{{++$key}}</th>
                        <td class="text-center" style="vertical-align: inherit;">
                            {{$department->title}}
                        </td>
                        <td class="text-center" style="vertical-align: inherit;">
                            {{$department->users->count()}}
                        </td>
                        <td class="text-center" style="vertical-align: inherit; white-space: nowrap;">
                            {{$department->users->max('wage')}}
                        </td>
                        <td class="text-center" style="vertical-align: inherit;white-space: nowrap;">
                            <a href="/department-edit/{{$department->id}}" type="button" class="btn btn-warning btn-sm">
                                <img src="https://img.icons8.com/material/20/ffffff/edit-file--v1.png">
                            </a>
                            <a href="/department-delete/{{$department->id}}" type="button" class="btn btn-danger btn-sm">
                                <img src="https://img.icons8.com/ios-glyphs/20/ffffff/delete-sign.png">
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <div class="col-12 text-center">
                <h5 class="text-secondary mb-0">В таблице пока нет записей..</h5>
            </div>
        @endif
    </div>
</div>
