<?php

	namespace App\Entity;

	/** 
	* Clase que incluye el modelo de nuestra aplicación
	*
	* @author Álvaro Tapiador <alvarotapiador@gmail.com>
	* @version 1.0.0 Estable
	*/
	class modelo {
	
		/** 
        * Lista los artículos que hay disponibles en la tienda online
        *
        * @return array $articulos Array con los artículos diponibles
        * @author Álvaro Tapiador <alvarotapiador@gmail.com>
        * @version 1.0.0 Estable
        */
		static function getArticulos() {
			$articulos = array(
				0 => array(
					"id" => 0,
					"artista" => "Kanye West",
					"titulo" => "Graduation",
					"imagen" => "graduation.jpg"),	
				1 => array(
					"id" => 1,
					"artista" => "Kendrick Lamar",
					"titulo" => "good kid, m.A.A.d city",
					"imagen" => "good_kid.jpg"),
				2 => array(
					"id" => 2,
					"artista" => "Kendrick Lamar",
					"titulo" => "To Pimp a Butterfly",
					"imagen" => "pimp_a_butterfly.jpg"),
				3 => array(
					"id" => 3,
					"artista" => "Kendrick Lamar",
					"titulo" => "DAMN.",
					"imagen" => "damn.jpg"),
				4 => array(
					"id" => 4,
					"artista" => "Kendrick Lamar",
					"titulo" => "Mr. Morale & the Big Steppers",
					"imagen" => "mr_morale.jpg"),
				5 => array(
					"id" => 5,
					"artista" => "Tame Impala",
					"titulo" => "Currents",
					"imagen" => "currents.jpg"),
				6 => array(
					"id" => 6,
					"artista" => "Tame Impala",
					"titulo" => "The Slow Rush",
					"imagen" => "slow_rush.jpg"),
			);
			
			return $articulos;
		}

		/** 
        * Lista el artículo buscado según su id
        *
		* @param string $id Identificador único del artículo
        * @return string $elegido Artículo según su id
        * @author Álvaro Tapiador <alvarotapiador@gmail.com>
        * @version 1.0.0 Estable
        */
		static function articulo($id) {
			$articulos = self::getArticulos();
			$elegido = $articulos[$id];

			return $elegido;
		}

		/** 
        * Lista las sugerencias que han ido dejando en la web
        *
        * @return array $listaSugerencias Array con la lista de sugerencias
        * @author Álvaro Tapiador <alvarotapiador@gmail.com>
        * @version 1.0.0 Estable
        */
		static function sugerencias() {
			$listaSugerencias = array(
				array(
					"usuario" => "Kanye West",
					"sugerencia" => "Le odio, es mucho mejor cantante que yo..."),	
				array(
					"usuario" => "Pharrell Williams",
					"sugerencia" => "Buena producción en el disco Good Kid, M.A.A.D. City"),
				array(
					"usuario" => "Kevin Parker",
					"sugerencia" => "Bah, demasiado de la calle todo."),
				array(
					"usuario" => "Tyler, the Creator",
					"sugerencia" => "Increible, como mola esta colección de discos"),
				array(
					"usuario" => "Ingmar Bergman",
					"sugerencia" => "Todo contemporáneo? Asco..."),
				array(
					"usuario" => "Steve Jobs",
					"sugerencia" => "Me mola, lo cojo para mis cosillas jejeje"),
			);
			
			return $listaSugerencias;
		}

	}

?>