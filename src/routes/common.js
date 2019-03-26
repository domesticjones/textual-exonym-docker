require('jquery-visible');
const $ = jQuery;

export default {
  init() {
  	// Wrap embedded objects and force them into 16:9
  	$('iframe, embed, video').not('.ignore-ratio').wrap('<div class="video-container" />');

  	// HEADER: Responsive Nav Toggle
  	$('#responsive-nav-toggle').click((e) => {
      e.preventDefault();
  		const $this = $(e.currentTarget);
      $('#nav-responsive').toggleClass('is-active');
  		$this.toggleClass('is-active');
  	});

    // Check for Demo Request Completion
    if(localStorage.getItem('textualDemo') == '1') {
      $('body').addClass('textual-demo-false');
    } else {
      $('body').addClass('textual-demo-true');
    }
  },
  finalize() {
    // Input label Animation
    $('input, textarea').each((i,e) => {
      $(e).on('focus', () => {
        $(e).closest('.form-element').addClass('is-active');
        $(e).next('.wpcf7-not-valid-tip').fadeOut();
      });
      $(e).on('blur', () => {
        if($(e).val().length == 0) {
          $(e).closest('.form-element').removeClass('is-active');
        }
      });
      if($(e).val() != '') {
        $(e).closest('.form-element').addClass('is-active');
      }
    });

    // Focus first demo field on select
    function scrollToTarget(source, target, speed = 0) {
      $(source).on('click', (e) => {
        let offset = 0;
        e.preventDefault();
        if(target == '#contact') {
          const widthUnit = ($(window).width()) / 100;
          $('#contact-image, #contact').addClass('is-active');
          offset = 8 * widthUnit;
        }
        $('html, body').animate({
          scrollTop: $(target).offset().top - offset
        }, speed);
        $(`${target} input:visible:enabled:first`).focus();
      });
    }
    const ctaObject = '#demo';
    scrollToTarget('a[href="#demo"]', ctaObject);

    // Contact Form Link
    const contactObject = '#contact';
    scrollToTarget('a[href="#contact"]', contactObject);

    // Check for demo form submission
    document.addEventListener('wpcf7mailsent', (e) => {
      $('body').removeClass('textual-demo-true');
      $('body').addClass('textual-demo-false');
      localStorage.setItem('textualDemo', '1');
      $('html, body').animate({
        scrollTop: $(ctaObject).offset().top
      }, 0);
    }, false);

    // Animate On Screen
    $(window).on('load resize scroll', () => {
      $('.animate-on-enter').each((i, el) => {
        const $this = $(el);
        if ($this.visible(true)) {
          $this.addClass('is-visible');
        }
      });
      $('.animate-on-leave').each((i, el) => {
        const $this = $(el);
        if (!$this.visible(true)) {
          $this.removeClass('is-visible');
        }
      });
    });
  },
};
