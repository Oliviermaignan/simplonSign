<?php
namespace src\Models;

use src\Services\Hydratation;
use dateTime;

class PresenceStatus {
  private $userId;
  private $authenticationId;
  private $classesId;
  private $dateTime;

  use Hydratation;

    public function getUserId() {return $this->userId;}

	public function getAuthenticationId() {return $this->authenticationId;}

	public function getClassesId() {return $this->classesId;}

	public function getDateTime() {return $this->dateTime;}

	public function setUserId( $userId): void {$this->userId = $userId;}

	public function setAuthenticationId( $authenticationId): void {$this->authenticationId = $authenticationId;}

	public function setClassesId( $classesId): void {$this->classesId = $classesId;}

    public function setdateTime(string | DateTime $dateTime): void {
		if ($dateTime instanceof DateTime) {
            $this->dateTime = $dateTime;
          } else {
            $this->dateTime = new DateTime($dateTime);
          }
	}

}