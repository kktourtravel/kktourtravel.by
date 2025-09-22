<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $firstName = htmlspecialchars($_POST['firstName']);
    $lastName = htmlspecialchars($_POST['lastName']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $service = htmlspecialchars($_POST['service']);
    $destination = htmlspecialchars($_POST['destination']);
    $travelDates = htmlspecialchars($_POST['travelDates']);
    $message = htmlspecialchars($_POST['message']);
    
    // Email details
    $to = "info@kktourtravel.by";
    $subject = "New Travel Inquiry from KK Tour & Travel Website";
    
    // Email content
    $email_content = "New Contact Form Submission:\n\n";
    $email_content .= "Name: $firstName $lastName\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Phone: $phone\n";
    $email_content .= "Service: $service\n";
    $email_content .= "Destination: $destination\n";
    $email_content .= "Travel Dates: $travelDates\n";
    $email_content .= "Message:\n$message\n";
    
    // Headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    
    // Send email
    if (mail($to, $subject, $email_content, $headers)) {
        // Success - redirect to thank you page
        header("Location: thank-you.html");
        exit;
    } else {
        // Error
        header("Location: error.html");
        exit;
    }
}
?>