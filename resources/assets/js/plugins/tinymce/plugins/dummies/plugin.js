window.tinymce.PluginManager.add('dummies', function (editor) {
    editor.addButton('add_dummies', {
        title: 'Dummies',
        icon: '',
        onclick: function() {
            let content = editor.selection.getContent();
        }
    })
});
