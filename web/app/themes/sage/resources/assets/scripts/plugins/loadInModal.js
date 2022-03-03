// jQuery plugin to load content in modal when clicking
// on links with the 'load-in-modal' class

function loadInModal()
{

// variables
    const $modalBody = $('.content-modal-body');
    const $modalDialog = $('#content-modal');
    const $loading = $('#loading');

    $(document).on('click', 'a.load-in-modal, li.load-in-modal a.nav-link', function (e) {
        e.preventDefault();
        const modalClass = $(this).data('modal-class'); // get a modifier class to add to the modal
        $modalDialog.removeClass(function (index, css) {
   // remove old modifier classes
            return (css.match(/\bclass-\S+/g) || []).join(' '); // removes anything that starts with "class-"
        });
      // if the modifier class exists, add it to the modal
      // this is useful for example styling the main body of the modal
      // in a different way depending on what is getting loaded
      // make sure to add 'data-modal-class' to the 'load-in-modal' link
        if (modalClass) {
            $modalDialog.addClass(modalClass);
        }
      // show the loading overlay
        $loading.addClass('show');
      // if this has an additional 'load-raster-image-in-modal' class,
      // then just create an image directly in the modal and
      // show it
        if ($(this).hasClass('load-raster-image-in-modal')) {
            const $data = '<img src="' + $(this).attr('href') + '" alt="' + $(this).data('alt') + '" class="' + $(this).data('class') + '" />'
            $modalDialog.one('shown.bs.modal', function () {
            }).modal('show');
            $modalBody.html($data).promise().done(function () {
                $loading.removeClass('show');
            });
          // otherwise perform ajax and get the link data
        } else {
            $.ajax({
                url: this.href,
                async: true,
                cache: false,
                success: function (data) {
                    let $data = $(data).find('article').length ? $(data).find('article') : $(data).find('.main'); // get article, if not exist, get .main
                    $modalDialog.one('shown.bs.modal', function () {
                    }).modal('show');
                    $modalBody.html($data).promise().done(function () {
                        $loading.removeClass('show');
                    });
                },
            });
        }
    });

}

export default loadInModal;

