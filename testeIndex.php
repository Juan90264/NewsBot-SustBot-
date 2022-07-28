<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
///ignore_user_abort(true);
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
//Define fuso horário como UTC
date_default_timezone_set('America/Belem');

//Define data atual
$today = strtotime('today');


$api_url = 'https://pt.wikipedia.org/w/api.php';

//Login
include 'api.php';

//loginAPI('Juan90264', 'Ca5910121314');
//if (loginAPI('Juan90264', 'Ca59101213') === FALSE) die("Nao foi possível recuperar os dados do contador.");
//print("Logado com sucesso na ptwiki");

//if (!get_headers("https://pt.wikipedia.org/w/api.php?action=purge&format=none&forcerecursivelinkupdate=1&titles=Wikip%C3%A9dia%3ASabia%20que%2FFrequ%C3%AAncia")) die ("Erro durante purge.");
//$htmlTime = json_decode(file_get_contents("https://pt.wikipedia.org/w/api.php?action=expandtemplates&format=json&prop=wikitext&text=%7B%7BWikip%C3%A9dia//%3ASabia_que%2FFrequ%C3%AAncia%7D%7D"), true)["expandtemplates"]["wikitext"];
//if ($htmlTime === FALSE) die("Nao foi possível recuperar os dados do contador.");

//Limite de segurança
//if (is_numeric($htmlTime) === FALSE OR $htmlTime < 43200) {
//	die("'Wikipédia:Sabia que/Frequência' possui valor não numérico ou menor que 43200. Bloqueio de //segurança.");
//}

//Recupera horário da última alteração
//$get = file_get_contents("https://pt.wikipedia.org/w/api.php?action=query&format=json&list=usercontribs&uclimit=1&ucuser=SabiaQueBot&ucprop=timestamp");
//if ($get === FALSE) die("Nao foi possível recuperar os dados da API.");
//$antes = date("U",strtotime("2022-07-17T08:00:00Z"));

$dataProgramador = date("H:i");
//print($dataProgramador);


//Continua atualização, ou retorna contagem regressiva e encerra o script
if ($dataProgramador == "01:44" or $dataProgramador == "00:" . date("i")) {
	//echo "Disponível para atualização.\n";
        //$arquivoCheckUpPostagem = fopen("dataProgramador.txt", "r+");
        //$dataArquivo = date("Y-m-d", time() + 86400) . " 08:00:00"; // "86400" em segundo é um dia
        //fwrite($arquivoCheckUpPostagem, $dataArquivo);
        //fclose($arquivoCheckUpPostagem);
        //print("Arquivo de Check Up atualizado com sucesso!");

       	//////// Inicia o web scraping das notícias

        $data = file_get_contents('http://www.google.com/');

        preg_match('/<title>([^<]+)<\/title>/i', $data, $matches);
        $title = $matches[1];
 
        preg_match('/<img[^>]*src=[\'"]([^\'"]+)[\'"][^>]*>/i', $data, $matches);
        $img = $matches[1];

        echo $title."<br>\n";
        echo $img;

        require('VOA.php');
        VOA_execution();
                

} else {
	echo "Contagem regressiva para atualização: ";
	if ($dif > ($htmlTime / 2)) {
		echo gmdate("j \d\i\a\, H:i:s", $dif - ($htmlTime / 2));
	} else {
		echo gmdate("H:i:s", $dif);
	}
	echo "\n";
	//die();
}


//$dataProgramador = fopen("C:\wamp64\www\NewsBot (SustBot)\dataProgramador.txt", "r") or die("Unable to open file!");// Se deixar somente o nome do arquivo com a extensão do arquivo ele vai precisar estar na mesma pasta desse arquivo
//echo fread($dataProgramador,filesize("C:\wamp64\www\NewsBot (SustBot)\dataProgramador.txt"));
$dataProgramador2 = file_get_contents("C:\wamp64\www\NewsBot (SustBot)\dataProgramador.txt");
//fclose($dataProgramador);


//$userAPI = "Juan90264";
//$passAPI = "Ca59101213";

//$text2 = "A Fenómica (ou Fenômica) é o estudo sistemático dos [[fenótipos]].";

//$summary = "Criando uma página usando API";
//$page2 = "Usuário:Juan90264/Marcelo Weksler";


//editAPI("OI!", NULL, FALSE, "?", "Usuário:Juan90264/Marcelo Weksler", "Juan90264");
//print("Funcionou!");
//die();

?>

<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<style>
body {
background-color: black;
color: white;
}

h1 {
  text-align: center;
  font-size: 32pt;
  font-family: Roboto Slab;
}

p {
  text-align: center;
  font-size: 60px;
  font-family: Roboto Slab;
}

#demo {
  margin-top: -5px;
}
</style>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;400;500&display=swap" rel="stylesheet">

</head>
<body>
<div>Registros terminam em <span id="time">Carregando....</span>!</div>
<script>
/* Código exposto em uma página php */
/* var contador = '<?php echo $fetch['time']?>'; */ /**** Variável do PHP ****/

var contador = '';

/* A partir daqui, pode ficar em um arquivo .js */
function startTimer(duration, display) {
  var timer = duration, hours, minutes, seconds;
  setInterval(function() {
    hours = parseInt(timer / 3600, 10)
    minutes = parseInt(timer / 60 % 60, 10)
    seconds = parseInt(timer % 60, 10);

    hours = hours < 10 ? "0" + hours : hours;
    minutes = minutes < 10 ? "0" + minutes : minutes;
    seconds = seconds < 10 ? "0" + seconds : seconds;

    display.textContent = hours + ":" + minutes + ":" + seconds;

    if (--timer < 0) {
      location.reload();
    }
  }, 1000);
}

window.onload = function() {
  var count = parseInt(contador),
    display = document.querySelector('#time');
  startTimer(count, display);
};
</script>

<h1>Contagem regressiva para atualização:</h1>
<p id="demo"></p>

<div style="width: 50%; height: 50%; text-align: center; border: 4px solid #ffffff; border-radius: 14px; margin: 4px; font-size: 20pt;">
<?php echo $printConsole;?>
</div>
<script>
var deadline = new Date("<?php echo $dataProgramador2;?>").getTime(); //"2022-07-20 08:00:00"
var x = setInterval(function() {
var now = new Date().getTime();
var t = deadline - now;
var days = Math.floor(t / (1000 * 60 * 60 * 24));
var hours = Math.floor((t%(1000 * 60 * 60 * 24))/(1000 * 60 * 60));
var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60));
var seconds = Math.floor((t % (1000 * 60)) / 1000);
document.getElementById("demo").innerHTML = days + "d " 
+ hours + "h " + minutes + "m " + seconds + "s ";
    if (t < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
    }
}, 1000);
</script>
</body>
</html>
