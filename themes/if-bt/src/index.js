/////////////////////////// import bootstrap modules /////////////////////////////////
//import 'bootstrap';

// import 'bootstrap/js/dist/alert';
import 'bootstrap/js/dist/button';
// import 'bootstrap/js/dist/carousel';
import 'bootstrap/js/dist/collapse';
import 'bootstrap/js/dist/dropdown';
import 'bootstrap/js/dist/modal';
// import 'bootstrap/js/dist/popover';
// import 'bootstrap/js/dist/scrollspy';
import 'bootstrap/js/dist/tab';
//import 'bootstrap/js/dist/toast';
//import 'bootstrap/js/dist/tooltip';


/////////////////////////// import project template /////////////////////////////////
import "./custom.scss";


/////////////////////////// octobercms cookies plugin modal /////////////////////////
$('#cookies-manage-save-modal').click(function() {

        var date = new Date();

date.setFullYear(date.getFullYear() + 365);

document.cookie = "sg-cookies-consent=1; path=/; expires=" + date.toGMTString();

    var item = document.getElementById('sg-cookies-necessary-modal');

    if( item.checked == true ) {
        document.cookie = 'sg-cookies-necessary=1; path=/; expires=' + date.toGMTString();
    } else {
        document.cookie = 'sg-cookies-necessary=0; path=/; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
    }

    var item = document.getElementById('sg-cookies-statistical-modal');

    if( item.checked == true ) {
        document.cookie = 'sg-cookies-statistical=1; path=/; expires=' + date.toGMTString();
    } else {
        document.cookie = 'sg-cookies-statistical=0; path=/; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
    }

    var item = document.getElementById('sg-cookies-marketing-modal');

    if( item.checked == true ) {
        document.cookie = 'sg-cookies-marketing=1; path=/; expires=' + date.toGMTString();
    } else {
        document.cookie = 'sg-cookies-marketing=0; path=/; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
    }

        location.reload(true);

});

$('#cookies-bar .btn-accept-all').click(function(e) {

  e.preventDefault();

  var date = new Date();

  date.setFullYear(date.getFullYear() + 365);

  document.cookie = "sg-cookies-consent=1; path=/; expires=" + date.toGMTString();

  document.cookie = "sg-cookies-necessary=1; path=/; expires=" + date.toGMTString();

  document.cookie = "sg-cookies-statistical=1; path=/; expires=" + date.toGMTString();

  document.cookie = "sg-cookies-marketing=1; path=/; expires=" + date.toGMTString();

  $('#cookies-bar').hide();

  location.reload(true);
});


//////////////////////////////// open lightbox for search ////////////////////////

$(function () {
    $('a[href="#search"]').on('click', function(event) {
        event.preventDefault();
        $('#search').addClass('open');
        $('#languageselect').remove();
        $('#search > form > input[type="search"]').focus();
    });

    $('#search, #search button.close').on('click keyup', function(event) {
        if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
            $(this).removeClass('open');
        }
    });

});


//////////////////////////////// hide navbar /////////////////////////////////////
// When the user scrolls down, hide the navbar.
// When the user scrolls up, show the navbar
// var prevScrollpos = window.pageYOffset;
// window.onscroll = function() {
// var currentScrollPos = window.pageYOffset;
//   if (prevScrollpos > currentScrollPos) {
//     document.getElementById("navbar").style.top = "0";
//   } else {
//     document.getElementById("navbar").style.top = "-110px";
//   }
//   prevScrollpos = currentScrollPos;
// }

//////////////////////////////// hide bootstrap focus rings if not used ///////////
// providing focus rings to keyboard users, but not to others
// https://medium.com/hackernoon/removing-that-ugly-focus-ring-and-keeping-it-too-6c8727fefcd2

function handleFirstTab(e) {
    if (e.keyCode === 9) { // the "I am a keyboard user" key
        document.body.classList.add('user-is-tabbing');
        window.removeEventListener('keydown', handleFirstTab);
    }
}

window.addEventListener('keydown', handleFirstTab);
