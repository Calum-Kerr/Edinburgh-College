<?php

	interface Total {
		public function calcScores();
	}
	
	abstract class User {
		protected $scores = 0;
		protected $numberOfArticles = 0;
		
		public function getNumberOfArticles() {
			return $this -> number;
		}
		
		public function setNumberOfArticles($int) {
			$this -> number = $int;
		}
	}
	

	