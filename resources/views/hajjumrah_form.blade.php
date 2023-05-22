@extends('main.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

/* Resetting */
* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body {
    background-color: #dcf4ff;
}

.wrapper {
    max-width: 800px;
    margin: 50px auto;
}

.wrapper form {
    padding: 30px 50px;
}

.wrapper form .form-group {
    padding-bottom: .5rem;
}

.wrapper form .option {
    position: relative;
    padding-left: 25px;
    cursor: pointer;
    display: block;
}

.wrapper form .option input {
    display: none;
}

.wrapper form .checkmark {
    position: absolute;
    top: 4px;
    left: 0;
    height: 17px;
    width: 17px;
    background-color: #fff;
    border: 1px solid #aaa;
    border-radius: 50%;
}

.wrapper form .option input:checked~.checkmark:after {
    display: block;
}

.wrapper form .option .checkmark:after {
    content: "";
    width: 7px;
    height: 7px;
    display: block;
    border-radius: 50%;
    background-color: #333;
    position: absolute;
    top: 48%;
    left: 52%;
    transform: translate(-50%, -50%) scale(0);
    transition: 200ms ease-in-out 0s;
}

.wrapper form .option:hover input[type="radio"]~.checkmark {
    background-color: #f4f4f4;
}

.wrapper form .option input[type="radio"]:checked~.checkmark {
    background: #fff;
    color: #fff;
    transition: 300ms ease-in-out 0s;
}

.wrapper form .option input[type="radio"]:checked~.checkmark:after {
    transform: translate(-50%, -50%) scale(1);
    color: #fff;
}

.wrapper form a {
    color: #333;
}

.wrapper form .form-control {
    outline: none;
    border: none;
}

.wrapper form .form-control:focus {
    box-shadow: none;
}

.wrapper form input[type="text"]:focus::placeholder {
    color: transparent
}

input[type="date"] {
    cursor: pointer;
}

.wrapper form .label::after {
    position: absolute;
    /* background-color: #fff; */
    top: 5px;
    left: 0px;
    font-size: 0.9rem;
    margin: 0rem 0.4rem;
    text-transform: uppercase;
    letter-spacing: 0.08rem;
    font-weight: 600;
    color: #999;
    transition: all .2s ease-in-out;
    transform: scale(0);
}

.wrapper form .label#from::after {
    content: 'From';
}

.wrapper form .label#to::after {
    content: 'To';
}

.wrapper form .label#depart::after {
    content: 'Depart Date';
}

.wrapper form .label#return::after {
    content: 'Return Date';
}

.wrapper form .label#psngr::after {
    content: 'Traveller(s)';
}

.wrapper form input[type="text"]:focus~.label::after {
    top: -15px;
    left: 0px;
    transform: scale(1);
}

.wrapper form input[type="date"]:focus~.label::after {
    top: -15px;
    left: 0px;
    transform: scale(1);
}

/* Margin */
.margin {
    margin: 2rem 0rem;
}

/* Media Queries */
@media(max-width: 575.5px) {
    .wrapper {
        margin: 10px;
    }

    .wrapper form {
        padding: 20px;
    }

    .margin {
        margin: .2rem 0rem;
    }
}
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
		$(document).ready(function() {
  // Clone section
  $(document).on('click', '.clone-section', function(e) {
    e.preventDefault();
    var $section = $(this).closest('[id^="section-"]');
    var $clone = $section.clone();
    $clone.find(':input').val('');
    $section.after($clone);
  });

  // Remove section
  $(document).on('click', '.remove-section', function(e) {
    e.preventDefault();
    var $section = $(this).closest('[id^="section-"]');
    $section.remove();
  });
});
	</script>
	 
<div class="wrapper bg-white">
    </br>
  <h1 style="font-family: Arial, sans-serif; font-size: 36px; font-weight: bold; color: #2c3e50; text-align: center; margin-top: 50px;">Reservation Form</h1>
