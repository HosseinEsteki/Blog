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
                        <a class="btn btn-success btn-round text-white pull-right h6" href="{{ Route('create-post') }}"> مقاله جدید <i class="bi bi-file-earmark-plus"></i></a>
                        <h4 class="card-title">مقالات</h4>
                        <div class="col-12 mt-2">
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">تصویر مقاله</th>
                                    <th class="text-center">عنوان</th>
                                    <th class="text-center">نویسنده</th>
                                    <th class="text-center">دسته ها</th>
                                    <th class="text-center">برچسب ها</th>
                                    <th class="text-center">نظرات <i class="bi bi-chat-square-text-fill"></i></th>
                                    <th class="text-center">تاریخ</th>
                                    <th class="disabled-sorting text-center">عملیات</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($all_posts as $posts)
                                    {{$posts->id}}
                                    {{$posts->photo}}


                                    <tr>
                                        <td class="text-center">{{$posts->id}}</td>
                                        <td>
                                            <span class="avatar avatar-sm rounded-circle">
                                                <img src="{{ asset('assets') }}/img/RTX4090.png" alt=""
                                                    style="max-width: 80px; border-radiu: 100px">
                                            </span>
                                        </td>
                                        <td class="text-center">{{$posts->title}}</td>
                                        <td class="text-center">{{$posts->creator_id}}</td>
                                        <td class="text-center">{{$posts->category_id}}</td>
                                        <td class="text-center">کارت گرافیک Nvidia</td>
                                        <td class="text-center"><span class="badge bg-secondary text-white h6">64</span></td>
                                        <td class="text-center">منتشر شده در 15/07/2023 22:20 </td>
                                        <td class="text-center">
                                            <a type="button" href="{{ Route('show-posts') }}" rel="tooltip"
                                                class="btn btn-info btn-icon btn-sm " data-original-title="" title="">
                                                <i class="now-ui-icons bi bi-eye"></i>
                                            </a>
                                            <a type="button" href="#" rel="tooltip"
                                                class="btn btn-warning btn-icon btn-sm " data-original-title="" title="">
                                                <i class="now-ui-icons bi bi-pencil-square"></i>
                                            </a>
                                            <a type="button" href="#" rel="tooltip"
                                                class="btn btn-danger btn-icon btn-sm " data-original-title="" title="">
                                                <i class="now-ui-icons bi bi-x-lg "></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                <tr>
                                    <td class="text-center">2</td>
                                    <td>
                                        <span class="avatar avatar-sm rounded-circle">
                                            <img src="{{ asset('assets') }}/img/RTX4090.png" alt=""
                                                style="max-width: 80px; border-radiu: 100px">
                                        </span>
                                    </td>
                                    <td class="text-center">بررسی RTX4090</td>
                                    <td class="text-center">محمد علی</td>
                                    <td class="text-center">تکنولوژی</td>
                                    <td class="text-center">کارت گرافیک Nvidia</td>
                                    <td class="text-center"><span class="badge bg-secondary text-white h6">64</span></td>
                                    <td class="text-center">منتشر شده در 15/07/2023 22:20 </td>
                                    <td class="text-center">
                                        <a type="button" href="{{ Route('show-posts') }}" rel="tooltip"
                                            class="btn btn-info btn-icon btn-sm " data-original-title="" title="">
                                            <i class="now-ui-icons bi bi-eye"></i>
                                        </a>
                                        <a type="button" href="#" rel="tooltip"
                                            class="btn btn-warning btn-icon btn-sm " data-original-title="" title="">
                                            <i class="now-ui-icons bi bi-pencil-square"></i>
                                        </a>
                                        <a type="button" href="#" rel="tooltip"
                                            class="btn btn-danger btn-icon btn-sm " data-original-title="" title="">
                                            <i class="now-ui-icons bi bi-x-lg "></i>
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-center">3</td>
                                    <td>
                                        <span class="avatar avatar-sm rounded-circle">
                                            <img src="{{ asset('assets') }}/img/iphone 14 pro.jpg" alt=""
                                                style="max-width: 80px; border-radiu: 100px">
                                        </span>
                                    </td>
                                    <td class="text-center">بررسی گوشی iphone 14 Pro</td>
                                    <td class="text-center">محمد علی</td>
                                    <td class="text-center">تکنولوژی</td>
                                    <td class="text-center">iphone 14 Pro</td>
                                    <td class="text-center"><span class="badge bg-secondary text-white h6">112</span></td>
                                    <td class="text-center">منتشر شده در 29/04/2022 17:32 </td>
                                    <td class="text-center">
                                        <a type="button" href="#" rel="tooltip"
                                            class="btn btn-info btn-icon btn-sm " data-original-title="" title="">
                                            <i class="now-ui-icons bi bi-eye"></i>
                                        </a>
                                        <a type="button" href="#" rel="tooltip"
                                            class="btn btn-warning btn-icon btn-sm " data-original-title="" title="">
                                            <i class="now-ui-icons bi bi-pencil-square"></i>
                                        </a>
                                        <a type="button" href="#" rel="tooltip"
                                            class="btn btn-danger btn-icon btn-sm " data-original-title="" title="">
                                            <i class="now-ui-icons bi bi-x-lg"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">4</td>
                                    <td>
                                        <span class="avatar avatar-sm rounded-circle">
                                            <img src="{{ asset('assets') }}/img/Mi 11.png" alt=""
                                                style="max-width: 80px; border-radiu: 100px">
                                        </span>
                                    </td>
                                    <td class="text-center">بررسی گوشی Mi 11</td>
                                    <td class="text-center">محمد علی</td>
                                    <td class="text-center">تکنولوژی</td>
                                    <td class="text-center">Mi 11</td>
                                    <td class="text-center"><span class="badge bg-secondary text-white h6">30</span></td>
                                    <td class="text-center">منتشر شده در 25/02/2020 10:14 </td>
                                    <td class="text-center">
                                        <a type="button" href="#" rel="tooltip"
                                            class="btn btn-info btn-icon btn-sm " data-original-title="" title="">
                                            <i class="now-ui-icons bi bi-eye"></i>
                                        </a>
                                        <a type="button" href="#" rel="tooltip"
                                            class="btn btn-warning btn-icon btn-sm " data-original-title="" title="">
                                            <i class="now-ui-icons bi bi-pencil-square"></i>
                                        </a>
                                        <a type="button" href="#" rel="tooltip"
                                            class="btn btn-danger btn-icon btn-sm " data-original-title="" title="">
                                            <i class="now-ui-icons bi bi-x-lg"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
