<?php

use App\Models\Prize;


function getProbability()
{
    return Prize::sum('probability');
}