<?php
declare(strict_types=1);

namespace Braddle\PhpUk2023\Numerals;

class RomanNumeral {

	public static function convert( int $input_arabic_number ) {

		if ( 4000 < $input_arabic_number || 1 > $input_arabic_number) {
			throw new InvalidRomanNumberException( 'Converter is limited to conversion of anything between 1 and 4000' );
		}

		$roman_numerals_rules_map = [
			'M' => [
				'numeral' => 'M',
				'numeral_decremental' => 'C',
				'numeral_type' => 'full',
				'arabic_number' => 1000
			],
			'D' => [
				'numeral' => 'D',
				'numeral_decremental' => 'C',
				'numeral_type' => 'half',
				'arabic_number' => 500
			],
			'C' => [
				'numeral' => 'C',
				'numeral_decremental' => 'X',
				'numeral_type' => 'full',
				'arabic_number' => 100
			],
			'L' => [
				'numeral' => 'L',
				'numeral_decremental' => 'X',
				'numeral_type' => 'half',
				'arabic_number' => 50
			],
			'X' => [
				'numeral' => 'X',
				'numeral_decremental' => 'I',
				'numeral_type' => 'full',
				'arabic_number' => 10
			],
			'V' => [
				'numeral' => 'V',
				'numeral_decremental' => 'I',
				'numeral_type' => 'half',
				'arabic_number' => 5
			],
			'I' => [
				'numeral' => 'I',
				'numeral_decremental' => null,
				'numeral_type' => 'full',
				'arabic_number' => 1
			]
		];

		$return_roman_numeral = '';

		array_map(
			function( array $rule ) use ( &$input_arabic_number, &$return_roman_numeral, $roman_numerals_rules_map  ) {

				list( 'numeral' => $rule_numeral, 'numeral_decremental' => $rule_numeral_decremental, 'numeral_type' => $rule_numeral_type, 'arabic_number' => $rule_arabic_number ) = $rule;
				$division_floor_value = (int) ( $input_arabic_number / $rule_arabic_number );

				if ( 'full' === $rule_numeral_type ) {

					// 1, 10, 100, 1000
					if ( 0 < $division_floor_value ) {
						$return_roman_numeral .= str_repeat( $rule_numeral, $division_floor_value );
						$input_arabic_number -= $division_floor_value * $rule_arabic_number;
					}

				} else {

					// 5, 50, 500
					if (
						$rule_arabic_number <= $input_arabic_number
					) {
						$return_roman_numeral .= $rule_numeral;
						$input_arabic_number -= $rule_arabic_number;
					}

				}

				// 4, 9, 40, 90, 400, 900
				if (
					! is_null( $rule_numeral_decremental ) &&
					( $rule_arabic_number - $roman_numerals_rules_map[ $rule_numeral_decremental ]['arabic_number'] )  <= $input_arabic_number % ( $roman_numerals_rules_map[ $rule_numeral_decremental ]['arabic_number'] * 10 ) &&
					$rule_arabic_number > $input_arabic_number % ( $roman_numerals_rules_map[ $rule_numeral_decremental ]['arabic_number'] * 10 )
				) {
					$return_roman_numeral .= $rule_numeral_decremental . $rule_numeral;
					$input_arabic_number -= ( $rule_arabic_number - $roman_numerals_rules_map[ $rule_numeral_decremental ]['arabic_number'] );
				}

			},
			$roman_numerals_rules_map
		);

		return $return_roman_numeral;
	}
}
