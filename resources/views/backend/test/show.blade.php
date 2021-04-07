@extends('backend.layouts.app')

@section('title', __('View Test'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('View Test')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.test.index')" :text="__('Back')" />
        </x-slot>

        <x-slot name="body">
            <table class="table table-hover">
                <tr>
                    <th>@lang('test')</th>
                    <td>{{   $test->test }}</td>
                </tr>
            </table>
        </x-slot>

        <x-slot name="footer">
            <small class="float-right text-muted">
                <strong>@lang('Test Created'):</strong> @displayDate($test->created_at) ({{   $test->created_at->diffForHumans() }}),
                <strong>@lang('Last Updated'):</strong> @displayDate($test->updated_at) ({{   $test->updated_at->diffForHumans() }})

                @if($test->trashed())
                    <strong>@lang('Test Deleted'):</strong> @displayDate($test->deleted_at) ({{   $test->deleted_at->diffForHumans() }})
                @endif
            </small>
        </x-slot>
    </x-backend.card>
@endsection