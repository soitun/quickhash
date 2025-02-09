--TEST--
Basic tests for creating an IntStringHash
--INI--
--FILE--
<?php
var_dump( new QuickHashIntStringHash( 1024 ) );
var_dump( new QuickHashIntStringHash( 1024, 1 ) );
var_dump( new QuickHashIntStringHash( 1024, QuickHashIntStringHash::CHECK_FOR_DUPES ) );

try
{
	new QuickHashIntStringHash();
}
catch ( Exception $e )
{
	echo $e->getMessage(), "\n";
}
catch( Error $e )
{
	echo $e->getMessage(), "\n";
}

try
{
	new QuickHashIntStringHash( 1024, QuickHashIntStringHash::CHECK_FOR_DUPES, 4 );
}
catch ( Exception $e )
{
	echo $e->getMessage(), "\n";
}
catch( Error $e )
{
	echo $e->getMessage(), "\n";
}
?>
--EXPECTF--
object(QuickHashIntStringHash)#1 (0) {
}
object(QuickHashIntStringHash)#1 (0) {
}
object(QuickHashIntStringHash)#1 (0) {
}
QuickHashIntStringHash::__construct() expects at least 1 %s, 0 given
QuickHashIntStringHash::__construct() expects at most 2 %s, 3 given
