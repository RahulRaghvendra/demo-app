@if(\App\Helpers\Helper::permissionCheck($value,$or))
    {{ $slot }}
@endif