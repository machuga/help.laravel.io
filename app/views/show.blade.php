<div class="show-paste">
    <section class="meta">
        <p class="version"><span>Version:</span> Laravel {{{ $paste->version }}}</p>
        <p class="created"><span>Created At:</span> {{{ $paste->created_at->format('M d, Y h:ia') }}}</p>
    </section>

    <section class="issue">
        <div class="problem">
            <h1>Problem</h1>
            <p>{{{ $paste->problem }}}</p>
        </div>
        <div>
            <h1>Errors</h1>
            <code>{{{ $paste->errors }}}</code>
        </div>
    </section>

    <section class="behavior">
        <h1>Behavior</h1>

        <div class="behaviors">
            <div class="expected">
                <h2>Expected</h2>
                <p>{{{ $paste->expected }}}</p>
            </div>

            <div class="actual">
                <h2>Actual</h2>
                <p>{{{ $paste->actual }}}</p>
            </div>
        </div>
    </section>

    <section class="files">
        <h1>Files</h1>
        @foreach ($paste->files as $file)
            <article class="file">
                <div class="heading">
                    <h3 class="file-name">{{{ $file->name }}}</h2>
                    <h3 class="file-type">{{{ $file->file_type }}}</h3>
                </div>
                <div class="codeblock">
                    <pre><code class="php">{{{ $file->code }}}</code></pre>
                </div>
            </article>
        @endforeach
    </section>
</div>

@section('javascripts')
<script>hljs.initHighlighting()</script>
@stop
