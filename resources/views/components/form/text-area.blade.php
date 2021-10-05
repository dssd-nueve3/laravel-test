<div id="editor">
    <p>Here goes the initial content of the editor.</p>
</div>

<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>


