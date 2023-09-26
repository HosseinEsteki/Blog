@extends('layouts.app', [
  'namePage' => 'Actions',
  'class' => '',
])
@section('content')
    <div class="panel-header">
        <div class="header text-center">
            <h2 class="title">فعالیت های سایت</h2>
            <p class="category">Handcrafted by our friend
                <a target="_blank" href="https://github.com/mouse0270">Robert McIntosh</a>. Please checkout the
                <a href="http://bootstrap-notify.remabledesigns.com/" target="_blank">full documentation.</a>
            </p>
        </div>
    </div>
    <div class="content container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">فعالیت ها</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <table class="table table-hover table-inverse">
                                    <thead class="thead-default">
                                    <tr>
                                        <th>ردیف</th>
                                        <th>عملیات</th>
                                        <th>فیلد</th>
                                        <th>نام</th>
                                        <th>اعمال کننده</th>
                                        <th>زمان</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($actions as $action)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$action->name}}</td>
                                            <td>
                                                {{$action->actionFather()['name']}}
                                            </td><td>
                                                {{$action->actionFather()['father']->name}}
                                            </td><td>
                                                {{$action->user->name}}
                                            </td>
                                            <td>{{$action->created_at->diffForHumans()}}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
