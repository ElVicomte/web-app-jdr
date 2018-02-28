<?php

	class ControleurEvenement{

		private $message;

		public function __construct(){

		}

		public function messageEvenement($event, $message, array $contenu = null){
			$this->message = $message;
			if(!empty($contenu)){
				foreach($contenu as $c){
					$this->message = str_replace('?', $c, $this->message);
				}
			}
			
			switch ($event) {
				case 'success':
					return '<div class="alert alert-success">' . $this->message . '</div>';
					break;
				case 'danger':
					return '<div class="alert alert-danger">' . $this->message . '</div>';
					break;
				
				default:
					return '<div class="alert alert-primary">' . $this->message . '</div>';
					break;
			}
		}

	}