<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Reservation Confirmation</title>
    <style type="text/css">
        body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
        table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
        img { -ms-interpolation-mode: bicubic; }

        img { border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; }
        table { border-collapse: collapse !important; }
        body { height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important; }

        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }
    </style>
</head>
<body style="margin: 0; padding: 0;">
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td bgcolor="#f6f6f6" align="center" style="padding: 15px;">
                <table border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse; background-color: #ffffff; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                    <!-- Header -->
                    <tr>
                        <td bgcolor="#dc3545" style="padding: 20px; color: #ffffff; text-align: center;">
                            <h1 style="margin: 0; font-size: 24px;">Reservation Confirmation</h1>
                            <p style="margin: 5px 0 0;">Booking #{{ $reservation->getPrimaryKey() }}</p>
                        </td>
                    </tr>
                    
                    <!-- Reservation Details -->
                    <tr>
                        <td style="padding: 20px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td width="50%" style="padding-bottom: 10px;">
                                        <strong>Guest Name:</strong> {{ $tourist->name }}
                                    </td>
                                    <td width="50%" style="padding-bottom: 10px; text-align: right;">
                                        <strong>Property:</strong> {{ $property->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <td width="50%" style="padding-bottom: 10px;">
                                        <strong>Check-in Date:</strong> {{ $fromDate }}
                                    </td>
                                    <td width="50%" style="padding-bottom: 10px; text-align: right;">
                                        <strong>Check-out Date:</strong> {{ $toDate }}
                                    </td>
                                </tr>
                                <tr>
                                    <td width="50%" style="padding-bottom: 10px;">
                                        <strong>Number of Nights:</strong> {{ $nights }}
                                    </td>
                                    <td width="50%" style="padding-bottom: 10px; text-align: right;">
                                        <strong>Total Price:</strong> <span style="color: #dc3545; font-weight: bold;">${{ number_format($reservation->getTotalPrice(), 2) }}</span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    
                    <!-- Footer -->
                    <tr>
                        <td bgcolor="#f6f6f6" style="padding: 20px; text-align: center; font-size: 12px;">
                            <p style="margin: 0;">Thank you for your reservation! If you have any questions, please contact our support team.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>