<?php 

   class ApiCreationTax{
      
      public function __construct() {
         $this->API_slug();
      }

      public function API_slug() {
         $api_slug = new RouterTax();
         $api_slug->REST_API_SLUG();
         return $api_slug;
      }

   }

   new ApiCreationTax();