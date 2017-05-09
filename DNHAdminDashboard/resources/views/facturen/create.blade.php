{{--{{dd($members)}}--}}
<?php
// (c) Xavier Nicolay
// Exemple de génération de devis/facture PDF




$pdf = new PDF_Invoice( 'P', 'mm', 'A4' );
$pdf->AddPage();
$pdf->addSociete( "De Nieuwlandse Haven",
    "Zaagmolendijk 6\n" .
    "4339 NG Nieuw- en Sint Joosland\n".
    "0118 601 848\n" .
    "KvK: 40310410\n");
$pdf->fact_dev( "Contributiefactuur ", date ('Y'));
$pdf->addDate( date ('d-m-Y'));
$pdf->addClient("CL01");
$pdf->addPageNumber("1");

$pdf->addClientAdresse("Bas Karelse\n Straat\n Middelburg");

$pdf->addReglement(9);
$pdf->addEcheance("Datum");
$pdf->addNumTVA("FR888777666");

$cols=array( "REFERENTIE"    => 23,
    "OMSCHRIJVING"  => 73,
    "HOEVEELHEID"     => 27,
    "TARIEF"      => 26,
    "PRIJS" => 25,
    "TOTAAL"          => 15.7);
$pdf->addCols( $cols);
$cols=array( "REFERENTIE"    => "L",
    "OMSCHRIJVING"  => "L",
    "HOEVEELHEID"     => "C",
    "TARIEF"      => "R",
    "PRIJS" => "R",
    "TOTAAL"          => "C" );

$pdf->addLineFormat($cols);
$y    = 109;
$line = array( "REFERENTIE"    => "Ref nr. 1",
    "OMSCHRIJVING"  => "Schip de Eenhoorn\n",
    "HOEVEELHEID"     => "20 Meter",
    "TARIEF"      => "*15,- euro",
    "PRIJS" => "300,- euro",
    "TOTAAL"          => " " );
$size = $pdf->addLine( $y, $line );
$y   += $size + 2;

$line = array( "REFERENTIE"    => "Ref nr. 2",
    "OMSCHRIJVING"  => "Contributie",
    "HOEVEELHEID"     => "1 jaar",
    "TARIEF"      => "*105,- euro",
    "PRIJS" => "105,- euro",
    "TOTAAL"          => " " );
$size = $pdf->addLine ( $y, $line);
$y   += $size + 3;
$line = array( "REFERENTIE"    => "Ref nr. 3",
    "OMSCHRIJVING"  => "Toeslag water + elektriciteit, niet bewoner",
    "HOEVEELHEID"     => "1 jaar",
    "TARIEF"      => "*15,- euro",
    "PRIJS" => "15,- euro",
    "TOTAAL"          => " " );

$size = $pdf->addLine ( $y, $line);
$y   += $size + 4;
$line = array( "REFERENTIE"    => " ",
    "OMSCHRIJVING"  => " ",
    "HOEVEELHEID"     => " ",
    "TARIEF"      => " ",
    "PRIJS" => " ",
    "TOTAAL"          => "420,-" );

$size = $pdf->addLine( $y, $line );




$pdf->Output();
exit;
?>