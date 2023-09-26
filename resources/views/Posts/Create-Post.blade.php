@extends('layouts.app', [
    'namePage' => 'Actions',
    'class' => '',
])
@section('content')
    <div class="panel-header">
        <div class="header text-center">
            <h2 class="title">مقالات سایت</h2>
            <p class="category">نمایش تمامی مقالات سایت

            </p>
        </div>
    </div>
    <div class="content container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container">
                            <h4 class="card-title">افزودن پست جدید</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container">

                            <section>
                                <form method="post" action="{{ route('store-post') }}" enctype="multipart/form-data">
                                    @csrf
                                    <!-- Error message when data is not inputted -->
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="card p-3">
                                        <h6 class="h5" for="floatingInput">عنوان :</h6>
                                        <input class="form-control" type="text" name="title">
                                        <hr class="mt-5">
                                        <h5 class="h5 mt-2" for="floatingTextArea">توضیحات :</h5>
                                        <textarea class="form-control" name="description" id="floatingTextarea" cols="30" rows="10"></textarea>

                                        <h5 for="formFile" class="form-label h5 mt-2">افزودن تصویر :</h5>
                                        <img src="" alt="" class="img-blog">
                                        <input class="form-control" type="file" name="image">

                                        <div class="form-group mt-4">
                                            <h5 for="exampleFormControlSelect1 h5">انتخاب دسته :</h5>
                                            <select class="form-control" id="exampleFormControlSelect1">
                                              <option selected>دسته مورد نظر را انتخاب کنید.</option>
                                              <option value="{{}}"></option>

                                            </select>
                                          </div>

                                        <button class="btn btn-primary ml-auto mt-3">ذخیره</button>
                                    </div>

                                </form>
                            </section>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
