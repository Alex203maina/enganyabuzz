@extends('layout.home')


@section('contact')
<style>
    body {
      background-color: #f4f4f4;
      font-family: Arial, sans-serif;
    }
    .contact-form {
      background: #fff;
      padding: 40px;
      margin: 50px auto;
      border-radius: 10px;
      box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
      max-width: 600px;
    }
    .contact-form h2 {
      margin-bottom: 20px;
      font-size: 2.5em;
      color: #333;
      text-align: center;
      font-weight: 700;
    }
    .form-group input,
    .form-group textarea {
      border: 1px solid #ddd;
      border-radius: 5px;
      padding: 15px;
      width: 100%;
      font-size: 1em;
      transition: border-color 0.3s ease;
      background-color: #f9f9f9;
    }
    .form-group input:focus,
    .form-group textarea:focus {
      border-color: #007bff;
      box-shadow: none;
      background-color: #fff;
    }
    .form-group label {
      font-size: 1.1em;
      color: #333;
      font-weight: bold;
    }
    .form-control::placeholder {
      color: #999;
      opacity: 1;
    }
    .btn-custom {
      background-color: #007bff;
      color: #fff;
      padding: 15px 30px;
      border-radius: 50px;
      font-size: 1.2em;
      font-weight: 600;
      transition: background-color 0.3s ease;
      border: none;
    }
    .btn-custom:hover {
      background-color: #0056b3;
    }
    .form-group span {
      color: red;
      font-size: 0.9em;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="contact-form">
    <h2>Contact Us</h2>
    <form action="#" method="POST">
      <div class="form-group">
        <label for="name">Name <span>*</span></label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required>
      </div>
      <div class="form-group">
        <label for="email">Email <span>*</span></label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required>
      </div>
      <div class="form-group">
        <label for="subject">Subject <span>*</span></label>
        <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
      </div>
      <div class="form-group">
        <label for="message">Message <span>*</span></label>
        <textarea class="form-control" id="message" name="message" rows="5" placeholder="Your Message" required></textarea>
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-custom">Send Message</button>
      </div>
    </form>
  </div>
</div>

@endsection
