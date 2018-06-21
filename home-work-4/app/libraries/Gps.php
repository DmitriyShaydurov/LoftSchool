<?php

trait Gps
{
    protected function gpsAddition($minutes)
    {
        if ($minutes >= 60) {
            return ceil($minutes / 60) * 15;
        } else {
            return 15;
        }
    }
}
