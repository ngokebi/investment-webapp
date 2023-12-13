$(document).ready(function () {
    $(".nav-tabs > li a[title]").tooltip();

    // $("#official-email").blur(function (e) {
    //     var inp = $("#official-email").val();
    //     var email = inp.split("@");
    //     var testEmail = email[1].split(".");
    //     if (testEmail[0].toLowerCase() == 'yahoo' || testEmail[0].toLowerCase() == 'hotmail' || testEmail[0].toLowerCase() == 'aol' || testEmail[0].toLowerCase() == 'nomail' || testEmail[0].toLowerCase() == 'nil' || testEmail[0].toLowerCase() == 'gmail') {
    //         alert("Please input Official Email");
    //         $('#official-email').val("");
    //     }
    // });

    $('a[data-toggle="tab"]').on("show.bs.tab", function (e) {
        var $target = $(e.target);
        if ($target.parent().hasClass("disabled")) {
            return !1;
        }
    });

    $(".bs-wizard-dot").bind("click", function (e) {
        $(this).parent().addClass("activee");
        $(this).parent().removeClass("complete");
        $(this).parent().siblings().removeClass("activee");
        $(".activee ~ li").addClass("disabled");
    });

    $("#back").click(function (e) {
        e.preventDefault();
    });

    $(".last-step").click(function (e) {
        var $active = $(".wizard .nav-tabs li.activee");
        $active.next().addClass("complete");
    });

    $(".prev-step").click(function (e) {
        var $active = $(".wizard .nav-tabs li.activee");
        prevTab($active);
    });

    $("#datepicker").datepicker({
        format: "yyyy-mm-dd",
    });

    var date = new Date();
    var currentMonth = date.getMonth();
    var currentDate = date.getDate();
    var currentYear = date.getFullYear();

    $("#datepicker33").datepicker({
        format: "yyyy-mm-dd",
        minDate: new Date(currentYear, currentMonth - 3, currentDate),
        maxDate: new Date(currentYear, currentMonth + 3, currentDate),
    });

    $("#datepicker2").datepicker({
        format: "yyyy-mm-dd",
        maxDate: 0,
    });

    $.ajax({
        url: "process.php",
        type: "post",
        data: {
            action: "getBanks",
        },
        beforeSend: function (e) {
            $("#bank").html("Loading...");
        },
        success: function (response) {
            $("#bank").html(`
            <option value = "">Select Bank</option>
            <option></option>
            ${response}
        `);
        },
    });

    $("#country").change(function (e) {
        $.ajax({
            url: "process.php",
            type: "post",
            data: {
                action: "get_state",
            },
            beforeSend: function (e) {
                $("#state").html("Loading...");
            },
            success: function (response) {
                $("#state").html(`
                <option value = "">Select State</option>
                <option></option>
                ${response}
            `);
            },
        });
    });

    $("#state").change(function (e) {
        $.ajax({
            url: "process.php",
            type: "post",
            data: {
                action: "getLGA",
                lga: $("#state").val(),
            },
            beforeSend: function (e) {
                $("#lga").html("Loading...");
            },
            success: function (response) {
                $("#lga").html(`
                <option value = "">Select Local Government Area</option>
                <option></option>
                ${response}
            `);
            },
        });
    });

    $("#bvn-button").bind("click", function (e) {
        e.preventDefault();
        var $active = $(".wizard .nav-tabs li.activee");

        if ($("#bvn").val() == "") {
            $(".bvn-group").addClass("has-error");
            $(".bvn-help-block").html("BVN can not be blank.");
        } else if ($("#bvn").val().length < 11 || $("#bvn").val().length > 11) {
            $(".bvn-group").addClass("has-error");
            $(".bvn-help-block").html("Invalid BVN.");
        } else if (!$("#terms-condition").is(":checked")) {
            alert("Please Accept Terms and Conditions to Proceed.");
        } else if (!$("#privacy-policy").is(":checked")) {
            alert("Please Accept Privacy Policy to Proceed.");
        } else if (!$("#indemnity").is(":checked")) {
            alert("Please Accept Indemnity Form Terms to Proceed.");
        } else {
            $(".bvn-group").removeClass("has-error");
            $(".bvn-help-block").html("");

            $.ajax({
                url: "process.php",
                type: "post",
                data: {
                    action: "bvn_request",
                    bvn: $("#bvn").val(),
                },
                beforeSend: function () {
                    $("#bvn-button").prop("disabled", !0);
                    $("#bvn-button").val("Processing...");
                },
                success: function (response) {
                    resq = JSON.parse(response);
                    $("#bvn-button").prop("disabled", !1);

                    if (resq.status == "false") {
                        // testing for blacklist
                        $(".bvn-group").addClass("has-error");
                        $(".bvn-help-block").html("Please try again Later");
                        $("#bvn-button").val("Next");
                    } else {
                        $("#bvn-button").val("Next");
                        $("#bvn-button").prop("disabled", !1);
                        $active.addClass("complete");
                        $active.next().removeClass("disabled");
                        if (!$active.next().hasClass("complete")) {
                            $active.next().addClass("activee");
                        }
                        $active.removeClass("activee");
                        nextTab($active);
                    }
                },
            });
        }
    });

    $("#personal-button").bind("click", function (e) {
        e.preventDefault();
        var $active = $(".wizard .nav-tabs li.activee");
        let error = 0;

        // $active.addClass('complete');
        // $active.next().removeClass('disabled');
        // $active.next().addClass('activee');
        // $active.removeClass('activee');
        // nextTab($active)

        if ($("#title").val() == "") {
            $(".title-group").addClass("has-error");
            $(".title-help-block").html("Title can not be Blank.");
            error++;
        }

        if ($("#first_name").val() == "") {
            $(".firstname-group").addClass("has-error");
            $(".firstname-help-block").html("Firstname can not be Blank.");
            error++;
        }

        if ($("#last_name").val() == "") {
            $(".lastname-group").addClass("has-error");
            $(".lastname-help-block").html("Surname can not be Blank.");
            error++;
        }

        if ($("#phone").val() == "") {
            $(".phone-group").addClass("has-error");
            $(".phone-help-block").html("Phone Number can not be Blank.");
            error++;
        }

        if ($(".dob").val() == "") {
            $(".dob-group").addClass("has-error");
            $(".dob-help-block").html("Date of Birth can not be Blank.");
            error++;
        }

        if ($("#email").val() == "") {
            $(".email-group").addClass("has-error");
            $(".email-help-block").html("Email Address can not be Blank.");
            error++;
        } else if (!validateEmail($("#email").val())) {
            $(".email-group").addClass("has-error");
            $(".email-help-block").html("Invalid Email Address.");
            error++;
        }

        if ($("#marital-status").val() == "") {
            $(".marital-status-group").addClass("has-error");
            $(".marital-status-help-block").html("Select Marital Status.");
            error++;
        }

        if ($("#dependents").val() == "") {
            $(".dependents-group").addClass("has-error");
            $(".dependents-help-block").html("Select Dependents.");
            error++;
        }

        if ($("#country").val() == "") {
            $(".country-group").addClass("has-error");
            $(".country-help-block").html("Select Country.");
            error++;
        }

        if ($("#state").val() == "") {
            $(".state-group").addClass("has-error");
            $(".state-help-block").html("Select State.");
            error++;
        }

        if ($("#lga").val() == "") {
            $(".lga-group").addClass("has-error");
            $(".lga-help-block").html("Select Local Government Area.");
            error++;
        }

        if ($("#idtype").val() == "") {
            $(".idtype-group").addClass("has-error");
            $(".idtype-help-block").html("Select Means of Identification.");
            error++;
        }

        if ($("#idnumber").val() == "") {
            $(".idnumber-group").addClass("has-error");
            $(".idnumber-help-block").html("ID Number can not be Blank.");
            error++;
        }

        if ($("#idtype").val() == "dlicense" || $("#idtype").val() == "npassport") {
            if ($("#expdate").val() == "") {
                $(".expdate-group").addClass("has-error");
                $(".expdate-help-block").html("Expired Date can not be Blank.");
                error++;
            }
            if ($("#issuedate").val() == "") {
                $(".issuedate-code-group").addClass("has-error");
                $(".issuedate-code-help-block").html("Issued Date can not be Blank.");
                error++;
            }
        }

        if ($("#education").val() == "") {
            $(".education-group").addClass("has-error");
            $(".education-help-block").html("Select Highest Level of Education.");
            error++;
        }

        if ($("#about-page").val() == "") {
            $(".about-page-group").addClass("has-error");
            $(".about-page-help-block").html("Select How You heard about Page.");
            error++;
        }

        if ($("#house-address").val() == "") {
            $(".house-address-group").addClass("has-error");
            $(".house-address-help-block").html("House Address can not be Blank.");
            error++;
        }

        if ($("#gov-id").val() == "") {
            $(".gov-id-upload-group").addClass("has-error");
            $(".gov-id-upload-help-block").html("No File Uploaded.");
            error++;
        }

        if ($("#next-kin-name").val() == "") {
            $(".next-kin-name-group").addClass("has-error");
            $(".next-kin-name-help-block").html(
                "Next of Kin Full Name can not be Blank."
            );
            error++;
        }

        if ($("#next-kin-phone").val() == "") {
            $(".next-kin-phone-group").addClass("has-error");
            $(".next-kin-phone-help-block").html(
                "Next of Kin Phone Number can not be Blank."
            );
            error++;
        } else if ($("#next-kin-phone").val().replace(/\s/g, "").length !== 11) {
            $(".next-kin-phone-group").addClass("has-error");
            $(".next-kin-phone-help-block").html("Invalid Phone Number.");
            error++;
        }

        if ($("#next-kin-relationship").val() == "") {
            $(".next-kin-relationship-group").addClass("has-error");
            $(".next-kin-relationship-help-block").html(
                "Select a Next of Kin Relationship."
            );
            error++;
        }

        if ($("#gov-id-status1").html() !== "100%") {
            $(".gov-id-upload-group").addClass("has-error");
            $(".gov-id-upload-help-block").html("File Upload Incomplete.");
            error++;
        }

        if (error <= 0) {
            $(".title-group").removeClass("has-error");
            $(".title-help-block").html("");
            $(".firstname-group").removeClass("has-error");
            $(".firstname-help-block").html("");
            $(".lastname-group").removeClass("has-error");
            $(".lastname-help-block").html("");
            $(".phone-group").removeClass("has-error");
            $(".phone-help-block").html("");
            $(".dob-group").removeClass("has-error");
            $(".dob-help-block").html("");
            $(".email-group").removeClass("has-error");
            $(".email-help-block").html("");
            $(".marital-status-group").removeClass("has-error");
            $(".marital-status-help-block").html("");
            $(".dependents-group").removeClass("has-error");
            $(".dependents-help-block").html("");
            $(".education-group").removeClass("has-error");
            $(".education-help-block").html("");
            $(".about-page-group").removeClass("has-error");
            $(".about-page-help-block").html("");
            $(".house-address-group").removeClass("has-error");
            $(".house-address-help-block").html("");
            $(".country-group").removeClass("has-error");
            $(".country-help-block").html("");
            $(".idtype-group").removeClass("has-error");
            $(".idtype-help-block").html("");
            $(".idnumber-group").removeClass("has-error");
            $(".idnumber-help-block").html("");
            $(".issuedate-code-group").removeClass("has-error");
            $(".issuedate-code-help-block").html("");
            $(".expdate-group").removeClass("has-error");
            $(".expdate-help-block").html("");
            $(".state-group").removeClass("has-error");
            $(".state-help-block").html("");
            $(".lga-group").removeClass("has-error");
            $(".lga-help-block").html("");
            $(".gov-id-upload-group").removeClass("has-error");
            $(".gov-id-upload-help-block").html("");
            $(".next-kin-name-group").removeClass("has-error");
            $(".next-kin-name-help-block").html("");
            $(".next-kin-phone-group").removeClass("has-error");
            $(".next-kin-phone-help-block").html("");
            $(".next-kin-relationship-group").removeClass("has-error");
            $(".next-kin-relationship-help-block").html("");

            let bvn = $("#bvn").val();
            let title = $("#title").val();
            let firstname = $("#first_name").val();
            let lastname = $("#last_name").val();
            let middlename = $("#middlename").val();
            let phone = $("#phone").val();
            let email = $("#email").val();
            let maritalStatus = $("#marital-status").val();
            let dependents = $("#dependents").val();
            let education = $("#education").val();
            let aboutPage = $("#about-page").val();
            let referralCode =
                $("#referral-code").val() !== "" ? $("#referral-code").val() : "";
            let country = $("#country").val();
            let houseAddress = $("#house-address").val();
            let state = $("#state").val();
            let lga = $("#lga").val();
            let govID_extention = $("#gov-id")
                .val()
                .replace("C:\\fakepath\\", "")
                .split(".")
                .pop();
            let govID = ($("#bvn").val() + "-gov-ID").concat(".", govID_extention);
            let issuedate = $("#issuedate").val();
            let expdate = $("#expdate").val();
            let idnumber = $("#idnumber").val();
            let idtype = $("#idtype").val();
            let nextKinName = $("#next-kin-name").val();
            let nextKinPhone = $("#next-kin-phone").val();
            let nextKinRelationship = $("#next-kin-relationship").val();

            $("#personal-button").prop("disabled", !1);

            $.ajax({
                url: "process.php",
                type: "post",
                data: {
                    action: "insert_personal",

                    title: title,
                    lastname: lastname,
                    firstname: firstname,
                    middlename: middlename,
                    email: email,
                    phone: phone,
                    dependents: dependents,
                    maritalStatus: maritalStatus,
                    country: country,
                    state: state,
                    lga: lga,
                    education: education,
                    referralCode: referralCode,
                    aboutPage: aboutPage,
                    houseAddress: houseAddress,
                    idtype: idtype,
                    idnumber: idnumber,
                    issuedate: issuedate,
                    expdate: expdate,
                    govID: govID,
                    nextKinName: nextKinName,
                    nextKinRelationship: nextKinRelationship,
                    nextKinPhone: nextKinPhone,
                    bvn: bvn,
                },
                beforeSend: function () {
                    $("#personal-button").prop("disabled", !0);
                    $("#personal-button").val("Processing...");
                },
                success: function (response) {
                    $("#personal-button").prop("disabled", !1);
                    $("#personal-button").val("Next");
                    if (response == true) {
                        $("#personal-button").prop("disabled", !1);
                        $active.addClass("complete");
                        $active.next().removeClass("disabled");
                        $active.next().addClass("activee");
                        $active.removeClass("activee");
                        nextTab($active);
                    } else {
                        alert("Something went wrong. please try again shortly.");
                    }
                },
            });
        }
    });

    $("#employer-button").bind("click", function (e) {
        e.preventDefault();
        var $active = $(".wizard .nav-tabs li.activee");
        let error = 0;

        // $active.addClass('complete');
        // $active.next().removeClass('disabled');
        // $active.next().addClass('activee');
        // $active.removeClass('activee');
        // nextTab($active)

        if ($("#tenure").val() == "") {
            $(".tenure-group").addClass("has-error");
            $(".tenure-help-block").html("Select Tenure.");
            error++;
        }

        if ($("#invest-amount").val() == "") {
            $(".invest-amount-group").addClass("has-error");
            $(".invest-amount-help-block").html(
                "Investment Amount can not be Blank."
            );
            error++;
        }

        if ($("#investpayment").val() == "") {
            $(".investpayment-group").addClass("has-error");
            $(".investpayment-help-block").html("Select Investment Payment.");
            error++;
        }

        if ($("#bank").val() == "") {
            $(".bank-group").addClass("has-error");
            $(".bank-help-block").html("Select Bank.");
            error++;
        }

        if ($("#interest").val() == "") {
            $(".interest-group").addClass("has-error");
            $(".interest-help-block").html("Rate Cant be Empty.");
            error++;
        }

        if ($("#accttype").val() == "") {
            $(".accttype-group").addClass("has-error");
            $(".accttype-help-block").html("Select Account Type.");
            error++;
        }

        if ($("#acctnumber").val() == "") {
            $(".acctnumber-group").addClass("has-error");
            $(".acctnumber-help-block").html("Account Number can not be Blank.");
            error++;
        }

        if ($("#utility-bill").val() == "") {
            $(".utility-upload-group2").addClass("has-error");
            $(".utility-upload-help-block2").html("No File Uploaded.");
            error++;
        }

        if (error <= 0) {
            $(".tenure-group").removeClass("has-error");
            $(".tenure-help-block").html("");
            $(".invest-amount-group").removeClass("has-error");
            $(".invest-amount-help-block").html("");
            $(".investpayment-group").removeClass("has-error");
            $(".investpayment-help-block").html("");
            $(".bank-group").removeClass("has-error");
            $(".bank-help-block").html("");
            $(".accttype-group").removeClass("has-error");
            $(".accttype-help-block").html("");
            $(".acctnumber-group").removeClass("has-error");
            $(".acctnumber-help-block").html("");
            $(".utility-upload-group2").removeClass("has-error");
            $(".utility-upload-help-block2").html("");

            let bvn = $("#bvn").val();
            let employer = $("#employer").val();
            let employmentdate = $(".employ-date").val();
            let offical_email = $("#official-email").val();
            let employer_address = $("#employer-address").val();
            let tenure = $("#tenure").val();
            let investment_amount = $("#invest-amount").val();
            const formattedInvestment = investment_amount.toString().replace("₦", "");
            const newInvestment = formattedInvestment.split(",").join("");
            let rate = $("#interest").val();
            let investment_payment = $("#investpayment").val();
            let bank = $("#bank").val();
            let accttype = $("#accttype").val();
            let acctnumber = $("#acctnumber").val();
            let income = $("#income").val();
            const formattedIncome = income.toString().replace("₦", "");
            const newIncome = formattedIncome.split(",").join("");
            let staffID_extention = $("#staff-id")
                .val()
                .replace("C:\\fakepath\\", "")
                .split(".")
                .pop();
            if (staffID_extention == "") {
                staffID = null;
            } else {
                staffID = ($("#bvn").val() + "-staff-ID").concat(
                    ".",
                    staffID_extention
                );
            }

            let utilityBill_extention = $("#utility-bill")
                .val()
                .replace("C:\\fakepath\\", "")
                .split(".")
                .pop();
            let utilityBill = ($("#bvn").val() + "-utility-bill").concat(
                ".",
                utilityBill_extention
            );

            $("#employer-button").prop("disabled", !1);
            // alert(staffID);
            // alert(staffID_extention);
            $.ajax({
                url: "process.php",
                type: "post",
                data: {
                    action: "insert_investment",
                    bvn: bvn,
                    employer: employer,
                    employmentdate: employmentdate,
                    offical_email: offical_email,
                    employer_address: employer_address,
                    tenure: tenure,
                    investment_amount: newInvestment,
                    rate: rate,
                    investment_payment: investment_payment,
                    bank: bank,
                    accttype: accttype,
                    acctnumber: acctnumber,
                    income: newIncome,
                    staffID: staffID,
                    utilityBill: utilityBill,
                },
                beforeSend: function () {
                    $("#employer-button").prop("disabled", !0);
                    $("#employer-button").val("Processing...");
                },
                success: function (response) {
                    $("#employer-button").prop("disabled", !1);
                    $("#employer-button").val("Next");
                    if (response == true) {
                        $(".employer-group").removeClass("has-error");
                        $(".employer-help-block").html("");

                        $("#employer-button").prop("disabled", !1);

                        $active.addClass("complete");
                        $active.next().removeClass("disabled");
                        $active.next().addClass("activee");
                        $active.removeClass("activee");
                        nextTab($active);
                    } else {
                        alert("Something went wrong. please try again shortly.");
                    }
                },
            });
        }
    });

    $("#close-button").bind("click", function (e) {
        e.preventDefault();

        $(location).attr("href", "../investment.html");
    });

    $("#idtype").change(function (e) {
        if ($("#idtype").val() == "dlicense" || $("#idtype").val() == "npassport") {
            $("#mycustissuedate").css("display", "block");
            $("#mycustexpdate").css("display", "block");
        } else {
            $("#mycustissuedate").css("display", "none");
            $("#mycustexpdate").css("display", "none");
        }
    });

    $("#title").change(function (e) {
        if ($("#title").val() !== "") {
            $(".title-group").removeClass("has-error");
            $(".title-help-block").html("");
        }
    });

    $("#bvn").blur(function (e) {
        if ($("#bvn").val() !== "") {
            $(".bvn-group").removeClass("has-error");
            $(".bvn-help-block").html("");
        }
    });

    $("#last_name").blur(function (e) {
        if ($("#last_name").val() !== "") {
            $(".lastname-group").removeClass("has-error");
            $(".lastname-help-block").html("");
        }
    });

    $("#first_name").blur(function (e) {
        if ($("#firstname").val() !== "") {
            $(".firstname-group").removeClass("has-error");
            $(".firstname-help-block").html("");
        }
    });

    $("#phone").blur(function (e) {
        if ($("#phone").val() !== "") {
            $(".phone-group").removeClass("has-error");
            $(".phone-help-block").html("");
        }
    });

    $("#email").blur(function (e) {
        if ($("#email").val() !== "" && validateEmail($("#email").val())) {
            $(".email-group").removeClass("has-error");
            $(".email-help-block").html("");
        }
    });

    $("#marital-status").change(function (e) {
        if ($("#marital-status").val() !== "") {
            $(".marital-status-group").removeClass("has-error");
            $(".marital-status-help-block").html("");
        }
    });

    $("#dependents").change(function (e) {
        if ($("#dependents").val() !== "") {
            $(".dependents-group").removeClass("has-error");
            $(".dependents-help-block").html("");
        }
    });

    $("#education").change(function (e) {
        if ($("#education").val() !== "") {
            $(".education-group").removeClass("has-error");
            $(".education-help-block").html("");
        }
    });

    $("#about-page").blur(function (e) {
        if ($("#about-page").val() !== "") {
            $(".about-page-group").removeClass("has-error");
            $(".about-page-help-block").html("");
        }
    });

    $("#house-address").blur(function (e) {
        if ($("#house-address").val() !== "") {
            $(".house-address-group").removeClass("has-error");
            $(".house-address-help-block").html("");
        }
    });

    $("#country").change(function (e) {
        if ($("#country").val() !== "") {
            $(".country-group").removeClass("has-error");
            $(".country-help-block").html("");
        }
    });

    $("#state").change(function (e) {
        if ($("#state").val() !== "") {
            $(".state-group").removeClass("has-error");
            $(".state-help-block").html("");
        }
    });

    $("#lga").change(function (e) {
        if ($("#lga").val() !== "") {
            $(".lga-group").removeClass("has-error");
            $(".lga-help-block").html("");
        }
    });

    $("#idtype").change(function (e) {
        if ($("#idtype").val() !== "") {
            $(".idtype-group").removeClass("has-error");
            $(".idtype-help-block").html("");
        }
    });

    $("#idnumber").blur(function (e) {
        if ($("#idnumber").val() !== "") {
            $(".idnumber-group").removeClass("has-error");
            $(".idnumber-help-block").html("");
        }
    });

    $("#issuedate-code").blur(function (e) {
        if ($("#issuedate-code").val() !== "") {
            $(".issuedate-code-group").removeClass("has-error");
            $(".issuedate-code-help-block").html("");
        }
    });

    $("#expdate").blur(function (e) {
        if ($("#expdate").val() !== "") {
            $(".expdate-group").removeClass("has-error");
            $(".expdate-help-block").html("");
        }
    });

    $("#next-kin-name").blur(function (e) {
        if ($("#next-kin-name").val() !== "") {
            $(".next-kin-name-group").removeClass("has-error");
            $(".next-kin-name-help-block").html("");
        }
    });

    $("#next-kin-phone").blur(function (e) {
        if ($("#next-kin-phone").val() !== "") {
            $(".next-kin-phone-group").removeClass("has-error");
            $(".next-kin-phone-help-block").html("");
        }
    });

    $("#next-kin-relationship").change(function (e) {
        if ($("#next-kin-relationship").val() !== "") {
            $(".next-kin-relationship-group").removeClass("has-error");
            $(".next-kin-relationship-help-block").html("");
        }
    });

    $("#employer").blur(function (e) {
        if ($("#employer").val() !== "") {
            $(".employer-group").removeClass("has-error");
            $(".employer-help-block").html("");
        }
    });

    $(".employ-date").blur(function (e) {
        if ($(".employ-date").val() !== "") {
            $(".employ-date-group").removeClass("has-error");
            $(".employ-date-help-block").html("");
        }
    });

    $("#income").blur(function (e) {
        if ($("#income").val() !== "") {
            $(".income-group").removeClass("has-error");
            $(".income-help-block").html("");
        }
    });

    $("#income").keyup(function (e) {
        $("#income").val(amountFormatter($("#income").val()));
    });

    // $('#official-email').blur(function (e) {
    //     if ($('#official-email').val() !== '') {
    //         $('.official-email-group').removeClass('has-error');
    //         $('.official-email-help-block').html('')
    //     }
    // });

    $("#employer-address").blur(function (e) {
        if ($("#employer-address").val() !== "") {
            $(".employer-address-group").removeClass("has-error");
            $(".employer-address-help-block").html("");
        }
    });

    $("#tenure").change(function (e) {
        if ($("#tenure").val() !== "") {
            $(".tenure-group").removeClass("has-error");
            $(".tenure-help-block").html("");
        }
        computeInvestRate();
    });

    $("#tenure").blur(function (e) {
        if ($("#tenure").val() !== "") {
            $(".tenure-group").removeClass("has-error");
            $(".tenure-help-block").html("");
        }
    });

    $("#invest-amount").keyup(function (e) {
        $("#invest-amount").val(amountFormatter($("#invest-amount").val()));
    });

    $("#invest-amount").blur(function (e) {
        var formatted_amount = $("#invest-amount")
            .val()
            .replace(/[^0-9$]/g, "");
        if (formatted_amount < 500000 || formatted_amount > 25000000) {
            $("#employer-button").prop("disabled", !0);
            alert("Investment Amount must be between N500,000 and N25,000,000");
        } else {
            computeInvestRate();
        }
    });

    $("#invest-amount").blur(function (e) {
        if ($("#invest-amount").val() !== "") {
            $(".invest-amount-group").removeClass("has-error");
            $(".invest-amount-help-block").html("");
        }
    });

    $("#investpayment").blur(function (e) {
        if ($("#investpayment").val() !== "") {
            $(".investpayment-group").removeClass("has-error");
            $(".investpayment-help-block").html("");
        }
    });

    $("#bank").change(function (e) {
        if ($("#bank").val() !== "") {
            $(".bank-group").removeClass("has-error");
            $(".bank-help-block").html("");
        }
    });

    $("#accttype").change(function (e) {
        if ($("#accttype").val() !== "") {
            $(".accttype-group").removeClass("has-error");
            $(".accttype-help-block").html("");
        }
    });

    $("#acctnumber").blur(function (e) {
        if ($("#acctnumber").val() !== "") {
            $(".acctnumber-group").removeClass("has-error");
            $(".acctnumber-help-block").html("");
        }
    });
});

