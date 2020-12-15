<?php

namespace DaanMooij\AdventOfCode;

interface Day
{
    /**
     * @return void
     */
    public function loadInput(): void;

    /**
     * @return void
     */
    public function solve(): void;
}