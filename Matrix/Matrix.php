<?php
namespace mishimoto0805;

class Matrix{

//**********************************************************
//*          code:8503001
//*          name:行列式の表示
//**********************************************************
  function displayMatrix($matrix){
    $line     = count($matrix);
    $Column   = count($matrix[0]);
    echo "<table>";
      for ($m=0; $m < $line; $m++) {
         echo "<tr>";
        for ($n=0; $n < $Column; $n++) {
          echo "<td>";
          echo "　".$matrix[$m][$n];
          echo "</td>";
        }
        echo "</tr>";
      }
    echo "</table>";
  }
//**********************************************************
//*          code:8503002
//*          name:０行列の作成
//**********************************************************
  function zeroMatrix($line,$Column){
    if ($line <= 0 or $Column <= 0) {
      $matrixI = null;
    }else{
      for ($i = 0; $i < $line; $i++) {
         for ($j = 0; $j < $Column ; $j++) {
            $matrixI[$i][$j] = 0 ;
         }
      }
      return $matrixI;
    }
  }
//**********************************************************
//*          code:8503003
//*          name:単位行列の作成
//**********************************************************
   function identityMatrix($n){
      for ($i = 1; $i <= $n; $i++) {
         for ($j = 1; $j <=$n ; $j++) {
            $matrixI[$i][$j] = ($i==$j) ? 1 : 0 ;
         }
      }
      return $matrixI;
   }
//**********************************************************
//*          code:8503004
//*          name:行列の足し算
//**********************************************************
  function additionMatrix($matrixA,$matrixB){
    $line[0]   = count($matrixA);
    $Column[0] = count($matrixA[0]);
    $line[1]   = count($matrixB);
    $Column[1] = count($matrixB[0]);
      if ($line[0]!==$line[1] or $Column[0]!==$Column[1]) {
        $matrixC = null;
      } else {
        for ($m=0; $m < $line[0]; $m++) {
          for ($n=0; $n < $Column[0]; $n++) {
            $matrixC[$m][$n] = $matrixA[$m][$n] + $matrixB[$m][$n];
          }
        }
        return $matrixC;
     }
  }
//**********************************************************
//*          code:8503005
//*          name:行列の引き算
//**********************************************************
  function subtractionMatrix($matrixA,$matrixB){
    $line[0]   = count($matrixA);
    $Column[0] = count($matrixA[0]);
    $line[1]   = count($matrixB);
    $Column[1] = count($matrixB[0]);
      if ($line[0]!==$line[1] or $Column[0]!==$Column[1]) {
        $matrixC = null;
      } else {
        for ($m=0; $m < $line[0]; $m++) {
          for ($n=0; $n < $Column[0]; $n++) {
            $matrixC[$m][$n] = $matrixA[$m][$n] - $matrixB[$m][$n];
          }
        }
        return $matrixC;
     }
  }
//**********************************************************
//*          code:8503006
//*          name:スカラー値と行列の掛け算
//**********************************************************
   function scalarMatrix($scalar,$matrix){
      $line = count($matrix);
      $Column = count($matrix[0]);
      for ($m = 0; $m < $line; $m++) {
         for ($n = 0; $n < $Column; $n++) {
            $result[$m][$n]=$matrix[$m][$n]*$scalar;
         }
      }
      return $result;
   }
//**********************************************************
//*          code:8503007
//*          name:行列の掛け算
//**********************************************************
  function multiplicationMatrix($matrixA,$matrixB){
  	$total = [];
  	$line[0]    = count($matrixA);    //行列Aの$l配列
  	$Column[0]  = count($matrixA[0]); //行列Aの$m配列
  	$line[1]    = count($matrixB);    //行列Bの$m配列
  	$Column[1]  = count($matrixB[0]); //行列Bの$n配列
    if ($Column[0]!=$line[1]) {       //各行列の$m配列が一致しなければnull値を返す
      $matrixC = null;
    }else{
      for ($l=0; $l < $line[0]; $l++) {
        for ($m=0; $m < $Column[0]; $m++) {
          for ($n=0; $n < $Column[1]; $n++) {
            $matrixA[$l][$m];
            $matrixB[$m][$n];
            $total[$l][$n][$m] = $matrixA[$l][$m]*$matrixB[$m][$n];
          }
        }
      }
      for ($l=0; $l < $line[0]; $l++) {
        for ($n=0; $n < $Column[1]; $n++) {
          $matrixC[$l][$n] = array_sum($total[$l][$n]);
        }
      }
    }
    return $matrixC;
  }
//**********************************************************
//*          code:8503008
//*          name:逆行列の計算
//**********************************************************
  function inverseMatrix($matrix){
  //****【単位行列の作成】************
    $n  = count($matrix);
	  $m  = count($matrix[0]);
    $n2 = $n*2;
    for ($i = 0; $i < $n; $i++) {
       $j2=$n;
       for ($j = 0; $j < $n; $j++) {
          if($i == $j){
             $matrix[$i][$j2] = $tani[$i][$j] = 1;
          }else{
             $matrix[$i][$j2] = $tani[$i][$j] = 0;
          }
          $j2++;
       }
    }
  //****【ダミー行列の作成】*************
    for ($i = 0; $i < $n; $i++) {
       $j2=$n;
       for ($j = 0; $j < $n2; $j++) {
          $damyMTRX[$i][$j] = $matrix[$i][$j];
          $j2++;
       }
    }
  //****【ｎ行目のＮＮを１にする】**********
    for ($i = 0; $i <$n ; $i++) {
      $keisuu1[$i] = 1/$damyMTRX[$i][$i];
        for ($j = 0; $j < $n2 ; $j++) {
          $result1[$i][$j] = $keisuu1[$i] * $damyMTRX[$i][$j];
          $damyMTRX[$i][$j] = $result1[$i][$j];
        }
        for ($k= 0; $k < $n; $k++) {
          if ($i==$k) {
            continue;
          }else{
            $keisuu2[$k] = $damyMTRX[$k][$i];
            for ($m = 0; $m < $n2 ; $m++) {
                $damyMTRX[$k][$m] = $damyMTRX[$k][$m] - ($keisuu2[$k] * $result1[$i][$m]);
            }
          }
        }
    }
    $x=0;
    for ($i = 0; $i <$n ; $i++) {
       $y=0;
       for ($j = $n; $j < $n2 ; $j++) {
          $ans[$x][$y] = $damyMTRX[$i][$j];
          $y++;
       }
       $x++;
    }
    return $ans;
  }
//**********************************************************
//*          code:8503009
//*          name:行列の転置
//**********************************************************
   function transposedMatrix($matrix){
      $line = count($matrix);
      $Column = count($matrix[0]);
      for ($i = 0; $i < $line; $i++) {
         for ($j = 0; $j < $Column; $j++) {
            $result[$j][$i]=$matrix[$i][$j];
         }
      }
      return $result;
   }

}//クラスの終わり