function submitSuccess() {
    $("#submit-button").prop("disabled", !0);
    $("#title").prop("disabled", !0);
    $("#email-address").prop("disabled", !0);
    $("#marital-status").prop("disabled", !0);
    $("#dependents").prop("disabled", !0);
    $("#education").prop("disabled", !0);
    $("#about-page").prop("disabled", !0);
    $("#house-address").prop("disabled", !0);
    $("#state").prop("disabled", !0);
    $("#lga").prop("disabled", !0);
    $("#gov-id").prop("disabled", !0);
    $("#next-kin-name").prop("disabled", !0);
    $("#next-kin-phone").prop("disabled", !0);
    $("#next-kin-relationship").prop("disabled", !0);
    $("#employer").prop("disabled", !0);
    $(".employ-date").prop("disabled", !0);
    $("#income").prop("disabled", !0);
    $("#obligations").prop("disabled", !0);
    $("#official-email").prop("disabled", !0);
    $("#staff-id").prop("disabled", !0);
    $("#employer-address").prop("disabled", !0);
    $("#tenure").prop("disabled", !0);
    $("#amount").prop("disabled", !0);
    $("#bank").prop("disabled", !0);
    $("#account-type").prop("disabled", !0);
    $("#account").prop("disabled", !0);
}

function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}

