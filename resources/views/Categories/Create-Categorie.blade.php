@extends('layouts.app', [
    'namePage' => 'Actions',
    'class' => '',
])
@section('content')
    <div class="panel-header">
        <div class="header text-center">
            <h2 class="title">دسته های سایت</h2>
            <p class="category">افزودن دسته بندی جدید به سایت
            </p>
        </div>
    </div>
    <div class="content container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container">
                            <h4 class="card-title">افزودن دسته جدید</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <section>
                                <form method="post" action="{{ route('store-categorie') }}" enctype="multipart/form-data">
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
                                        <h6 class="h5" for="floatingInput"> عنوان دسته :</h6>
                                        <input class="form-control" type="text" name="name">
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
