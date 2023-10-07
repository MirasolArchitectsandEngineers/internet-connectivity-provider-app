<?php

use Illuminate\Support\{Carbon, Str};

function weekDays()
{
    return collect(range(1, 7))->mapWithKeys(function ($item) {
        $day = Carbon::parse('next sunday')->addDays($item)->format('l');

        return [Str::lower($day) => $day];
    })->all();
}
