<?php
return [
  /** set your paypal credential **/
  #sandbox: Christianc2303-facilitator@gmail.com
  'client_id' =>'AcKOY5ZhcPYC1b9ylL9Y-BXTeIqiCSSmJLQto_4fSJhtBZVe8TNl9tMEiDXmdwEjf1x4fNvUwSlzLhVZ',
  'secret' => 'EAZkZWVnpgHt0n18EzXrJ0qjX8Ub94q3Lc6zPqIiNSIBnICm9rCHAOz3qJU7WIFnwCXW_jnT-U7-Li0b',
  /**
  * SDK configuration
  */
  'settings' => [
    /**
    * Available option 'sandbox' or 'live'
    */
    'mode' => 'sandbox',
    /**
    * Specify the max request time in seconds
    */
    'http.ConnectionTimeOut' => 1000,
    /**
    * Whether want to log to a file
    */
    'log.LogEnabled' => true,
    /**
    * Specify the file that want to write on
    */
    'log.FileName' => storage_path() . '/logs/paypal.log',
    /**
    * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
    *
    * Logging is most verbose in the 'FINE' level and decreases as you
    * proceed towards ERROR
    */
    'log.LogLevel' => 'FINE'
  ],
]

?>
