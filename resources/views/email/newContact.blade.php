<x-mail::message>
    {{-- codice markdown --}}
 <h1>{{$newContactData->objects}}</h1>
# New contact from your Form:
 
Click on the button for more details!

<x-mail::button :url="$url">
View New Lead!
</x-mail::button>
 
Thanks,<br>
{{ config('app.name') }}
</x-mail::message>