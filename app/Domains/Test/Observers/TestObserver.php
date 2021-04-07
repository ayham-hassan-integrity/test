<?php

namespace App\Domains\Test\Observers;

use App\Domains\Test\Models\Test;

/**
 * Class TestObserver.
 */
class TestObserver
{
    /**
     * @param  Test  $test
     */
    public function created(Test $test): void
    {

    }

    /**
     * @param  Test  $test
     */
    public function updated(Test $test): void
    {

    }

}
