<?php 
function power( $number , $n ) {

  if ( $n == 0 ) {
    return 1;
  }else{
    // Recursion 
    
    $result = ( $number * power( $number, $n-1 ) );
  }
  
  return $result;
}
 
// 10 power 4 = 10 x 10 x 10 x 10 = 10000 
echo "10 power 4 = " . power( 10, 4 );