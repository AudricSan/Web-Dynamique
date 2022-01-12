<?php
    /* Function to check password Format */
        function checkPassFormat($pass){
            $passErr = array();

            if (strlen($pass) <= '7') {
                $passErr['size'] = "Your pass Must Contain At Least 8 Characters!";
            }

            elseif(!preg_match("#[0-9]+#",$pass)) {
                $passErr['number'] = "Your pass Must Contain At Least 1 Number!";

            }

            elseif(!preg_match("#[A-Z]+#",$pass)) {
                $passErr['upper'] = "Your pass Must Contain At Least 1 Capital Letter!";

            }

            elseif(!preg_match("#[a-z]+#",$pass)) {
                $passErr['lower'] = "Your pass Must Contain At Least 1 Lowercase Letter!";
            }

            return $passErr;
        }
    /**/