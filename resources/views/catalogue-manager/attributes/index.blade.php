@extends('hub::layout')

@section('side_menu')
    @include('hub::catalogue-manager.partials.side-menu')
@endsection

@section('header_title')
    <small>Settings</small>
    <h1>Attributes</h1>
@endsection

@section('content')
    <candy-attributes-table></candy-attributes-table>
@endsection