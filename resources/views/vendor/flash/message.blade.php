@foreach (session('flash_notification', collect())->toArray() as $message)
    @if ($message['overlay'])
        @include('flash::modal', [
            'modalClass' => 'flash-modal',
            'title'      => $message['title'],
            'body'       => $message['message']
        ])
    @else
        <script>
        	window.onload = function() {
        		toastr.{{ $message['level'] }}('{{ $message['message'] }}')
        	}
        </script>
    @endif
@endforeach
{{ session()->forget('flash_notification') }}
