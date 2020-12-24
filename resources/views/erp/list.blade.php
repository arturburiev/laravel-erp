@extends('layouts.app')
@section('content')
<?php
// получаем массив аттрибутов объектов из коллекции
$aAttributes = (! $collect->isEmpty())?array_keys($collect->first()->getAttributes()):[];
?>
<div class="container">
    <div class="row justify-content-center">
        <div style="width: 100%;">
            <table class="table table-hover">
                <thead>
                    @foreach($aAttributes as $sAttribute)
                    <th scope="col">{{$sAttribute}}</th>
                    @endforeach
                </thead>
                <tbody>
                    @foreach($collect as $object)
                    <tr>
                        @foreach($aAttributes as $sAttribute)
                        <td>{{$object->$sAttribute}}</td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
