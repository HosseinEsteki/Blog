@php
    $pages=config('menu');
@endphp
<div class="sidebar" data-color="orange">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
  -->
    <div class="logo">
        <a href="#" class="simple-text logo-mini">
            {{ __('BI') }}
        </a>
        <a href="#" class="simple-text logo-normal">
            {{ __('بلاگینو') }}
        </a>
    </div>
    <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
            @foreach($pages as $page)

                @php
                    $route=\Request::route()->getName();
                    $active=null;
                    $show=null;
                @endphp
                @isset($page['items'])

                    <li>
                        <a data-toggle="collapse" href="#{{$page['route']}}">
                            <i class="{{$page['icon']}}"></i>
                            <p>
                                {{ $page['title'] }}
                                <b class="caret"></b>
                            </p>
                        </a>
                        @php
                            foreach ($page['items'] as $item)
                            {
                                if($item['route']==$route){
                                    $show='show';
                                    break;
                                }
                            }
                        @endphp
                        <div class="collapse {{$show}}" id="{{$page['route']}}">
                            <ul class="nav">
                                @foreach($page['items'] as $item)
                                    @php
                                    $show=null;
                                        if($active==null&&$route==$page['route'])
                                            $active='active';
                                    @endphp

                                    <li class="{{$active}}">
                                        <a href="{{route($item['route'])}}">
                                            <i class="{{$item['icon']}}"></i>
                                            <p> {{$item['title'] }} </p>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                @else
                    @php
                        if($route==$page['route'])
                            $active='active';
                    @endphp
                    <li class="{{$active}}">
                        <a href="{{ route($page['route']) }}">
                            <i class="{{$page['icon']}}"></i>
                            <p>{{$page['title']}}</p>
                        </a>
                    </li>
                @endisset
            @endforeach
            <li class="">
                <a href="{{ route('page.index','notifications') }}">
                    <i class="now-ui-icons ui-1_bell-53"></i>
                    <p>{{ __('Notifications') }}</p>
                </a>
            </li>
            <li class=" ">
                <a href="{{ route('page.index','table') }}">
                    <i class="now-ui-icons design_bullet-list-67"></i>
                    <p>{{ __('Table List') }}</p>
                </a>
            </li>
            <li class="">
                <a href="{{ route('page.index','typography') }}">
                    <i class="now-ui-icons text_caps-small"></i>
                    <p>{{ __('Typography') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
