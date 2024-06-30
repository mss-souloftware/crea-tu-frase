(function ($) {
    $(document).ready(function ($) {
        $("#disable_dates").flatpickr({
            mode: "multiple",
            dateFormat: "Y-m-d",
        });

        $("#disable_days_range").flatpickr({
            mode: "range",
            dateFormat: "Y-m-d",
        });
    });
}(jQuery))