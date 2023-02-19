<?php
declare(strict_types=1);

namespace Braddle\PhpUk2023\Numerals;

class RomanNumeral {

	public static function convert( int $arabic_number ) {

		if ( 4000 < $arabic_number || 1 > $arabic_number) {
			throw new InvalidRomanNumberException( 'Converter is limited to conversion of anything between 1 and 4000' );
		}

		$number = '';

		// M = 1000
		if ( 0 < (int) ( $arabic_number / 1000 ) ) {
			$number .= str_repeat( 'M', (int) ( $arabic_number / 1000 ) );
			$arabic_number -= (int) ( $arabic_number / 1000 ) * 1000;
		}

		// CM = 900
		if (
			900 <= $arabic_number % 1000 &&
			1000 > $arabic_number % 1000
		) {
			$number .= 'CM';
			$arabic_number -= 900;
		}

		// D = 500
		if (
			500 <= $arabic_number
		) {
			$number .= 'D';
			$arabic_number -= 500;
		}

		// CD = 400
		if (
			400 <= $arabic_number % 1000 &&
			500 > $arabic_number % 1000
		) {
			$number .= 'CD';
			$arabic_number -= 400;
		}

		// C = 100
		if ( 0 < (int) ( $arabic_number / 100 ) ) {
			$number .= str_repeat( 'C', (int) ( $arabic_number / 100 ) );
			$arabic_number -= (int) ( $arabic_number / 100 ) * 100;
		}

		// XC = 90
		if (
			90 <= $arabic_number % 100 &&
			100 > $arabic_number % 100
		) {
			$number .= 'XC';
			$arabic_number -= 90;
		}

		// L = 50
		if (
			50 <= $arabic_number
		) {
			$number .= 'L';
			$arabic_number -= 50;
		}

		// XL = 40
		if (
			40 <= $arabic_number % 100 &&
			50 > $arabic_number % 100
		) {
			$number .= 'XL';
			$arabic_number -= 40;
		}

		// X = 10
		if ( 0 < (int) ( $arabic_number / 10 ) ) {
			$number .= str_repeat( 'X', (int) ( $arabic_number / 10 ) );
			$arabic_number -= (int) ( $arabic_number / 10 ) * 10;
		}

		// IX = 9
		if ( 9 === $arabic_number % 10 ) {
			$number .= 'IX';
			$arabic_number -= 9;
		}

		// V = 5
		if (
			5 <= $arabic_number
		) {
			$number .= 'V';
			$arabic_number -= 5;
		}

		// IV = 4
		if (
			4 === $arabic_number
		) {
			$number .= 'IV';
			$arabic_number -= 4;
		}


		if ( 0 < $arabic_number ) {
			$number .= str_repeat( 'I', $arabic_number );
		}

		return $number;
	}
}
