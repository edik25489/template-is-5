@extends('layouts.manager')
@section('title')Категории@endsection

@section('content')
    <div class="container-md text-center">
        <h3>Категории</h3>
    </div>
    <div class="container">

        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#categoryAdd">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
                <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
            </svg>
            добавить
        </button>

        <div class="modal fade" id="categoryAdd" tabindex="-1" aria-labelledby="categoryAddLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class=" modal-title fs-5" id="categoryAddLabel">Добавить категорию</h1>
                    </div>
                    <form action="{{route('categoryCreate')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="mt-1">
                                <label for="exampleInputName" class="form-label">Введите название</label>
                                <input name="name" type="text" class="form-control" id="exampleInputName">
                            </div>
                            <div class="mt-2">
                                <label for="categoryInputImage" class="form-label">Изображение для категории</label>
                                <input name="image" type="file" class="form-control" id="categoryInputImage">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="w-100 mt-3 btn btn-primary">Сохранить</button>
                            <button type="button" class="w-100 btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Название категории</th>
                <th scope="col">Изображение</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>

            @foreach($category as $item)
            <tr class="pt-2">
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->name}}</td>
                <td>
                    <img
                        src="{{\Illuminate\Support\Facades\Storage::url($item->image)}}"
                        class="rounded d-block"
                        alt=""
                        style="width: 50px; height: 50px; object-fit: contain;">
                </td>
                <td>
                    @if($item->id != 1)
                        <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#categoryEdit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                            </svg>
                        </button>

                        <div class="modal fade" id="categoryEdit" tabindex="-1" aria-labelledby="categoryEditLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class=" modal-title fs-5" id="categoryEditLabel">Редактировать категорию</h1>
                                    </div>
                                    <form action="{{route('categoryEdit',['category'=>$item->id])}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="mt-1">
                                                <label for="exampleEditName" class="form-label">Изменить название</label>
                                                <input name="name"
                                                       type="text"
                                                       class="form-control"
                                                       id="exampleEditName"
                                                       value="{{$item->name}}">
                                            </div>
                                            <div class="mt-2">
                                                <label for="categoryEditImage" class="form-label">Изменить изображение</label>
                                                <input
                                                    name="image"
                                                    type="file"
                                                    class="form-control"
                                                    id="categoryEditImage"
                                                    accept=".jpg, .jpeg, .png"
                                                    value="{{\Illuminate\Support\Facades\Storage::url($item->image)}}">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="w-100 mt-3 btn btn-primary">Сохранить</button>
                                            <button type="button" class="w-100 btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>






                        <a href="{{route('categoryDelete',['category'=>$item->id])}}" class="btn btn-outline-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"></path>
                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"></path>
                            </svg>
                        </a>
                    @else
                        По умолчанию
                    @endif
                </td>
            </tr>
            @endforeach


            </tbody>
        </table>
    </div>
@endsection
