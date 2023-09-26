@extends('layouts.app', [
    'namePage' => 'ساخت برچسب',
    'class' => '',
])
@section('content')
    <div class="panel-header">
        <div class="header text-center">
            <h2 class="title">برچسب های سایت</h2>
            <p class="category">افزودن برچسب جدید به سایت
            </p>
        </div>
    </div>
    <div class="content container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container">
                            <h4 class="card-title">افزودن برچسب جدید</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <section>
                                <form method="POST" action="{{ route('store-tag') }}" enctype="multipart/form-data">
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
                                        <h6 class="h5" for="floatingInput"> عنوان برچسب :</h6>
                                        <input type="text" class="form-control {{ $errors->has('name') ? 'error' : '' }}"
                                            name="name" id="name">
                                        <input type="submit" name="send" value="ذخیره"
                                        class="btn btn-primary ml-auto mt-3">
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
