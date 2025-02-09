--TEST--
Test for failure conditions for loadFromFile.
--INI--
--FILE--
<?php
echo "\nWrong params: \n";
try
{
	$hash = QuickHashIntHash::loadFromFile();
}
catch( Exception $e )
{
	echo $e->getMessage(), "\n";
}
catch( Error $e )
{
	echo $e->getMessage(), "\n";
}

try
{
	$hash = QuickHashIntHash::loadFromFile( 1024, 1024, 2, 'stuff' );
}
catch( Exception $e )
{
	echo $e->getMessage(), "\n";
}
catch ( Error $e )
{
	echo $e->getMessage(), "\n";
}

try
{
	$hash = QuickHashIntHash::loadFromFile( 1024, 2, 'stuff' );
}
catch( Exception $e )
{
	echo $e->getMessage(), "\n";
}
catch ( Error $e )
{
	echo $e->getMessage(), "\n";
}

try
{
	$hash = QuickHashIntHash::loadFromFile( 1024, 'stuff' );
}
catch( Exception $e )
{
	echo $e->getMessage(), "\n";
}
catch ( Error $e )
{
	echo $e->getMessage(), "\n";
}

try
{
	$hash = QuickHashIntHash::loadFromFile( new StdClass );
}
catch( Exception $e )
{
	echo $e->getMessage(), "\n";
}
catch ( Error $e )
{
	echo $e->getMessage(), "\n";
}

echo "\nEmpty file: \n";
try
{
	$hash = QuickHashIntHash::loadFromFile( '' );
}
catch( Exception $e )
{
	echo $e->getMessage(), "\n";
}
catch ( Error $e )
{
	echo $e->getMessage(), "\n";
}

echo "\nDirectory: \n";
try
{
	$file = dirname( __FILE__ );
	$hash = QuickHashIntHash::loadFromFile( $file );
}
catch( Exception $e )
{
	echo $e->getMessage(), "\n";
}
catch ( Error $e )
{
	echo $e->getMessage(), "\n";
}

echo "\nNon existing: \n";
try
{
	$file = dirname( __FILE__ ) . "/does-not-exist.set";
	$hash = QuickHashIntHash::loadFromFile( $file );
}
catch( Exception $e )
{
	echo $e->getMessage(), "\n";
}
catch ( Error $e )
{
	echo $e->getMessage(), "\n";
}

echo "\nWrong size: \n";
try
{
	$file = dirname( __FILE__ ) . "/broken-file.set";
	$hash = QuickHashIntHash::loadFromFile( $file );
}
catch( Exception $e )
{
	echo $e->getMessage(), "\n";
}
catch ( Error $e )
{
	echo $e->getMessage(), "\n";
}

echo "\nURL: \n";
try
{
	$hash = QuickHashIntHash::loadFromFile( "http://derickrethans.nl/" );
}
catch( Exception $e )
{
	echo $e->getMessage(), "\n";
}
catch ( Error $e )
{
	echo $e->getMessage(), "\n";
}
?>
--EXPECTF--

Wrong params: 
QuickHashIntHash::loadFromFile() expects at least 1 %s, 0 given
QuickHashIntHash::loadFromFile() expects at most 3 %s, 4 given
QuickHashIntHash::loadFromFile()%s, string given
QuickHashIntHash::loadFromFile()%s, string given
QuickHashIntHash::loadFromFile()%s, %s given

Empty file: 
%s

Directory: 
QuickHashIntHash::loadFromFile(): File is not a normal file

Non existing: 
QuickHashIntHash::loadFromFile(%stests/does-not-exist.set): %s to open stream: No such file or directory

Wrong size: 
QuickHashIntHash::loadFromFile(): File is in the wrong format

URL: 
QuickHashIntHash::loadFromFile(): Could not obtain file information
