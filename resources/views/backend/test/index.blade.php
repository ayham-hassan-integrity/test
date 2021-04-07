@extends('backend.layouts.app')

@section('title', __(' Tests'))

@section('breadcrumb-links')
    @include('backend.test.includes.breadcrumb-links')
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang(' Tests')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.test.create')"
                :text="__('Create Test')"
            />
        </x-slot>

        <x-slot name="body">
            <livewire:test-table/>
        </x-slot>
    </x-backend.card>
@endsection