function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}

function _(el) {
    return document.getElementById(el);
}

function uploadIDFile() {
    var file = _("gov-id").files[0];
    if (file.name.length > 20) {
        _("gov-id-file_name").innerHTML = file.name.substring(0, 20 - 1) + "...";
    } else {
        _("gov-id-file_name").innerHTML = file.name;
    }
    var sizeKB = file.size / 1024;
    if (sizeKB < 1) {
        _("gov-id-file_size").innerHTML = " - (" + file.size + " bytes)";
    } else {
        _("gov-id-file_size").innerHTML = " - (" + Math.floor(sizeKB) + " KB)";
    }
    if (file.type !== "application/x-msdownload") {
        $("#gov-id-overBar").css("width", "0%");
        _("gov-id-status").innerHTML = "0%";
        _("gov-id-status1").innerHTML = "0%";
        $(".gov-id-upload-group").removeClass("has-error");
        $(".gov-id-upload-help-block").html("");
        if (sizeKB < 5000) {
            if ($("#bvn").val() !== "") {
                $("#id-upload-text").html(
                    `<p class="text-info" style = "color: #f24d0c; font-style: italic; font-size: 12px" >*** If this is a wrong file. Please click to re-upload.</p>`
                );
                var formdata = new FormData();
                formdata.append("statement", file);
                formdata.append("file_name", $("#bvn").val() + "-gov-ID");
                var ajax = new XMLHttpRequest();
                ajax.addEventListener("progress", IDProgressHandler, !1);
                ajax.addEventListener("load", IDCompleteHandler, !1);
                ajax.addEventListener("error", IDErrorHandler, !1);
                ajax.addEventListener("abort", IDAbortHandler, !1);
                ajax.open("POST", "file_upload_parser.php", !1);
                ajax.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        if (this.responseText == "failed") {
                            $("#gov-id").val("");
                            _("gov-id-file_name").innerHTML = "Upload Goverment ID";
                            _("gov-id-file_size").innerHTML = "";
                            $("#gov-id-overBar").css("width", "0%");
                            _("gov-id-status").innerHTML = "0%";
                            _("gov-id-status1").innerHTML = "0%";
                            $(".gov-id-upload-group").addClass("has-error");
                            $(".gov-id-upload-help-block").html("ID upload failed.");
                        }
                    }
                };
                ajax.send(formdata);
            } else {
                $("#gov-id").val("");
                _("gov-id-file_name").innerHTML = "Upload Goverment ID";
                _("gov-id-file_size").innerHTML = "";
                $("#gov-id-overBar").css("width", "0%");
                _("gov-id-status").innerHTML = "0%";
                _("gov-id-status1").innerHTML = "0%";
                $(".gov-id-upload-group").addClass("has-error");
                $(".gov-id-upload-help-block").html("BVN cannot be blank.");
            }
        } else {
            _("gov-id-file_name").innerHTML = "Upload Goverment ID";
            _("gov-id-file_size").innerHTML = "";
            $("#gov-id").val("");
            $(".gov-id-upload-group").addClass("has-error");
            $(".gov-id-upload-help-block").html("Maximum file size allowed is 5MB.");
        }
    } else {
        _("gov-id-file_name").innerHTML = "Upload Goverment ID";
        _("gov-id-file_size").innerHTML = "";
        $("#gov-id").val("");
        $("#gov-id-overBar").css("width", "0%");
        _("gov-id-status").innerHTML = "0%";
        _("gov-id-status1").innerHTML = "0%";
        $(".gov-id-upload-group").addClass("has-error");
        $(".gov-id-upload-help-block").html("Invalid uploaded file.");
    }
}

