--TEST--
isParameterActive() throws FunctionCallException if connection is closed.
--SKIPIF--
<?php include("should_run_online_tests.inc"); ?>
--FILE--
<?php
$config = include "sapnwrfc.config.inc";
$c = new \SAPNWRFC\Connection($config);

try {
    $f = $c->getFunction('RFC_STRUCTURE');
    $c->close();
    $f->isParameterActive('IMPORTSTRUCT');
    echo "fail";
} catch(\SAPNWRFC\FunctionCallException $e) {
    echo "ok";
}
--EXPECT--
ok
