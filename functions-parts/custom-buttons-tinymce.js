(function () {
    tinymce.PluginManager.add('custom_buttons', function (editor, url) {
        const hTags = ['h1', 'h2', 'h3', 'h4', 'h5', 'h6'];

        editor.addButton('change_h_tag_to_div', {
            text: 'div',
            tooltip: 'Swap H-tag to <div>',
            onclick: function () {
                const node = editor.selection.getNode();
                if (node && hTags.indexOf(node.tagName.toLowerCase()) !== -1) {
                    const div = editor.dom.create('div', { class: 'text-' + node.tagName.toLowerCase() }, node.innerHTML);
                    node.parentNode.replaceChild(div, node);
                } else {
                    editor.windowManager.alert('The cursor must be inside H1–H6');
                }
            }
        });

        ;[
            'accent-first',
            'accent-second',
            'accent-third',
            'gradient-first',
            'gradient-second',
            'dark',
            'light',
        ].forEach(name => {
            editor.addButton(name, {
                text: `color ${name}`,
                tooltip: 'Add color to selected text',
                onclick: function () {
                    let selected_text = editor.selection.getContent({
                        format: "html",
                    });

                    editor.execCommand("mceReplaceContent", false, `<span class="text-${name}">${selected_text}</span>`);
                }
            });
        });

        editor.addButton('style_link', {
            text: 'style-link',
            tooltip: 'Style link',
            onclick: function () {
                const node = editor.selection.getNode();
                if (node && node.tagName == 'A') {
                    node.classList.add('link');
                } else {
                    editor.windowManager.alert('The cursor must be inside link tag');
                }
            }
        });
    });
})();
