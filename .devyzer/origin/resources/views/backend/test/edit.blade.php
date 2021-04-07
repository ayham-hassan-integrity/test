@extends('backend.layouts.app')

@section('title', __('Update Test'))

@section('content')
    <x-forms.patch :action="route('admin.test.update', $test)">
        <x-backend.card>
            <x-slot name="header">
                @lang('Update Test')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.test.index')" :text="__('Cancel')"/>
            </x-slot>

            <x-slot name="body">
                <div class="form-group row">
                    <label for="test" class="col-md-2 col-form-label">@lang('test')</label>

                    <div class="col-md-10">
                        <input type="text" name="test" class="form-control" placeholder="{{  __('test') }} " value="{{   $test->title }}  "  />
                    </div>

                </div><!--form-group-->
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Test')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.patch>
@endsection