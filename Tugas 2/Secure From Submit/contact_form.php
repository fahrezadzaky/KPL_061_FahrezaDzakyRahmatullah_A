<!DOCTYPE html>
<html>
<head>
    <title>Formulir Kontak</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
    <h2>Formulir Kontak</h2>
    <form action="process_form.php" method="post">
        <label for="name">Nama:</label>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="message">Pesan:</label>
        <textarea id="message" name="message" rows="4" required></textarea><br><br>

        <div class="g-recaptcha" data-sitekey="6LfaG44oAAAAADNND2LGZudhpOqmephEvyiigQfW"></div><br><br>

        <input type="submit" value="Kirim">
    </form>
</body>
</html>
