@component('mail::message')
# Tienes un nuevo proyecto asignado

Inicia sesión y revisa los proyectos que se te han asignado en el modulo
asignaciones de stcencomunitel.com
<h2>{{$nombre}} - {{$numero}}</h2>
@component('mail::button', ['url' => 'stcemcomunitel.com'])
IR
@endcomponent
{{ config('app.name') }}
@endcomponent
