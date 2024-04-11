<?php
namespace src\Models;

use src\Services\Hydratation;

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

	public function getStartTime() {return $this->startTime;}

	public function getEndTime() {return $this->endTime;}

	public function getPromoID() {return $this->promoID;}

	public function getCode() {return $this->code;}

	public function setId( $id): void {$this->id = $id;}

	public function setName( $name): void {$this->name = $name;}

	public function setStartTime( $startTime): void {$this->startTime = $startTime;}

	public function setEndTime( $endTime): void {$this->endTime = $endTime;}

	public function setPromoID( $promoID): void {$this->promoID = $promoID;}

	public function setCode( $code): void {$this->code = $code;}

	
}