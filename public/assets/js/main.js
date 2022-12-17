// Contact Form
$("#contactForm").submit(function(e) {
    e.preventDefault();

    const form = $(this);
    const actionUrl = form.attr('action');

    $.ajax({
        type: "POST",
        url: actionUrl,
        data: form.serialize(),
        success: () => {
            $("#success_message").css("display", "block");
            $("#contactForm").trigger('reset');
            $("#sumbit").text('Send A Message');
            setTimeout(() => {
                $("#success_message").css("display", "none");
            }, 5000)
        },
        beforeSend: () => {
            $("#sumbit").text('Loading...');
        },
        error: () => {
            $("#error_message").css("display", "block");
            $("#sumbit").text('Send A Message');
            setTimeout(() => {
                $("#error_message").css("display", "none");
            }, 5000)
        }
    });
});

// Subscribe Form subscriberForm
$(() => {
    $("#subscriberForm").submit(function(e) {
        e.preventDefault();

        const form = $(this);
        const actionUrl = form.attr('action');

        $.ajax({
            type: "POST",
            url: actionUrl,
            data: form.serialize(),
            success: () => {
                $("#success_message").css("display", "block");
                $("#subscriberForm").trigger('reset');
                $("#sumbit").text('Subscribe');
                setTimeout(() => {
                    $("#success_message").css("display", "none");
                }, 5000);
            },
            error: (data) => {
                $("#error_message p").text(data.responseText);
                $("#sumbit").text('Subscribe');
                $("#error_message").css("display", "block");
                setTimeout(() => {
                    $("#error_message").css("display", "none");
                }, 5000);
            }
        });
    });
});