function IDProgressHandler(event) {
    var percent = (event.loaded / event.total) * 100;
    $("#gov-id-overBar").css("width", Math.round(percent) + "%");
    _("gov-id-status").innerHTML = Math.round(percent) + "%";
    _("gov-id-status1").innerHTML = Math.round(percent) + "%";
}

function IDCompleteHandler(event) {
    var percent = (event.loaded / event.total) * 100;
    $("#gov-id-overBar").css("width", "100%");
    _("gov-id-status").innerHTML = "100%";
    _("gov-id-status1").innerHTML = "100%";
}

function IDErrorHandler(event) {
    _("gov-id-status").innerHTML = "Upload Failed";
}

function IDAbortHandler(event) {
    _("gov-id-status").innerHTML = "Upload Aborted";
}

function uploadStaffIDFile() {
    var file = _("staff-id").files[0];
    if (file.name.length > 20) {
        _("staff-id-file_name").innerHTML = file.name.substring(0, 20 - 1) + "...";
    } else {
        _("staff-id-file_name").innerHTML = file.name;
    }
    var sizeKB = file.size / 1024;
    if (sizeKB < 1) {
        _("staff-id-file_size").innerHTML = " - (" + file.size + " bytes)";
    } else {
        _("staff-id-file_size").innerHTML = " - (" + Math.floor(sizeKB) + " KB)";
    }
    if (file.type !== "application/x-msdownload") {
        $("#utility-overBar").css("width", "0%");
        _("staff-id-status").innerHTML = "0%";
        _("staff-id-status1").innerHTML = "0%";
        $(".staff-id-upload-group").removeClass("has-error");
        $(".staff-id-upload-help-block").html("");
        if (sizeKB < 5000) {
            if ($("#bvn").val() !== "") {
                $("#staff-upload-text").html(
                    `<p class="text-info" style = "color: #f24d0c; font-style: italic; font-size: 12px" >*** If this is a wrong file. Please click to re-upload.</p>`
                );
                var formdata = new FormData();
                formdata.append("statement", file);
                formdata.append("file_name", $("#bvn").val() + "-staff-ID");
                var ajax = new XMLHttpRequest();
                ajax.addEventListener("progress", staffIDProgressHandler, !1);
                ajax.addEventListener("load", staffIDCompleteHandler, !1);
                ajax.addEventListener("error", staffIDErrorHandler, !1);
                ajax.addEventListener("abort", staffIDAbortHandler, !1);
                ajax.open("POST", "file_upload_parser.php", !1);
                ajax.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        if (this.responseText == "failed") {
                            _("staff-id-file_name").innerHTML = "Upload Staff ID";
                            _("staff-id-file_size").innerHTML = "";
                            $("#staff-id").val("");
                            $("#utility-overBar").css("width", "0%");
                            _("staff-id-status").innerHTML = "0%";
                            _("staff-id-status1").innerHTML = "0%";
                            $(".staff-id-upload-group").addClass("has-error");
                            $(".staff-id-upload-help-block").html("ID upload failed.");
                        }
                    }
                };
                ajax.send(formdata);
            } else {
                _("staff-id-file_name").innerHTML = "Upload Staff ID";
                _("staff-id-file_size").innerHTML = "";
                $("#staff-id").val("");
                $("#utility-overBar").css("width", "0%");
                _("staff-id-status").innerHTML = "0%";
                _("staff-id-status1").innerHTML = "0%";
                $(".staff-id-upload-group").addClass("has-error");
                $(".staff-id-upload-help-block").html("BVN cannot be blank.");
            }
        } else {
            _("staff-id-file_name").innerHTML = "Upload Staff ID";
            _("staff-id-file_size").innerHTML = "";
            $("#staff-id").val("");
            $(".staff-id-upload-group").addClass("has-error");
            $(".staff-id-upload-help-block").html(
                "Maximum file size allowed is 5MB."
            );
        }
    } else {
        _("staff-id-file_name").innerHTML = "Upload Goverment ID";
        _("staff-id-file_size").innerHTML = "";
        $("#staff-id").val("");
        $("#utility-overBar").css("width", "0%");
        _("staff-id-status").innerHTML = "0%";
        _("staff-id-status1").innerHTML = "0%";
        $(".staff-id-upload-group").addClass("has-error");
        $(".staff-id-upload-help-block").html("Invalid uploaded file.");
    }
}

