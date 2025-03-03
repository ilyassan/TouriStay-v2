<div>
    <h2>Performance Test Results</h2>

    <p>Blade Rendering Time: {{ $bladeTime }} seconds</p>
    <p>Native PHP Rendering Time: {{ $nativeTime }} seconds</p>
    <p>PHP Faster Than Blade: {{ number_format($bladeTime / $nativeTime, 2) }}x time</p>

    <hr>

    <h3>Blade Output (Optional):</h3>
    <pre>{{ $bladeContent }}</pre>

    <h3>Native PHP Output (Optional):</h3>
    <pre>{{ $nativeContent }}</pre>
</div>