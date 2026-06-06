$(document).ready(function () {
    // Initialize settings from localStorage if available
    let settings = JSON.parse(localStorage.getItem('settings')) || {};

    // Apply dark mode if set in localStorage
    if (settings.dark === "dark-only") {
        $("body").addClass("dark-only");
    }

    // Handle the dark/light mode toggle when the mode button is clicked
    $(document).on("click", ".mode", function () {
        // Determine the current mode (if dark mode is applied, switch to light)
        const mode = $("body").hasClass("dark-only") ? "light" : "dark";

        // Toggle the 'dark-only' class on the body element
        $("body").toggleClass("dark-only");

        // Update the settings object based on the selected mode
        settings.dark = mode === "dark" ? "dark-only" : null; // Set dark mode to "dark-only" or null for light mode
        localStorage.setItem("settings", JSON.stringify(settings));

        // Debugging the mode before sending the AJAX request
        console.log("Updated settings.dark:", settings.dark);

        // Sync the mode with the server via AJAX
        $.ajax({
            url: "/update-mode",
            type: "POST",
            data: {
                mode: mode,  // Send the correct mode value ("dark" or "light")
                _token: $('meta[name="csrf-token"]').attr("content"), // CSRF token
            },
            success: function () {
                console.log("Mode updated successfully");
            },
            error: function (xhr, status, error) {
                console.error("Failed to update mode:", error);
            },
        });
    });

    // Additional customizer functionality (theme color and layout handling)
    $(".customizer-color li").on('click', function () {
        $(".customizer-color li").removeClass('active');
        $(this).addClass("active");
        var color = $(this).attr("data-attr");
        var primary = $(this).attr("data-primary");
        var secondary = $(this).attr("data-secondary");
        localStorage.setItem("color", color);
        localStorage.setItem("primary", primary);
        localStorage.setItem("secondary", secondary);
        localStorage.removeItem("dark");
        $("#color").attr("href", "../assets/css/" + color + ".css");
        $(".dark-only").removeClass('dark-only');
        location.reload(true);
    });

    $(".customizer-color.dark li").on('click', function () {
        $(".customizer-color.dark li").removeClass('active');
        $(this).addClass("active");
        $("body").attr("class", "dark-only");
        localStorage.setItem("dark", "dark-only");
    });

    if (localStorage.getItem("primary") != null) {
        document.documentElement.style.setProperty('--theme-deafult', localStorage.getItem("primary"));
    }
    if (localStorage.getItem("secondary") != null) {
        document.documentElement.style.setProperty('--theme-secondary', localStorage.getItem("secondary"));
    }

    $(".color-apply-btn").click(function () {
        location.reload(true);
    });

    var primary = document.getElementById("ColorPicker1").value;
    document.getElementById("ColorPicker1").onchange = function () {
        primary = this.value;
        localStorage.setItem("primary", primary);
        document.documentElement.style.setProperty('--theme-primary', primary);
    };

    var secondary = document.getElementById("ColorPicker2").value;
    document.getElementById("ColorPicker2").onchange = function () {
        secondary = this.value;
        localStorage.setItem("secondary", secondary);
        document.documentElement.style.setProperty('--theme-secondary', secondary);
    };

    // Additional theme and layout customizations...
    $(".customizer-links #c-pills-home-tab, .customizer-links #c-pills-layouts-tab").click(function () {
        $(".customizer-contain").addClass("open");
        $(".customizer-links").addClass("open");
    });

    $(".customizer-contain .icon-close").on('click', function () {
        $(".customizer-contain").removeClass("open");
        $(".customizer-links").removeClass("open");
    });

    $(".sidebar-type li").on('click', function () {
        var type = $(this).attr("data-attr");

        switch (type) {
            case 'compact-sidebar': {
                $(".page-wrapper").attr("class", "page-wrapper compact-wrapper");
                localStorage.setItem('page-wrapper', 'compact-wrapper');
                break;
            }
            case 'normal-sidebar': {
                $(".page-wrapper").attr("class", "page-wrapper horizontal-wrapper");
                localStorage.setItem('page-wrapper', 'horizontal-wrapper');
                break;
            }
            case 'box-layout': {
                $(".page-wrapper").attr("class", "page-wrapper compact-wrapper box-layout");
                localStorage.setItem('page-wrapper', 'compact-wrapper box-layout');
                break;
            }
            default: {
                $(".page-wrapper").attr("class", "page-wrapper compact-wrapper");
                localStorage.setItem('page-wrapper', 'compact-wrapper');
                break;
            }
        }

        location.reload(true);
    });
});