function staffIDProgressHandler(event) {
    var percent = (event.loaded / event.total) * 100;
    $("#staff-id-overBar").css("width", Math.round(percent) + "%");
    _("staff-id-status").innerHTML = Math.round(percent) + "%";
    _("staff-id-status1").innerHTML = Math.round(percent) + "%";
}

function staffIDCompleteHandler(event) {
    var percent = (event.loaded / event.total) * 100;
    $("#staff-id-overBar").css("width", "100%");
    _("staff-id-status").innerHTML = "100%";
    _("staff-id-status1").innerHTML = "100%";
}

function staffIDErrorHandler(event) {
    _("staff-id-status").innerHTML = "Upload Failed";
}

function staffIDAbortHandler(event) {
    _("staff-id-status").innerHTML = "Upload Aborted";
}

function uploadUtilityFile2() {
    var file = _("utility-bill").files[0];
    if (file.name.length > 20) {
        _("utility-file_name2").innerHTML = file.name.substring(0, 20 - 1) + "...";
    } else {
        _("utility-file_name2").innerHTML = file.name;
    }
    var sizeKB = file.size / 1024;
    if (sizeKB < 1) {
        _("utility-file_size2").innerHTML = " - (" + file.size + " bytes)";
    } else {
        _("utility-file_size2").innerHTML = " - (" + Math.floor(sizeKB) + " KB)";
    }
    if (file.type !== "application/x-msdownload") {
        $("#utility-overBar2").css("width", "0%");
        _("utility-status2").innerHTML = "0%";
        _("utility-status3").innerHTML = "0%";
        $(".utility-upload-group2").removeClass("has-error");
        $(".utility-upload-help-block2").html("");
        if (sizeKB < 5000) {
            if ($("#bvn").val() !== "") {
                $("#utility-upload-text2").html(
                    `<p class="text-info" style = "color: #f24d0c; font-style: italic; font-size: 12px" >*** If this is a wrong file. Please click to re-upload.</p>`
                );
                var formdata = new FormData();
                formdata.append("statement", file);
                formdata.append("file_name", $("#bvn").val() + "-utility-bill");
                var ajax = new XMLHttpRequest();
                ajax.addEventListener("progress", staffIDProgressHandler2, !1);
                ajax.addEventListener("load", staffIDCompleteHandler2, !1);
                ajax.addEventListener("error", staffIDErrorHandler2, !1);
                ajax.addEventListener("abort", staffIDAbortHandler2, !1);
                ajax.open("POST", "file_upload_parser_letter.php", !1);
                ajax.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        if (this.responseText == "failed") {
                            _("utility-file_name2").innerHTML = "Utility Bill";
                            _("utility-file_size2").innerHTML = "";
                            $("#utility-bill").val("");
                            $("#utility-overBar2").css("width", "0%");
                            _("utility-status2").innerHTML = "0%";
                            _("utility-status3").innerHTML = "0%";
                            $(".utility-upload-group2").addClass("has-error");
                            $(".utility-upload-help-block2").html(
                                "Utility Bill upload failed."
                            );
                        }
                    }
                };
                ajax.send(formdata);
            } else {
                _("utility-file_name2").innerHTML = "Utility Bill";
                _("utility-file_size2").innerHTML = "";
                $("#utility-bill").val("");
                $("#utility-overBar2").css("width", "0%");
                _("utility-status2").innerHTML = "0%";
                _("utility-status3").innerHTML = "0%";
                $(".utility-upload-group2").addClass("has-error");
                $(".staff-id-upload-help-block").html("BVN cannot be blank.");
            }
        } else {
            _("utility-file_name2").innerHTML = "Utility Bill";
            _("utility-file_size2").innerHTML = "";
            $("#utility-bill").val("");
            $(".utility-upload-group2").addClass("has-error");
            $(".utility-upload-help-block2").html(
                "Maximum file size allowed is 5MB."
            );
        }
    } else {
        _("utility-file_name2").innerHTML = "Utility Bill";
        _("utility-file_size2").innerHTML = "";
        $("#staff-i2d").val("");
        $("#utility-overBar2").css("width", "0%");
        _("utility-status2").innerHTML = "0%";
        _("utility-status3").innerHTML = "0%";
        $(".utility-upload-group2").addClass("has-error");
        $(".utility-upload-help-block2").html("Invalid uploaded file.");
    }
}

