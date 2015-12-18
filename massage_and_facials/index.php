<?php
  $sent = false;
  $hasError = false;

  if(isset($_POST['submitform'])) {
    $email = trim($_POST['email']);
    $subject = trim(htmlspecialchars($_POST['subject'], ENT_QUOTES));
    $message = trim(htmlspecialchars($_POST['message'], ENT_QUOTES));

    $fieldsArray = array(
      'email' => $email,
      'subject' => $subject,
      'message' => $message
    );

    $errorArray = array();

    foreach($fieldsArray as $key => $val) {
      switch ($key) {
        case 'subject':
        case 'message':
          if(empty($val)) {
            $hasError = true;
            $errorArray[$key] = ucfirst($key) . " field was left empty.";
          }
          break;
        case 'email':
          if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $hasError = true;
            $errorArray[$key] = "Invalid Email Address entered";
          }else{
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
          }
          break;
      }
    }
    if($hasError !== true) {
      $to = "colleen@oasismindbodyskin.com";
      $msgcontents = "$message";
      $headers = "MIME-Version: 1.0 \r\n";
      $headers .= "Content-type: text/html; charset=iso-8859-1 \r\n";
      $headers .= "From: $email \r\n";
      $mailsent = mail($to, $subject, $msgcontents, $headers);
      if($mailsent) {
        $sent = true;
        unset($subject);
        unset($email);
        unset($message);
      }
    }
  }
