<?php 
function factorial( $n ) {
 
  // Base case
  if ( $n == 0 ) {
    return 1;
  }
 
  // Recursion
  $result = ( $n * factorial( $n-1 ) );
  
  return $result;
}
 
// 8! = 8 x 7 x 6 x 5 x 4 x 3 x 2 x 1 = 40320 
echo "8! = " . factorial( 8 ); 

