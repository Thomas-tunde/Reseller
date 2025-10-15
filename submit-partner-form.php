<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $company = htmlspecialchars($_POST['company']);
    $client_base = htmlspecialchars($_POST['client-base']);
    $strategy = htmlspecialchars($_POST['strategy']);

    // Email to sales department
    $to = "info@plutocloudcomputing.ng";
    $subject = "New Reseller Proposal from $company";
    $body = "Name: $name\nEmail: $email\nPhone: $phone\nCompany: $company\nClient Base: $client_base\nStrategy: $strategy";
    $headers = "From: no-reply@plutocloudcomputing.ng\r\n";

    // Send email to sales department
    mail($to, $subject, $body, $headers);

    // Auto-confirmation email to reseller
    $reseller_subject = "Thank You for Your Pluto Cloud Reseller Proposal";
    $reseller_body = "Dear $name,\n\nThank you for submitting your proposal to join the Pluto Cloud Reseller Partnership Program. We’ve received your application and will review it within 48 hours. You’ll hear from our team soon!\n\nBest,\nPluto Cloud Computing NG";
    $reseller_headers = "From: info@plutocloudcomputing.ng\r\n";

    // Send confirmation email
    mail($email, $reseller_subject, $reseller_body, $reseller_headers);
}
?>