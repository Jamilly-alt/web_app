<?php
// 🔐 Suas chaves
$google_maps_api_key = "AIzaSyD1ymgJSOFD9yCS4hoC7hNeU8Km40bbQi0";
$weather_key = "69372cda46f535a7e11c458f6c63530b";

// Recebe dados do link
$local = $_GET['local'] ?? '';
$data_evento = $_GET['data'] ?? '';

if (!$local || !$data_evento) {
    echo "Dados insuficientes.";
    exit;
}

// 1️⃣ Geocodificação do endereço
$url_endereco = urlencode($local);
$geo_url = "https://maps.googleapis.com/maps/api/geocode/json?address=$url_endereco&key=$google_maps_api_key";

$geo_resposta = json_decode(file_get_contents($geo_url), true);

if ($geo_resposta["status"] !== "OK") {
    echo "❗ Endereço não encontrado.";
    exit;
}

$lat = $geo_resposta["results"][0]["geometry"]["location"]["lat"];
$lon = $geo_resposta["results"][0]["geometry"]["location"]["lng"];

// 2️⃣ Obtém previsão de até 7 dias
$onecall_url = "https://api.openweathermap.org/data/2.5/onecall?lat=$lat&lon=$lon&exclude=hourly,minutely,current,alerts&units=metric&lang=pt_br&appid=$weather_key";

$clima_resposta = json_decode(file_get_contents($onecall_url), true);

if (!isset($clima_resposta["daily"])) {
    echo "❗ Não foi possível obter o clima.";
    exit;
}

$timestamp_evento = strtotime($data_evento);
$achou = false;

// 3️⃣ Procura exatamente o dia do evento
foreach ($clima_resposta["daily"] as $dia) {
    if (date("Y-m-d", $dia["dt"]) == date("Y-m-d", $timestamp_evento)) {
        $temp = $dia["temp"]["day"];
        $desc = ucfirst($dia["weather"][0]["description"]);
        $icone = $dia["weather"][0]["icon"];

        echo "
            <strong>Clima previsto:</strong><br>
            🌡️ Temperatura média: <strong>$temp°C</strong><br>
            ☁️ Condição: <strong>$desc</strong><br>
            <img src='https://openweathermap.org/img/wn/$icone.png'>
        ";
        $achou = true;
        break;
    }
}

if (!$achou) {
    echo "📅 A previsão só está disponível para até **7 dias antes da data atual**.";
}
