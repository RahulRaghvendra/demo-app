@props(['route', 'title','preload' => false, 'width' => 640, 'height' => 1000, 'id' => null, 'class' => '', 'style' => '','link'=>''])
@php($btnClass = $link?'text-decoration-none':'btn btn-primary')
<a 
@if($id) id="{{ $id }}" @endif

class="{{$btnClass}} {{ $class ?? '' }}" href="{{ $route }}"
    @if($preload) data-preload="{{ $preload }}" @endif
    data-fancybox data-type="iframe"
    @if($width) data-width="{{ $width }}" @endif
    @if($height) data-height="{{ $height }}" @endif
    @if($style) style="{{ $style }}" @endif
    title="{{ $title }}">
    {{ $title }}
</a>