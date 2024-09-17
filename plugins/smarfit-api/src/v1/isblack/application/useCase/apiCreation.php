<?php 

   class ApiIsBlack {
      
      public function __construct() {
         $this->API_slug();
      }

      public function API_slug() {
         $api_slug = new RouterIsBlack();
         $api_slug->REST_API_SLUG();
         return $api_slug;
      }

   }

   new ApiIsBlack();