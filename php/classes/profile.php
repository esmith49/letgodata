<?php
require_once(dirname(dirname(__DIR__)) . "/lib/php/date-utils.php");

/**
 * Creating a profile so a user can buy/sell items
 *
 * This profile will allow users acces to the app in order to upload pictures of items
 * to be sold and for buyers to have acces to bid on items
 *
 *
 * @author Evan Smith <esmith49@cnm.edu>
 **/
class profile {
	/**
	 * id for this user; this is the primary key
	 * @var int $profileId
	 **/
	private $profileId;
	/**
	 * contains e-mail contact information to connect sellers and buyers
	 * @var string $email
	 **/
	private $email;
	/**
	 *  gives location of seller to connect with local buyers
	 * @var string $zipCode
	 *
	 **/
	private $zipCode;
	/**
	 * gives username and contact information
	 * @var string $username
	 **/
	private $userName;

	/**
	 * accessor method for profile id
	 *
	 * @return mixed value of profile id
	 **/
	public function getprofileId() {
		return ($this->profileId);
	}

	/**
	 * mutator method for profile id
	 *
	 * @param mixed $newprofileId new value of profile id
	 * @throws InvalidArgumentException if $newprofileId is not an integer
	 * @throws RangeException if $newprofileId is not positive
	 **/
	public function setprofileId($newprofileId) {
		// base case: if the profile id is null, this a new profile without a mySQL assigned id (yet)
		if($newprofileId === null) {
			$this->profileId = null;
			return;
		}
// verify the profile id is valid
		$newprofileId = filter_var($newprofileId, FILTER_VALIDATE_INT);
		if($newprofileId === false) {
			throw(new InvalidArgumentException("profile id is not a valid integer"));

		}
		// verify the profile id is positive
		if($newprofileId <= 0) {
			throw(new RangeException("profile id is not positive"));
		}
		// convert and store the profile id
		$this->profileId = intval($newprofileId);
	}

	/**
	 * accessor method for email content
	 *
	 * @return string value of email content
	 **/
	public function getemail() {
		return ($this->email);
	}

	/**
	 * mutator method for email
	 *
	 * @param string $email new value of email
	 * @throws InvalidArgumentException if $email is not a string or insecure
	 * @throws RangeException if $email is > 128 characters
	 **/
	public function setemail($newemail){
		// verify the email content is secure
		$email = trim($newemail);

		//A check needs to be performed to verify that $email !== FALSE
		//after the filter var returns it's value as it returns a boolean if it fails
		//and would pass all checks after this line.
		$email = filter_var($email, FILTER_SANITIZE_EMAIL);

		if(empty($email) === true) {
			throw(new InvalidArgumentException("email content is empty or insecure"));
		}

		// verify the tweet content will fit in the database
		if(strlen($email) > 128) {
			throw(new RangeException("email address too long"));
		}

		// store the tweet content
		$this->email = $email;
	}

	/**
	 * accessor method for zip code
	 *
	 * @return string value of zip code
	 **/
	public function getzipCode() {
		return ($this->zipCode);
	}

	/**
	 * mutator method for zipCode content
	 *
	 * @param string $newzipCode new value of zipCode
	 * @throws InvalidArgumentException if $zipCode is not a string or insecure
	 * @throws RangeException if $zipCode is > 10 characters
	 **/
	public function setzipCode($newzipCode) {
		// verify the zip code is valid
		$zipCode = trim($newzipCode);
		$zipCode = filter_var($zipCode, FILTER_SANITIZE_STRING);
		if(empty($zipCode) === true) {
			throw(new InvalidArgumentException("Zip Code information is empty or insecure"));
		}

		// verify the zip code will fit in the database
		if(strlen($zipCode) !== 10 || strlen($newzipCode) !== 5){
			throw(new RangeException("zip code too long or not long enough"));
		}

		// store the tweet content
		$this->zipCode = $zipCode;
	}

	/**
	 * accessor method for user name
	 *
	 * @return string value of user name
	 **/
	public function getuserName() {
		return ($this->userName);
	}

	/**
	 * mutator method for user name
	 *
	 * @param string $newuserName new value of user name
	 * @throws InvalidArgumentException if $newuserName is not a string or insecure
	 * @throws RangeException if $newuserName is > 32 characters
	 **/
	public function setuserName($newuserName) {
		// verify the user name is secure
		$newuserName = trim($newuserName);
		$newuserName = filter_var($newuserName, FILTER_SANITIZE_STRING);

		if($newuserName === false){
			throw(new InvalidArgumentException("User name is not a valid string."));
		}

		if(empty($newuserName) === true) {
			throw(new InvalidArgumentException("user name is empty or insecure"));
		}

		// verify the user name will fit in the database
		if(strlen($newuserName) > 32) {
			throw(new RangeException("user name content too long"));
		}

		// store the user name
		$this->userName = $newuserName;
	}

}