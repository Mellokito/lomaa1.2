@component('mail::message')
    
    Nom : <strong>{{ $details['name'] }} </strong><br/>
    Numéro téléphone : <strong>{{ $details['phone'] }} </strong><br/>
    E-mail : <strong>{{ $details['email'] }} </strong><br/>
    Message :<br/>
    {{ $details['message'] }}
    
@endcomponent