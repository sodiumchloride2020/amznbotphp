<?php
// recupero il contenuto inviato da Telegram
$content = file_get_contents("php://input");
// converto il contenuto da JSON ad array PHP
$update = json_decode($content, true);
// se la richiesta è null interrompo lo script
if(!$update)
{
  exit;
}
$affiliate = "&tag=miketama-21"; // This is what is in all of my Amazon Affiliate links. To get yours, make an affiliate link, then look for where it has a "?" then copy all the characters from the "?" to the "=" including those two signs.
// assegno alle seguenti variabili il contenuto ricevuto da Telegram
$message = isset($update['message']) ? $update['message'] : "";
$messageId = isset($message['message_id']) ? $message['message_id'] : "";
$chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
$firstname = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";
$lastname = isset($message['chat']['last_name']) ? $message['chat']['last_name'] : "";
$username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
$date = isset($message['date']) ? $message['date'] : "";
$text = isset($message['text']) ? $message['text'] : "";
// pulisco il messaggio ricevuto togliendo eventuali spazi prima e dopo il testo
$text = trim($text);
$text = strtolower($text);


// gestisco la richiesta
header("Content-Type: application/json");
$response = '';
if(strpos($text, "/start") === 0 || $text=="ciao")
{
	$response = "Hi $firstname! Send me an Amazon link";
}
elseif((bool)parse_url($text);)
{
	//parse e modifica URL
$response = "URL VALIDO"
}
else
{
	$response = "Send me an Amazon link please!";
}
$parameters = array('chat_id' => $chatId, "text" => $response);
$parameters["method"] = "sendMessage";
echo json_encode($parameters);


return $result
}


function isValidURL($url) { return (bool)parse_url($url); }

// mi preparo a restitutire al chiamante la mia risposta che è un oggetto JSON
// imposto l'header della risposta
header("Content-Type: application/json");
// la mia risposta è un array JSON composto da chat_id, text, method
// chat_id mi consente di rispondere allo specifico utente che ha scritto al bot
// text è il testo della risposta
$parameters = array('chat_id' => $chatId, "text" => $response);
// method è il metodo per l'invio di un messaggio (cfr. API di Telegram)
$parameters["method"] = "sendMessage";
// converto e stampo l'array JSON sulla response
echo json_encode($parameters);
