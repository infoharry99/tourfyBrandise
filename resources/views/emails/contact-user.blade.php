<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Contact Confirmation</title>
</head>
<body>
    <h2>Hello {{ $data['name'] }},</h2>

    <p>Thank you for contacting us. We have received your message.</p>

    <p><strong>Subject:</strong> {{ $data['subject'] }}</p>
    <p><strong>Your Message:</strong></p>
    <p>{{ $data['message'] }}</p>

    <br>

    <p>Our team will get back to you shortly.</p>

    <p>
        Regards,<br>
        <strong>Tourfy Brandise Team</strong>
    </p>
</body>
</html>
