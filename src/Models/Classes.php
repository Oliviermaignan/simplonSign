<?php
namespace src\Models;

use src\Services\Hydratation;
use dateTime;

class Classes {
    private $id;
    private $name;
    private $startTime;
    private $endTime;
    private $promoID;
    private $code;

    use Hydratation;

    public function getId() {return $this->id;}

	public function getName() {return $this->name;}

	public function getStartTime($format = 'Y-m-d H:i:s'): dateTime {
		// Si $this->startTime est déjà un objet DateTime, vous pouvez le retourner directement
		if ($this->startTime instanceof DateTime) {
			return 'instance of dateTime';
		}
	
		// Si $this->startTime est une chaîne de caractères représentant une date,
		// vous pouvez la convertir en objet DateTime puis la formater
		return (new DateTime($this->startTime));
	}

	public function getEndTime() {
		return $this->endTime;
	}

	public function getPromoID() {return $this->promoID;}

	public function getCode() {return $this->code;}

	public function setId( $id): void {$this->id = $id;}

	public function setName( $name): void {$this->name = $name;}

	public function setStartTime(string | DateTime $startTime): void {
		if ($startTime instanceof DateTime) {
            $this->startTime = $startTime;
          } else {
            $this->startTime = new DateTime($startTime);
          }
	}

	public function setEndTime( $endTime): void {$this->endTime = $endTime;}

	public function setPromoID( $promoID): void {$this->promoID = $promoID;}

	public function setCode( $code): void {$this->code = $code;}

	
}