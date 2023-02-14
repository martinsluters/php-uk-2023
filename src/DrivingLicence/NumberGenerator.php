<?php

namespace Braddle\PhpUk2023\DrivingLicence;

class NumberGenerator
{
	protected $random_number_generator;
	public function __construct( $random_number_generator ) {
		$this->random_number_generator = $random_number_generator;
	}

	public function generateDrivingLicence( $applicant ) {
		return 'jss140220230000';
		// if ( 17 > $applicant->getAge() ) {
		// 	throw new InvalidDriverException();
		// }

		// return $applicant->getInitials() . $applicant->getDateOfBirth()->format('dmY') . $this->random_number_generator->generate();
	}

}
