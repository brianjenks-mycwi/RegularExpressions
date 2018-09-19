<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="main.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
            include_once('sep.php');
            
            //Searching for matches
            separator();
            $pattern = '/Harris\//'; //Adding the i after the second / makes it case insensitive
            //
            $author = 'Ray Harris/';
            $editor = 'Joel Murach';
            //
            $author_match = preg_match($pattern, $author);
            // $author_match is 1
            echo '<p>' . $author_match . '</p>';
            //
            $editor_match = preg_match($pattern, $editor);   
            // $author_match is 0
            echo '<p>' . $editor_match . '</p>';
            
            //Searching for matches cont
            separator();
            if ($author_match === false) {
                echo 'Error testing author name.';
            } else if ($author_match === 0) {
                echo 'Author name does not contain Harris/.';
            } else {
                echo 'Author name contains Harris/.';
            }
            
            //matching special chars
            separator();
            $string = 
            "© 2010 Mike's Music. \ All rights reserved (5/2010).";
            //
            $test_match = preg_match('/\xA9/', $string);          
            // Matches © and returns 1
            echo '<p>' . $test_match  . '</p>';
            //
            $test_match = preg_match('///', $string);
            // Returns FALSE and issues a warning
            echo '<p>' . $test_match  . '</p>';
            //
            $test_match = preg_match('/\//', $string);
            // Matches / and returns 1
            echo '<p>' . $test_match  . '</p>';
            //
            $test_match = preg_match('/\\\\/', $string);
            // Matches \ and returns 1
            echo '<p>' . $test_match  . '</p>';
            
            //Matching character types
            separator();
            echo "<p>Character Types & Classes </p>";
                $string = 'The product code is MBT-3461.';
            //
            $test_match = preg_match('/MB./', $string);           
            // Matches MBT and returns 1
            echo '<p>' . $test_match  . '</p>';
            //
            $test_match = preg_match('/MB\d/', $string);          
            // Matches nothing and returns 0
            echo '<p>' . $test_match  . '</p>';
            //
            $test_match = preg_match('/MBT-\d/', $string);        
            // Matches MBT-3 and returns 1
            echo '<p>' . $test_match  . '</p>';
            //
            $test_match = preg_match('/MB[TF]/', $string);           
            // Matches MBT and returns 1
            echo '<p>' . $test_match  . '</p>';
            //
            $test_match = preg_match('/[.]/', $string);              
            // Matches . and returns 1
            echo '<p>' . $test_match  . '</p>';
            //
            $test_match = preg_match('/[13579]/', $string);          
            // Matches 3 and returns 1
            echo '<p>' . $test_match  . '</p>';
            
            //Metachars
            separator();
            echo "<p>Metacharacters & Bracket expressions</p>";
            $string = 'The product code is MBT-3461.';
            //
            $test_match = preg_match('/MB[^TF]/', $string);          
            // Matches nothing and returns 0
            echo '<p>' . $test_match  . '</p>';
            //
            $test_match = preg_match('/MBT[^^]/', $string);          
            // Matches MBT- and returns 1
            echo '<p>' . $test_match  . '</p>';
            //
            $test_match = preg_match('/MBT-[1-5]/', $string);        
            // Matches MBT-3 and returns 1
            echo '<p>' . $test_match  . '</p>';
            //
            $test_match = preg_match('/MBT[_*-]/', $string);         
            // Matches MBT- and returns 1
            echo '<p>' . $test_match  . '</p>';
            
            //Search string positions
            separator();
            echo "<p>Matching string positions</p>";
            $author = 'Ray Harris';
            //
            $test_match = preg_match('/^Ray/', $author);                  
            // Returns 1
            echo '<p>' . $test_match  . '</p>';
            //
            $test_match = preg_match('/Harris$/', $author);               
            // Returns 1
            echo '<p>' . $test_match  . '</p>';
            //
            $test_match = preg_match('/^Harris/', $author);               
            // Returns 0
            echo '<p>' . $test_match  . '</p>';
            //
            $editor = 'Anne Boehm';
            //Look for it regularly
            $test_match = preg_match('/Ann/', $editor);                   
            // Returns 1
            echo '<p>' . $test_match  . '</p>';
            //Will not find this due to the e at the end of Anne
            $test_match = preg_match('/Ann\b/', $editor);                 
            // Returns 0
            echo '<p>' . $test_match  . '</p>';
            
            //Match subpatterns
            separator();
            echo "<p>Matching subpatterns</p>";
            $name = 'Rob Robertson';
            //Look for Rob OR Bob
            $test_match = preg_match('/^(Rob)|(Bob)\b/', $name);          
            // Returns 1
            echo '<p>' . $test_match  . '</p>';
            // Look for three chars, followed by the same 3
            $test_match = preg_match('/^(\w\w\w) \1/', $name);            
            // Returns 1
            echo '<p>' . $test_match  . '</p>';
            
            //Find specific stuff
            separator();
            echo "<p>Repeating subpatterns</p>";
            $phone = '559-555-6627';
            //
            $test_match = preg_match('/^\d{3}-\d{3}-\d{4}$/', $phone);     
            // Returns 1
            echo '<p>' . $test_match  . '</p>';
            //
            $fax = '(555) 555-6635';
            //
            $test_match = preg_match('/^\(\d{0}\) ?\d{3}-\d{4}$/', $fax);  
            // Returns 1
            echo '<p>fax: ' . $test_match  . '</p>';
            //
            $phone_pattern  = 
                '/^(\d{3}-)|(\(\d{3}\) ?)\d{3}-\d{4}$/';
            //
            $test_match = preg_match($phone_pattern, $phone);              
            // Returns 1
            echo '<p>' . $test_match  . '</p>';
            //
            $test_match = preg_match($phone_pattern, $fax);                
            // Returns 1
            echo '<p>' . $test_match  . '</p>';
            
            //Look-ahead assertions
            separator();
            echo "<p>Look-ahead assertions</p>";
             $pattern = '/^(?=.*[[:digit:]])[[:alnum:]]{6}$/';
             //
            $test_match = preg_match($pattern, 'Harris');
            // Assertion fails and returns 0
            echo '<p>' . $test_match  . '</p>';
            //
            $test_match = preg_match($pattern, 'Harri5');              
            // Matches and returns 1
            echo '<p>' . $test_match  . '</p>';
            
            //Negative look-ahead assertions
            separator();
            echo "<p>Negative look-ahead assertions</p>";
            $pattern = '/^(?!3[2-9])[0-3][[:digit:]]$/';
            //Patt below matches
            $test_match = preg_match($pattern, '32');                  
            // Assertion fails and returns 0
            echo '<p>' . $test_match  . '</p>';
            //Patt below does not match
            $test_match = preg_match($pattern, '31');                  
            // Matches and returns 1
            echo '<p>' . $test_match  . '</p>';
            
            //Pass complexity
            separator();
            echo "<p>Pattern Examples</p>";
            $pw_pattern = 
                '/^(?=.*[[:digit:]])(?=.*[[:punct:]])[[:print:]]{6,}$/';
            //
            $password1 = 'sup3rsecret';
            $password2 = 'sup3rse(ret';
            //Check p1
            $test_match = preg_match($pw_pattern, $password1); 
            // Assertion fails and returns 0
            echo '<p>' . $test_match  . '</p>';
            //Check p2
            $test_match = preg_match($pw_pattern, $password2); 
            // Matches and returns 1
            echo '<p>' . $test_match  . '</p>';

            
            //Multiline reg expression
            separator();
            echo "<p>Multi-line & global</p>";
            $string   = "Ray Harris\nAuthor";
            //
            $pattern1 = '/Harris$/';
            $test_match = preg_match($pattern1, $string);      
            // Does not match Harris and returns 0
            echo '<p>' . $test_match  . '</p>';
            //
            $pattern2 = '/Harris$/m';
            $test_match = preg_match($pattern2, $string);
            // Matches Harris and returns 1
            echo '<p>' . $test_match  . '</p>';
            //
            $string  = 'MBT-6745 MBT-5712';
            $pattern = '/MBT-[[:digit:]]{4}/';
            //Return a count of matches
            $count = preg_match_all($pattern, $string, $matches);
            // Count is 2
            echo '<p>' . $count . '</p>';
            //
            foreach ($matches[0] as $match) {
                echo '<div>' . $match . '</div>';  
                // Displays MBT-6745 and MBT-5712
            }
            
            //Splitting!
            separator();
            echo "<p>Replace & split</p>";
            $items = 'MBT-6745 MBS-5729';
            $items = preg_replace('/MB[ST]/', 'ITEM', $items);
            //
            echo $items;       // Displays ITEM-6745 ITEM-5729
            //
            echo "</br>" . "</br>";
            //
            $items = 
                'MBT-6745 MBS-5729, MBT-6824, and MBS-5214';
            $pattern = '/[, ]+(and[ ]*)?/';
            $items = preg_split($pattern, $items);
            //
            // $items contains: 	
            // 'MBT-6745', 'MBS-5729', 'MBT-6824', 'MBS-5214'
            //
            foreach ($items as $item) {
                echo '<li>' . $item . '</li>';
            }
            
            //Phone test
            separator();
            echo "<p>Tests phone format</p>";
            $phone = '559-555-6624'; 
            $phone_pattern = 
              '/^[[:digit:]]{3}-[[:digit:]]{3}-[[:digit:]]{4}$/';
            echo $match = preg_match($phone_pattern, $phone);  
            // Returns 1
            
            //Test a date format
            separator();
            echo "<p>Tests date format</p>";
             $date = '8/10/209';         // invalid date
            $date_pattern = '/^(0?[1-9]|1[0-2])\/'
                 . '(0?[1-9]|[12][[:digit:]]|3[01])\/'
                 . '[[:digit:]]{4}$/';
            echo $match = preg_match($date_pattern, $date);    
            // Returns 0
            
            //Validate an email...
            separator();
            echo "<p>Email validation</p>";
            function valid_email ($email) {
                $parts = explode("@", $email);
                if (count($parts) != 2 ) return false;
                if (strlen($parts[0]) > 64) return false;
                if (strlen($parts[1]) > 255) return false;

                $atom = '[[:alnum:]_!#$%&\'*+\/=?^`{|}~-]+'; //These are allowable chars
                $dotatom = '(\.' . $atom . ')*'; //Include a dot in allowables, close it
                $address = '(^' . $atom . $dotatom . '$)';
                $char = '([^\\\\"])';
                $esc  = '(\\\\[\\\\"])';
                $text = '(' . $char . '|' . $esc . ')+';
                $quoted = '(^"' . $text . '"$)';
                $local_part = '/' . $address . '|' . $quoted . '/';
                $local_match = preg_match($local_part, $parts[0]);
                if ($local_match === false 
                    || $local_match != 1) return false;

                $hostname = 
                    '([[:alnum:]]([-[:alnum:]]{0,62}[[:alnum:]])?)';
                $hostnames = '(' . $hostname . 
                             '(\.' . $hostname . ')*)';
                $top = '\.[[:alnum:]]{2,6}';
                $domain_part = '/^' . $hostnames . $top . '$/';
                $domain_match = preg_match($domain_part, $parts[1]);
                if ($domain_match === false 
                    || $domain_match != 1) return false;

                return true;
            }
            if (valid_email ("mickey@mouse")) {
                echo "Valid!";
            } else { echo "Invalid!"; }
            
            /* ******************* Day 2 ************************** */
            separator("Day 2");
            //Instantiate and throw!
            function calculate_future_value(
               $investment, $interest_rate, $years) {
                if  ($investment <= 0 || 
                     $interest_rate <= 0 || 
                     $years <= 0 ) {
                  throw new Exception("Please check all entries.");
                }
                //
                $future_value = $investment;
                for ($i = 1; $i <= $years; $i++) {
                    $future_value = 
                        ($future_value + 
                            ($future_value * $interest_rate * .01)); 
                }
                return round($future_value, 2);
            }
            //
