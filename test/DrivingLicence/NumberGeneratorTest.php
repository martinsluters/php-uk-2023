<?php

namespace Braddle\PhpUk2023\DrivingLicence\Tests;

use Braddle\PhpUk2023\DrivingLicence\NumberGenerator;
use Braddle\PhpUk2023\DrivingLicence\LicenceApplicant;
use Braddle\PhpUk2023\DrivingLicence\InvalidDriverException;
use DateTime;
use \Mockery\Adapter\Phpunit\MockeryTestCase as TestCase;

class NumberGeneratorTest extends TestCase
{

	public function testReturnsExceptionIfApplicantIsUnderage() {
		$applicant = \Mockery::mock(  LicenceApplicant::class );
		$applicant
			->shouldReceive( 'getAge' )
			->andReturn( 16 );

		$random_number_generator = \Mockery::mock(  RandomNumbersGenerator::class );

		$this->expectException( InvalidDriverException::class );

		$sut = new NumberGenerator( $random_number_generator );
		$sut->generateDrivingLicence( $applicant );
	}

	public function testMatchDriverLicence() {
		$applicant = \Mockery::mock(  LicenceApplicant::class );
		$applicant
			->shouldReceive( 'getAge' )
			->atLeast()
			->once()
			->andReturn( 17 );

		$applicant
			->shouldReceive( 'getInitials' )
			->atLeast()
			->once()
			->andReturn( 'jss' );

		$applicant
			->shouldReceive( 'getDateOfBirth' )
			->atLeast()
			->once()
			->andReturn( DateTime::createFromFormat('Y-m-d', '2023-2-14') );

		$random_number_generator = \Mockery::mock(  RandomNumbersGenerator::class );
		$random_number_generator
			->shouldReceive( 'generate' )
			->with( 4 )
			->atLeast()
			->once()
			->andReturn( '0000' );

		$sut = new NumberGenerator( $random_number_generator );
		$driving_licence_number = $sut->generateDrivingLicence( $applicant );
		$this->assertSame( 'jss140220230000', $driving_licence_number );
	}

	public function testMatchDriverLicenceWithoutMiddleName() {
		$applicant = \Mockery::mock(  LicenceApplicant::class );
		$applicant
			->shouldReceive( 'getAge' )
			->atLeast()
			->once()
			->andReturn( 17 );

		$applicant
			->shouldReceive( 'getInitials' )
			->atLeast()
			->once()
			->andReturn( 'js' );

		$applicant
			->shouldReceive( 'getDateOfBirth' )
			->atLeast()
			->once()
			->andReturn( DateTime::createFromFormat('Y-m-d', '2023-2-14') );

		$random_number_generator = \Mockery::mock(  RandomNumbersGenerator::class );
		$random_number_generator
			->shouldReceive( 'generate' )
			->with( 5 )
			->atLeast()
			->once()
			->andReturn( '00000' );

		$sut = new NumberGenerator( $random_number_generator );
		$driving_licence_number = $sut->generateDrivingLicence( $applicant );
		$this->assertSame( 'js1402202300000', $driving_licence_number );
	}

}
