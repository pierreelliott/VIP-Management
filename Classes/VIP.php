<?php
	class VIP
	{
		private $numVIP;
		private $nom;
		private $prenom;
		private $photo;
		private $priorite;
		private $dateNaissance;
		private $nationalite;
		private $typeVIP;
		
		public function __construct($numVIP, $nom, $prenom, $photo, $priorite, $dateNaissance, $nationalite, $typeVIP)
		{
			$this->numVIP = $numVIP;
			$this->nom = $nom;
			$this->prenom = $prenom;
			$this->photo = $photo;
			$this->priorite = $priorite;
			$this->dateNaissance = $dateNaissance;
			$this->nationalite = $nationalite;
			$this->typeVIP = $typeVIP;
		}
		
		public function getNumVIP()
		{
			return $this->numVIP;
		}
		
		public function setNom($nom)
		{
			$this->nom = $nom;
		}
		
		public function setPrenom($prenom)
		{
			$this->prenom = $prenom;
		}
		
		public function setPhoto($photo)
		{
			$this->photo = $photo;
		}
		
		public function setPriorite($priorite)
		{
			$this->priorite = $priorite;
		}
		
		public function setDateNaissance($dateNaissance)
		{
			$this->dateNaissance = $dateNaissance;
		}
		
		public function setNationalite($nationalite)
		{
			$this->nationalite = $nationalite;
		}
		
		public function setTypeVIP($typeVIP)
		{
			$this->typeVIP = $typeVIP;
		}
		
		public function getNom()
		{
			return $this->nom;
		}
		
		public function getPrenom()
		{
			return $this->prenom;
		}
		
		public function getPhoto()
		{
			return $this->photo;
		}
		
		public function getPriorite()
		{
			return $this->priorite;
		}
		
		public function getDateNaissance()
		{
			return $this->dateNaissance;
		}
		
		public function getNationalite()
		{
			return $this->nationalite;
		}
		
		public function getTypeVIP()
		{
			return $this->typeVIP;
		}
	}