<?php

return array(
    // set your paypal credential
    'client_id' => 'AWavNJFuU2q-W6_xWwAnZKK7sGfD_ONCkNCP3QcQrvcsCV4EW63rCpJToIm8JQX8Z6rSkRh5PNFvOR2U',
    'secret' => 'EBEUgRdho_RXP8vg113H7yq6yiobMteWXRBFPe7MeQ7eCNjSKnHaY-3rtdYN6Qk1-u2mb6mUdIo4rvjJ',

    /**
     * SDK configuration
     */
    'settings' => array(
        /**
         * Available option 'sandbox' or 'live'
         */
        'mode' => 'sandbox',

        /**
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 30,

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
    ),
);

 ?>
