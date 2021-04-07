@if (
    $test->trashed()
)
    <x-utils.form-button
        :action="route('admin.test.restore', $test)"
        method="patch"
        button-class="btn btn-info btn-sm"
        icon="fas fa-sync-alt"
        name="confirm-item"
    >
        @lang('Restore')
    </x-utils.form-button>

    <x-utils.delete-button
        :href="route('admin.test.permanently-delete', $test)"
        :text="__('Permanently Delete')"/>
@else
    <x-utils.view-button :href="route('admin.test.show', $test)"/>
    <x-utils.edit-button :href="route('admin.test.edit', $test)"/>
    <x-utils.delete-button :href="route('admin.test.destroy', $test)"/>
@endif