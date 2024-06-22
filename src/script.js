(function ($) {


    $(document).ready(function () {
        // Mapping of key codes to corresponding image file names
        const keyMap = {
            48: '0.png',
            49: '1.png',
            50: '2.png',
            51: '3.png',
            52: '4.png',
            53: '5.png',
            54: '6.png',
            55: '7.png',
            56: '8.png',
            57: '9.png',
            32: 'heart.png',
            65: 'a.png', 66: 'b.png', 67: 'c.png', 68: 'd.png', 69: 'e.png',
            70: 'f.png', 71: 'g.png', 72: 'h.png', 73: 'i.png', 74: 'j.png',
            75: 'k.png', 76: 'l.png', 77: 'm.png', 78: 'n.png', 79: 'o.png',
            80: 'p.png', 81: 'q.png', 82: 'r.png', 83: 's.png', 84: 't.png',
            85: 'u.png', 86: 'v.png', 87: 'w.png', 88: 'x.png', 89: 'y.png',
            90: 'z.png'
        };

        function generateImages(text, $typewriterInner) {
            $typewriterInner.empty(); // Clear previous images

            const words = text.split('♥');

            words.forEach((word, index) => {
                const $wordDiv = $('<div>').addClass('word');
                for (const char of word) {
                    let keyCode;
                    if (char === '♥') {
                        keyCode = 32; // Treat '♥' as a space
                    } else {
                        keyCode = char.toUpperCase().charCodeAt(0);
                    }

                    const imgFileName = keyMap[keyCode];

                    if (imgFileName) {
                        const imgPath = `http://localhost/wordpress/wp-content/plugins/crea-tu-frase/img/letters/${imgFileName}`;
                        const $img = $('<img>').attr('src', imgPath).addClass('letter-img');
                        $wordDiv.append($img);
                    }
                }

                // Check if the word has more than 7 images
                if ($wordDiv.children().length > 10) {
                    $wordDiv.children().css('max-width', '35px');
                } else if (($wordDiv.children().length > 7)) {
                    $wordDiv.children().css('max-width', '50px');
                }


                $typewriterInner.append($wordDiv);
                if (index < words.length - 1) {
                    const imgPath = `http://localhost/wordpress/wp-content/plugins/crea-tu-frase/img/letters/${keyMap[32]}`;
                    const $img = $('<img>').attr('src', imgPath).addClass('letter-img');
                    $typewriterInner.append($img);
                }
            });
        }

        function attachInputHandler($input, $typewriterInner) {
            $input.on('input', function () {
                let inputText = $(this).val();
                inputText = inputText.replace(/ /g, '♥').toUpperCase();
                $(this).val(inputText);
                generateImages(inputText, $typewriterInner);
            });
        }

        // Initial handler for existing input
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

            // Attach input handler for the new input
            const $newInput = $newFrasePanel.find('.fraseInput');
            attachInputHandler($newInput, $newTypewriterInner);
        });




        $("#continuarBTN").on('click', function () {
            $('.priceCounter').text($("#counter").text());

            const text = $('#getText').val();
            const cookieData = {
                text: text,
                timestamp: new Date().toISOString(),
            };
            const cookieValue = encodeURIComponent(JSON.stringify(cookieData));
            setCookie('typewriterData', cookieValue, 7); // Set cookie to expire in 7 days


            // Capture screenshot of .typewriterInner with higher resolution
            html2canvas(document.querySelector(".typewriterInner"), {
                scale: 3, // Increase the scale for better resolution (adjust as needed)
                useCORS: true
            }).then(canvas => {
                // Convert canvas to a data URL
                const imgData = canvas.toDataURL('image/png');

                // Send the data URL to the server
                $.ajax({
                    type: "POST",
                    url: "/wordpress/wp-content/plugins/crea-tu-frase/utils/save_screenshot.php", // Update with your server-side handler URL
                    data: {
                        imgBase64: imgData
                    },
                    success: function (response) {
                        console.log("Screenshot saved successfully.");
                    },
                    error: function (error) {
                        console.error("Error saving screenshot:", error);
                    }
                });
            });

        });

        // Function to set cookie
        function setCookie(name, value, days) {
            const date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            const expires = "expires=" + date.toUTCString();
            document.cookie = name + "=" + value + ";" + expires + ";path=/";
        }

    });




    $(document).ready(function () {

        var current_fs, next_fs, previous_fs; //fieldsets
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