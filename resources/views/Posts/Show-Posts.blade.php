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
                        <div class="row pull-right">
                            <a class="btn btn-danger btn-round text-white pull-right h6" href="#"> حذف <i class="bi bi-trash"></i></a>
                            <div class="hr"></div>
                            <a class="btn btn-danger btn-round text-white pull-right h6" href="#"> حذف <i class="bi bi-trash"></i></a>
                        </div>
                        <h4 class="card-title">بررسی RTX4090</h4>
                        <div class="col-12 mt-2">
                        </div>
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
