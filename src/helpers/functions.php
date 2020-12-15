<?php
/**
 * Get the value of an environnement variable
 *
 * @param string $varName : index of environnement variable
 * 
 * @return mixed
 */
function env(string $varName)
{
    $uppercaseName = strtoupper(str_replace('.', '_', $varName));
    return $_ENV[$uppercaseName];
}