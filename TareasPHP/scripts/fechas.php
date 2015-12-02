<?php
	setlocale(LC_TIME, 'spanish');  
	$nombreMes=strftime("%B",mktime(0, 0, 0, $mes, 1, $anio));
	$ultimoDiaDelMes=date("t",mktime( 0, 0, 0, $mes, 1, $anio ));
	$numero=0-date("w", mktime(0, 0, 0, $mes, 1, $anio));
	$letraDiaSemana=strftime ( "%A" ,mktime(0,0,0,1,$d,1));
	$letraMayusculaDiaSemana=strtoupper($letraDiaSemana);
	$mesdesde=date ( "m" ,  time()  );
	$anodesde=date ( "Y" ,  time()  );

?>