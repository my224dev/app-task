<div class="col-md-10" style="margin: auto">
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>номер</th>
                <th>имени пользователя</th>
                <th>е-mail</th>
                <th>текста задачи</th>
                <th>статусу</th>
                @auth
                    <th>действия</th>
                @endauth
            </tr>
        </thead>
        <tbody>
            <?php $count= 1?>
            @foreach($tasks as $task)
            <tr>
                <td>{{ $count++ }}</td> 
                <td>{{ $task->name }}</td> 
                <td>{{ $task->email }}</td> 
                <td>{{ $task->textTask }}</td> 
                <td style="text-align:center">
                    @if($task->statutTask == 'done')
                    <span class="material-icons" style="color:green; font-weight:bolder">
                        done
                    </span> 
                    @else
                    {{ $task->statutTask }}
                    @endif
                </td> 
                @auth
                    <td>
                        <table style="border:0; padding:auto">
                            <a href="validate-{{$task->id}}" class="btn" title="закончить это">
                                <span class="material-icons" style="color:green;">
                                    check_circle_outline
                                </span>
                            </a>
                            <a href="" class="ml-2 btn"  data-bs-toggle="modal" data-bs-target="#Modal-{{ $task->id }}" title="редактировать">
                                <span class="material-icons" style="color:blue;">
                                    edit
                                </span>
                            </a>
                                
                            <form class="ml-2" action="delete" method="POST">
                                @csrf
                                <input type="text" name="idDelete" value="{{$task->id }}" hidden>
                                <button type="submit" class="btn" style="border:0;" title="удалять">
                                    <span class="material-icons" style="color:red;">
                                        delete
                                    </span>
                                </button>
                            </form>
                        </table>
                        <div class="modal fade" id="Modal-{{ $task->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><strong>Создание нового задачa</strong></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <form action="edit-{{ $task->id }}" method="post">
                                    @csrf
                                    <div class="mb-3 row">
                                        <label for="inputName" class="col-sm-2 col-form-label">имени</label>
                                        <div class="col-sm-10">
                                        <input type="text" name="name" class="form-control" id="inputName" value="{{ $task->name }}" disabled>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">е-mail</label>
                                        <div class="col-sm-10">
                                        <input type="email" name="email" class="form-control" id="inputEmail" value="{{ $task->email }}" disabled>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputTextTask" class="col-sm-2 col-form-label">текста</label>
                                        <div class="col-sm-10">
                                        <input type="text" name="textTask" class="form-control" id="inputTextTask" required autofocus>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">отменить</button>
                                        <button type="submit" class="btn btn-primary">подтверждать</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                            </div>
                        </div>
                    </td>
                @endauth
            </tr>  
            @endforeach
        </tbody>
    </table>
</div>  