function staffIDProgressHandler2(event) {
    var percent = (event.loaded / event.total) * 100;
    $("#utility-overBar2").css("width", Math.round(percent) + "%");
    _("utility-status2").innerHTML = Math.round(percent) + "%";
    _("utility-status3").innerHTML = Math.round(percent) + "%";
}

function staffIDCompleteHandler2(event) {
    var percent = (event.loaded / event.total) * 100;
    $("#utility-overBar2").css("width", "100%");
    _("utility-status2").innerHTML = "100%";
    _("utility-status3").innerHTML = "100%";
}

function staffIDErrorHandler2(event) {
    _("utility-status2").innerHTML = "Upload Failed";
}

function staffIDAbortHandler2(event) {
    _("utility-status2").innerHTML = "Upload Aborted";
}

// function uploadIndemnityFile() {
//     var file = _("indemnity-bill").files[0];
//     if (file.name.length > 20) {
//         _("indemnity-file_name2").innerHTML = file.name.substring(0, 20 - 1) + '...'
//     } else {
//         _("indemnity-file_name2").innerHTML = file.name
//     }
//     var sizeKB = file.size / 1024;
//     if (sizeKB < 1) {
//         _("indemnity-file_size2").innerHTML = ' - (' + file.size + ' bytes)'
//     } else {
//         _("indemnity-file_size2").innerHTML = ' - (' + Math.floor(sizeKB) + ' KB)'
//     }
//     if (file.type !== 'application/x-msdownload') {
//         $('#indemnity-overBar2').css('width', '0%');
//         _("indemnity-status2").innerHTML = "0%";
//         _("indemnity-status3").innerHTML = "0%";
//         $('.indemnity-upload-group2').removeClass('has-error');
//         $('.indemnity-upload-help-block2').html('');
//         if (sizeKB < 5000) {
//             if ($('#bvn').val() !== '') {
//                 $('#indemnity-upload-text2').html(`<p class="text-info" style = "color: #f24d0c; font-style: italic; font-size: 12px" >*** If this is a wrong file. Please click to re-upload.</p>`);
//                 var formdata = new FormData();
//                 formdata.append("statement", file);
//                 formdata.append("file_name", $('#bvn').val() + '-indemnity-form');
//                 var ajax = new XMLHttpRequest();
//                 ajax.addEventListener("progress", IndemnityProgressHandler, !1);
//                 ajax.addEventListener("load", IndemnityCompleteHandler, !1);
//                 ajax.addEventListener("error", IndemnityErrorHandler, !1);
//                 ajax.addEventListener("abort", IndemnityAbortHandler, !1);
//                 ajax.open("POST", "file_upload_parser_letter2.php", !1);
//                 ajax.onreadystatechange = function () {
//                     if (this.readyState == 4 && this.status == 200) {
//                         if (this.responseText == 'failed') {
//                             _("indemnity-file_name2").innerHTML = "Indemnity Form";
//                             _("indemnity-file_size2").innerHTML = '';
//                             $(('#indemnity-bill')).val('');
//                             $('#indemnity-overBar2').css('width', '0%');
//                             _("indemnity-status2").innerHTML = "0%";
//                             _("indemnity-status3").innerHTML = "0%";
//                             $('.indemnity-upload-group2').addClass('has-error');
//                             $('.indemnity-upload-help-block2').html('Indemnity Form upload failed.')
//                         }
//                     }
//                 }
//                 ajax.send(formdata)
//             } else {
//                 _("indemnity-file_name2").innerHTML = "Indemnity Form";
//                 _("indemnity-file_size2").innerHTML = '';
//                 $(('#indemnity-bill')).val('');
//                 $('#indemnity-overBar2').css('width', '0%');
//                 _("indemnity-status2").innerHTML = "0%";
//                 _("indemnity-status3").innerHTML = "0%";
//                 $('.indemnity-upload-group2').addClass('has-error');
//                 $('.staff-id-upload-help-block').html('BVN cannot be blank.')
//             }
//         } else {
//             _("indemnity-file_name2").innerHTML = "Indemnity Form";
//             _("indemnity-file_size2").innerHTML = '';
//             $(('#indemnity-bill')).val('');
//             $('.indemnity-upload-group2').addClass('has-error');
//             $('.indemnity-upload-help-block2').html('Maximum file size allowed is 5MB.')
//         }
//     } else {
//         _("indemnity-file_name2").innerHTML = "Indemnity Form";
//         _("indemnity-file_size2").innerHTML = '';
//         $(('#staff-i2d')).val('');
//         $('#indemnity-overBar2').css('width', '0%');
//         _("indemnity-status2").innerHTML = "0%";
//         _("indemnity-status3").innerHTML = "0%";
//         $('.indemnity-upload-group2').addClass('has-error');
//         $('.indemnity-upload-help-block2').html('Invalid uploaded file.')
//     }
// }

