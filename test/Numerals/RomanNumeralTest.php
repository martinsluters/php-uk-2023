<?php
namespace Braddle\PhpUk2023\Numerals\RomanNumerals\Tests;

use Braddle\PhpUk2023\Numerals\InvalidRomanNumberException;
use Braddle\PhpUk2023\Numerals\RomanNumeral;
use PHPUnit\Framework\TestCase;

class RomanNumeralTest extends TestCase
{
	public function testThat1ConvertsToI() {
		$this->assertSame( 'I', RomanNumeral::convert( 1 ) );
	}

	public function testThat2ConvertsToII() {
		$this->assertSame( 'II', RomanNumeral::convert( 2 ) );
	}

	public function testThat3ConvertsToIII() {
		$this->assertSame( 'III', RomanNumeral::convert( 3 ) );
	}

	public function testThat10ConvertsToX() {
		$this->assertSame( 'X', RomanNumeral::convert( 10 ) );
	}

	public function testThat20ConvertsToXX() {
		$this->assertSame( 'XX', RomanNumeral::convert( 20 ) );
	}

	public function testThat30ConvertsToXXX() {
		$this->assertSame( 'XXX', RomanNumeral::convert( 30 ) );
	}

	public function testThat100ConvertsToC() {
		$this->assertSame( 'C', RomanNumeral::convert( 100 ) );
	}

	public function testThat200ConvertsToCC() {
		$this->assertSame( 'CC', RomanNumeral::convert( 200 ) );
	}

	public function testThat300ConvertsToCCC() {
		$this->assertSame( 'CCC', RomanNumeral::convert( 300 ) );
	}

	public function testThat1000ConvertsToM() {
		$this->assertSame( 'M', RomanNumeral::convert( 1000 ) );
	}

	public function testThat2000ConvertsToMM() {
		$this->assertSame( 'MM', RomanNumeral::convert( 2000 ) );
	}

	public function testThat3000ConvertsToMMM() {
		$this->assertSame( 'MMM', RomanNumeral::convert( 3000 ) );
	}

	public function testThat4000ConvertsToMMM() {
		$this->assertSame( 'MMMM', RomanNumeral::convert( 4000 ) );
	}

	public function testThat11ConvertsToXI() {
		$this->assertSame( 'XI', RomanNumeral::convert( 11 ) );
	}

	public function testThat21ConvertsToXXI() {
		$this->assertSame( 'XXI', RomanNumeral::convert( 21 ) );
	}

	public function testThat12ConvertsToXII() {
		$this->assertSame( 'XII', RomanNumeral::convert( 12 ) );
	}

	public function testThat22ConvertsToXXII() {
		$this->assertSame( 'XXII', RomanNumeral::convert( 22 ) );
	}

	public function testThat13ConvertsToXIII() {
		$this->assertSame( 'XIII', RomanNumeral::convert( 13 ) );
	}

	public function testThat23ConvertsToXXIII() {
		$this->assertSame( 'XXIII', RomanNumeral::convert( 23 ) );
	}

	public function testThat33ConvertsToXXXIII() {
		$this->assertSame( 'XXXIII', RomanNumeral::convert( 33 ) );
	}

	public function testThat101ConvertsToCI() {
		$this->assertSame( 'CI', RomanNumeral::convert( 101 ) );
	}

	public function testThat102ConvertsToCII() {
		$this->assertSame( 'CII', RomanNumeral::convert( 102 ) );
	}

	public function testThat103ConvertsToCIII() {
		$this->assertSame( 'CIII', RomanNumeral::convert( 103 ) );
	}

	public function testThat1001ConvertsToMI() {
		$this->assertSame( 'MI', RomanNumeral::convert( 1001 ) );
	}

	public function testThat1003ConvertsToMIII() {
		$this->assertSame( 'MIII', RomanNumeral::convert( 1003 ) );
	}

	public function testThat3333ConvertsToMMMCCCXXXIII() {
		$this->assertSame( 'MMMCCCXXXIII', RomanNumeral::convert( 3333 ) );
	}


	// All about 5
	public function testThat5ConvertsToV() {
		$this->assertSame( 'V', RomanNumeral::convert( 5 ) );
	}

