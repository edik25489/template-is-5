@extends('layouts.manager')
@section('title')Продукты@endsection

@section('content')
    <div class="container">

        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#productAdd">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
                <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
            </svg>
            добавить
        </button>

        <div class="modal fade" id="productAdd" tabindex="-1" aria-labelledby="productAddLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class=" modal-title fs-5" id="productAddLabel">Добавить продукт</h1>
                    </div>
                    <form action="{{route('productAdd')}}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="mt-1">
                                <label for="exampleInputName" class="form-label">Введите название</label>
                                <input name="name" type="text" class="form-control" id="exampleInputName">
                            </div>
                            <div class="mt-2">
                                <label for="exampleInputImage" class="form-label">Изображение для продукта</label>
                                <input name="image" type="file" class="form-control" id="exampleInputImage">
                            </div>
                            <div class="mt-2">
                                <label for="categoryLabel" class="form-label">Выберите категорию</label>
                                <select id="categoryLabel" class="form-select">
                                    <option value="1">Один</option>
                                    <option value="2">Два</option>
                                    <option value="3">Три</option>
                                </select>
                            </div>
                            <div class="mt-2">
                                <label for="descriptionInputText" class="form-label">Описание для продукта</label>
                                <textarea name="description" class="form-control" id="descriptionInputText" rows="5"></textarea>
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


            <tr class="pt-2">
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>
                    <button type="button" class="btn btn-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"></path>
                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"></path>
                        </svg>
                    </button>
                </td>
            </tr>



            </tbody>
        </table>
    </div>
@endsection