// function IndemnityProgressHandler(event) {
//     var percent = (event.loaded / event.total) * 100;
//     $('#indemnity-overBar2').css('width', Math.round(percent) + '%');
//     _("indemnity-status2").innerHTML = Math.round(percent) + "%";
//     _("indemnity-status3").innerHTML = Math.round(percent) + "%"
// }

// function IndemnityCompleteHandler(event) {
//     var percent = (event.loaded / event.total) * 100;
//     $('#indemnity-overBar2').css('width', '100%');
//     _("indemnity-status2").innerHTML = "100%";
//     _("indemnity-status3").innerHTML = "100%"
// }

// function IndemnityErrorHandler(event) {
//     _("indemnity-status2").innerHTML = "Upload Failed"
// }

// function IndemnityAbortHandler(event) {
//     _("indemnity-status2").innerHTML = "Upload Aborted"
// }

function validateEmail(sEmail) {
    var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
    if (filter.test(sEmail)) {
        return !0;
    } else {
        return !1;
    }
}

function checkBank() {
    let bank = $("#bank").val().split("*");
    if (bank[0] !== "00") {
        return !0;
    } else {
        return !1;
    }
}

const opts = {
    precision: 0,
    separator: ".",
    delimiter: ",",
    unit: "₦",
    suffixUnit: "",
    zeroCents: !1,
    moneyPrecision: 0,
};

