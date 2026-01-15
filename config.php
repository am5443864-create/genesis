<?php
// WhatsApp Cloud API configuration
// Fill these values to enable sending without opening WhatsApp Web
return [
    // Permanent or long-lived token from Meta (App > WhatsApp > API Setup)
    'WHATSAPP_TOKEN' => '',

    // Phone Number ID (not the phone number itself)
    'WHATSAPP_PHONE_ID' => '',

    // Recipient number for receiving the form (E.164 without symbols)
    // Example for Mexico: 521234567890 or 522462226280 (country code 52)
    'WHATSAPP_RECIPIENT' => '2462226280',

    // Country code to prepend if recipient has no country code
    'WHATSAPP_COUNTRY_CODE' => '52',
];