//            $futureValue = 
//                calculate_future_value(10000, 0.06, 0);
//            echo $futureValue;
            
            //Try/Catch
            try {
                $fv =  calculate_future_value(10000, 0.06, 0);
                echo 'Future value was calculated successfully.';
            } catch (Exception $e) {
                echo 'Error: ' . $e->getMessage();
            }
            
            //Extend an error
            class customException extends Exception {   //re-throw example
              public function errorMessage() {
                //error message
                $errorMsg = $this->getMessage().' is not a valid E-Mail address.';
                return $errorMsg;
              }
            }
            //
            $email = "someone@example.com";
            //
            try {
            //  try {          //run as-is then uncomment inner try & braces to compare
                //check for "example" in mail address
                if(strpos($email, "example") == FALSE) {
                  //throw exception if email is not valid
                  throw new Exception($email);
                }
            }
            catch(Exception $e) {
            //    //re-throw exception
                throw new customException($email);
              }
            //
            catch (customException $e) {
              //display custom message
              echo $e->errorMessage();
//              exit;                       //skips processing below if used
            }
            //
            echo "</br>";
                    $dsn = 'mysql:host=localhost;dbname=my_guitar_shop11';
                    try {           
                        $db = 
                            new PDO($dsn, 'root', '$hoe1Aces');
                        // other statements
                    } catch (PDOException $e) {
                        echo 'PDOException: ' . $e->getMessage();
                    } catch (Exception $e) {
                        echo 'Exception: ' . $e->getMessage();
                    }




        ?>
    </body>
</html>
