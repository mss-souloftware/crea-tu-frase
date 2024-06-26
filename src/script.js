(function ($) {
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

        function attachInputHandler($input, $typewriterInner) {
            $input.on('input', function () {
                const selectedSymbol = $('#letras').val() === 'heart' ? '♥' : '✯';
                let inputText = $(this).val();
                inputText = inputText.replace(/ /g, selectedSymbol).toUpperCase();
                $(this).val(inputText);
                generateImages(inputText, $typewriterInner, selectedSymbol);
            });
        }

        attachInputHandler($('#getText'), $('#typewriter .typewriterInner'));

        $("#ctf_form #getText").on("keyup", function () {
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
            const $newFrasePanel = $(`
                <div class="frasePanel">
                    <input class="fraseInput" type="text" placeholder="Escriba su frase aquí.." required="">
                </div>
            `);
            $('.fraseWrapper').append($newFrasePanel);
            const $newTypewriterInner = $(`<div class="typewriterInner" id="${newTypewriterInnerId}"></div>`);
            $('#typewriter').append($newTypewriterInner);
            const $newInput = $newFrasePanel.find('.fraseInput');
            attachInputHandler($newInput, $newTypewriterInner);
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
            $('.priceCounter').text($("#counter").text());

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

        $("#ctf_form").on("submit", function () {

            const mainText = [$('#getText').val()];
            const fullName = $("#fname").val();
            const email = $("#email").val();
            const tel = $("#chocoTel").val();
            const postal = $("#cp").val();
            const city = $("#city").val();
            const province = $("#province").val();
            const address = $("#address").val();
            let picDate = $("#picDate").val();
            const message = $("#message").val();

            if (!picDate) {
                picDate = new Date().toISOString();
            }

            $('.fraseInput').each(function () {
                mainText.push($(this).val());
            });

            const cookieData = {
                mainText: mainText,
                fname: fullName,
                email: email,
                tel: tel,
                postal: postal,
                city: city,
                province: province,
                address: address,
                picDate: picDate,
                experss: new Date().toISOString(),
                message: message,
                screenshots: screenshotPaths
            };

            const cookieValue = encodeURIComponent(JSON.stringify(cookieData));
            setCookie('chocoletraOrderData', cookieValue, 7);
        })

        function setCookie(name, value, days) {
            const date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            const expires = "expires=" + date.toUTCString();
            document.cookie = name + "=" + value + ";" + expires + ";path=/";
        }

        $('#ctf_form .shippingPanel>.expressShipping').on('click', function () {
            $('#ctf_form .shippingPanel>div').removeClass('selected');
            $('#ctf_form .shippingPanel .standardShipping').hide();
            $('#ctf_form .shippingPanel .shippingExpress').show();
            $(this).addClass('selected');
        })

        $('#ctf_form .shippingPanel>.normalShipping').on('click', function () {
            $('#ctf_form .shippingPanel>div').removeClass('selected');
            $('#ctf_form .shippingPanel .standardShipping').show();
            $('#ctf_form .shippingPanel .shippingExpress').hide();
            $(this).addClass('selected');
        })
    });

    $(document).ready(function () {

        var current_fs, next_fs, previous_fs;
        var opacity;
        var current = 1;
        var steps = $("fieldset").length;

        setProgressBar(current);

        $("#picDate").flatpickr();

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

    });

}(jQuery));
