$.fn.toggleSelect2 = function (state) {
    return this.each(function () {
        $.fn[state ? 'show' : 'hide'].apply($(this).next('.select2-container'));
    });
};

$(document).ready(function () {
    $('.addressable').on('click', function (e) {
        e.preventDefault()
        window.location = $(this).data('href')
    })

    var colors = ['#C60D13', '#900b11', '#d5494d']; // Define Your colors here, can be html name of color, hex, rgb or anything what You can use in CSS
    $('.sub-nav').css('background', colors[0])
    var active = 1;

    setInterval(function () {
        $('.sub-nav').css('background', colors[active])
        active++;
        if (active === colors.length) active = 0;
    }, 3000);

    $('.select2').select2({
        theme: "classic", // allowClear: true
        // placeholder: $(this).data('placeholder'),
    });

    $('#modalCourseSelect').toggleSelect2(false);

    $('#modalLicenceTypeSelect').on('select2:select', function (e) {
        // ajax
        let selectedLicenceTypeCode = $(this).val()
        let $select = $('#modalCourseSelect');
        let $notFoundSpan = $('#modalCourseSelectNotFoundMsg');

        $.ajax({
            url: $(this).data('courseFetchUrl').replace('code', selectedLicenceTypeCode),

            method: "GET",
        }).done(function (data) {
            let x = [];

            if (data.length) {
                $notFoundSpan.prop('hidden', true)
                $select.toggleSelect2(true)
                //     .select2('destroy');
                // $select.empty();
                $select.html('').select2({
                    data: //['<option value="">Termín</option>'] +
                        data.map(function (c) {
                            return {
                                "id": c.id,
                                'text': c.date_from_formatted + ' - ' + c.date_to_formatted
                            };
                        })
                });
            } else {
                $('#modalCourseSelect').toggleSelect2(false);
                $notFoundSpan.prop('hidden', false)
            }

        })
    })

    $('.lineProgressBarContainer').each(function (k, v) {
        let bar = new ProgressBar.Line(v, {
            strokeWidth: 4,
            easing: 'easeInOut',
            duration: 1800,
            color: '#FFEA82',
            trailColor: '#eee',
            trailWidth: 1,
            svgStyle: {width: '100%', height: '100%'},
            text: {
                style: {
                    // Text color.
                    // Default: same as stroke color (options.color)
                    color: 'rgb(153, 153, 153)',
                    position: 'absolute',
                    right: '50%',
                    whiteSpace: "no-wrap",
                    bottom: '4px',
                    padding: '0px',
                    margin: '0px',
                    transform: 'translateX(50%)',
                },
                autoStyleContainer: false
            },
            from: {color: '#FFEA82'},
            to: {color: '#ED6A5A'},
            step: (state, bar) => {
                console.log()
                bar.setText(Math.round(bar.value() * $(v).data('capacity')) + ' / ' + $(v).data('capacity'));
                // bar.setText(Math.round(bar.value() * 100) + ' % ');
                bar.path.setAttribute('stroke', state.color);
            }
        });
        bar.animate($(v).data('actualStudentsCount') / $(v).data('capacity'));
    })

});

function sendLicenseRequest(el, url) {
    clearMainModal();
    let $firstForm = $("#showCourseRequestForm")
    let formData = new FormData(el)
    formData.append('name', $firstForm.find('input[name="name"]').val());
    formData.append('email', $firstForm.find('input[name="email"]').val());
    if ($firstForm.find('input[name="number"]').val()) {
        formData.append('number', $firstForm.find('input[name="number"]').val());
    }

    for (let pair of formData.entries()) {
        console.log(pair[0] + ', ' + pair[1]);
    }
    $.ajax({
        url: url, data: formData, type: "POST", processData: false, contentType: false,
    }).done(function (data) {
        $('#mainModalHeader').removeClass('bg-danger bg-success').addClass('bg-success');
        $('#mainModalTitle').text('Úspešné odoslanie žiadosti o kurz');
        $('#mainModalBody').html('<p>Žiadosť bola úspešne odoslaná. Do 3 dní sa Vám ozveme ohľadom ďalších detailov. </p><p>Ďakujeme, že ste si vybrali práve nás.</p>');
        $('#mainModalSubmitBtn').hide();
        // $('#mainModalCloseBtn').removeClass('bg-danger bg-success').addClass('bg-success');
    }).fail(function (xhr, status, error) {
        $('#mainModalHeader').removeClass('bg-danger bg-success').addClass('bg-danger');
        $('#mainModalTitle').text('Akcia nebola úspešná');

        // console.log(xhr)
        if (xhr.status === 422) {
            for (const [key, value] of Object.entries(xhr.responseJSON.errors)) {
                $('#mainModalBody').append('<p>' + value + '</p>');
                // console.log(a, b)
            }
            // xhr.responseJSON.errors.entries.forEach(function (a, b) {
            //     $('#mainModalBody').append('<p></p>');
            //     console.log(a, b)
            // })
        }
        $('#mainModalSubmitBtn').hide();
        // $('#mainModalCloseBtn').removeClass('bg-danger bg-success').addClass('bg-danger');
    }).always(function (data) {
        $("#courseRequestModal").modal('hide')
        $("#mainModal").modal('show')
        $('#showCourseRequestForm input').val('')

        // $('#showCourseRequestForm').find('select').each(function (x) {
        //     $(x).val('').trigger('change');
        //     $(this).val('').trigger('change');
        // })
    })

}

function clearMainModal() {
    $('#mainModalHeader').removeClass('bg-danger bg-success');
    $('#mainModalTitle').text('');
    $('#mainModalForm').prop('action', '')
    $('#mainModalBody').html('');
    // $('#mainModalSubmitBtn').show();
    $('#mainModalSubmitBtn').show().removeClass('bg-danger bg-success').addClass('bg-success');
}

function showCourseRequestModal(el) {
    let formData = new FormData(el)
    let $modal = $('#courseRequestModal');

    $modal.find('#modalUserName').text(formData.get('name'));
    $modal.modal('show');

}

function showDeleteModal(el, url,) {

    clearMainModal();

    $('#mainModalHeader').removeClass('bg-danger bg-success').addClass('bg-danger');
    $('#mainModalTitle').text('Skutočne chcete odstrániť túto položku?');
    // $('#mainModalSubmitBtn').hide();
    $('#mainModalSubmitBtn').removeClass('bg-danger bg-success').addClass('bg-danger').off('click').on('click', function () {

        $.ajax({
            url: url, method: "DELETE",
        }).done(function (data) {
            $("#mainModal").modal('hide')
            $(el).closest('tr').remove()

        }).fail(function () {
            $('#mainModalHeader').removeClass('bg-danger bg-success').addClass('bg-danger');
            $('#mainModalTitle').text('Akcia nebola úspešná');
            $('#mainModalSubmitBtn').hide();

            $('#mainModalCloseBtn').removeClass('bg-danger bg-success').addClass('bg-danger');
        })
    })
    $("#mainModal").modal('show')
}