?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Oasis Mind Body and Skin</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/application.css" />
    <link href='https://fonts.googleapis.com/css?family=Cinzel|Tangerine:700|Neuton|Cinzel+Decorative' rel='stylesheet' type='text/css'>
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script src="js/vendor/modernizr.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js"></script>
    <script src="js/scroller.js"></script>
    <script>
      $(document).ready(function(){
        $('#contactform').validate({
          rules: {
            email: {
              required: true,
              email: true
            },
            subject: {
              required: true,
              minlength: 2
            },
            message: {
              required: true,
              minlength: 10
            }
          },
          messages: {
            email: {
              required: "Please enter your email",
              email: "Must be valid email address"
            },
            subject: {
              required: "Please enter a subject",
              minlength: "Subject is too short"
            },
            message: {
              required: "Please enter a message",
              minlength: "Message too short"
            }
          }
        });
      });
    </script>
  </head>
  <body>
    <div class="fixed">
      <nav class="top-bar" data-topbar role="navigation">
        <ul class="title-area">
          <li class="name"><h1 id="title"><a href="#home" id="home-color" class="scroll brown-text-shadow">Oasis <span class="brown-text-shadow" style="font-size: 1.5rem;"><i>Mind Body Skin</i></span></a></h1></li>
          <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
        </ul>

        <section class="top-bar-section">
          <ul class="right">
            <li class="has-dropdown">
              <a href="#" class="tab-text light-purple">SERVICES</a>
              <ul class="dropdown">
                <li><a href="#massage" class="tab-text scroll">Massages</a></li>
                <li><a href="#facial" class="tab-text scroll">Facials</a></li>
                <li><a href="#spa-party" class="tab-text scroll">Spa Party</a></li>
              </ul>
            </li>
            <li><a href="#checkout" class="light-purple scroll">CHECKOUT</a></li>
            <li><a href="#schedule" class="light-purple scroll">SCHEDULE</a></li>
            <li class="has-dropdown">
              <a href="#" class="light-purple">ABOUT</a>
              <ul class="dropdown">
                <li><a href="#practitioner" class="tab-text scroll">Practitioner</a></li>
                <li><a href="#benefits" class="tab-text scroll">Benefits of Massage</a></li>
                <li><a href="#questions" class="tab-text scroll">Frequently Asked Questions</a></li>
              </ul>
            </li>
            <li><a href="#contact" class="light-purple scroll">CONTACT</a></li>
          </ul>
        </section>
      </nav>
    </div>

    <!-- Main image display -->
    <div class="row no-margin" id="home">
      <div class="large-12 columns no-padding" id="main-img-div">
        <div id="title-div">
          <h1 class="center-text title-text">Oasis</h1>
          <h2 class="center-text title-text">Mind, Body and</h2>
          <h1 class="center-text title-text">Skin</h1>
        </div>
      </div>
    </div>

    <div class="row no-margin">
      <div class="large-12 columns">
        <h3 class="center-text brown"><i>Phone Number: 631-287-3527</i>&nbsp; &nbsp; &nbsp;<i>Location: Naples, FL and The Hamptons, NY</i></h3>
      </div>
    </div>

    <!-- massage section -->
    <div class="row section-margins" style="margin-top: 20px;" id="massage">
      <div class="large-9 medium-9 columns">
        <h1 class="teal-color section-title-font">Massage</h1>
        <p>
          All massages are tailored and designed to meet the needs of each individual.<br><br>
          Different modalities can be mixed in each session:<br>
        </p>
        <div class="row">
          <div class="large-4 medium-4 columns">
            <ul>
              <li>Swedish</li>
              <li>Deep Tissue</li>
              <li>Therapeutic</li>
              <li>Aromatherapy</li>
              <li>Medical massage</li>
            </ul>
          </div>
          <div class="large-4 medium-4 columns">
            <ul>
              <li>Foot Reflexology</li>
              <li>Myo Facial Release</li>
              <li>Sports massage</li>
              <li>Neuro Muscular</li>
            </ul>
          </div>
          <div class="large-4 medium-4 columns">
            <ul>
              <li>Stretching</li>
              <li>Joint Manipulation</li>
              <li>Energy Work</li>
              <li>Chakra Balancing</li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="large-6 medium-6 columns">
            <h5><span data-tooltip aria-haspopup="true" class="has-tip" title="60 minutes: $90.00 <br> 80 minutes: $125.00"><strong class="purple-text-shadow">In-house Rates</strong></span></h5>
            <h5><span data-tooltip aria-haspopup="true" class="has-tip" title="60 minutes: $120.00 <br> 80 minutes: $170.00"><strong class="purple-text-shadow">House Call Rates</strong></span></h5>
          </div>
          <div class="large-6 medium-6 columns">
            <a href="#" data-reveal-id="policyModal" class="medium radius secondary button border-button">Cancelation Policy</a>
            <div id="policyModal" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
              <h2>Cancellation Policy</h2>
              <p>We understand that unanticipated events happen occasionally in everyone’s life. In our desire to be effective and fair to all clients, the following policies are honored: </p>
              <p><strong>24 hour advance notice is required</strong> when cancelling an appointment. This allows the opportunity for someone else to schedule an appointment. If you are unable to give us 24 hours advance notice you will be charged the <strong>full amount</strong> of your appointment. This amount must be paid prior to your next scheduled appointment.</p>
              <h3>No-Shows</h3>
              <p>Anyone who either forgets or consciously chooses to forgo their appointment for whatever reason will be considered a “no-show.” They will be charged for their “missed” appointment.</p>
              <h3>Late Arrivals</h3>
              <p>Please arrive 15 minutes prior to your scheduled appointment time. If you arrive late, we cannot guarantee the full length of your service.</p>
              <p>If you arrive late, your session may be shortened in order to accommodate others whose appointments follow yours. Depending upon how late you arrive, your therapist will then determine if there is enough time remaining to start a treatment. Regardless of the length of the treatment actually given, <strong>you will be responsible for the “full” session.</strong> Out of respect and consideration to your therapist and other customers, please plan accordingly and be on time.</p>
              <p><i>We look forward to serving you!</i></p>
              <a class="close-reveal-modal" aria-label="Close">&#215;</a>
            </div>
          </div>
        </div>
      </div> <!-- column-9 -->
      <div class="large-3 medium-3 columns panel callout radius margin-top">
        <h3 class="center-text">This Seasons Special</h3>
        <p class="center-text" id="special-p">
          Yours <strong>Free</strong> with any massage treatment.
          A variety of Aromatherapy  Essential Oils blended to enhance your body treatment.
        </p>
      </div>
    </div>
    <hr />

    <!-- facials section -->
    <div class="row" id="facial">
      <div class="large-8 medium-8 medium-push-4 columns">
        <h1 class="teal-color section-title-font center-text">Facials</h1>
        <ul class="accordion" data-accordion>
          <li class="accordion-navigation">
            <a href="#panel1a" class="first-list-item facial-list">Infuse Antioxidant Glow Facial</a>
            <div id="panel1a" class="content">
              <div class="row" data-equalizer>
                <div class="large-9 medium-9 columns panel light-purple" data-equalizer-watch>
                  <p>An infusion of vitamin E with Omega-3 fatty acids for regeneration, hydration and removal of toxins from the epidermis. This highly nourishing treatment includes face, décolleté, neck and shoulder massage, cleansing, liquid enzyme peel, antioxidant serum with grape seed mask and eye revitalize cream for glowing skin.</p>
                </div>
                <div class="large-3 medium-3 columns panel light-purple" data-equalizer-watch>
                  <h4 class="center-text">Price:</h4>
                  <p class="center-text">$125 or Package of 4 for $420</p>
                </div>
              </div>
            </div>
          </li>
          <li class="accordion-navigation">
            <a href="#panel2a" class="facial-list">Signature Anti-Aging Facial</a>
            <div id="panel2a" class="content">
              <div class="row" data-equalizer>
                <div class="large-9 medium-9 columns panel light-purple" data-equalizer-watch>
                  <p>Improve skin's elasticity and collagen production, decrease fine lines and prevent appearance of new ones. Includes face, décolleté, neck and shoulder massage, cleanse, lactic acid peel, amino peptide serum with mask, eye lifting cream for toning and lifting.
                  </p>
                </div>
                <div class="large-3 medium-3 columns panel light-purple" data-equalizer-watch>
                  <h4 class="center-text">Price:</h4>
                  <p class="center-text">$140 or Package of 4 for $500</p>
                </div>
              </div>
            </div>
          </li>
          <li class="accordion-navigation">
            <a href="#panel3a" class="facial-list">Corrective Facial for Mature Skin</a>
            <div id="panel3a" class="content">
              <div class="row" data-equalizer>
                <div class="large-9 medium-9 columns panel light-purple" data-equalizer-watch>
                  <p>Refresh and Renew the skin using a double infusion of emulsion and skin brightening enzyme to increase oxygen and blood flow to depleted dry skin, reducing pigmentation and brightening skin. Includes face, décolleté, neck and shoulder massage, cleansing, emulsion and enzyme, vit-C serum with honey mask, finishing with brightening cream and sun protection. Good for mature skin, hyper pigmentation and acne/oily skin types.</p>
                </div>
                <div class="large-3 medium-3 columns panel light-purple" data-equalizer-watch>
                  <h4 class="center-text">Price:</h4>
                  <p class="center-text">$110 or Package of 4 for $380</p>
                </div>
              </div>
            </div>
          </li>
          <li class="accordion-navigation">
            <a href="#panel4a" class="facial-list">Rehydration Facial</a>
            <div id="panel4a" class="content">
              <div class="row" data-equalizer>
                <div class="large-9 medium-9 columns panel light-purple" data-equalizer-watch>
                  <p>An ultimate remedy for thirsty, moisture-starved skin. This intensive treatment will leave you dewy and renewed, and includes a gentle milk cleanse, enzyme mask ,hydrating grape seed serum, milk mask, facial massage and sun protection. Your skin will never have felt so good.</p>
                </div>
                <div class="large-3 medium-3 columns panel light-purple" data-equalizer-watch>
                  <h4 class="center-text">Price:</h4>
                  <p class="center-text">$100 or Package of 4 for $360</p>
                </div>
              </div>
            </div>
          </li>
          <li class="accordion-navigation">
            <a href="#panel5a" class="facial-list">Retexture (Exfoliation)</a>
            <div id="panel5a" class="content">
              <div class="row" data-equalizer>
                <div class="large-9 medium-9 columns panel light-purple" data-equalizer-watch>
                  <p>A thorough facial that is designed to smooth and brighten. It includes cleanse,derma peel exfoliation, steam, extractions, cherry jubilee masque treatment, hydration and sun protection. Leaves you with baby soft skin!</p>
                </div>
                <div class="large-3 medium-3 columns panel light-purple" data-equalizer-watch>
                  <h4 class="center-text">Price:</h4>
                  <p class="center-text">$110 or Package of 4 for $400</p>
                </div>
              </div>
            </div>
          </li>
          <li class="accordion-navigation">
            <a href="#panel6a" class="facial-list">Facial/Massage Headache and Sinus Relief</a>
            <div id="panel6a" class="content">
              <div class="row" data-equalizer>
                <div class="large-9 medium-9 columns panel light-purple" data-equalizer-watch>
                  <p>This refreshing facial detoxifies congested skin and relieves sinus pressure using aromatherapy infused warm compresses, acupressure and lymphatic drainage massage. Gentle cleanse, followed by a soothing steam. Marine algae mask detoxifies the skin while vitamin C serum boosts the immune system and reduces inflammation. Massage targets neck, face and head to relieve pressure and pain. Good for sinus pressure, allergies, tmj jaw pain, headache and neck tension.</p>
                </div>
                <div class="large-3 medium-3 columns panel light-purple" data-equalizer-watch>
                  <h4 class="center-text">Price:</h4>
                  <p class="center-text">$110</p>
                  <p class="center-text">50 minute therapy</p>
                </div>
              </div>
            </div>
          </li>
          <li class="accordion-navigation">
            <a href="#panel7a" class="last-list-item facial-list">Polish and Glow Back Facial</a>
            <div id="panel7a" class="content">
              <div class="row" data-equalizer>
                <div class="large-9 medium-9 columns panel light-purple" data-equalizer-watch>
                  <p>This hard to reach area will get the treatment it deserves. The back is deeply cleansed and exfoliated with lemon citrus body scrub increasing circulation for healthy skin. Warm compresses are applied and extractions are performed if necessary. Antioxidant serums are infused along with a conditioning mask for a hydrating back facial. Finishing this treatment is a relaxing back massage for a refreshing experience.</p>
                </div>
                <div class="large-3 medium-3 columns panel light-purple" data-equalizer-watch>
                  <h4 class="center-text">Price:</h4>
                  <p class="center-text">$85</p>
                  <p class="center-text">50 minute therapy</p>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
      <div class="large-4 medium-4 medium-pull-8 columns">
        <img src="img/facial_mask.jpg" alt="facial mask" class="section-img sm-margin-top">
        <div class="panel callout radius margin-top">
          <h4 class="center-text">Add-on Enhancements:</h4>
          <ul>
            <li>Enzyme--$25</li>
            <li>Peel--$40</li>
            <li>Microcurrent Lifting--$40</li>
            <li>Foot & Hand Reflexology--$45</li>
            <li>Eye Treatment--$30</li>
            <li>Back Scrub--$25</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row section-margins margin-top">
      <div class="large-8 medium-8 columns" id="luxury-packages">
        <h3 class="teal-color cinzel-font">Luxury Packages</h3>
        <ul class="accordion" data-accordion>
          <li class="accordion-navigation">
            <a href="#panel1b" class="first-list-item facial-list">A Touch of Nirvana</a>
            <div id="panel1b" class="content">
              <div class="row" data-equalizer>
                <div class="large-9 medium-9 columns panel light-purple" data-equalizer-watch>
                  <p><i>Foot Reflexology Treatment with detoxifying essential oils, Signature Restorative Facial and Relaxing upper body head/neck/shoulder Massage.</i></p>
                  <p>This heavenly treatment begins with warm packs placed on the belly and under the neck encouraging the body to let go and relax. Mixtures of warm castor oil with detoxifying essential oils of lemon, rosemary and peppermint are massaged into the feet to open and stimulate the reflex points to prepare for the <strong>foot reflexology</strong> treatment.</p>
                  <p>The signature <strong>facial</strong> is implemented while the essential oils are soaking into the feet. After cleansing the face an enzyme exfoliate is used to remove dead skin then allowing fresh new skin to soak up the nourishing, hydrating serums that are applied. After the conditioning mask is applied the foot reflexology begins.</p>
                  <p>Head/neck/shoulder <strong>massage</strong> is incorporated into this treatment to encourage lymph drainage and relax muscles soothing away tension. Finishing with warm compresses to the feet makes this therapy a <i>Touch of Nirvana</i>.</p>
                </div>
                <div class="large-3 medium-3 columns panel light-purple" data-equalizer-watch>
                  <h4 class="center-text">Price:</h4>
                  <p class="center-text">$190</p>
                  <p class="center-text">80 minute therapy</p>
                </div>
              </div>
            </div>
          </li>
          <li class="accordion-navigation">
            <a href="#panel2b" class="last-list-item facial-list">The Total Indulgence Therapy: Relax.. Replenish.. Refresh</a>
            <div id="panel2b" class="content">
              <div class="row" data-equalizer>
                <div class="large-9 medium-9 columns panel light-purple" data-equalizer-watch>
                  <p>This <strong>80 minute</strong> therapy was created to give you the most luxurious treatment and tranquil experience that benefits your total well being. <strong>Full body</strong> total relaxing <strong>massage</strong> softens tense areas in the body while the <strong>signature facial</strong>, designed to suit each individual, employs hydrating fluids with conditioning mask. Exfoliating <strong>back scrub</strong> using creamy-textured natural ingredients detoxifies and regenerates skin. <strong>Warm compresses</strong> are used to remove product and nourishing Vit C cream is applied for hydration and nourishment to complete this Total Indulgence experience.</p>
                </div>
                <div class="large-3 medium-3 columns panel light-purple" data-equalizer-watch>
                  <h4 class="center-text">Price:</h4>
                  <p class="center-text">$190</p>
                  <p class="center-text">80 minute therapy</p>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
      <div class="large-4 medium-4 columns">
        <img src="img/massage_facial.jpg" alt="massage facial" class="section-img">
      </div>
    </div>
    <hr />

    <!-- spa party section -->
    <div class="row section-margins margin-left" id="spa-party">
      <div class="large-8 medium-8 columns">
        <h1 class="teal-color section-title-font">Spa Party</h1>
        <p>Luxurious spa treatments by experienced therapists for you and your friends to enjoy in the comfort of your home. Prepare to be pampered!</p>
        <p>Hosting a Spa Party is a wonderful way to celebrate special occasions or events. Spa Parties are excellent for: Wellness Gatherings, Girls’ Night Out, Birthdays, Bachelorette/Bridal Parties, Sweet 16, Batzmitvah’s, Introducing Young Ladies to Self-Care, or just for fun!</p>
        <p>You can make the party as simple or elaborate as you like. You can keep your party simple by choosing a few spa party service favorites to comprise a Fixed Menu. Everyone enjoys the same services at the same flat rate. A party planning consultation is required by phone or in person at least 3 weeks prior to reserve a party date and therapists. During this consult we will discuss: Fixed Menu/A La Carte Menu, services and fee structure, and setting up of the space.</p>
      </div>

      <div class="large-4 medium-4 columns margin-top">
        <img src="img/massage_party.jpg" alt="massage party" class="section-img">
      </div>
    </div>

    <div class="row">
      <div class="large-3 medium-3 columns">
        <p class="center-text no-margin" id="party-panel-left"><i>We require a minimum of 4 people to hold a spa party, with a maximum of 12 attendees.</i></p>
        <a href="#contact" class="medium radius secondary button no-margin border-button" style="width: 100%;">Contact for rates</a>
        <a href="#" data-reveal-id="spaPolicy" class="medium radius secondary button no-margin border-button" style="width: 100%;">Spa Party Cancelation Policy</a>
        <div id="spaPolicy" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
          <h3 id="modalTitle">Spa Party Cancelation Policy</h3>
          <p>Spa appointments have been especially reserved for you. If you need to cancel, please do so with a minimum of <strong>24 hours notice</strong>. For a <strong>bridal party</strong> we ask that you please do so with <strong>48 hours notice</strong>. Failure to do so will result in a <strong>50% charge</strong> of your service.</p>
          <a class="close-reveal-modal" aria-label="Close">&#215;</a>
        </div>
      </div>

      <div class="large-9 medium-9 columns panel sm-margin-top">
        <h4 class="center-text" id="spa-menu">Menu</h4>
          <ul class="center-text">
            <li>Massage and Mini Massage</li>
            <li>Pampering Foot Reflexology with Foot bath and oils</li>
            <li>Back Facials, Spa Facials , Body Scrubs, Detox Treatments</li>
            <li>Heart Centered Energy Work, Reiki</li>
            <li>Tarot Card Readings</li>
            <li><i>Mix and match for hour and hour and a half sessions each</i></li>
          </ul>
      </div>
    </div>
    <hr />

    <!-- Checkout section -->
    <div class="row" id="checkout">
        <div class="row">
          <div class="large-12 medium-12 columns">
            <h1 class="teal-color section-title-font">Checkout</h1>
          </div>
        </div>
      <div class="large-4 medium-4 columns">
        <form class="curved-radius" target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post" >
          <input type="hidden" name="cmd" value="_s-xclick">
          <table class="curved-radius background-purple">
          <tr><td><input type="hidden" name="on0" value="Massage">Massage</td></tr><tr><td class="curved-radius"><select name="os0" class="background-green curved-radius">
            <option value="1-hour In-house massge">1-hour In-house massge $90.00 USD</option>
            <option value="80-minute In-house massage">80-minute In-house massage $120.00 USD</option>
            <option value="1-hour house-call massage">1-hour house-call massage $120.00 USD</option>
            <option value="80-minute house-call massage">80-minute house-call massage $170.00 USD</option>
          </select> </td></tr>
          </table>
          <input type="hidden" name="currency_code" value="USD">
          <input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
          ">
          <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_cart_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
          <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
          </form>
      </div>
      <div class="large-4 medium-4 columns">
        <form class="curved-radius" target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post" >
          <input type="hidden" name="cmd" value="_s-xclick">
          <table class="curved-radius background-purple">
          <tr><td><input type="hidden" name="on0" value="Facials">Facials</td></tr><tr><td class="curved-radius"><select name="os0" class="background-green curved-radius">
            <option value="Infuse Anti-Oxidant Glow Facial">Infuse Anti-Oxidant Glow Facial $125.00 USD</option>
            <option value="Signature Anti-Aging Facial">Signature Anti-Aging Facial $140.00 USD</option>
            <option value="Corrective Facial for Mature Skin">Corrective Facial for Mature Skin $110.00 USD</option>
            <option value="Rehydration Facial">Rehydration Facial $100.00 USD</option>
            <option value="Retexture(exfoliation) Facial">Retexture(exfoliation) Facial $110.00 USD</option>
            <option value="Facial/Massage Headache and Sinus Relief">Facial/Massage Headache and Sinus Relief $110.00 USD</option>
            <option value="Polish and Glow Back Facial">Polish and Glow Back Facial $85.00 USD</option>
          </select> </td></tr>
          </table>
          <input type="hidden" name="currency_code" value="USD">
          <input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
          ">
          <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_cart_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
          <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
          </form>
      </div>
      <div class="large-4 medium-4 columns">
        <form class="curved-radius" target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post" >
          <input type="hidden" name="cmd" value="_s-xclick">
          <table class="curved-radius background-purple">
          <tr><td><input type="hidden" name="on0" value="Luxury Packages">Luxury Packages</td></tr><tr><td class="curved-radius"><select name="os0" class="background-green curved-radius">
            <option value="A Touch of Nirvana">A Touch of Nirvana $190.00 USD</option>
            <option value="The Total Indulgence Therapy">The Total Indulgence Therapy $190.00 USD</option>
            <option value="Infuse Anti-Oxidant Glow Facial 4-package">Infuse Anti-Oxidant Glow Facial 4-package $420.00 USD</option>
            <option value="Signature Anti-Aging Facial 4-package">Signature Anti-Aging Facial 4-package $500.00 USD</option>
            <option value="Corrective Facial for Mature Skin 4-package">Corrective Facial for Mature Skin 4-package $380.00 USD</option>
            <option value="Rehydration Facial 4-package">Rehydration Facial 4-package $360.00 USD</option>
            <option value="Retexture(Exfoliation) 4-package">Retexture(Exfoliation) 4-package $400.00 USD</option>
          </select> </td></tr>
          </table>
          <input type="hidden" name="currency_code" value="USD">
          <input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
          ">
          <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_cart_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
          <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
          </form>
      </div>
    </div>
    <hr />

    <!-- schedule section -->
    <div class="row" id="schedule">
      <div class="large-3 medium-3 columns">
        <h1 class="center-text teal-color section-title-font">Scheduling</h1>
        <div class="panel callout">
          <p class="center-text"><strong>Availability:</strong><br>Monday through Sunday<br>10 am - 8pm</p>
          <p class="center-text"><i>Call 631-287-3527</i><br> to schedule an appointment</p>
        </div>
      </div>
      <div class="large-9 medium-9 columns">
        <h3 class="margin-top center-text">Spa Etiquette</h3>
        <p>Please respect the tranquility of our spa environment by turning off your cell phone during your visit to maintain a serene ambiance. Also please note that all treatments require the removal of jewelry. We recommend you leave your valuables at home; we are not responsible for lost items.</p>
        <h3 class="center-text">Gratuities</h3>
        <p>Gratuities are not included in the price of any service, package or gift certificate (unless stated). For those wishing to show appreciation for a job well done or a service enjoyed, gratuity envelopes are available. <i>We ask that you please bring either cash or check for the gratuity.</i></p>
      </div>
    </div>
    <hr />

    <!-- practitioner section -->
    <div class="row" id="practitioner">
      <div class="large-8 medium-8 columns">
        <h1 class="teal-color section-title-font">The Practitioner</h1>
        <p>Having worked in the Holistic Health field for over 29 years, I bring to you a wellspring of experience working with different modalities. This includes:</p>
        <p>Massage Therapy​, an assortment of ​anti-aging, renewing​ and regenerating Facia​ls,​Energy ​work, chakra balancing​ and my signature thera​pies which​ blend all of the above​ with various scrubs and aromatherapy​.</p>
        <p>For a good part of my life I have made my home on the beautiful east end of Long Island, NY, and have traveled all around the US to explore the beauty of this country.</p>
        <p>I live in Naples Florida and spend most of the year there and go back to the Hamptons for the summers. ​I continue to learn and expand my knowledge of therapies to bring you ​the best services out there.​</p>
      </div>
      <div class="large-4 medium-4 columns margin-top" id="headshot-div">
        <img src="img/Headshot_Colleen.png" alt="Colleen Miller" class="section-img">
        <h1 id="headshot-h3">Colleen Miller</h3>
      </div>
    </div>
    <hr />

    <!-- benefits of massage section -->
    <div class="row margin-right" id="benefits">
      <div class="large-4 medium-4 columns margin-top">
        <img src="img/massage_cartoon.jpg" alt="Massage cartoon" class="section-img">
      </div>
      <div class="large-8 medium-8 columns">
        <h2 class="teal-color section-title-font">Benefits of Massage</h2>
        <ul>
          <li>Massage relieves muscle tension, pain and increases joint range-of-motion</li>
          <li>Massage improves blood circulation, lowers blood pressure, opens energy channels, stimulates organs, enhances immunity and detoxifies the body</li>
          <li>Sinus headaches, TMJ, Parkinson’s, MS, Concussion, Whiplash</li>
          <li>Massage inspires and opens blocked energy allowing the creative flow to be released (example:  writer’s block)</li>
          <li>Massage increases the release of “feel good” hormones.  The hormones that are released during massage include:  dopamine, which makes you feel good and improves normal brain functioning; serotonin, a general mood enhancing hormone; and oxytocin, a general feel good hormone nicknamed the ‘hugging hormone’.</li>
        </ul>
      </div>
    </div>
    <hr />

    <!-- frequently asked questions section -->
    <div class="row" id="questions">
      <div class="large-12 medium-12 columns">
        <h2 class="center-text teal-color section-title-font">Frequently Asked Questions</h2>
        <ul class="stack button-group">
          <li><a href="#" data-reveal-id="question1" class="button first-list-item">Where will my massage or bodywork session take place?</a></li>
          <div id="question1" class="reveal-modal small" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
            <h4>Where will my massage or bodywork session take place?</h4>
            <p>In the office or in the comfort of your own home.</p>
            <p>In-house rates are: 60 minutes-$90 or 80 minutes-$125</p>
            <p>House-call-rates: 60 minutes-$120 or 80 minutes-$170</p>
            <a class="close-reveal-modal" aria-label="Close">&#215;</a>
          </div>

          <li><a href="#" data-reveal-id="question2" class="button">Must I be completely undressed? </a></li>
          <div id="question2" class="reveal-modal small" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
            <h4>Must I be completely undressed? </h4>
            <p>Most massage and bodywork techniques are traditionally performed with the client unclothed; however, it is entirely up to you what you want to wear. You should undress to your level of comfort. You will be properly draped during the entire session.</p>
            <a class="close-reveal-modal" aria-label="Close">&#215;</a>
          </div>

          <li><a href="#" data-reveal-id="question4" class="button">Will the practitioner be present when I disrobe?</a></li>
          <div id="question4" class="reveal-modal small" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
            <h4>Will the practitioner be present when I disrobe?</h4>
            <p>The practitioner will leave the room while you undress, relax onto the table, and cover yourself with a clean sheet or towel.</p>
            <a class="close-reveal-modal" aria-label="Close">&#215;</a>
          </div>

          <li><a href="#" data-reveal-id="question5" class="button">Will I be covered during the session?</a></li>
          <div id="question5" class="reveal-modal small" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
            <h4>Will I be covered during the session?</h4>
            <p>You will be properly draped at all times to keep you warm and comfortable. Only the area being worked on will be exposed. </p>
            <a class="close-reveal-modal" aria-label="Close">&#215;</a>
          </div>

          <li><a href="#" data-reveal-id="question6" class="button">What parts of my body will be massaged?</a></li>
          <div id="question6" class="reveal-modal small" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
            <h4>What parts of my body will be massaged?</h4>
            <p>A typical full-body session will include work on your back, arms, legs, feet, hands, head, neck, and shoulders. </p>
            <a class="close-reveal-modal" aria-label="Close">&#215;</a>
          </div>

          <li><a href="#" data-reveal-id="question7" class="button last-list-item">Are there any medical conditions that would make massage or bodywork inadvisable?</a></li>
          <div id="question7" class="reveal-modal small" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
            <h4>Are there any medical conditions that would make massage or bodywork inadvisable?</h4>
            <p>Yes. That's why it's imperative that, before you begin your session, the practitioner asks general health questions. It is very important that you inform the practitioner of any health problems or medications you are taking. If you are under a doctor's care, it is strongly advised that you receive a written recommendation for massage or bodywork prior to any session. Depending on the condition, approval from your doctor may be required.</p>
            <a class="close-reveal-modal" aria-label="Close">&#215;</a>
          </div>
        </ul>
      </div>
    </div>
    <hr />

    <!-- contact section -->
    <div class="row" id="contact">
      <div class="large-4 medium-4 columns margin-top">
        <div class="panel callout radius">
          <h4 class="center-text">Call:</h4>
          <p class="center-text"><i>631-287-3527</i></p>
          <p class="center-text">For more information on Services</p>
          <p class="center-text">To Schedule an Appointment</p>
          <p class="center-text">To Order a... </p>

          <a href="#" data-reveal-id="giftModal" class="button radius" id="gift-modal">Gift Certificate</a>

          <div id="giftModal" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
            <h2 id="modalTitle">Gift Certificates</h2>
            <p class="lead">Available for all Occasions</p>
            <p>​They can be purchased ​at the spa or​ via telephone​.​ Please note that they are non-refundable​.</p>
            <a class="close-reveal-modal" aria-label="Close">&#215;</a>
          </div>
        </div>
      </div>
      <div class="large-8 medium-8 columns">
        <h1 class="teal-color section-title-font">Contact</h1>
        <div id="shadow-form">
          <div class="contact-div" style="margin: 1em;">
            <form id="contactform" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" novalidate>
              <?php
                if($sent === true) {
                  echo "<h2 class='success'>Thanks, your message has been sent!</h2>";
                }elseif($hasError == true){
                  echo "<ul class='errorList'>";
                  foreach($errorArray as $key => $val){
                    echo "<li class='form-errors'>" . ucfirst($key) . " field error - $val</li>";
                  }
                  echo "</ul>";
                }
              ?>
              <input type="email" name="email" value="<?php echo (isset($email) ? $email : ""); ?>" placeholder="Your email">
              <input type="text" name="subject" value="<?php echo (isset($subject) ? $subject : ""); ?>" placeholder="Subject">
              <textarea rows="5" name="message" placeholder="Message"><?php echo (isset($message) ? $message : ""); ?></textarea>
              <input type="submit" name="submitform" value="Send" id="form-submit">
            </form>
          </div> <!-- contact div -->
        </div>
      </div>
    </div>
    <hr />

    <!-- footer -->
    <div class="row" id="footer">
      <div class="large-12 medium-12 columns margin-top">
        <h1 class="center-text" id="footer-title">Thanks for visiting</h1>
        <hr />
        <p class="center-text">© Copyright 2015 Oasis Mind Body and Skin, All right reserved.
      </div>
    </div>

    <script>
      $(document).foundation();
    </script>
  </body>
</html>
