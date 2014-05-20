<?php

// C'est ma classe "boite à outil", que j'utilise uniquement par des appels statiques !
// Rappel : nous sommes dans le répertoire Core, voilà pourquoi dans realpath je "remonte d'un cran" pour faire référence
// à la VRAIE racine de mon application

final class Constantes
{
	// Les constantes relatives aux chemins

	const REPERTOIRE_VUES        = '/Vues/';

	const REPERTOIRE_EXCEPTIONS  = '/Noyau/Exceptions/';

	const REPERTOIRE_MODELE      = '/Modele/';

	const REPERTOIRE_MAPPERS     = 'DataMappers/';

	const REPERTOIRE_NOYAU       = '/Noyau/';

	const REPERTOIRE_CONTROLEURS = '/Controleurs/';


	public static function repertoireRacine() {
		return realpath(__DIR__ . '/../');
	}

	public static function repertoireVues() {
		return self::repertoireRacine() . self::REPERTOIRE_VUES;
	}

	public static function repertoireExceptions() {
		return self::repertoireRacine() . self::REPERTOIRE_EXCEPTIONS;
	}

	public static function repertoireModele() {
		return self::repertoireRacine() . self::REPERTOIRE_MODELE;
	}

	public static function repertoireMappers() {
		return self::repertoireModele() . self::REPERTOIRE_MAPPERS;
	}

	public static function repertoireNoyau() {
		return self::repertoireRacine() . self::REPERTOIRE_NOYAU;
	}

	public static function repertoireControleurs() {
		return self::repertoireRacine() . self::REPERTOIRE_CONTROLEURS;
	}

	// Les constantes relatives aux sources de données

	const DEFAULT_DATABASE_NAME = 'catclinic';

	const DATABASE_CONFIG_FILE = 'Configuration/basededonnees.ini';

	const TABLE_USER = 'utilisateur';

	const TABLE_CHAT = 'chat';

	const TABLE_PROPRIETAIRE = 'proprietaire';

	const TABLE_VISITE = 'visite';

	// divers

	const NB_MAX_UTILISATEURS_PAR_PAGE = 10;
}