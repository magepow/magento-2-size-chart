require(["jquery", "Magento_Ui/js/modal/modal"], 
    function($, modal) {
        'use strict';
        var sizechart =  $('.sizechart-popup');
        var options = {
            type: 'popup', // popup or slide
            responsive: true, // true = on smaller screens the modal slides in from the right
            title: $.mage.__('Size Chart Diagram'),
            buttons: [{ // Add array of buttons within the modal if you need.
                text: $.mage.__('Close'),
                class: '',
                click: function () {
                    this.closeModal(); // This button closes the modal
                }
            }]
        };
        var popup = modal(options, sizechart);
        $(".sizechart-display").click(function() {
            sizechart.modal('openModal');
        });
});