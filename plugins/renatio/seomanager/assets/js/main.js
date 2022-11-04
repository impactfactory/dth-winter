function updateCountdown(input, comment)
{
    let counterEl = comment.find('span');
    let limit = input.data('limit');

    let remaining = limit - input.val().length;
    counterEl.text(remaining);

    counterEl.toggleClass('warning', remaining < 0);
}

function makeCountable(el)
{
    let input = el.find(':input');
    let limit = input.data('limit');

    let comment = el.find('.help-block');

    comment.html(comment.html().replace(':limit', limit));

    updateCountdown(input, comment);
}

$(document).on('keyup change', '.countable', function () {
    makeCountable($(this));
});

$(document).on('ajaxSuccess ready', function () {
    $('.countable').each(function () {
        makeCountable($(this));
    });
});