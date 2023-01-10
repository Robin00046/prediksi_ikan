<?php     
if (! function_exists('dd')) {
            /**
             * Dump the passed variables and end the script.
             *
             * @param  mixed
             * @return void
             */
            function dd($var){ 
                echo "<pre>";
                print_r($var);
                exit;
            }
        }

?>