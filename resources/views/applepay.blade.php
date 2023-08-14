<head>
    <!-- Other Tags -->

    <!-- Moyasar Styles -->
    <link rel="stylesheet" href="https://cdn.moyasar.com/mpf/1.9.0/moyasar.css" />

    <!-- Moyasar Scripts -->
    <script src="https://polyfill.io/v3/polyfill.min.js?features=fetch"></script>
    <script src="https://cdn.moyasar.com/mpf/1.9.0/moyasar.js"></script>
    <title>Apple Pay</title>
    <script src="https://applepay.cdn-apple.com/jsapi/v1/apple-pay-sdk.js"></script>
    <style>

        apple-pay-button {
            --apple-pay-button-width: 140px;
            --apple-pay-button-height: 30px;
            --apple-pay-button-border-radius: 5px;
            --apple-pay-button-padding: 5px 0px;
        }
    </style>
    <!-- Download CSS and JS files in case you want to test it locally, but use CDN in production -->
</head>
<body>
<div class="apple-pay-button apple-pay-button-black">
</div>
<apple-pay-button buttonstyle="black" type="buy" locale="el-GR"></apple-pay-button>



<div class="mysr-form">

</div>
<script>
    Moyasar.init({
        element: '.mysr-form',
        // Amount in the smallest currency unit.
        // For example:
        // 10 SAR = 10 * 100 Halalas
        // 10 KWD = 10 * 1000 Fils
        // 10 JPY = 10 JPY (Japanese Yen does not have fractions)
        amount: 1000,
        currency: 'SAR',
        description: 'Coffee Order #1',
        publishable_api_key: 'pk_test_f4FHkFpp7Q58jd3RN7A79B6umYfifGo6TdvpCeUd',
        callback_url: 'https://moyasar.com/thanks',
        methods: ['applepay'],
        apple_pay: {
            country: 'SA',
            label: 'Awesome Cookie Store',
            validate_merchant_url: 'https://api.moyasar.com/v1/applepay/initiate',
        },
        on_completed: 'https://mystore.com/checkout/savepayment',
    });
</script>
</body>
