@extends('backend.layouts.app')

@section('title', __('Deleted Tests'))

@section('breadcrumb-links')
    @include('backend.test.includes.breadcrumb-links')
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Deleted Tests')
        </x-slot>

        <x-slot name="body">
            <livewire:test-table status="deleted" />
        </x-slot>
    </x-backend.card>
@endsection