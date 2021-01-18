@extends('layouts.app');

@section('content')
    <div class="content-fluid">
        <div class="row">
            <div class="col-md-10" style="margin: auto">
                <h2 class="text-center"><strong>полный список задачник</strong></h2>
                <button type="button" class="btn btn-primary mt-5 mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal" style="float: right">новое задач</button>
                
                <!-- Modal form adding a new task -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><strong>Создание нового задачa</strong></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="{{ URL::to('/creat-new-task') }}" method="post">
                            @csrf
                            <div class="mb-3 row">
                                <label for="inputName" class="col-sm-2 col-form-label">имени</label>
                                <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" id="inputName" required autofocus>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="inputEmail" class="col-sm-2 col-form-label">е-mail</label>
                                <div class="col-sm-10">
                                <input type="email" name="email" class="form-control" id="inputEmail" required autofocus>
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

            </div>
            
            @include('partials._dataTable')
        </div>
    </div>
@endsection