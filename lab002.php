<?php
echo "<h1>PHP Lab Task -02 </h1>";
echo "<br>";
echo "<h2>Rectangle</h2>";
$length = 10;
$width = 5;
$area = $length * $width;
$perimeter = 2 * ($length + $width);
echo "Length: $length, Width: $width <br>";
echo "Area of the Rectangle: $area <br>";
echo "Perimeter of the Rectangle: $perimeter <br>";
echo "<h2>VAT Calculation</h2>";
$original_amount = 500;
$vat_rate = 0.15;
$vat_amount = $original_amount * $vat_rate;
$total_amount = $original_amount + $vat_amount;
echo "Original Amount: $original_amount <br>";
echo "VAT Amount (15%): $vat_amount <br>";
echo "Total Amount (with VAT): $total_amount <br>";
echo"<h2>ODD or Even</h2>";
$number_to_check =3;
if ($number_to_check % 2 == 0) {
   echo "The number $number_to_check is Even <br>";
} else {
   echo "The number $number_to_check is Odd <br>";
}
echo "<h2>Larger Number</h2>";
$num1 = 10;
$num2 = 20;
$num3 = 30;
echo "Numbers are: $num1, $num2, $num3 <br>";
if ($num1 >= $num2 && $num1 >= $num3) {
   $largest = $num1;
} elseif ($num2 >= $num1 && $num2 >= $num3) {
   $largest = $num2;
} else {
   $largest = $num3;
}
echo "The largest number is: $largest <br>";
echo "<h2>Odd Number(10-100)</h2>";
echo "Odd numbers: ";
$odd_numbers = [];
for ($i = 10; $i <= 100; $i++) {
   if ($i % 2 != 0) { 
       $odd_numbers[] = $i;
   }
}
echo implode(", ", $odd_numbers);
echo "<br>";
echo "<h2>Search</h2>";
$data_array = ["1","2","3","4","5"];
$search_element = "2";
$found = false;
echo "Searching for: $search_element <br>";
foreach ($data_array as $element) {
   if ($element == $search_element) {
       $found = true;
       break;
   }
}
if ($found) {
   echo "The element was found in the array. <br>";
} else {
   echo "The element was not found in the array. <br>";
}
echo "<br>";
echo "<h2> Printing Shapes</h2>";
echo "<h3>Shape 1: Star</h3>";
for($i=0; $i<3; $i++){
    for($j=0; $j<=$i; $j++){
            echo "*";
        }
        echo "<br>";
    }
   
    echo "<br>";
echo "<h3> Shape 2: Number</h3>";
for($i=3; $i>0; $i--){
        for($j=1; $j<=$i; $j++){
            echo $j;
        }
        echo "<br>";
    }
 
    echo "<br>";
echo "<h3> Shape 3: Alphabate</h3>";
$c = "A";
for($i=0; $i<3; $i++){
    for($j=0; $j<=$i; $j++){
            echo $c. " ";
            $c++;
        }
        echo "<br>";
    }
   
    echo "<br>";
echo"<h2>2D Array</h2>";
$stds = [
        [1, 2, 3, "A"],
        [1, 2, "B", "C"],
        [1, "D", "E", "F"]
    ];
    
 
    echo "<b>Shape 1 (Numbers):</b><br>";
    for($i=0; $i<3; $i++){
        for($j=0; $j<4; $j++){
             if(is_int($stds[$i][$j])){
                 echo $stds[$i][$j]. " ";
             }
        }
        echo "<br>";
    }
 
    echo "<br><b>Shape 2 (Alphabate):</b><br>";
    for($i=0; $i<3; $i++){
        for($j=0; $j<4; $j++){
             if(is_string($stds[$i][$j])){
                 echo $stds[$i][$j]. " ";
             }
        }
        echo "<br>";
    }
?>
