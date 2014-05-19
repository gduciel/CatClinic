<?php

// J'interdis toute dérivation ultérieure de ma classe à l'aide de final
final class Visite
{
	private $_F_prix;

	private $_S_date;

	private $_S_observations;

	// Mes mutateurs (setters)
	public function changeIdentifiant ($identifiant)
	{
		$this->_I_identifiant = $identifiant;
	}

	public function changePrix ($prix)
	{
		$this->_F_prix = $prix;
	}

	public function changeDate ($date)
	{
		$this->_S_date = $date;
	}

	public function changeObservations ($observations)
	{
		$this->_S_observations = $observations;
	}

	// Mes accesseurs (getters)

	public function donneIdentifiant ()
	{
		return $this->_I_identifiant;
	}

	public function donnePrix ()
	{
		return $this->_F_prix;
	}

	public function donneDate ()
	{
		return $this->_S_date;
	}

	public function donneObservations ()
	{
		return $this->_S_observations;
	}
}