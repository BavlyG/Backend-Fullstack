<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking </title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
        }

        p {
            color: #666;
        }

        .booking-details {
            margin-top: 20px;
        }

        .detail-item {
            margin-bottom: 10px;
        }

        .detail-label {
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="email-container">
    <h1>Booking</h1>
    <p>Dear {{$user->name}}</p>
    <p>Your booking details are as follows:</p>

    <div class="booking-details">
        <div class="detail-item">
            <span class="detail-label">Check-in Date:</span> {{$order->created_at->format('Y-m-d h:i a')}}
        </div>
        <div class="detail-item">
            <span class="detail-label">Space :</span> {{$rest->space}}
        </div>
        <div class="detail-item">
            <span class="detail-label">Description:</span> {{$rest->description}}}
        </div>
        <div class="detail-item">
            <span class="detail-label">Price:</span> {{number_format($order->price)}} $
        </div>
    </div>

    <p>Thank you for choosing our service. We look forward to hosting you!</p>

    <p>Best regards,<br>Booking Team</p>
</div>
</body>
</html>
