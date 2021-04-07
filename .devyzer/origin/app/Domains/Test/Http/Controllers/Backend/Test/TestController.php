<?php

namespace App\Domains\Test\Http\Controllers\Backend\Test;

use App\Http\Controllers\Controller;
use App\Domains\Test\Models\Test;
use App\Domains\Test\Services\TestService;
use App\Domains\Test\Http\Requests\Backend\Test\DeleteTestRequest;
use App\Domains\Test\Http\Requests\Backend\Test\EditTestRequest;
use App\Domains\Test\Http\Requests\Backend\Test\StoreTestRequest;
use App\Domains\Test\Http\Requests\Backend\Test\UpdateTestRequest;

/**
 * Class TestController.
 */
class TestController extends Controller
{
    /**
     * @var TestService
     */
    protected $testService;

    /**
     * TestController constructor.
     *
     * @param TestService $testService
     */
    public function __construct(TestService $testService)
    {
        $this->testService = $testService;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('backend.test.index');
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return view('backend.test.create');
    }

    /**
     * @param StoreTestRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function store(StoreTestRequest $request)
    {
        $test = $this->testService->store($request->validated());

        return redirect()->route('admin.test.show', $test)->withFlashSuccess(__('The  Tests was successfully created.'));
    }

    /**
     * @param Test $test
     *
     * @return mixed
     */
    public function show(Test $test)
    {
        return view('backend.test.show')
            ->withTest($test);
    }

    /**
     * @param EditTestRequest $request
     * @param Test $test
     *
     * @return mixed
     */
    public function edit(EditTestRequest $request, Test $test)
    {
        return view('backend.test.edit')
            ->withTest($test);
    }

    /**
     * @param UpdateTestRequest $request
     * @param Test $test
     *
     * @return mixed
     * @throws \Throwable
     */
    public function update(UpdateTestRequest $request, Test $test)
    {
        $this->testService->update($test, $request->validated());

        return redirect()->route('admin.test.show', $test)->withFlashSuccess(__('The  Tests was successfully updated.'));
    }

    /**
     * @param DeleteTestRequest $request
     * @param Test $test
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function destroy(DeleteTestRequest $request, Test $test)
    {
        $this->testService->delete($test);

        return redirect()->route('admin.$test.deleted')->withFlashSuccess(__('The  Tests was successfully deleted.'));
    }
}