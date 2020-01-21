
<div class="card" style="border: 3px solid white;">
    <div class="card-header bg-white">
        <h5 class="mb-1">Сотрудники</h5>
    </div>
    <div class="card-body">
        @if(!empty($users->first()))
            <table class="table table-bordered mb-0">
                <thead>
                <tr>
                    <th class="text-center" scope="col">#</th>
                    <th class="text-center" scope="col">Сотрудники</th>
                    @foreach($departments as $department)
                        <th class="text-center" scope="col">{{$department->title}}</th>
                    @endforeach
                </tr>
                </thead>
                <tbody>
                @foreach($users as $key => $user)
                    <tr>
                        <th class="text-center" scope="row" style="vertical-align: inherit;">{{++$key}}</th>
                        <td class="text-center" style="vertical-align: inherit;">{{$user->first_name}} {{$user->last_name}}</td>
                        @foreach($departments as $department)
                            <td class="text-center" style="vertical-align: inherit;">
                                @if($department->users->whereIn('id', $user->id)->count() !== 0)
                                    <img src="https://img.icons8.com/material/24/2ECC71/checked-checkbox--v2.png">
                                @else
                                    <img src="https://img.icons8.com/material-outlined/24/E74C3C/minus.png">
                                @endif
                            </td>
                        @endforeach
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
