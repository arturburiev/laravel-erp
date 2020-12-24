@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div style="width: 100%;">
            <ul>
                @foreach($idents as $key => $aValue)
                <li>
                    <a href="{{route('erp.list', ['ident' => $key])}}">{{$aValue['name']}}</a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
