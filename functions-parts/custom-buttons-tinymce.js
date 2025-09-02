(function() {
    tinymce.PluginManager.add('custom_span', function(editor, url) {
        const hTags = ['h1', 'h2', 'h3', 'h4', 'h5', 'h6'];

        editor.addButton('custom_span', {
            text: 'Span',
            icon: false, 
            tooltip: 'Wraps the selected text in a <span>',
            onclick: function() {
                const node = editor.selection.getNode();

                if(node && hTags.includes(node.tagName.toLowerCase())) {
                    const span = document.createElement('span');
                    span.innerHTML = node.innerHTML;
                    span.className = `text-${node.tagName.toLowerCase()}`;
                    node.parentNode.replaceChild(span, node);
                }
            }
        });

    });
})();
