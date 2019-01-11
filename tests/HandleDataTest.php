<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

// Remember, requires are from the root in tests
require 'src/model/model.php';

final class HandleDataTest extends TestCase {

	// Testing a valid class init
	public function testCanBeCreatedFromValidData() : void {
        $this->assertInstanceOf(
            HandleData::class,
            new HandleData('TestPasses')
        );
    }

    // Testing an invalid class init
    public function testCannotBeCreatedFromInvalidData() : void {
    	$this->expectException(Exception::class);
    	new HandleData('', true);
    }

    // Testing the string data 
    public function testValidStringData() : void {

    	// Testing Valid Name
    	$TestName = new HandleData('Adam McGurk', true);
        $this->assertEquals(
            'Adam McGurk',
            $TestName->plainString()
        );

        // Testing Valid Position
        $TestPosition = new HandleData('Lead Developer', true);
        $this->assertEquals(
       		'Lead Developer',
       		$TestPosition->plainString()
        );

    }

    // Testing an empty string var
    public function testInvalidStringData() : void {

    	// Testing an empty string
    	$this->expectException(Exception::class);
    	$TestString = new HandleData('');
    	$TestString->plainString();

    }

    public function testValidPhoneNumbers() : void {

    	// Testing valid Shine phone number
    	$TestShine = new HandleData('1 (844) 80 - shine');
    	$this->assertEquals(
    		['phone' => '844.80.SHINE', 'tel_link' => 'tel:8448074463'],
    		$TestShine->phone()
    	);

    	// Testing valid Shine phone number in a different format
    	$TestShine = new HandleData('844.80.SHINE');
    	$this->assertEquals(
    		['phone' => '844.80.SHINE', 'tel_link' => 'tel:8448074463'],
    		$TestShine->phone()
    	);

    	// Testing valid regular phone number
    	$TestReg = new HandleData('1 (408) 693 - 5992');
    	$this->assertEquals(
    		['phone' => '408.693.5992', 'tel_link' => 'tel:4086935992'],
    		$TestReg->phone()
    	);

    	// Testing valid regular phone number in a different format
    	$TestReg = new HandleData('408.693.5992');
    	$this->assertEquals(
    		['phone' => '408.693.5992', 'tel_link' => 'tel:4086935992'],
    		$TestReg->phone()
    	);
    }

    public function testInvalidPhoneNumberWithLetters() : void {

    	$this->expectException(Exception::class);

    	// Testing invalid Shine phone number
    	$TestWord = new HandleData('Not a valid phone number');
    	$TestWord->phone();
    }

    public function testInvalidPhoneNumberNotLongEnough() : void {

    	$this->expectException(Exception::class);

    	// Testing invalid Shine phone number
    	$TestNums = new HandleData('123456789');
    	$TestNums->phone();
    }

    public function testValidEmail() : void {

    	$TestEmail = new HandleData('amcgurk@shinesolar.com');
    	$this->assertEquals(
    		['email' => 'amcgurk@shinesolar.com', 'mailto' => 'mailto:amcgurk@shinesolar.com'],
    		$TestEmail->email()
    	);

    }

    public function testNonShineEmail() : void {

    	$this->expectException(Exception::class);

    	// Testing invalid Shine phone number
    	$TestNonShineEmail = new HandleData('eldermcgurk@gmail.com');
    	$TestNonShineEmail->email();
    }

    public function testInvalidEmail() : void {

    	$this->expectException(Exception::class);

    	// Testing invalid Shine phone number
    	$TestInvalidEmail = new HandleData('This is not an email');
    	$TestInvalidEmail->email();
    }

    public function testForBothLogos() : void {

    	$TestShineHomeLogo = new HandleData('home');
    	$this->assertEquals(
    		['img' => 'https://signatures.shinesolar.com/assets/logos/v2/shine-home-email.png', 'link' => 'https://shinesolar.com'],
    		$TestShineHomeLogo->logo()
    	);

    	$TestShineSolarLogo = new HandleData('solar');
    	$this->assertEquals(
    		['img' => 'https://signatures.shinesolar.com/assets/logos/v2/shine-solar-email.png', 'link' => 'https://shinesolar.com'],
    		$TestShineSolarLogo->logo()
    	);

    	$TestShineSolarLogo = new HandleData('this can be any other string and it will return me the shine solar logo');
    	$this->assertEquals(
    		['img' => 'https://signatures.shinesolar.com/assets/logos/v2/shine-solar-email.png', 'link' => 'https://shinesolar.com'],
    		$TestShineSolarLogo->logo()
    	);

    }
}