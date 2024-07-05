(function ($) {
    let loader = $(".chocoletrasPlg-spiner");
    $(document).ready(function () {
        const keyMap = {
            48: '0.png', 49: '1.png', 50: '2.png', 51: '3.png', 52: '4.png', 53: '5.png',
            54: '6.png', 55: '7.png', 56: '8.png', 57: '9.png', 32: { heart: 'heart.png', star: 'star.png' },
            65: 'a.png', 66: 'b.png', 67: 'c.png', 68: 'd.png', 69: 'e.png', 70: 'f.png',
            71: 'g.png', 72: 'h.png', 73: 'i.png', 74: 'j.png', 75: 'k.png', 76: 'l.png',
            77: 'm.png', 78: 'n.png', 79: 'o.png', 80: 'p.png', 81: 'q.png', 82: 'r.png',
            83: 's.png', 84: 't.png', 85: 'u.png', 86: 'v.png', 87: 'w.png', 88: 'x.png',
            89: 'y.png', 90: 'z.png'
        };

        function generateImages(text, $typewriterInner, spaceSymbol) {
            $typewriterInner.empty();
            const words = text.split(spaceSymbol);
            words.forEach((word, index) => {
                const $wordDiv = $('<div>').addClass('word');
                for (const char of word) {
                    let keyCode;
                    if (char === spaceSymbol) {
                        keyCode = 32;
                    } else {
                        keyCode = char.toUpperCase().charCodeAt(0);
                    }
                    const imgFileName = typeof keyMap[keyCode] === 'object' ? keyMap[keyCode][$('#letras').val()] : keyMap[keyCode];
                    if (imgFileName) {
                        const imgPath = `http://localhost/wordpress/wp-content/plugins/crea-tu-frase/img/letters/${imgFileName}`;
                        const $img = $('<img>').attr('src', imgPath).addClass('letter-img');
                        $wordDiv.append($img);
                    }
                }
                if ($wordDiv.children().length > 10) {
                    $wordDiv.children().css('max-width', '35px');
                } else if (($wordDiv.children().length > 7)) {
                    $wordDiv.children().css('max-width', '50px');
                }
                $typewriterInner.append($wordDiv);
                if (index < words.length - 1) {
                    const imgPath = `http://localhost/wordpress/wp-content/plugins/crea-tu-frase/img/letters/${keyMap[32][$('#letras').val()]}`;
                    const $img = $('<img>').attr('src', imgPath).addClass('letter-img');
                    $typewriterInner.append($img);
                }
            });
        }

        function calculateTotalPrice() {
            let totalPrice = 0;
            let totalCount = 0;
            const pricePerCharacter = Number($("#precLetras").val());
            const pricePerSymbol = Number($("#precCoraz").val());

            function calculatePrice(text) {
                let price = 0;
                let count = 0;
                for (let i = 0; i < text.length; i++) {
                    const char = text[i];
                    if (char === '✯' || char === '♥') {
                        price += pricePerSymbol;
                    } else {
                        price += pricePerCharacter;
                    }
                    count++;
                }
                return { price: price, count: count };
            }

            // Calculate the price for #getText field
            totalPrice += parseFloat(calculatePrice(jQuery('#getText').val()).price);
            totalCount += parseInt(calculatePrice(jQuery('#getText').val()).count);

            // Calculate the price for .fraseInput fields
            jQuery('.fraseInput').each(function () {
                const { price, count } = calculatePrice(jQuery(this).val());
                totalPrice += parseFloat(price);
                totalCount += parseInt(count);
            });

            const minPrice = parseFloat(ajax_variables.gastoMinimo);
            const shippingCost = parseFloat(ajax_variables.precEnvio);

            totalPrice = (totalPrice > minPrice) ? totalPrice + shippingCost : minPrice + shippingCost;

            jQuery('#ctf_form #counter').text(totalPrice.toFixed(1));
            jQuery('#actual').text(totalCount);
            jQuery('.chocoletrasPlg__wrapperCode-dataUser-form-input-price').val(totalPrice.toFixed(1));
        }

        function attachInputHandler($input, $typewriterInner) {
            $input.on('input', function () {
                const selectedSymbol = $('#letras').val() === 'heart' ? '♥' : '✯';
                let inputText = $(this).val();
                inputText = inputText.replace(/ /g, selectedSymbol).toUpperCase();
                $(this).val(inputText);
                generateImages(inputText, $typewriterInner, selectedSymbol);
                calculateTotalPrice(); // Trigger price calculation on input change
            });
        }

        attachInputHandler($('#getText'), $('#typewriter .typewriterInner'));

        $("#ctf_form #getText").on("keyup", function (event) {
            console.log('Key code:', event.keyCode);
            if ($.trim($(this).val()) !== "") {
                $(".dummyImg").css('display', 'none');
                $("#addNewFrase").removeAttr('disabled');
                $("#ctf_form .action-button").removeAttr('disabled');
            } else {
                $(".dummyImg").css('display', 'block');
                $("#ctf_form .action-button").prop('disabled', true);
                $("#addNewFrase").prop('disabled', true);
            }
        });

        let typewriterCounter = 1;
        $("#addNewFrase").click(function () {
            const newTypewriterInnerId = `typewriterInner_${typewriterCounter++}`;
            const newFrasePanelId = `frasePanel_${typewriterCounter}`;

            const $newFrasePanel = $(`
                <div class="frasePanel" id="${newFrasePanelId}">
                    <div class="closeBtnTyper">
                        <svg width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM8.96963 8.96965C9.26252 8.67676 9.73739 8.67676 10.0303 8.96965L12 10.9393L13.9696 8.96967C14.2625 8.67678 14.7374 8.67678 15.0303 8.96967C15.3232 9.26256 15.3232 9.73744 15.0303 10.0303L13.0606 12L15.0303 13.9696C15.3232 14.2625 15.3232 14.7374 15.0303 15.0303C14.7374 15.3232 14.2625 15.3232 13.9696 15.0303L12 13.0607L10.0303 15.0303C9.73742 15.3232 9.26254 15.3232 8.96965 15.0303C8.67676 14.7374 8.67676 14.2625 8.96965 13.9697L10.9393 12L8.96963 10.0303C8.67673 9.73742 8.67673 9.26254 8.96963 8.96965Z" fill="#E64C3C" />
                        </svg>
                    </div>
                    <input class="fraseInput" type="text" placeholder="Escriba su frase aquí.." required="">
                </div>
            `);
            $('.fraseWrapper').append($newFrasePanel);
            const $newTypewriterInner = $(`<div class="typewriterInner" id="${newTypewriterInnerId}"></div>`);
            $('#typewriter').append($newTypewriterInner);
            const $newInput = $newFrasePanel.find('.fraseInput');
            attachInputHandler($newInput, $newTypewriterInner);

            // Attach click event handler to the close button
            $newFrasePanel.find('.closeBtnTyper').click(function () {
                $newFrasePanel.remove(); // Remove the frase panel
                $newTypewriterInner.remove(); // Remove the typewriter inner element
                calculateTotalPrice(); // Recalculate the total price
            });
        });


        let screenshotPaths = [];
        let screenshotData = [];

        function saveScreenshots(screenshots, callback) {
            $.ajax({
                type: "POST",
                url: "/wordpress/wp-content/plugins/crea-tu-frase/utils/save_screenshot.php",
                data: {
                    screenshots: screenshots
                },
                success: function (response) {
                    console.log("Screenshots saved successfully.");
                    const data = JSON.parse(response);
                    if (data.status === 'success') {
                        screenshotPaths = data.filepaths;
                    }
                    callback(null, response);
                },
                error: function (error) {
                    console.error("Error saving screenshots:", error);
                    callback(error);
                }
            });
        }

        $("#continuarBTN").on('click', function () {
            $('.priceCounter').text($(".chocoletrasPlg__wrapperCode-dataUser-form-input-price").val());

            $(".typewriterInner").each(function (index) {
                const element = $(this)[0]; // Get the DOM element
                const timestamp = new Date().getTime();
                const uniqueFilename = 'screenshot_' + timestamp + '_' + (index + 1) + '.png';

                html2canvas(element, {
                    scale: 3, // Increase the scale for better resolution (adjust as needed)
                    useCORS: true
                }).then(canvas => {
                    const imgData = canvas.toDataURL('image/png');
                    screenshotData.push({
                        imgBase64: imgData,
                        filename: uniqueFilename
                    });

                    // If this is the last element, send the AJAX request
                    if (screenshotData.length === $(".typewriterInner").length) {
                        saveScreenshots(screenshotData, function (error, response) {
                            if (!error) {
                                console.log("All screenshots saved successfully.");
                            }
                        });
                    }
                }).catch(error => {
                    console.error("Error capturing screenshot for element " + index, error);
                });
            });

        });

        $("#ctf_form").on("submit", function (event) {
            event.preventDefault();
            loader.css('height', '100%');
            console.log('submission');
            const mainText = [$('#getText').val()];
            const priceTotal = $('.chocoletrasPlg__wrapperCode-dataUser-form-input-price').val();
            const fullName = $("#fname").val();
            const email = $("#email").val();
            const tel = $("#chocoTel").val();
            const postal = $("#cp").val();
            const city = $("#city").val();
            const province = $("#province").val();
            const address = $("#address").val();
            let picDate = $("#picDate").val();
            const shippingType = $("#ExpressActivator").val();
            const message = $("#message").val();
            const uoi = $("#uniqueOrderID").val();

            if (!picDate) {
                picDate = new Date().toISOString().slice(0, 10);
            }

            $('.fraseInput').each(function () {
                mainText.push($(this).val());
            });

            const cookieData = {
                mainText: mainText,
                priceTotal: priceTotal,
                fname: fullName,
                email: email,
                tel: tel,
                postal: postal,
                city: city,
                province: province,
                address: address,
                picDate: picDate,
                shippingType: shippingType,
                express: new Date().toISOString(),
                message: message,
                uoi: uoi,
                screenshots: screenshotPaths
            };

            const cookieValue = encodeURIComponent(JSON.stringify(cookieData));
            setCookie('chocoletraOrderData', cookieValue);

            const dataToSend = {
                action: 'test_action',
                mainText: JSON.stringify(mainText),
                priceTotal: priceTotal,
                fname: fullName,
                email: email,
                tel: tel,
                postal: postal,
                city: city,
                province: province,
                address: address,
                message: message,
                uoi: uoi,
                picDate: picDate,
                shippingType: shippingType,
                nonce: ajax_variables.nonce
            };

            $.ajax({
                type: "POST",
                url: ajax_variables.ajax_url,
                data: dataToSend,
                success: function (response) {
                    loader.css('height', '0%');
                    // console.log("Response from server: ", response);
                    // const parsedResponse = JSON.parse(response);

                    // if (parsedResponse.Datos.Status) {
                    //     console.info("Process succeeded: ", parsedResponse.Datos);
                    // } else {
                    //     console.error("Process failed: ", parsedResponse.Datos);
                    // }
                    setCookie('chocol_cookie', true);
                },
                error: function (xhr, status, error) {
                    console.error("AJAX request failed: ", status, error);
                },
                complete: function () {
                    location.reload();
                }
            });
        });

        function removeCookie(name) {
            document.cookie = name + '=; Max-Age=0; path=/;';
        }

        jQuery(document).ready(function () {
            let selectedGatway = null;
            $(".paymentPanel .paymentCard").on('click', function () {
                $(".paymentPanel .paymentCard").removeClass('active');
                $(this).addClass("active");
                selectedGatway = $(this).attr("data-gatway")
                console.log(selectedGatway);
                return selectedGatway;
            })

            $("#proceedPayment").on('click', function () {
                if (selectedGatway === 'paypal') {
                    $("#paypayPal").submit();
                } else if (selectedGatway === 'redsys') {
                    $("#payRedsys").submit();
                } else if (selectedGatway === 'bizum') {
                    $("#payBizum").submit();
                } else if (selectedGatway === 'google') {
                    $("#payGoogle").submit();
                } else if (selectedGatway === 'apple') {
                    $("#payApple").submit();
                } else if (selectedGatway === 'cashapp') {
                    $("#payCashapp").submit();
                } else {
                    alert("Select any of the payment first!");
                }
            })

            jQuery("#cancelProcessPaiment").on('click', function () {
                loader.css('height', '100%');
                $.ajax({
                    type: "post",
                    url: ajax_variables.ajax_url,
                    dataType: "json",
                    data: "action=cancelProcess",
                    error: function (e) {
                        console.log(e);
                    },
                    success: function (e) {
                        removeCookie('chocoletraOrderData');
                        removeCookie('chocol_cookie');
                        removeCookie('coupon');
                        loader.css('height', '0%');
                        location.reload();
                    },
                });
            });
        });


        function setCookie(name, value, days) {
            const date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            const expires = "expires=" + date.toUTCString();
            document.cookie = name + "=" + value + ";" + expires + ";path=/";
        }

        let currentShippingMethod = 'normal';
        $('#ctf_form .shippingPanel>.expressShipping').on('click', function () {
            if (currentShippingMethod !== 'express') {
                $('#ctf_form .shippingPanel>div').removeClass('selected');
                $('#ctf_form .shippingPanel .standardShipping').hide();
                $('#ctf_form .shippingPanel .shippingExpress').show();
                $(this).addClass('selected');

                $("#ExpressActivator").val('on');
                currentShippingMethod = 'express';

                let getPrice = $('.chocoletrasPlg__wrapperCode-dataUser-form-input-price').val();
                let totalPrice = Number(getPrice) + Number($("#expressShipingPrice").val());
                $('.chocoletrasPlg__wrapperCode-dataUser-form-input-price').val(totalPrice);

                $('.priceCounter').text(totalPrice);
            }
        });

        $('#ctf_form .shippingPanel>.normalShipping').on('click', function () {
            if (currentShippingMethod !== 'normal') {
                $('#ctf_form .shippingPanel>div').removeClass('selected');
                $('#ctf_form .shippingPanel .standardShipping').show();
                $('#ctf_form .shippingPanel .shippingExpress').hide();
                $(this).addClass('selected');

                $("#ExpressActivator").val('off');
                currentShippingMethod = 'normal';

                let getPrice = $('.chocoletrasPlg__wrapperCode-dataUser-form-input-price').val();
                let totalPrice = Number(getPrice) - Number($("#expressShipingPrice").val());
                $('.chocoletrasPlg__wrapperCode-dataUser-form-input-price').val(totalPrice);
                $('.priceCounter').text(totalPrice);
            }
        });



        var current_fs, next_fs, previous_fs;
        var opacity;
        var current = 1;
        var steps = $("fieldset").length;

        setProgressBar(current);

        $(".next").click(function () {
            current_fs = $(this).parents('fieldset');
            next_fs = $(this).parents('fieldset').next();

            //Add Class Active
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

            //show the next fieldset
            next_fs.show();
            //hide the current fieldset with style
            current_fs.animate({ opacity: 0 }, {
                step: function (now) {
                    // for making fielset appear animation
                    opacity = 1 - now;

                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    next_fs.css({ 'opacity': opacity });
                },
                duration: 500
            });
            setProgressBar(++current);
        });

        $(".previous").click(function () {
            current_fs = $(this).parents('fieldset');
            previous_fs = $(this).parents('fieldset').prev();

            //Remove class active
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

            //show the previous fieldset
            previous_fs.show();

            //hide the current fieldset with style
            current_fs.animate({ opacity: 0 }, {
                step: function (now) {
                    // for making fielset appear animation
                    opacity = 1 - now;

                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    previous_fs.css({ 'opacity': opacity });
                },
                duration: 500
            });
            setProgressBar(--current);
        });

        function setProgressBar(curStep) {
            var percent = parseFloat(100 / steps) * curStep;
            percent = percent.toFixed();
            $(".progress-bar")
                .css("width", percent + "%")
        }

        $(".submit").click(function () {
            return false;
        })



        $.ajax({
            url: ajax_variables.ajax_url,
            method: 'POST',
            data: {
                action: 'get_calendar_settings'
            },
            success: function (response) {
                // console.log(response

                var disableDays = response.disable_days || [];
                var disableDatesString = response.disable_dates || '';
                var disableMonthsDays = response.disable_months_days || { months: [], days: [] };

                var disableDates = disableDatesString.split(',').map(function (date) {
                    return date.trim();
                });

                // console.log("Disable Days:", disableDays); 
                // console.log("Disable Dates:", disableDates); 
                // console.log("Disable Months and Days:", disableMonthsDays);

                $("#picDate").flatpickr({
                    minDate: "today",
                    defaultDate: "today",
                    dateFormat: "Y-m-d",
                    disable: [
                        function (date) {
                            return disableDays.includes(date.getDay().toString());
                        },
                        // Disable specific dates
                        function (date) {
                            var formattedDate = flatpickr.formatDate(date, "Y-m-d");
                            return disableDates.includes(formattedDate);
                        },
                        function (date) {
                            var month = date.getMonth();
                            var day = date.getDay();
                            if (disableMonthsDays.months.includes(month.toString()) && disableMonthsDays.days.includes(day.toString())) {
                                return true;
                            }
                            return false;
                        }
                    ],
                });
            },
            error: function (xhr, status, error) {
                console.error('AJAX Error:', status, error);
            }
        });


        let couponCondition = false;
        $('#couponApply').click(function () {
            if (couponCondition) {
                alert('You already use a coupon before In this Order.')
                return;
            }
            var couponCode = $('#coupon').val();

            if (couponCode === '') {
                alert('Please enter a coupon code.');
                return;
            }

            $.ajax({
                url: ajax_variables.ajax_url,
                method: 'POST',
                data: {
                    action: 'validate_coupon',
                    coupon: couponCode
                },
                success: function (response) {
                    if (response.success) {
                        // alert('Coupon is valid. Discount: ' + response.data.discount + ' ' + response.data.type + '. Remaining uses: ' + response.data.remaining_usage);
                        couponCondition = true;
                        if (response.data.type === 'fixed') {
                            let priceTotal = $('.chocoletrasPlg__wrapperCode-dataUser-form-input-price').val();
                            let afterDiscount = Number(priceTotal) - response.data.discount;
                            $('.priceCounter').text(afterDiscount);
                            $('.chocoletrasPlg__wrapperCode-dataUser-form-input-price').val(afterDiscount);
                        } else if (response.data.type === 'percentage') {
                            let priceTotal = $('.chocoletrasPlg__wrapperCode-dataUser-form-input-price').val();
                            let discountValue = (Number(priceTotal) * response.data.discount) / 100;
                            let afterDiscount = Number(priceTotal) - discountValue;
                            $('.priceCounter').text(afterDiscount.toFixed(2));
                            $('.chocoletrasPlg__wrapperCode-dataUser-form-input-price').val(afterDiscount.toFixed(2));
                        } else {
                            console.log('Unknown discount type');
                        }

                    } else {
                        alert('Error: ' + response.data.message);
                    }
                },
                error: function (xhr, status, error) {
                    console.error('AJAX Error:', status, error);
                }
            });
        });

        $(".couponSection p").on('click', function () {
            $(this).parents('.couponSection').toggleClass('open');
        })
    });

    function getQueryParam(param) {
        let urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(param);
    }

    if (getQueryParam("payment") === "true") {
        var counter = 10;
        var interval = setInterval(function () {
            counter--;
            $("#countdownRedirect").text(counter);
            if (counter <= 0) {
                clearInterval(interval);
                window.location.href = "http://localhost/wordpress/sample-page/";
            }
        }, 1000);
    } else {
        $("span").hide();
    }


}(jQuery));
