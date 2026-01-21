<!DOCTYPE html>
<html>

<head>
    <title>{{ __('translate.Quote Proposal') }}</title>
</head>

<body>
    <h1>{{ __('translate.Quote Proposal') }}</h1>
    <p>{{ __('translate.Dear') }} {{ $data['name'] }},</p>

    <p>{{ __('translate.We are pleased to provide you with the quote for your request regarding') }}:
        <strong>{{ $data['service_title'] }}</strong></p>

    <h3>{{ __('translate.Quote Details') }}:</h3>
    <ul>
        <li><strong>{{ __('translate.Price per Adult') }}:</strong> {{ $data['price_adult'] }}</li>
        <li><strong>{{ __('translate.Price per Child') }}:</strong> {{ $data['price_child'] }}</li>
        <li><strong>{{ __('translate.Number of Rooms') }}:</strong> {{ $data['rooms'] }}</li>
    </ul>

    <h3>{{ __('translate.Room Details / Message') }}:</h3>
    <p>{!! nl2br(e($data['message'])) !!}</p>

    <p>{{ __('translate.Please contact us if you have any questions.') }}</p>

    <p>{{ __('translate.Best regards') }},<br>
        {{ config('app.name') }}</p>
</body>

</html>