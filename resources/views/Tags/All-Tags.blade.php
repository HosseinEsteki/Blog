@extends('layouts.app', [
    'namePage' => 'تمامی برچسب ها',
    'class' => '',
])
@section('content')
    <div class="panel-header">
        <div class="header text-center">
            <h2 class="title">برچسب های سایت</h2>
            <p class="category">نمایش تمامی برچسب های سایت

            </p>
        </div>
    </div>
    <div class="content container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a class="btn btn-success btn-round text-white pull-right h6" href="{{ Route('create-tag') }}">
                            برچسب جدید <i class="bi bi-file-earmark-plus"></i></a>
                        <h4 class="card-title">تمامی برچسب ها</h4>
                        <div class="col-12 mt-2">
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">نام برچسب</th>
                                    <th class="text-center">سازنده</th>
                                    <th class="disabled-sorting text-center">عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all_tags as $tags)
                                    <tr>
                                        <td class="text-center">{{ $tags->id }}</td>
                                        <td class="text-center">{{ $tags->name }}</td>
                                        <td class="text-center">{{ $tags->creator->name }}</td>
                                        <td class="text-center">
                                            {{-- <a type="button" href="{{ Route('show-posts') }}" rel="tooltip"
                                                class="btn btn-info btn-icon btn-sm " data-original-title="" title="">
                                                <i class="now-ui-icons bi bi-eye"></i>
                                            </a> --}}
                                            <a type="button" href="#" rel="tooltip"
                                                class="btn btn-warning btn-icon btn-sm " data-original-title=""
                                                title="">
                                                <i class="now-ui-icons bi bi-pencil-square"></i>
                                            </a>
                                            <a type="button" href="#" rel="tooltip"
                                                class="btn btn-danger btn-icon btn-sm " data-original-title=""
                                                title="">
                                                <i class="now-ui-icons bi bi-x-lg "></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
