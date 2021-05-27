@extends('layouts.app')
@section('title')
    Главная
@endsection
@section('content')
    @if(isset($session)){{$session}}@endif
    @foreach ($desks as $desk)
        <a href="{{route('enter_desk',['desk_id'=>"desk_$desk->id"])}}" class="burger-menu__link">
            <div class="desk_bg d-flex">
                @if (count($desk->threads) % 10 == 1)
                    <div class="p-2 w-100">{{$desk->name}}</div><div class="p-2 flex-shrink-0">({{count($desk->threads)}} тред)</div>
                @elseif (count($desk->threads) % 10 < 5)
                    <div class="p-2 w-100">{{$desk->name}}</div><div class="p-2 flex-shrink-0">({{count($desk->threads)}} треда)</div>
                @else
                    <div class="p-2 w-100">{{$desk->name}}</div><div class="p-2 flex-shrink-0">({{count($desk->threads)}} тредов)</div>
                @endif
            </div>
        </a>
    @endforeach
@endsection
