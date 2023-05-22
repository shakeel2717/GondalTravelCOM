@extends('main.app')

@section('content')
    <style>
      /* Add your CSS styles here */
      body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
      }
      .container {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 5px;
      }
      h1 {
        font-size: 28px;
        color: #333;
        margin-top: 0;
      }
    </style>


    <div class="container">
      <h1>Booking Confirmation</h1>
      <p>Thank you for making a reservation! We have received your booking request and we will be in touch with you shortly to confirm your reservation.</p>
      <p>In the meantime, please feel free to explore our website to learn more about our services and amenities. We look forward to hosting you soon!</p>
      <p>Sincerely,<br>GondalTravel.com</p>
    </div>
    @endsection