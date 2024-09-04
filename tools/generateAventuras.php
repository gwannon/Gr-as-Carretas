<?php

require __DIR__ . '/../vendor/autoload.php';

$tags = [
  'HTML' => '',
  'HASH' => date("YmdHis"),
  'TITLE' => "Grúas&Carretas: Ordenanza municipal sobre carros y monturas",
  'DESCRIPTION' => 'Grúas&Carretas (G&C) es un juego de rol para 4 personas donde eres une empleade del ayuntamiento de una ciudad de un RPG medieval fantástico que se encarga de llevarse carros, carretas y monturas indebidamente aparcadas.',
  'VERSION' => "0.2",
  'AUTHOR' => "@Gwannon",
  'BGCOLOR1' => "#359138",
  'BGCOLOR2' => "#18b91d",
  'BGCOLOR3' => "#0f6d13",
  'BORDERCOLOR' => "#4caf50",
  'BG' => "#d3ffe1",
  'BGINSIDE' => "#afffc7",
];

//Generamos el HTML
use FastVolt\Helper\Markdown;

$mkd = Markdown::new();
$mkd->setContent(file_get_contents(__DIR__ . "/../Historias tras unas cervezas.md"));
$tags['HTML'] = $mkd->toHtml();
$html = file_get_contents(__DIR__ . "/template.html");
foreach ($tags as $tag => $value) {
  $html = str_replace("|".$tag."|", $value, $html); 
}

$html = str_replace("<p>\salto</p>", "</div><div>", $html);


file_put_contents(__DIR__ . "/../HistoriasTrasUnasCervezas.html", $html);

echo "InfoKey: Subject\n";
echo "InfoValue: ".$tags['DESCRIPTION']." Versión ".$tags['VERSION']."\n\n";
echo "InfoKey: Author\n";
echo "InfoValue: ".$tags['AUTHOR']."\n\n";
