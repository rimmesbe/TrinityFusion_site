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
      $to = "ryanimmesberger@gmail.com";
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
    <link href='https://fonts.googleapis.com/css?family=Lobster|Abril+Fatface|Lobster+Two:400,700|Cinzel:400,700,900|Courgette|Tangerine:400,700|Pinyon+Script|Playfair+Display+SC:400,700,900|Great+Vibes|Neuton:400,700,800|Racing+Sans+One|Sansita+One|Cinzel+Decorative:400,700,900|Arizonia' rel='stylesheet' type='text/css'>
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script src="js/vendor/modernizr.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js"></script>
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
          <li class="name"><h1 id="title"><a href="#home" id="home-color">Oasis <span style="font-size: 1.5rem;"><i>Mind Body and Skin</i></span></a></h1></li>
          <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
        </ul>

        <section class="top-bar-section">
          <ul class="right">
            <li class="has-dropdown">
              <a href="#" class="tab-text light-purple">SERVICES</a>
              <ul class="dropdown">
                <li><a href="#massage" class="tab-text">Massages</a></li>
                <li><a href="#facial" class="tab-text">Facials</a></li>
                <li><a href="#spa-party" class="tab-text">Spa Party</a></li>
              </ul>
            </li>
            <li><a href="#schedule" class="light-purple">SCHEDULE</a></li>
            <li class="has-dropdown">
              <a href="#" class="light-purple">ABOUT</a>
              <ul class="dropdown">
                <li><a href="#practitioner" class="tab-text">Practitioner</a></li>
                <li><a href="#benefits" class="tab-text">Benefits of Massage</a></li>
                <li><a href="#questions" class="tab-text">Frequently Asked Questions</a></li>
              </ul>
            </li>
            <li><a href="#contact" class="light-purple">CONTACT</a></li>
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
            <h5><span data-tooltip aria-haspopup="true" class="has-tip" title="60 minutes: $85.00 <br> 80 minutes: $125.00"><strong>In-house Rates</strong></span></h5>
            <h5><span data-tooltip aria-haspopup="true" class="has-tip" title="60 minutes: $120.00 <br> 80 minutes: $170.00"><strong>House Call Rates</strong></span></h5>
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
      <div class="large-3 medium-3 columns panel callout radius">
        <h3 class="center-text">This Seasons Special</h3>
        <p class="center-text" id="special-p">
          Yours <strong>Free</strong> with any massage treatment.
          A variety of Aromatherapy  Essential Oils blended to enhance your body treatment.
        </p>
      </div>
    </div>
    <hr />
    <!-- facials section -->
    <div class="row section-margins" id="facial">
      <div class="large-4 medium-4 columns">
        <img src="img/facial_mask.jpg" alt="facial mask" class="section-img">
        <div class="panel callout radius margin-top">
          <h4 class="center-text">Add-on to your facial treatment:</h4>
          <ul>
            <li>Foot Reflexology--$40</li>
            <li>Hand Massage--$40</li>
            <li>Back Facial--$50</li>
            <li>Microcurrent lifting facial--$40</li>
            <li>High Frequency--$40</li>
          </ul>
        </div>
      </div>

      <div class="large-8 medium-8 columns">
        <h1 class="teal-color section-title-font">Facials</h1>
        <ul class="accordion" data-accordion>
          <li class="accordion-navigation">
            <a href="#panel1a">Infuse Antioxidant Glow Facial</a>
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
            <a href="#panel2a">Signature Anti-Aging Facial with High Frequency</a>
            <div id="panel2a" class="content">
              <div class="row" data-equalizer>
                <div class="large-9 medium-9 columns panel light-purple" data-equalizer-watch>
                  <p>Improve skin's elasticity and collagen production, decrease fine lines and prevent appearance of new ones. Includes face, décolleté, neck and shoulder massage, cleanse, lactic acid peel, amino peptide serum with mask, eye lifting cream and high frequency machine for toning and lifting.
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
            <a href="#panel3a">Corrective Facial for Mature Skin</a>
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
            <a href="#panel4a">Rehydration Facial</a>
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
            <a href="#panel5a">Retexture (Exfoliation)</a>
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
            <a href="#panel6a">Restorative Skin Back Treatment</a>
            <div id="panel6a" class="content">
              <div class="row" data-equalizer>
                <div class="large-9 medium-9 columns panel light-purple" data-equalizer-watch>
                  <p>Restorative treatment for the skin of the back. Includes skin analysis, steam, deep pore cleansing, exfoliation and mask. Back facials are very similar to regular facials that start with a steam, continue with extractions and deep exfoliation leaving your skin silky and blemish free. Finish with a nourishing and moisturizing massage.</p>
                </div>
                <div class="large-3 medium-3 columns panel light-purple" data-equalizer-watch>
                  <h4 class="center-text">Price:</h4>
                  <p class="center-text">$90</p>
                </div>
              </div>
            </div>
          </li>
        </ul>
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
        <a href="#" data-reveal-id="spaPolicy" class="medium radius secondary button no-margin border-button">Spa Party Cancelation Policy</a>
        <div id="spaPolicy" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
          <h3 id="modalTitle">Spa Party Cancelation Policy</h3>
          <p>Spa appointments have been especially reserved for you. If you need to cancel, please do so with a minimum of <strong>24 hours notice</strong>. For a <strong>bridal party</strong> we ask that you please do so with <strong>48 hours notice</strong>. Failure to do so will result in a <strong>50% charge</strong> of your service.</p>
          <a class="close-reveal-modal" aria-label="Close">&#215;</a>
        </div>
      </div>

      <div class="large-9 medium-9 columns panel">
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
        <h3 id="headshot-h3">Colleen Miller</h3>
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
          <li><a href="#" data-reveal-id="question1" class="button">Where will my massage or bodywork session take place?</a></li>
          <div id="question1" class="reveal-modal small" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
            <p class="lead">Where will my massage or bodywork session take place?</p>
            <p>In the comfort of your home. You may like to have nice music playing and a calm, private atmosphere is helpful to relax.</p>
            <a class="close-reveal-modal" aria-label="Close">&#215;</a>
          </div>

          <li><a href="#" data-reveal-id="question2" class="button">Must I be completely undressed? </a></li>
          <div id="question2" class="reveal-modal small" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
            <p class="lead">Must I be completely undressed? </p>
            <p>Most massage and bodywork techniques are traditionally performed with the client unclothed; however, it is entirely up to you what you want to wear. You should undress to your level of comfort. You will be properly draped during the entire session.</p>
            <a class="close-reveal-modal" aria-label="Close">&#215;</a>
          </div>

          <li><a href="#" data-reveal-id="question4" class="button">Will the practitioner be present when I disrobe?</a></li>
          <div id="question4" class="reveal-modal small" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
            <p class="lead">Will the practitioner be present when I disrobe?</p>
            <p>The practitioner will leave the room while you undress, relax onto the table, and cover yourself with a clean sheet or towel.</p>
            <a class="close-reveal-modal" aria-label="Close">&#215;</a>
          </div>

          <li><a href="#" data-reveal-id="question5" class="button">Will I be covered during the session?</a></li>
          <div id="question5" class="reveal-modal small" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
            <p class="lead">Will I be covered during the session?</p>
            <p>You will be properly draped at all times to keep you warm and comfortable. Only the area being worked on will be exposed. </p>
            <a class="close-reveal-modal" aria-label="Close">&#215;</a>
          </div>

          <li><a href="#" data-reveal-id="question6" class="button">What parts of my body will be massaged?</a></li>
          <div id="question6" class="reveal-modal small" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
            <p class="lead">What parts of my body will be massaged?</p>
            <p>A typical full-body session will include work on your back, arms, legs, feet, hands, head, neck, and shoulders. </p>
            <a class="close-reveal-modal" aria-label="Close">&#215;</a>
          </div>

          <li><a href="#" data-reveal-id="question7" class="button">Are there any medical conditions that would make massage or bodywork inadvisable?</a></li>
          <div id="question7" class="reveal-modal small" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
            <p class="lead">Are there any medical conditions that would make massage or bodywork inadvisable?</p>
            <p>Yes. That's why it's imperative that, before you begin your session, the practitioner asks general health questions. It is very important that you inform the practitioner of any health problems or medications you are taking. If you are under a doctor's care, it is strongly advised that you receive a written recommendation for massage or bodywork prior to any session. Depending on the condition, approval from your doctor may be required.</p>
            <a class="close-reveal-modal" aria-label="Close">&#215;</a>
          </div>
        </ul>
      </div>
    </div>
    <hr />
    <!-- contact section -->
    <div class="row" id="contact">
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
    </div>
    <hr />

    <script>
      $(document).foundation();
    </script>
  </body>
</html>
