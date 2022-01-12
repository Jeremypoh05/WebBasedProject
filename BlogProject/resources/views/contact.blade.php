@extends('frontlayout')
@section('title','Contact')
@section('content')

<div class="popup" id="popup-1">
        <div class="overlay"></div>
        <div class="pop-content">
            <div class="close-btn" onclick="togglePopup()">&times;</div>
            <p>Thank you for your information. We will look forward!</p>
        </div>
    </div>

             <section class="contact">
                <div class="contact-content">
                    <h2>Contact Us</h2>
                    <p>If you encounter any problems or have any intresting news/information,
                        while browsing our website, please don't hesitate to contact us and sent to us!</p>
                </div>
                <div class="contact-container">
                    <div class="contactInfo">
                        <div class="box">
                            <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                                <div class="text">
                                    <h3>Address</h3>
                                    <span>PTD 64888,<br> Jalan Selatan Utama km 15, <br>Taman Perusahaan Ringan Pulai,<br>
                                    81300 Skudai,<br> Johor.</span>
                                </div>
                            </div>
                        <div class="box">
                            <div class="icon"><i class="fas fa-phone"></i></div>
                            <div class="text">
                                <h3>Phone</h3>
                                <span>011-16305241</span>
                            </div>
                        </div>
                        <div class="box">
                            <div class="icon"><i class="far fa-envelope"></i></div>
                            <div class="text">
                                <h3>Email</h3>
                                <span>Jeremypoh0205@gmail.com</span>
                            </div>
                        </div>
                    </div>
             
                   <form class="contactForm">
                    <h2>Send Message</h2>
                    <div class="inputbox">
                           <input type="text" name="" required="required">
                           <span>Full Name</span>
                       </div>
                    <div class="inputbox">
                        <input type="text" name="" required="required">
                        <span>Email</span>
                    </div>
                    <div class="inputbox">
                        <textarea required="required"></textarea>
                        <span>Type your Message...</span>
                    </div>
                    <div class="inputbox">
                        <input type="submit" onclick="togglePopup()" name="" value="Send">
                    </div>
                   </form>
               </div> 
            </section>

    
           