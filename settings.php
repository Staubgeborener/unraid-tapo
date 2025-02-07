<?php
// Unraid Settings Page für das Tapo P110 Plugin

$plugin = "tapo_energy";
$configFile = "/boot/config/plugins/$plugin/settings.cfg";

// Einstellungen speichern
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'TAPO_EMAIL' => $_POST['TAPO_EMAIL'] ?? '',
        'TAPO_PASSWORD' => $_POST['TAPO_PASSWORD'] ?? '',
        'TAPO_IP' => $_POST['TAPO_IP'] ?? ''
    ];
    file_put_contents($configFile, json_encode($data));
}

// Aktuelle Einstellungen laden
$settings = file_exists($configFile) ? json_decode(file_get_contents($configFile), true) : [];
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Tapo Energy Settings</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        .container { max-width: 400px; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px; }
        label { display: block; margin-top: 10px; }
        input { width: 100%; padding: 8px; margin-top: 5px; }
        button { margin-top: 15px; padding: 10px 20px; cursor: pointer; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Tapo P110 Einstellungen</h2>
        <form method="POST">
            <label for="TAPO_EMAIL">Tapo Account Email</label>
            <input type="text" name="TAPO_EMAIL" value="<?php echo htmlspecialchars($settings['TAPO_EMAIL'] ?? ''); ?>">
            
            <label for="TAPO_PASSWORD">Tapo Account Passwort</label>
            <input type="password" name="TAPO_PASSWORD" value="<?php echo htmlspecialchars($settings['TAPO_PASSWORD'] ?? ''); ?>">
            
            <label for="TAPO_IP">Tapo IP-Adresse</label>
            <input type="text" name="TAPO_IP" value="<?php echo htmlspecialchars($settings['TAPO_IP'] ?? ''); ?>">
            
            <button type="submit">Speichern</button>
        </form>
    </div>
</body>
</html>
