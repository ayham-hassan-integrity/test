<?php

namespace App\Domains\Test\Services;

use App\Domains\Test\Models\Test;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class TestService.
 */
class TestService extends BaseService
{
    /**
     * TestService constructor.
     *
     * @param Test $test
     */
    public function __construct(Test $test)
    {
        $this->model = $test;
    }

    /**
     * @param array $data
     *
     * @return Test
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): Test
    {
        DB::beginTransaction();

        try {
            $test = $this->model::create([
                'test' => $data['test'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating this test. Please try again.'));
        }

        DB::commit();

        return $test;
    }

    /**
     * @param Test $test
     * @param array $data
     *
     * @return Test
     * @throws \Throwable
     */
    public function update(Test $test, array $data = []): Test
    {
        DB::beginTransaction();

        try {
            $test->update([
                'test' => $data['test'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating this test. Please try again.'));
        }

        DB::commit();

        return $test;
    }

    /**
     * @param Test $test
     *
     * @return Test
     * @throws GeneralException
     */
    public function delete(Test $test): Test
    {
        if ($this->deleteById($test->id)) {
            return $test;
        }

        throw new GeneralException('There was a problem deleting this test. Please try again.');
    }

    /**
     * @param Test $test
     *
     * @return Test
     * @throws GeneralException
     */
    public function restore(Test $test): Test
    {
        if ($test->restore()) {
            return $test;
        }

        throw new GeneralException(__('There was a problem restoring this  Tests. Please try again.'));
    }

    /**
     * @param Test $test
     *
     * @return bool
     * @throws GeneralException
     */
    public function destroy(Test $test): bool
    {
        if ($test->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('There was a problem permanently deleting this  Tests. Please try again.'));
    }
}