function amountFormatter(amount) {
    if (!amount) return "";
    const number = amount.toString().replace(/[\D]/g, "");
    const clearDelimiter = new RegExp(`^(0|\\${opts.delimiter})`);
    const clearSeparator = new RegExp(`(\\${opts.separator})$`);
    let money = number.substr(0, number.length - opts.moneyPrecision);
    let masked = money.substr(0, money.length % 3);
    const cents = new Array(opts.precision + 1).join("0");
    money = money.substr(money.length % 3, money.length);
    for (let i = 0, len = money.length; i < len; i++) {
        if (i % 3 === 0) {
            masked += opts.delimiter;
        }
        masked += money[i];
    }
    masked = masked.replace(clearDelimiter, "");
    masked = masked.length ? masked : "0";
    const unitToApply =
        opts.unit[opts.unit.length - 1] === " "
            ? opts.unit.substring(0, opts.unit.length - 1)
            : opts.unit;
    const output =
        unitToApply + masked + opts.separator + cents + opts.suffixUnit;
    return output.replace(clearSeparator, "");
}

function computeInvestRate() {
    let investamount = $("#invest-amount")
        .val()
        .replace(/[^0-9$]/g, "");
    let tenure = $("#tenure").val();

    $("#employer-button").prop("disabled", !0);
    if (investamount !== "" && tenure !== "") {
        $.ajax({
            url: "process.php",
            type: "post",
            data: {
                action: "getInvestRating",
                investamount: investamount,
                tenure: tenure,
            },
            beforeSend: function () {
                $("#employer-button").prop("disabled", !0);
                $("#employer-button").val("Processing...");
            },
            success: function (response) {
                $("#employer-button").prop("disabled", !1);
                $("#employer-button").val("Next");
                $("#rate").html(`
                <div class="form-group interest-group">
                <label class="sr-only">Interest Rate</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <!-- <i class="fas fa-hand-holding-usd"></i> -->
                        <i class="fas fa-percent"></i>
                    </div>
                    <div id="rate">

                    </div>
                    <input class="form-control" id="interest" placeholder="Interest Rate" value="${response}" type="text" disabled/>
                </div>
                <span id="helpBlock2" class="help-block interest-help-block"></span>
            </div>
            `);
                if (response == false) {
                    $("#employer-button").prop("disabled", !0);
                }
            },
        });
    } else {
        return !1;
    }
}
