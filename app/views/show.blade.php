<header>
    <h1>Problem</h1>
    <p>{{{ $paste->problem }}}</p>
    <dl>
        <dt>Version</dt>
        <dd>Laravel {{{ $paste->version }}}</dd>
        <dt>Expected Behavior</dt>
        <dd>{{{ $paste->expected }}}</dd>
        <dt>Actual Behavior</dt>
        <dd>{{{ $paste->actual }}}</dd>
    </dl>
</header>

@if ($paste->errors)
    <section>
        <h1>Errors</h1>
        <pre>
            <code>
                {{{ $paste->errors }}}
            </code>
        </pre>
    </section>
@endif

<section>
    <h1>Files</h1>
    @foreach ($paste->files as $file)
        <article>
            @if ($file->name)
                <h1>{{{ $file->name }}}</h1>
            @endif
            <h3>{{{ $file->type }}}</h3>
            <div class="codeblock">
                <pre>
                    <code class="php">
                        {{{ $file->code }}}
                    </code>
                </pre>
            </div>
        </article>
    @endforeach
</section>

@section('javascripts')
<script>hljs.initHighlighting()</script>
@stop
