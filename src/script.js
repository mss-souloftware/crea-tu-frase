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

        function generateImages(text) {
            const $typewriter = $('#typewriter');
            $typewriter.empty(); // Clear previous images

            for (const char of text) {
                const keyCode = char.toUpperCase().charCodeAt(0);
                const imgFileName = keyMap[keyCode];

                if (imgFileName) {
                    const imgPath = `http://localhost/wordpress/wp-content/plugins/crea-tu-frase/img/letters/${imgFileName}`;
                    const $img = $('<img>').attr('src', imgPath).addClass('letter-img');
                    $typewriter.append($img);
                }
            }
        }

        $('#text-input').on('input', function () {
            const inputText = $(this).val();
            generateImages(inputText);
        });
    });

}(jQuery));