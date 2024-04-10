<?php
namespace src\Models;

use src\Services\Hydratation;

class Users {
  private $id;
  private $name;
  private $lastName;
  private $email;
  private $activated;
  private $password;
  private $role;
  private $promoName;

  use Hydratation;

    public function getId() {return $this->id;}

	public function getName() {return $this->name;}

	public function getLastName() {return $this->lastName;}

	public function getEmail() {return $this->email;}

	public function getActivated() {return $this->activated;}

	public function getPassword() {return $this->password;}

	public function getRole() {return $this->role;}

	public function getPromoName() {return $this->promoName;}

    public function setId( $id): void {$this->id = $id;}

	public function setName( $name): void {$this->name = $name;}

	public function setLastName( $lastName): void {$this->lastName = $lastName;}

	public function setEmail( $email): void {$this->email = $email;}

	public function setActivated( $activated): void {$this->activated = $activated;}

	public function setPassword( $password): void {$this->password = $password;}

	public function setRole( $role): void {$this->role = $role;}

	public function setPromoName( $promoName): void {$this->promoName = $promoName;}
}