</br>
<form action="{{ route('reservation_store') }}" method = "POST">
    @csrf
    <div id="section-1">
        <div class="row">
        <div class = "col-4">
        <div class="form-group border-bottom">
            <label for="name">Name</label>
            <input type="text" id="name" class="form-control"name="name" required>
        </div>
        </div>
        <div class = "col-4">
        <div class="form-group border-bottom">
            <label for="first-name">First Name</label>
            <input type="text" id="first-name" class="form-control"name="first_name[]" required>
        </div>
        </div>
        <div class = "col-4">
        <div class="form-group border-bottom">
            <label for="company-name">Company Name</label>
            <input type="text" id="company-name" class="form-control"name="company_name[]" required>
        </div>
        </div>
        <div class = "col-4">
        <div class="form-group border-bottom">
            <label for="email">Email Address</label>
            <input type="email" id="email" class="form-control"name="email[]" required>
        </div>
        </div>
        <div class = "col-4">
        <div class="form-group border-bottom">
            <label for="postal-address">Postal Address</label>
            <input type="text" id="postal-address" class="form-control"name="postal_address[]" required>
        </div>
        </div>
        <div class = "col-4">
        <div class="form-group border-bottom">
            <label for="telephone-number">Telephone Number</label>
            <input type="tel" id="telephone-number" class="form-control"name="telephone_number[]" required>
        </div>
        </div>
        
        <div class="col-4">
         <div class="form-group border-bottom">
            <label for="nationality">Nationality</label>
            <input type="text" class="form-control"id="nationality" name="nationality[]" required>
        </div>
        </div>
       <div class="col-4">
        <div class="form-group border-bottom">
            <label for="passport">Passport</label>
            <input type="text" class="form-control"id="passport" name="passport[]" required>
        </div>
        </div>
        <div class="col-4">
        <div class="form-group border-bottom">
            <label for="date-of-birth">Date of Birth</label>
            <input type="date"class="form-control" id="date-of-birth" name="dob[]" required>
        </div>
        </div>
        <div class="col-4">
        <div class="form-group border-bottom">
            <label for="age">Age</label>
            <input type="number" class="form-control"id="age" name="age[]" required>
        </div>
        </div>
        
        
        <div class = "col-4">
        <div class="form-group border-bottom">
            <label for="chamber">Chamber</label>
            <select id="chamber" name="chamber[]"class="form-control" required>
                <option value="">Select a Chamber</option>
                <option value="single,{{$flight->hajjumrah->chamber_room_price_1}}">Single : {{$flight->hajjumrah->chamber_room_price_1}}€</option>
                <option value="double,{{$flight->hajjumrah->chamber_room_price_2}}">Double : {{$flight->hajjumrah->chamber_room_price_2}}€</option>
                <option value="triple,{{$flight->hajjumrah->chamber_room_price_3}}">Triple : {{$flight->hajjumrah->chamber_room_price_3}}€</option>
                <option value="quadruple,{{$flight->hajjumrah->chamber_room_price_4}}">Quadruple : {{$flight->hajjumrah->chamber_room_price_4}}€</option>

            </select>
        </div>
        </div>
        </div>
        
        <div class="form-group my-3">
  <a href="#" id="add-btn" class=" clone-section btn btn-primary buttonn float-left">Add</a>
  <a href="#" class=" remove-section btn btn-danger button float-right remove-btn">Remove</a>
  </br>
</div>
        
    <!--    <a href="#" class="clone-section">Clone Section</a>-->
    <!--<a href="#" class="remove-section">Remove Section</a>-->
        
        </div> 
       
        <!--<button id="add-btn">Add Section</button>-->
        <!--<div class="form-group my-3">-->
        <!--    <div class="btn btn-primary rounded-0 d-flex justify-content-center text-center p-3"> <button type = "submit">Book</button></div>-->
         <input type = "hidden" value="{{$flight->id}}" name="hajjumra_id"/>
       <input type="hidden" name="hajjumra_id" value="{{ $flight->id }}">
       <br>
<div class="form-group my-3">
    <label for="foreigner_checkbox">Are you a foreigner? (130€ extra charges for foreigner)</label>
    <input type="checkbox" id="foreigner_checkbox" name="foreigner" value="130"checked>
</div>
         <div class="form-group my-3">
<button type="submit" class="btn btn-primary btn-block">Book</button>
  
</div>   
    </div>
    
    
     
    </form>
</div>

@endsection
