<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<div>{{ config('app.name') }}</div>
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
