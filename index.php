<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Investment Form</title>
    <link rel="shortcut icon" href="img/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main_min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="bootstrap-datepicker/css/bootstrap-datepicker.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>


    <link rel="stylesheet" type="text/css" href="jquery-ui.css">

    <script src="jquery-3.3.1.min.js"></script>
    <script src="jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="main_min.js"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-TPLP3CZ');
    </script>
    <!-- End Google Tag Manager -->


</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TPLP3CZ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <div class="cont">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <img src="img/logo.png" class="img-responsive" alt="page logo">
                </div>
                <div class="col-md-6">
                </div>
            </div>
            <div class="row">
                <section>
                    <div class="wizard">
                        <!-- <img id="profile-img" class="profile-img-card center-block" src="img/logo.png" alt="page logo" /> -->
                        <div class="wizard-inner-cont">
                            <div class="container">
                                <div class="wizard-inner">
                                    <!-- navigation for each tab in the registration process -->
                                    <ul class="nav nav-tabs row bs-wizard text-center" role="tablist">

                                        <li class="col-xs-2 bs-wizard-step activee activeee">
                                            <div class="text-center bs-wizard-stepicon">
                                                <i class="fas fa-shield-alt"></i>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar"></div>
                                            </div>
                                            <a href="#step1" class="bs-wizard-dot" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1"><i class="fas fa-check"></i></a>
                                            <div class="text-center bs-wizard-steptext">BVN Verification</div>
                                        </li>

                                        <li class="col-xs-2 bs-wizard-step disabled">
                                            <div class="text-center bs-wizard-stepicon">
                                                <i class="far fa-user"></i>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar"></div>
                                            </div>
                                            <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2" class="bs-wizard-dot"><i class="fas fa-check"></i></a>
                                            <div class="text-center bs-wizard-steptext">Personal Details</div>
                                        </li>

                                        <li class="col-xs-2 bs-wizard-step disabled">
                                            <div class="text-center bs-wizard-stepicon">
                                                <i class="fas fa-file-invoice"></i>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar"></div>
                                            </div>
                                            <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3" class="bs-wizard-dot"><i class="fas fa-check"></i></a>
                                            <div class="text-center bs-wizard-steptext">Investment Details</div>
                                        </li>
                                        <li class="col-xs-2 bs-wizard-step disabled">
                                            <div class="text-center bs-wizard-stepicon">
                                                <i class="fas fa-check"></i>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar"></div>
                                            </div>
                                            <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Step 4" class="bs-wizard-dot"><i class="fas fa-check"></i></a>
                                            <div class="text-center bs-wizard-steptext">Completion</div>
                                        </li>

                                    </ul>

                                </div>
                            </div>
                        </div>
                        <!-- registration form broken down into tabs -->
                        <form role="form" autocomplete="off" enctype="multipart/form-data">
                            <div class="container">
                                <div class="tab-content ">
                                    <div class="tab-pane active" role="tabpanel" id="step1">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h3>BVN Verification</h3>
                                                <hr />
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="col-md-11">
                                                    <div class="message-div">
                                                    </div>
                                                    <div class="form-group bvn-group ">
                                                        <label class="sr-only">BANK VERIFICATION NUMBER</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon"><i class="fas fa-hashtag"></i></div>
                                                            <input type="text" id="bvn" class="form-control" placeholder="Bank Verification Number">
                                                        </div>
                                                        <span id="helpBlock2" class="help-block bvn-help-block"></span>
                                                    </div>
                                                    <div id="otp-div"></div>
                                                    <div class="terms">
                                                        <div class="checkbox">
                                                            <label class="check-label">
                                                                <input type="checkbox" id="terms-condition" />
                                                                <span class="checkmark"></span>
                                                                I accept all
                                                                <a href="Terms and conditions.pdf" target="blank">Terms & Conditions</a>.
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label class="check-label">
                                                                <input type="checkbox" id="privacy-policy" />
                                                                <span class="checkmark"></span>
                                                                I accept your <a href="Privacy policy.pdf" target="blank">Privacy Policy</a>.
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label class="check-label">
                                                                <input type="checkbox" id="indemnity" />
                                                                <span class="checkmark"></span>
                                                                I accept all <a href="Indemnity_Form.pdf" target="blank">Indemnity</a> Terms and Condition.
                                                            </label>
                                                        </div>
                                                        <p class="terms-p">I have read, understood and accept all the terms and conditions & privacy policy for Page International Financial Services Limited.</p>
                                                    </div>
                                                    <input class="btn btn-orange form-control next-step" id="bvn-button" value="Next" type="submit" />
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <!-- <img src="img/bvn_image.png" class="img-responsive" alt="bvn_image"> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" role="tabpanel" id="step2">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h3>Personal Details</h3>
                                                <hr />
                                            </div>
                                            <div class="col-md-9">
                                                <div class="message-div"></div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="col-md-6">
                                                            <div class="form-group title-group ">
                                                                <label class="sr-only">TITLE</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-addon">
                                                                        <i class="far fa-user-circle"></i>
                                                                    </div>
                                                                    <select class="form-control" id="title">
                                                                        <option value="">Title</option>
                                                                        <option value=""></option>
                                                                        <option value="Mr">Mr</option>
                                                                        <option value="Miss">Miss</option>
                                                                        <option value="Ms">Ms</option>
                                                                        <option value="Mrs">Mrs</option>
                                                                    </select>
                                                                </div>
                                                                <span id="helpBlock2" class="help-block title-help-block"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group lastname-group">
                                                                <label class="sr-only">Surname</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><i class="far fa-user"></i></i></div>
                                                                    <input type="text" id="last_name" class="form-control" placeholder="Surname">
                                                                </div>
                                                                <span id="helpBlock2" class="help-block lastname-help-block"></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group middlename-group">
                                                                    <label class="sr-only">Middlename</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon"><i class="far fa-user"></i></i></div>
                                                                        <input type="text" id="middlename" class="form-control" placeholder="Middle Name">
                                                                    </div>
                                                                    <span id="helpBlock2" class="help-block middlename-help-block"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group firstname-group">
                                                                    <label class="sr-only">First Name</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-addon"><i class="far fa-user"></i></i></div>
                                                                        <input type="text" id="first_name" class="form-control" placeholder="First Name">
                                                                    </div>
                                                                    <span id="helpBlock2" class="help-block firstname-help-block"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group phone-group">
                                                            <label class="sr-only">PHONE NUMBER</label>
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="fas fa-phone"></i></div>
                                                                <input type="text" id="phone" class="form-control" placeholder="Phone Number">
                                                            </div>
                                                            <span id="helpBlock2" class="help-block phone-help-block"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group dependents-group ">
                                                            <label class="sr-only">NUMBER OF DEPENDENT</label>
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="fas fa-child"></i>
                                                                </div>
                                                                <select class="form-control" id="dependents">
                                                                    <option value="">No of Dependents</option>
                                                                    <option value=""></option>
                                                                    <?php
                                                                    for ($i = 0; $i < 11; $i++) {
                                                                        echo '<option value="' . $i . '">' . $i . '</option>';
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <span id="helpBlock2" class="help-block dependents-help-block"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group marital-status-group ">
                                                            <label class="sr-only">MARITAL STATUS</label>
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="far fa-heart"></i>
                                                                </div>
                                                                <select class="form-control" id="marital-status">
                                                                    <option value="">Marital Status</option>
                                                                    <option value=""></option>
                                                                    <option value="Single">Single</option>
                                                                    <option value="Married">Married</option>
                                                                    <option value="Divorced">Divorced</option>
                                                                    <option value="Widow">Widowed</option>
                                                                </select>
                                                            </div>
                                                            <span id="helpBlock2" class="help-block marital-status-help-block"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group country-group">
                                                            <label class="sr-only">Country of Residence</label>
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="far fa-user-circle"></i>
                                                                </div>
                                                                <select class="form-control" id="country">
                                                                    <option value="">Country of Residence</option>
                                                                    <option value=""></option>
                                                                    <option value="Nigeria">Nigeria</option>
                                                                </select>
                                                            </div>
                                                            <span id="helpBlock2" class="help-block country-help-block"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group education-group ">
                                                            <label class="sr-only">Education</label>
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="fas fa-university"></i>
                                                                </div>
                                                                <select class="form-control" id="education">
                                                                    <option value="">Education</option>
                                                                    <option value=""></option>
                                                                    <option value="None">None</option>
                                                                    <option value="Primary">Primary</option>
                                                                    <option value="Secondary">Secondary</option>
                                                                    <option value="Tertiary">Tertiary</option>
                                                                    <option value="Post Graduate">Post Graduate</option>
                                                                </select>
                                                            </div>
                                                            <span id="helpBlock2" class="help-block education-help-block"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group state-group">
                                                            <label class="sr-only">State of Residence</label>
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="far fa-user-circle"></i>
                                                                </div>
                                                                <select class="form-control" id="state">
                                                                    <option value="">State of Residence</option>
                                                                    <option value=""></option>
                                                                </select>
                                                            </div>
                                                            <span id="helpBlock2" class="help-block state-help-block"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group about-page-group">
                                                            <label class="sr-only">HOW DID YOU HEAR ABOUT PAGE?</label>
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="fas fa-info"></i>
                                                                </div>
                                                                <select class="form-control" id="about-page">
                                                                    <option value="">How did you hear about Page?</option>
                                                                    <option value=""></option>
                                                                    <option value="Family or Friend">Family or Friend</option>
                                                                    <option value="Sales Rep">Sales Rep</option>
                                                                    <option value="Website">Website</option>
                                                                    <option value="Radio">Radio</option>
                                                                    <option value="Billboard">Billboard</option>
                                                                    <option value="Social Media">Social Media</option>
                                                                    <option value="Print Media">Print Media</option>
                                                                    <option value="Others">Others</option>
                                                                </select>
                                                            </div>
                                                            <span id="helpBlock2" class="help-block about-page-help-block"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group referral-code-group">
                                                            <label class="sr-only">REFERRAL CODE</label>
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="fas fa-user-friends"></i>
                                                                </div>
                                                                <input id="referral-code" type="text" class="form-control" placeholder="Referral Code (optional)">
                                                            </div>
                                                            <span id="helpBlock2" class="help-block referral-code-help-block"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group house-address-group">
                                                            <label class="sr-only">HOUSE ADDRESS</label>
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="fas fa-map-marker-alt"></i>
                                                                </div>
                                                                <textarea class="form-control" id="house-address" rows="3" placeholder="House Address"></textarea>
                                                            </div>
                                                            <span id="helpBlock2" class="help-block house-address-help-block"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group lga-group">
                                                            <label class="sr-only">Local Government Area</label>
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="far fa-user-circle"></i>
                                                                </div>
                                                                <select class="form-control" id="lga">
                                                                    <option value="">Local Government Area</option>
                                                                    <option value=""></option>
                                                                </select>
                                                            </div>
                                                            <span id="helpBlock2" class="help-block lga-help-block"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group idtype-group ">
                                                            <label class="sr-only">Means of Identification</label>
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="fas fa-id-card"></i>
                                                                </div>
                                                                <select class="form-control" id="idtype">
                                                                    <option value="">Select Means of Identification</option>
                                                                    <option value="npassport">National Passport</option>
                                                                    <option value="voterscard">Voters Card</option>
                                                                    <option value="dlicense">Drivers License</option>
                                                                    <option value="nin">NIN</option>
                                                                </select>
                                                            </div>
                                                            <span id="helpBlock2" class="help-block idtype-help-block"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group idnumber-group">
                                                            <label class="sr-only">Identification Number</label>
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="fas fa-id-card"></i>
                                                                </div>
                                                                <input id="idnumber" type="text" class="form-control" placeholder="Identification Number">
                                                            </div>
                                                            <span id="helpBlock2" class="help-block idnumber-help-block"></span>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div id="mycustissuedate" class="col-md-6" style="display: none;">
                                                        <div class="form-group issuedate-code-group">
                                                            <label class="sr-only">Identification Issue Date</label>
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="fas fa-id-card"></i>
                                                                </div>
                                                                <input id="issuedate" onfocus="(this.type='date')" class="form-control" placeholder="Identification Issue Date">
                                                            </div>
                                                            <span id="helpBlock2" class="help-block issuedate-code-help-block"></span>
                                                        </div>
                                                    </div>
                                                    <div id="mycustexpdate" class="col-md-6" style="display: none;">
                                                        <div class="form-group expdate-group">
                                                            <label class="sr-only">Identification Expiry Date</label>
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="fas fa-id-card"></i>
                                                                </div>
                                                                <input id="expdate" onfocus="(this.type='date')" class="form-control" placeholder="Identification Expiry Date">
                                                            </div>
                                                            <span id="helpBlock2" class="help-block expdate-help-block"></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group gov-id-upload-group ">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fas fa-id-card"></i>
                                                                </span>
                                                                <input onchange="uploadIDFile()" name="gov_id" style="display:none;" id="gov-id" type="file" multiple="multiple">
                                                                <label class="btn form-control" id="selectButton" style="padding:10px; margin-left: 0; overflow: hidden;" for="gov-id">
                                                                    <span id="gov-id-file_name">Upload Goverment ID</span>
                                                                    <span id="gov-id-file_size"></span>
                                                                </label>
                                                                <span class="input-group-addon">
                                                                    <i class="fas fa-cloud-upload-alt"></i>
                                                                </span>
                                                            </div>
                                                            <span id="helpBlock2" class="help-block gov-id-upload-help-block"></span>
                                                            <div id="id-upload-text"></div>
                                                        </div>
                                                        <div class="col-sm-2 pull-right">
                                                            <label for="upload" id="gov-id-status1">0%</label>
                                                        </div>
                                                        <div clas="col-sm-8 ">
                                                            <div class="progress progress2">
                                                                <div class="progress-bar progress-bar-warning progress-bar-striped active" id="gov-id-overBar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0">
                                                                    <span class="sr-only" id="gov-id-status">0%</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group email-group">
                                                            <label class="sr-only">Email</label>
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="fas fa-envelope"></i>
                                                                </div>
                                                                <input id="email" type="text" class="form-control" placeholder="Personal Email">
                                                            </div>
                                                            <span id="helpBlock2" class="help-block email-help-block"></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        </br>
                                                        <h4 class="">Next of Kin Information</h4>
                                                        </br>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group next-kin-name-group">
                                                            <label class="sr-only">FULL NAME</label>
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="far fa-user"></i></div>
                                                                <input type="text" id="next-kin-name" class="form-control" placeholder="Full Name">
                                                            </div>
                                                            <span id="helpBlock2" class="help-block next-kin-name-help-block"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group next-kin-phone-group">
                                                            <label class="sr-only">PHONE NUMBER</label>
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="fas fa-phone"></i></div>
                                                                <input type="text" id="next-kin-phone" class="form-control" placeholder="Phone Number">
                                                            </div>
                                                            <span id="helpBlock2" class="help-block next-kin-phone-help-block"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group next-kin-relationship-group ">
                                                            <label class="sr-only">RELATIONSHIP</label>
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="fas fa-user-friends"></i>
                                                                </div>
                                                                <select class="form-control" id="next-kin-relationship">
                                                                    <option value="">Select Relationship</option>
                                                                    <option value=""></option>
                                                                    <option value="Spouse">Spouse</option>
                                                                    <option value="Parent">Parent</option>
                                                                    <option value="Siblings">Sibling</option>
                                                                    <option value="Aunt/Uncle">Aunt/Uncle</option>
                                                                    <option value="Others">Others</option>
                                                                </select>
                                                            </div>
                                                            <span id="helpBlock2" class="help-block next-kin-relationship-help-block"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 col-md-offset-6">
                                                        <input class="btn btn-orange form-control next-step" id="personal-button" value="Next" type="submit" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" role="tabpanel" id="step3">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h3>Investment Details</h3>
                                                <hr />
                                            </div>
                                            <div class="col-md-9">
                                                <div class="message-div"></div>
                                                <div class="row">
                                                    <div class="col-md-11">
                                                        <div class="form-group employer-group">
                                                            <label class="sr-only">EMPLOYER NAME</label>
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="fas fa-briefcase"></i></i></div>
                                                                <input type="text" id="employer" class="form-control" placeholder="Employer Name (Optional)" />
                                                                <span class="input-group-addon spinner-addon">
                                                                </span>
                                                            </div>
                                                            <span id="helpBlock2" class="help-block employer-help-block"></span>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group employ-date-group">
                                                            <label class="sr-only">EMPLOYMENT START DATE</label>
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="far fa-calendar-alt"></i></i></div>
                                                                <input class="form-control employ-date" id="datepicker2" placeholder="Employment Start Date (Optional)" data-date-end-date="0d" />
                                                            </div>
                                                            <span id="helpBlock2" class="help-block employ-date-help-block"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group income-group">
                                                            <label class="sr-only">NET MONTHY INCOME</label>
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <!-- <i class="fas fa-hand-holding-usd"></i> -->
                                                                    <i class="fas fa-map-marker-alt"></i>
                                                                </div>
                                                                <input class="form-control" id="income" placeholder="Net Monthly Income (Optional)" type="text" />
                                                            </div>
                                                            <span id="helpBlock2" class="help-block income-help-block"></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group official-email-group">
                                                            <label class="sr-only">OFFICIAL EMAIL</label>
                                                            <div class="input-group">
                                                                <div class="input-group-addon"><i class="far fa-envelope"></i></i></div>
                                                                <input class="form-control" id="official-email" placeholder="Official Email (Optional)" type="email" />
                                                            </div>
                                                            <span id="helpBlock2" class="help-block official-email-help-block"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group staff-id-upload-group">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fas fa-id-card"></i>
                                                                </span>
                                                                <input onchange="uploadStaffIDFile()" name="staff_id" style="display:none;" id="staff-id" type="file" multiple="multiple">
                                                                <label class="btn form-control" id="selectButton" style="padding:10px; margin-left: 0; overflow: hidden;" for="staff-id">
                                                                    <span id="staff-id-file_name">Upload Staff ID (Optional)</span>
                                                                    <span id="staff-id-file_size"></span>
                                                                </label>
                                                                <span class="input-group-addon">
                                                                    <i class="fas fa-cloud-upload-alt"></i>
                                                                </span>
                                                            </div>
                                                            <span id="helpBlock2" class="help-block staff-id-upload-help-block"></span>
                                                            <div id="staff-upload-text"></div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-2 pull-right">
                                                                <label for="upload" id="staff-id-status1">0%</label>
                                                            </div>
                                                            <div clas="col-sm-8 ">
                                                                <div class="progress progress2">
                                                                    <div class="progress-bar progress-bar-warning progress-bar-striped active" id="staff-id-overBar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0">
                                                                        <span class="sr-only" id="staff-id-status">0%</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group employer-address-group">
                                                            <label class="sr-only">EMPLOYER ADDRESS</label>
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="fas fa-map-marker-alt"></i>
                                                                </div>
                                                                <textarea class="form-control" id="employer-address" rows="3" placeholder="Employer Address (Optional)"></textarea>
                                                            </div>
                                                            <span id="helpBlock2" class="help-block employer-address-help-block"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group tenure-group ">
                                                            <label class="sr-only">Investment Tenure</label>
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="far fa-clock"></i>
                                                                </div>
                                                                <select class="form-control" id="tenure">
                                                                    <option value="">Select Tenure</option>
                                                                    <option value=""></option>
                                                                    <option value="90">90 Days</option>
                                                                    <option value="180">180 Days</option>
                                                                    <option value="365">365 Days</option>
                                                                </select>
                                                            </div>
                                                            <span id="helpBlock2" class="help-block tenure-help-block"></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group invest-amount-group">
                                                            <label class="sr-only">Investment Amount</label>
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <!-- <i class="fas fa-hand-holding-usd"></i> -->
                                                                    <i class="fas fa-money-bill-wave-alt"></i>
                                                                </div>
                                                                <input class="form-control" id="invest-amount" placeholder="Amount, Min. N500,000-Max. N25,000,000" type="text" />
                                                            </div>
                                                            <span id="helpBlock2" class="help-block invest-amount-help-block"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6" id="rate">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group investpayment-group">
                                                            <label class="sr-only">Interest Payment</label>
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="fas fa-money-bill-wave-alt"></i>
                                                                </div>
                                                                <select class="form-control" id="investpayment">
                                                                    <option value="">Interest Payment</option>
                                                                    <option value=""></option>
                                                                    <option value="Monthly">Monthly</option>
                                                                    <option value="Quarterly">Quarterly</option>
                                                                    <option value="Capitalized">Capitalized</option>
                                                                </select>
                                                            </div>
                                                            <span id="helpBlock2" class="help-block investpayment-help-block"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group bank-group">
                                                            <label class="sr-only">Bank</label>
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <!-- <i class="far fa-user-circle"></i> -->
                                                                    <i class="fas fa-store-alt"></i>
                                                                </div>
                                                                <select class="form-control" id="bank">
                                                                    <option value="">Bank</option>
                                                                    <option value=""></option>
                                                                </select>
                                                            </div>
                                                            <span id="helpBlock2" class="help-block bank-help-block"></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group accttype-group">
                                                            <label class="sr-only">Account Type</label>
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="fas fa-hand-holding"></i>
                                                                </div>
                                                                <select class="form-control" id="accttype">
                                                                    <option value="">Account Type</option>
                                                                    <option value=""></option>
                                                                    <option value="Current">Current</option>
                                                                    <option value="Savings">Savings</option>
                                                                </select>
                                                            </div>
                                                            <span id="helpBlock2" class="help-block accttype-help-block"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group acctnumber-group">
                                                            <label class="sr-only">Account Number</label>
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <!-- <i class="fas fa-hand-holding-usd"></i> -->
                                                                    <i class="fas fa-hand-holding"></i>
                                                                </div>
                                                                <input class="form-control" id="acctnumber" placeholder="Account Number" type="text" />
                                                            </div>
                                                            <span id="helpBlock2" class="help-block acctnumber-help-block"></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group utility-upload-group2">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fas fa-id-card"></i>
                                                                </span>
                                                                <input onchange="uploadUtilityFile2()" name="utility" style="display:none;" id="utility-bill" type="file" multiple="multiple">
                                                                <label class="btn form-control" id="selectButton2" style="padding:10px; margin-left: 0; overflow: hidden;" for="utility-bill">
                                                                    <span id="utility-file_name2">Utility Bill</span>
                                                                    <span id="utility-file_size2"></span>
                                                                </label>
                                                                <span class="input-group-addon">
                                                                    <i class="fas fa-cloud-upload-alt"></i>
                                                                </span>

                                                            </div>
                                                            <span id="helpBlock3" class="help-block utility-upload-help-block2"></span>
                                                            <div id="utility-upload-text2"></div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-2 pull-right">
                                                                <label for="upload" id="utility-status3">0%</label>
                                                            </div>
                                                            <div clas="col-sm-8 ">
                                                                <div class="progress progress2">
                                                                    <div class="progress-bar progress-bar-warning progress-bar-striped active" id="utility-overBar2" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0">
                                                                        <span class="sr-only" id="utility-status2">0%</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- <div class="col-md-6">
                                                        <div class="form-group indemnity-upload-group2">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fas fa-id-card"></i>
                                                                </span>
                                                                <input onchange="uploadIndemnityFile()" name="indemnity" style="display:none;" id="indemnity-bill" type="file" multiple="multiple">
                                                                <label class="btn form-control" id="selectButton2" style="padding:10px; margin-left: 0; overflow: hidden;" for="indemnity-bill">
                                                                    <span id="indemnity-file_name2">indemnity Form</span>
                                                                    <span id="indemnity-file_size2"></span>
                                                                </label>
                                                                <span class="input-group-addon">
                                                                    <i class="fas fa-cloud-upload-alt"></i>
                                                                </span>

                                                            </div>
                                                            <span id="helpBlock3" class="help-block indemnity-upload-help-block2"></span>
                                                            <div id="indemnity-upload-text2"></div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-2 pull-right">
                                                                <label for="upload" id="indemnity-status3">0%</label>
                                                            </div>
                                                            <div clas="col-sm-8 ">
                                                                <div class="progress progress2">
                                                                    <div class="progress-bar progress-bar-warning progress-bar-striped active" id="indemnity-overBar2" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0">
                                                                        <span class="sr-only" id="indemnity-status2">0%</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6 col-md-offset-6">
                                                        <input class="btn btn-orange form-control next-step" id="employer-button" value="Submit" type="submit" />
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-sm-3">
                                                <!-- <img src="img/employer_image.png" class="img-responsive" alt="employer_image"> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" role="tabpanel" id="complete">
                                        <div class="row" id="statement-divv">
                                            <div class="col-sm-3">
                                                <h3>Completed</h3>
                                                <hr />
                                            </div>
                                            <div class="col-sm-6">
                                                <br><br><br><br>
                                                <div class="row success-content" id="success">
                                                    <div class="center-block" id="success-div" style="width:700px;">
                                                        <div class="success-icon text-center">
                                                            <!-- <i class="far fa-check-circle"></i> -->
                                                            <span class="glyphicon glyphicon-check" aria-hidden="true"></span>
                                                        </div>
                                                        <div class="success-text">
                                                            <p class="res-text">Your application has been submitted successfully</br>Kindly check your email for futher Infomation
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br><br><br><br>
                                                <div class="col-md-11">
                                                    <input class="btn btn-orange form-control next-step" id="close-button" value="Close" type="submit" style="margin-left:45%;" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>

</body>

</html>