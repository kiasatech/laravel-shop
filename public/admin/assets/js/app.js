// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
})()


/* ================================================
 * classes in CSS: .tooltip-primary, .tooltip-success, .tooltip-info, .tooltip-warning, .tooltip-danger.
 * ============================================= */

;(function($) {

    if (typeof $.fn.tooltip.Constructor === 'undefined') {
        throw new Error('Bootstrap Tooltip must be included first!');
    }

    var Tooltip = $.fn.tooltip.Constructor;

    // add customClass option to Bootstrap Tooltip
    $.extend( Tooltip.Default, {
        customClass: ''
    });

    var _show = Tooltip.prototype.show;

    Tooltip.prototype.show = function () {

        // invoke parent method
        _show.apply(this,Array.prototype.slice.apply(arguments));

        if ( this.config.customClass ) {
            var tip = this.getTipElement();
            $(tip).addClass(this.config.customClass);
        }

    };

})(window.jQuery);
/*-----------------Login Show Password-------------------*/
let inputElem = document.querySelector('.input-status')
let passElem = document.querySelector('.pass-status')
let statusElem = true;

passElem.addEventListener('click', () => {
    if (statusElem){
        inputElem.type = 'text';
        passElem.className = 'pass-status ft-eye-off';
    } else {
        inputElem.type = 'password';
        passElem.className = 'pass-status ft-eye';
    }
    statusElem = !statusElem;
})
