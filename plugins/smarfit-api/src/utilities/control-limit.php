<?php 

function control_limit($user_ip) {

  $transient_name = 'limite_api_' . md5($user_ip);
  $limite_segundos = 3; 

  if (get_transient($transient_name)) {
    return array(
            'status' => 'error',
            'message' => 'Por favor, espera ' . $limite_segundos . ' antes de hacer otra petición.'
    );
  }

  set_transient($transient_name, true, $limite_segundos);
}