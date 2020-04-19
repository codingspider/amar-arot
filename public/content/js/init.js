(function ($) {
  $(function () {
    $('select').formSelect();
    $('.sidenav').sidenav();
    $('.fixed-action-btn').floatingActionButton();
    const forms = document.querySelectorAll('.side_add_product');
    M.Sidenav.init(forms, { edge: 'right' });

  }); // end of document ready
})(jQuery); // end of jQuery name space

// Register service worker.
if ('serviceWorker' in navigator) {
  window.addEventListener('load', () => {
    console.log('service worker load fired');
    navigator.serviceWorker.register('./../../service-worker.js')
        .then((reg) => {
          console.log('Service worker registered.', reg);
        });
  });
}