	public function testThat8ConvertsToVIII() {
		$this->assertSame( RomanNumeral::convert( 8 ), 'VIII' );
	}

	// All about 50
	public function testThat50ConvertsToL() {
		$this->assertSame( 'L', RomanNumeral::convert( 50 ) );
	}

	public function testThat55ConvertsToLV() {
		$this->assertSame( 'LV', RomanNumeral::convert( 55 ) );
	}

	public function testThat58ConvertsToLVIII() {
		$this->assertSame( 'LVIII', RomanNumeral::convert( 58 ) );
	}

	public function testThat358ConvertsToCCCLVIII() {
		$this->assertSame( 'CCCLVIII', RomanNumeral::convert( 358 ) );
	}


	// All about 500
	public function testThat500ConvertsToD() {
		$this->assertSame( 'D', RomanNumeral::convert( 500 ) );
	}

	public function testThat558ConvertsToDLVIII() {
		$this->assertSame( 'DLVIII', RomanNumeral::convert( 558 ) );
	}

	public function testThat1558ConvertsToMDLVIII() {
		$this->assertSame( 'MDLVIII', RomanNumeral::convert( 1558 ) );
	}

	public function testThat800ConvertsToDCCC() {
		$this->assertSame( 'DCCC', RomanNumeral::convert( 800 ) );
	}

	// 4 Exceptions
	public function testThat4ConvertsToIV() {
		$this->assertSame( 'IV', RomanNumeral::convert( 4 ) );
	}

	// 40 Exceptions
	public function testThat40ConvertsToXL() {
		$this->assertSame( 'XL', RomanNumeral::convert( 40 ) );
	}

	public function testThat43ConvertsToXLIII() {
		$this->assertSame( 'XLIII', RomanNumeral::convert( 43 ) );
	}

	public function testThat45ConvertsToXLV() {
		$this->assertSame( 'XLV', RomanNumeral::convert( 45 ) );
	}

	public function testThat945ConvertsToXLV() {
		$this->assertSame( 'CMXLV', RomanNumeral::convert( 945 ) );
	}

	// 400 Exceptions
	public function testThat400ConvertsToCD() {
		$this->assertSame( 'CD', RomanNumeral::convert( 400 ) );
	}

	public function testThat448ConvertsToCDXLVIII() {
		$this->assertSame( 'CDXLVIII', RomanNumeral::convert( 448 ) );
	}

	// 9 Exceptions
	public function testThat9ConvertsToIX() {
		$this->assertSame( 'IX', RomanNumeral::convert( 9 ) );
	}

	public function testThat19ConvertsToXIX() {
		$this->assertSame( 'XIX', RomanNumeral::convert( 19 ) );
	}

	public function testThat3339ConvertsToMMMCCCXXXIX() {
		$this->assertSame( 'MMMCCCXXXIX', RomanNumeral::convert( 3339 ) );
	}

	public function testThat209ConvertsToCCIX() {
		$this->assertSame( 'CCIX', RomanNumeral::convert( 209 ) );
	}

	// 90 Exceptions
	public function testThat90ConvertsToXC() {
		$this->assertSame( 'XC', RomanNumeral::convert( 90 ) );
	}

	public function testThat390ConvertsToCCCXC() {
		$this->assertSame( 'CCCXC', RomanNumeral::convert( 390 ) );
	}

	public function testThat399ConvertsToCCCXCIX() {
		$this->assertSame( 'CCCXCIX', RomanNumeral::convert( 399 ) );
	}

	// 900 Exceptions
	public function testThat900ConvertsToCM() {
		$this->assertSame( 'CM',  RomanNumeral::convert( 900 ) );
	}

	public function testThat3999ConvertsToMMMCMXCIX() {
		$this->assertSame( 'MMMCMXCIX', RomanNumeral::convert( 3999 ) );
	}

	// Exceptions
	public function testThatAnythingOver4000ThrowsExceptions() {
		$this->expectException( InvalidRomanNumberException::class );
		RomanNumeral::convert( 4001 );
	}

	public function testThatAnythingBelow0ThrowsExceptions() {
		$this->expectException( InvalidRomanNumberException::class );
		RomanNumeral::convert( -1 );
	}


}
