(function() {
    $('#teamlistModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)

        var media = button.parent().parent();
        var person = media.data('person');
        var avatar = media.data('avatar');

        var modal = $(this)

        modal.find('.modal-title').html(person.name + ' <small>' + person.role + '</small>')
        modal.find('.person-avatar').attr('src', avatar)

        modal.find('.person-motivation').text(person.motivation)
        modal.find('.person-background').text(person.background)
        modal.find('.person-favourite-movie').text(person.favourite_movie)
        modal.find('.person-url').text(person.url).attr('href', person.url)
    })
})();