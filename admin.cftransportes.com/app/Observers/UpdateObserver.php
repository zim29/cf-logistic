<?php

namespace App\Observers;

class UpdateObserver
{
    public function creating ( $model)
    {
        $model->creator_id = \Auth::id();
    }
}
