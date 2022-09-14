@extends('customer.layouts.master-one-col')
@section('head-tag')
    <title>
        {{ $systemCategory->name. ' ' .$systemType->name. ' ' .$systemCpu->name. ' ' . $systemConfig }}
    </title>
@endsection

@section('content')

@endsection
