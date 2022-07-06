define([
    'uiClass',
    'jquery',
    'underscore',
    'uiRegistry',
    'Magento_Ui/js/modal/alert'
], function (Class, $, _, registry, alert) {
    'use strict';

    return Class.extend({
        /**
         * Initialize actions and adapter.
         *
         * @param {Object} config
         * @param {Element} elem
         * @returns {Object}
         */
        initialize: function (config, elem) {

            this.serviceUrl = config.serviceUrl;

            return this._super()
                .initAdapter(elem);
        },

        /**
         * Attach callback handler on button.
         *
         * @param {Element} elem
         */
        initAdapter: function (elem) {
            $(elem).on('click', e => this.makeRequest(this.serviceUrl));

            return this;
        },

        makeRequest: function(serviceUrl) {

            let sku = registry.get('inputName = product[sku]').value();

            $.ajax({
                showLoader: true,
                url: this.serviceUrl,
                method: 'get',
                data: {sku},
                dataType: 'json',
            }).then(response => {

                let qtyInput = registry.get('inputName = product[quantity_and_stock_status][qty]');

                if(response.response_status == 200) {
                    qtyInput.value(response.quantity);

                    alert({
                        title: $.mage.__('Quantity Updated'),
                        content: $.mage.__('The quantity was synced with MWS Server'),
                        actions: {
                            always: function(){}
                        }
                    });

                } else {
                    alert({content: response.error_message});
                }
            })

        }
    });
});
