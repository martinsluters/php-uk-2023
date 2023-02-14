<?php

namespace Braddle\PhpUk2023\DrivingLicence;

class NumberGenerator
{
	protected $random_number_generator;
	public function __construct( $random_number_generator ) {
		$this->random_number_generator = $random_number_generator;
	}

	public function generateDrivingLicence( $applicant ) {

		if ( 17 > $applicant->getAge() ) {
			throw new InvalidDriverException();
		}

		$return = $applicant->getInitials() . $applicant->getDateOfBirth()->format('dmY');

		$extra_numbers_to_generate = 15 - strlen( $return );

		return $return . $this->random_number_generator->generate( $extra_numbers_to_generate );
	}

}
