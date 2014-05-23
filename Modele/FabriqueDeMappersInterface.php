<?php

interface FabriqueDeMappersInterface
{
    public static function fabriquer ($S_nom, $S_type = 'Sql');
}