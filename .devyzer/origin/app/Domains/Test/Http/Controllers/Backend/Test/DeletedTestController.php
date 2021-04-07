<?php

namespace App\Domains\Test\Http\Controllers\Backend\Test;

use App\Http\Controllers\Controller;
use App\Domains\Test\Models\Test;
use App\Domains\Test\Services\TestService;

/**
 * Class DeletedTestController.
 */
class DeletedTestController extends Controller
{
    /**
     * @var TestService
     */
    protected $testService;

    /**
     * DeletedTestController constructor.
     *
     * @param  TestService  $testService
     */
    public function __construct(TestService $testService)
    {
        $this->testService = $testService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.test.deleted');
    }

    /**
     * @param  Test  $deletedTest
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function update(Test $deletedTest)
    {
        $this->testService->restore($deletedTest);

        return redirect()->route('admin.test.index')->withFlashSuccess(__('The  Tests was successfully restored.'));
    }

    /**
     * @param  Test  $deletedTest
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function destroy(Test $deletedTest)
    {
        $this->testService->destroy($deletedTest);

        return redirect()->route('admin.test.deleted')->withFlashSuccess(__('The  Tests was permanently deleted.'));
    }
}